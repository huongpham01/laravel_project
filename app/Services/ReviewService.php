<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
  private $perPage = 10;

  public function index(array $params = [])
  {
    $params = collect($params);
    $search = $params->get('search', '');
    $currentPage = $params->get('page', 1);
    $sort = $params->get('sort', 'id');
    $direction = $params->get('direction', 'asc');
    $key = null;
    // USE EAGER LOADING
    $query = Review::query()->with('categories');
    if (!empty($search)) {
      $query = $query->where(function ($q) use ($search, $key) {
        $q->where('title', 'LIKE', '%' . $search . '%')
          ->orWhere('content', 'LIKE', '%' . $search . '%');
        $key = null;
        if (in_array($search, config('const.tables.reviews.category_names'))) {
          $key = array_search($search, config('const.tables.reviews.category_names'));
          $q->orWhereHas('categories', function ($subQuery) use ($key) {
            $subQuery->where('category_id', $key);
          });
        }
      });
    };
    $query->orderBy($sort, $direction);
    $reviews = $query->paginate($this->perPage, ['*'], 'page', $currentPage);
    // dd($reviews);
    return $reviews;
  }
}
