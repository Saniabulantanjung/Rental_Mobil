<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index()

    {
        $UserData = User::get();
        return view('pages.user.index', compact('UserData'));
    }

    function store(Request $request)
    {

        $UserData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
        ]);

        user::create($UserData);

        return redirect()->to('/user');
    }


    function create()
    {
        return view('pages.user.create');
    }


    function update($id, Request $request)
    {

        $validasiUser = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
        ]);

        user::find($id)->update($id);

        return redirect()->to('/user');
    }

    function edit($id)
    {
        $user = user::find($id);
        return view('pages.user.edit', compact('user'));
    }


    function delete($id)
    {
        $user = user::find($id);
        $user->delete();

        return redirect()->to('/user');
    }
}