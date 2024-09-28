<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function redirect(){

        if (Auth::check()) {

            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect()->route('admin');
            }
            else {
                return redirect()->route('user_dashboard');
            }
        }
    }
}
