<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $casts = [
        'user_id' => 'integer',
    ];
    protected $fillable = [
        'user_id', 'category', 'review_id', 'title', 'content', 'status', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
