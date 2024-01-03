<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'review_id', 'slide_url', 'title', 'content', 'created_by', 'status'
    ];

    public function reviewDetail()
    {
        return $this->hasOne(ReviewDetail::class);
    }
}
