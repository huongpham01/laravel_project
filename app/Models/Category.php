<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id', 'category_id', 'review_id'
    ];
    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
