<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Feedback;
use App\Notifications\FeedbackNotification;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function show($uuid)
    {
        // get business by public uuid
        $business = Business::where('uuid', $uuid)->firstOrFail();

        return view('feedback.show', compact('business'));
    }

    public function store(Request $request, $uuid)
    {
        // get business by public uuid
        $business = Business::where('uuid', $uuid)->firstOrFail();

        // validate public input
        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        // create feedback
        $feedback = Feedback::create([
            'business_id' => $business->id,
            'rating' => $validated['rating'],
            'message' => $validated['message'] ?? null,
        ]);

        // notify only for negative feedback (non-blocking recommended later)
        if ($business->user_id && $feedback->rating <= 3) {
            $business->user->notify(new FeedbackNotification($feedback));
        }

        return back()->with('success', 'Feedback sent.');
    }

    public function updateStatus(Request $request, Feedback $feedback)
    {
        // lightweight ownership check (fast for V1)
        abort_if($feedback->business->user_id !== auth()->id(), 403);

        // validate status update
        $validated = $request->validate([
            'status' => ['required', 'in:new,in_progress,resolved'],
        ]);

        // update feedback status
        $feedback->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Status updated.');
    }
}