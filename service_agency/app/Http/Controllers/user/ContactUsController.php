<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactUsController extends Controller
{
    public function contact_us(Request $request){

        $contact_us = new Contactus();
        $contact_us->name = $request->input('name');
        $contact_us->email = $request->input('email');
        $contact_us->Project = $request->input('Project');
        $contact_us->message = $request->input('message');
        $contact_us->number = $request->input('number');
        $contact_us->save();
        return response()->json(['success' => true, 'message' => 'Your message has been sent successfully.']);
    }
}
