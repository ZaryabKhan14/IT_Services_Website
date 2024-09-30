<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;

class ShowContactFormController extends Controller
{
    public function show_contact_form_details(){

        $show_contact = Contactus::orderBy('created_at', 'desc')->get();
        return view('admin.show_contact_form-details',compact('show_contact'));
    }
}
