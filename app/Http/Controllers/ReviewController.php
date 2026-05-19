<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function google(Business $business)
    {
        $business->reviewClicks()->create([
            'platform' => 'google',
        ]);

        return redirect($business->google_review_url);
    }

    public function naver(Business $business)
    {
        $business->reviewClicks()->create([
            'platform' => 'naver',
        ]);

        return redirect($business->naver_review_url);
    }

}
