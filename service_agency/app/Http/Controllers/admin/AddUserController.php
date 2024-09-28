<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AddUserController extends Controller
{
    public function add_user_form(){
        return view('admin.add_user');
    }


    public function add_user(Request $request){

        $add_user = new User();
        $add_user->name = $request->input('name');
        $add_user->email = $request->input('email');
        $add_user->password = $request->input('password');
        $add_user->role = $request->input('role');

        $add_user->save();
        return redirect()->route('admin');
    }
}
