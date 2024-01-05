<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class t_category extends Model
{
    protected $casts = [
        'review_id' => 'integer',
    ];
    protected $fillable = [
        'review_id'
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
