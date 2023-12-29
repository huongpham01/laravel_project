<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index(Request $request)
    {
        $params = $request->toArray();
        $users = $this->service->index($params);
        return view('users.dashboard', compact('users'));
        // return view('auth.users.dashboard', ['users' => $users];
    }

    // EDIT name, email
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        // Check if the user exists
        if (!$user) {
            abort(404);
        }

        return view('users.edit', compact('user'));
    }

    // UPDATE infor user after edit
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        $user->update($request->all());
        // Check if the user exists
        if (!$user) {
            abort(404);
        }
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);


        return redirect()->route('user.index')->with('success', 'User with id = ' . $user->id . ' was updated successfully!');
    }

    //DELETE 

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User with id = ' . $user->id . ' was deleted successfully!');
    }

    // SORT column
    public function sort(Request $request)
    {
        $users = User::sortable()->paginate(10);
        return view('user.index', compact('users'));
    }
}
