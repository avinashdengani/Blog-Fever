<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact(['users']));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
    public function makeAdmin(User $user)
    {
        $user->update(['role' => User::ADMIN]);
        session()->flash('success', $user->name .' has been assigned as ADMIN!');
        return redirect(route('users.index'));
    }
    public function revokeAdmin(User $user)
    {
        $user->update(['role' => User::AUTHOR]);
        session()->flash('success', $user->name .' has been assigned as AUTHOR!');
        return redirect(route('users.index'));
    }
}
