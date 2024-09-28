<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class AddServiceController extends Controller
{
    public function service_form(){
        return view('admin.add_service');
    }

    public function add_service(Request $request){

        $add_service = new Services();
        $add_service->service_name = $request->input('service_name');
        $add_service->service_description = $request->input('service_description');
        $add_service->service_icon = $request->input('service_icon');
        $add_service->save();
        return redirect()->route('admin')->with('success', 'Service Add successfully.');
    }
}
