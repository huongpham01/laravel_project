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
    // if (in_array($search, config('const.')))
    // kiểm tra giá trị search có nằm trong mảng category_names (constants)
    
    // nếu có thì lấy key (dạng số) => gán cho 1 biến cho key cần search
    
    // 
    $query = Review::query();

    if (!empty($search)) {

      $query->where(function ($q) use ($search) {
        $q->where('title', 'LIKE', '%' . $search . '%')
          ->orWhere('content', 'LIKE', '%' . $search . '%');
      });
    }

    // when has relationship, use whereHas to get value in table of relationship
    // $query->whereHas('categories', function ($subQuery) use ($search) {
    //   $subQuery->where('category_id', $search );
    // });

    $query->orderBy($sort, $direction);

    // print orrigin sql syntax
    // dd($query->toSQL());
    // Get paginated results
    return $query->paginate($this->perPage, ['*'], 'page', $currentPage);
  }
}
