<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    public function index()
    {
        $admins=Admin::all();
        return view('admin',['admins'=>$admins]);

    }

    public function destroy(Request $request,$id)
    {
        $admin=Admin::where('id',$id);
        $admin->delete();
        return back();
    }
}
