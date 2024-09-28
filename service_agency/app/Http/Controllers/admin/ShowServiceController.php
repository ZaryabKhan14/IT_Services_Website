<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ShowServiceController extends Controller
{
    public function show_service(){
        $show_service = Services::all();
        return view('admin.show_service',compact('show_service'));
    }

    public function delete_service($id){

        $delete_service = Services::find($id);
        $delete_service->delete();
        return redirect()->back()->with('success', 'Service Delete successfully.');
    }

    public function service_edit_form($id){

        $edit_service = Services::find($id);
        return view('admin.edit_service',compact('edit_service'));
    }

    public function update_service(Request $request,$id){

        $update_service = Services::find($id);
        $update_service->service_name = $request->input('service_name');
        $update_service->service_description = $request->input('service_description');
        $update_service->service_icon = $request->input('service_icon');
        $update_service->save();
        return redirect()->route('show_service')->with('success', 'Service Delete successfully.');
    }
}
