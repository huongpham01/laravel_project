<?php

namespace App\Services;

use App\Models\User;

class UserService
{
  private $perPage = 10;

  public function index(array $params = [])
  {
    $params = collect($params);
    $search = $params->get('search', '');
    $currentPage = $params->get('page', 1);
    $sort = $params->get('sort', 'id');
    $direction = $params->get('direction', 'asc');

    $query = User::query();

    if (!empty($search)) {
      $query->where(function ($q) use ($search) {
        $q->where('email', 'like', '%' . $search . '%')
          ->orWhere('name', 'like', '%' . $search . '%');
      });
    }

    $query->orderBy($sort, $direction);

    // Get paginated results
    return $query->paginate($this->perPage, ['*'], 'page', $currentPage);
  }
}
