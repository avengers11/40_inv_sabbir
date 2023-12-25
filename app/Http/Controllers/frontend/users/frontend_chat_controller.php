<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use App\Models\admin_account;
use App\Models\user_account;
use Illuminate\Http\Request;

class frontend_chat_controller extends Controller
{
    //support_show
    public function support_show(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $compact = compact('adminData');
        return view('users.pages.support.support')->with(compact('adminData'));
    }

    // support_post_show
    public function support_post_show(Request $req)
    {
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        return view('users.pages.support.newpost')->with(compact('userData'));
    }
}
