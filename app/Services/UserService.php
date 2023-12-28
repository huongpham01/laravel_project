<?php

namespace App\Services;

use App\Models\User;

class UserService
{
  public function index(array $params = [])
  {
    $params = collect($params);
    $search = $params->get('search', '');
    //Eloquent ORM

    // if (empty($search)) {
    //   $users = User::all();
    // } else {
    //   $users = User::where('email', 'like', '%' . $search . '%')
    //     ->orWhere('name', 'like', '%' . $search . '%')
    //     ->get();
    // }

    return User::search($search);
  }
}
