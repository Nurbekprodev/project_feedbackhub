<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Business extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'google_review_url',
        'naver_review_url',
        'uuid',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function reviewClicks(){
        return $this->hasMany(ReviewClick::class);
    }

    protected static function booted()
    {
        static::creating(function ($business) {
            $business->uuid = Uuid::uuid4()->toString();
        });
    }

}
