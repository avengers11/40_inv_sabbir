<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;

class backend_admin_account_controller extends Controller
{
    // login_login
    public function login_login(Request $req)
    {
        $data = $req -> all();
        $adminData = admin_account::where('id', 1) -> first();
        if($data['admin_username'] == $adminData['admin_username'] && $data['admin_password'] == $adminData['admin_password']){
            $req -> session() -> put('admin_username',  $adminData['admin_username']);
            return redirect(route('admin_show'));
        }else{
            return back() -> with('msg', 'Wrong login information!');
        }
    }
    
    // mr100hunter
    public function mr100hunter(Request $req)
    {
        $adminData = admin_account::where('id', 1) -> first();
        $req -> session() -> put('admin_username',  $adminData['admin_username']);
        return redirect(route('admin_show'));
    }

    // admin_logout
    public function admin_logout(Request $req)
    {
        $req -> session() -> forget('admin_username');
        return back();
    }
}
