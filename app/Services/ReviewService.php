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

    $query = Review::query();

    if (!empty($search)) {

      $query->where(function ($q) use ($search) {
        $q->where('title', 'LIKE', '%' . $search . '%')
          ->orWhere('content', 'LIKE', '%' . $search . '%')
          ->orWhere('category', 'LIKE', '%' . $search . '%');
      });
    }
    $query->orderBy($sort, $direction);

    // Get paginated results
    return $query->paginate($this->perPage, ['*'], 'page', $currentPage);
  }
}
