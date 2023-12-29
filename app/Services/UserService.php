<?php

namespace App\Services;

use App\Models\User;

class UserService
{
  public function index(array $params = [])
  {
    $params = collect($params);
    $search = $params->get('search', '');
    $perPage = $params->get('per_page', 10);
    $sortField = $params->get('sort_field', 'id');
    $sortDirection = $params->get('sort_direction', 'asc');

    $query = User::query();

    if (!empty($search)) {
      $query->where(function ($q) use ($search) {
        $q->where('email', 'like', '%' . $search . '%')
          ->orWhere('name', 'like', '%' . $search . '%');
      });
    }
    $query->orderBy($sortField, $sortDirection);

    // Get paginated results
    return $query->paginate($perPage);
  }
}
