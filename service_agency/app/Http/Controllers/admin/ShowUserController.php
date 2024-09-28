<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ShowUserController extends Controller
{
    public function show_user(){
        $show_user = User::all();
        return view('admin.show_user',compact('show_user'));
    }

    public function delete_user($id){
        $delete_user = User::find($id);
        $delete_user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }


    public function edit_form($id){
        $edit_user = User::find($id);
        return view('admin.edit_user_form',compact('edit_user'));
    }

    public function update_user(Request $request,$id){
        
        $update_user = User::find($id);
        $update_user->name = $request->input('name');
        $update_user->email = $request->input('email');
        $update_user->password = $request->input('password');
        $update_user->role = $request->input('role');
        $update_user->update();
        return redirect()->route('show_user')->with('success', 'User edited successfully.');
    }
}
