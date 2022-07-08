<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard($id){
        $admin = User::findOrFail($id);
        return view('admin/dashboard', compact('admin'));
    }
    public function view_sub_admins(){
        $sub_admins = User::where('role', 'sub-admin');
        return view('admin/view-subadmins');
    }
    public function view_sub_admin($id){
        $sub_admin = User::find($id);
        return view('admin/view-subadmin');
    }
    public function register_sub_admin(){
        return view('admin/add-subadmin');
    }
    public function update_sub_admin(Request $request, $id){
        $sub_admin = User::find($id);
        $sub_admin->update($request->all);
    }
    public function delete_sub_admin($id){
        $sub_admin = User::findOrFail($id);
        $sub_admin->delete();
    }
}
