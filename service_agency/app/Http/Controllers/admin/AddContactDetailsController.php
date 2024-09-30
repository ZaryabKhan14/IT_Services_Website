<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact_Details;

class AddContactDetailsController extends Controller
{
    public function add_contact_form(){
        return view('admin.add_contact_details');
    }

    public function add_contact_details(Request $request){

        $add_contact_details = new Contact_Details();
        $add_contact_details->contact_address = $request->input('contact_address');
        $add_contact_details->contact_email = $request->input('contact_email');
        $add_contact_details->contact_number = $request->input('contact_number');

        $add_contact_details->save();
        return redirect()->route('admin')->with('success', 'Service Add successfully.');
    }
}
