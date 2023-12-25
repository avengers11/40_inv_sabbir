<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_recharge;

class frontend_admin_users_controller extends Controller
{
    // users_all
    public function users_all(Request $req)
    {
        $user_account = user_account::orderBy('id', 'DESC') -> where('accSt', 'active') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.users.all') -> with($compact);
    }

    // users_active
    public function users_active(Request $req)
    {
        $user_account = user_account::orderBy('id', 'DESC') -> where('totalAmount', '>', 999) -> where('accSt', 'active') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.users.active') -> with($compact);
    }

    // users_ban
    public function users_ban(Request $req)
    {
        $user_account = user_account::orderBy('id', 'DESC') -> where('accSt', 'ban') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.users.ban') -> with($compact);
    }
    // users_profile
    public function users_profile(Request $req, $id)
    {
        $userData = user_account::where('id', $id)->first();
        $compact = compact('userData', 'id');
        return view('admin.pages.users.profile') -> with($compact);
    }
}
