<?php

namespace App\Http\Controllers;

use App\Http\Requests\DuplicateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
        return view('users.index', compact('users'));
        // return view('auth.users.index', ['users' => $users];
    }

    // EDIT name, email
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        // Check if the user exists
        if (!$user) {
            abort(404);
        }

        return view('users.form', compact('user'));
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

    // Get duplicate user
    public function duplicate(Request $request, $id)
    {
        $user = User::find($id);
        // Check if the user exists
        if (!$user) {
            abort(404);
        }

        return view('users.copy', compact('user'));
    }

    // Post duplicate user 
    public function duplicateUser(DuplicateUserRequest $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            // Duplicate the user
            $newUser = $user->replicate();
            $newUser->name = $request->input('name');
            $newUser->email = $request->input('email');
            $newUser->password = Hash::make($user->password);
            $newUser->created_at = now();
            $newUser->updated_at = now();

            // Save the duplicated user 
            $newUser->save();

            return redirect()->route('user.index')->with('success', 'User duplicated successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'Same user name/email. Input again!');
        }
    }

    // SORT column
    public function sort(Request $request)
    {
        $users = User::sortable()->paginate(10);
        return view('user.index', compact('users'));
    }
}
