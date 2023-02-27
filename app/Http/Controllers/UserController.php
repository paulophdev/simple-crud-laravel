<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users', [
            'users' => User::all()->sortByDesc('created_at')
        ]);
    }

    public function show(User $user)
    {
        return view('userUpdate', [
            'user'  => $user
        ]);
    }

    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        User::create($dataValid);

        return redirect('/');
    }

    public function update(Request $request)
    {
        $dataValid = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'idUser'    => 'required'
        ]);

        $user = User::find($dataValid['idUser']);

        $user->name     = $dataValid['name'];
        $user->email    = $dataValid['email'];

        $user->save();

        return redirect('/');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect('/');
    }
}
