<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BusinessController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // get user businesses with counts
        $businesses = auth()->user()
            ->businesses()
            ->withCount(['feedbacks', 'reviewClicks'])
            ->latest()
            ->get();

        return view('businesses.index', compact('businesses'));
    }

    public function show(Business $business, Request $request)
    {
        // authorize view access
        $this->authorize('view', $business);

        // base feedback query
        $query = $business->feedbacks();

        // apply filters
        if ($request->filter === 'positive') {
            $query->where('rating', '>=', 4);
        }

        if ($request->filter === 'negative') {
            $query->where('rating', '<=', 3);
        }

        if ($request->filter === 'new') {
            $query->where('status', 'new');
        }

        if ($request->filter === 'in_progress') {
            $query->where('status', 'in_progress');
        }

        if ($request->filter === 'resolved') {
            $query->where('status', 'resolved');
        }

        // search messages
        if ($request->search) {
            $query->where('message', 'like', '%' . $request->search . '%');
        }

        // sort results
        if ($request->sort === 'oldest') {
            $query->oldest();
        } elseif ($request->sort === 'highest') {
            $query->orderBy('rating', 'desc');
        } elseif ($request->sort === 'lowest') {
            $query->orderBy('rating', 'asc');
        } else {
            $query->latest();
        }

        // paginate results
        $feedbacks = $query->paginate(10)->withQueryString();

        // cache stats for speed
        $stats = cache()->remember("business_stats_{$business->id}", 60, function () use ($business) {

            $feedbacks = $business->feedbacks();
            $clicks = $business->reviewClicks();

            $totalCount = $feedbacks->count();
            $averageRating = $feedbacks->avg('rating');

            $negativeCount = (clone $feedbacks)->where('rating', '<=', 3)->count();
            $newCount = (clone $feedbacks)->where('status', 'new')->count();
            $inProgressCount = (clone $feedbacks)->where('status', 'in_progress')->count();
            $resolvedCount = (clone $feedbacks)->where('status', 'resolved')->count();

            $resolutionRate = $totalCount > 0
                ? round(($resolvedCount / $totalCount) * 100)
                : 0;

            $googleClicks = (clone $clicks)->where('platform', 'google')->count();
            $naverClicks = (clone $clicks)->where('platform', 'naver')->count();
            $totalClicks = $googleClicks + $naverClicks;

            return compact(
                'totalCount',
                'averageRating',
                'negativeCount',
                'newCount',
                'inProgressCount',
                'resolvedCount',
                'resolutionRate',
                'googleClicks',
                'naverClicks',
                'totalClicks',
            );
        });

        // last 7 days feedback
        $feedbackLast7 = $business->feedbacks()
            ->where('created_at', '>=', now()->subDays(7))
            ->count();

        // previous 7 days feedback
        $feedbackPrev7 = $business->feedbacks()
            ->whereBetween('created_at', [now()->subDays(14), now()->subDays(7)])
            ->count();

        // last 7 days clicks
        $clicksLast7 = $business->reviewClicks()
            ->where('created_at', '>=', now()->subDays(7))
            ->count();

        // previous 7 days clicks
        $clicksPrev7 = $business->reviewClicks()
            ->whereBetween('created_at', [now()->subDays(14), now()->subDays(7)])
            ->count();

        // feedback growth rate
        $feedbackTrend = $feedbackPrev7 > 0
            ? round((($feedbackLast7 - $feedbackPrev7) / $feedbackPrev7) * 100)
            : 0;

        // click growth rate
        $clickTrend = $clicksPrev7 > 0
            ? round((($clicksLast7 - $clicksPrev7) / $clicksPrev7) * 100)
            : 0;

        return view('businesses.show', [
            'business' => $business,
            'feedbacks' => $feedbacks,
            ...$stats,
            'feedbackLast7' => $feedbackLast7,
            'feedbackPrev7' => $feedbackPrev7,
            'clicksLast7' => $clicksLast7,
            'clicksPrev7' => $clicksPrev7,
            'feedbackTrend' => $feedbackTrend,
            'clickTrend' => $clickTrend,
        ]);
    }

    public function create()
    {
        // show create page
        return view('businesses.create');
    }

    public function store(Request $request)
    {
        // validate input
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'google_review_url' => ['nullable', 'url'],
            'naver_review_url' => ['nullable', 'url'],
        ]);

        // attach user and uuid
        $validated['user_id'] = auth()->id();
        $validated['uuid'] = \Str::uuid();

        Business::create($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Business created.');
    }

    public function edit(Business $business)
    {
        // authorize edit access
        $this->authorize('update', $business);

        return view('businesses.edit', compact('business'));
    }

    public function update(Request $request, Business $business)
    {
        // authorize update access
        $this->authorize('update', $business);

        // validate input
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'google_review_url' => ['nullable', 'url'],
            'naver_review_url' => ['nullable', 'url'],
        ]);

        $business->update($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Business updated.');
    }

    public function destroy(Business $business)
    {
        // authorize delete access
        $this->authorize('delete', $business);

        $business->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Business deleted successfully.');
    }

    public function qr(Business $business)
    {
        // authorize QR access
        $this->authorize('view', $business);

        $url = url('/f/' . $business->uuid);

        $qr = QrCode::format('svg')
            ->size(300)
            ->generate($url);

        return Response::make($qr, 200, [
            'Content-Type' => 'image/svg+xml',
            'Content-Disposition' => 'attachment; filename="qr.svg"',
        ]);
    }
}