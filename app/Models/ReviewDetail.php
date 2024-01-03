<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewDetail extends Model
{

  protected $fillable = [
    'review_id', 'slide_url', 'title', 'content', 'created_by', 'status'
  ];

  public function review()
  {
    return $this->belongsTo(Review::class);
  }
}
