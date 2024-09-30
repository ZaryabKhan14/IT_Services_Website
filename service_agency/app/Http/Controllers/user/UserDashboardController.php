<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Slider;
use App\Models\Contact_Details;

class UserDashboardController extends Controller
{
    public function user_dashboard(){
        $slider = Slider::all();
        $service = Services::all();
        $contact_details = Contact_Details::first();
        return view('user.user_dashboard',compact('slider','service','contact_details'));
    }
}
