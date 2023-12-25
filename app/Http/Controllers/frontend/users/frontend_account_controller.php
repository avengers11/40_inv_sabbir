<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;
use App\Models\user_account;

class frontend_account_controller extends Controller
{
    // account_show
    public function account_show(Request $req)
    {
        $admin_data = admin_account::where('id', 1) -> first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        // // redirect
        if(url("") == "http://braaav.com"){
            return redirect('https://braaav.com');
        }
        $compact = compact('admin_data', 'userData');
        return view('users.pages.account.account') -> with($compact);
    }

    // account_show_login
    public function account_show_login()
    {
        return view('users.pages.accounts.login');// -> with($compact);
    }

    // account_show_signup
    public function account_show_signup()
    {
        // $admin_data = admin_account::where('id', 1) -> first();

        // $compact = compact('admin_data');
        return view('users.pages.accounts.signup');// -> with($compact);
    }

    // users_logout
    public function users_logout(Request $req)
    {
        $req -> session() -> forget('csrf');
        return back();
    }
}
