<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(User $user){

        return view('admin.user.profile', ['user'=>$user]);
    }

    public function update(User $user){
        $inputs = \request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:3', 'confirmed'],
            ]
        );

        $user->update($inputs);

        return back();



    }
}
