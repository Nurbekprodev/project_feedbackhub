<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'business_id',
        'rating',
        'message',
        'status',
    ];
    
    protected $table = 'feedbacks';

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
