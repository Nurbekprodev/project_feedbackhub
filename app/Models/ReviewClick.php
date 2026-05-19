<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewClick extends Model
{
    protected $fillable = [
        'business_id',
        'platform',
    ];
}
