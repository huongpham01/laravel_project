<?php

namespace App\Services;

use App\Models\Category;
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
    // kiểm tra giá trị search có nằm trong mảng category_names (constants)
    // if (in_array($search, config('const.tables.reviews.category_names'))) {
    // nếu có thì lấy key (dạng số) => gán cho 1 biến cho key cần search
    // $key = array_search($search, config('const.tables.reviews.category_names'));
    // }
    // $query = Review::query();
    // if (!empty($search)) {
    //   $query = $query->where(function ($q) use ($search, $key) {
    //     $q->where('title', 'LIKE', '%' . $search . '%')
    //       ->orWhere('content', 'LIKE', '%' . $search . '%');
    //     if (!is_null($key)) {
    //       $q->orWhereHas('categories', function ($subQuery) use ($key) {
    //         $subQuery->where('category_id', $key);
    //       });
    //     }
    //   });
    // }
    // $query->orderBy($sort, $direction);

    // print orrigin sql syntax
    // dd($query->toSql());
    // Get paginated results
    // return $query->paginate($this->perPage, ['*'], 'page', $currentPage);


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
