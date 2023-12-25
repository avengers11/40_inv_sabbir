<?php

namespace App\Http\Controllers\frontEnd\admin;

use App\Http\Controllers\Controller;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_recharge;
use App\Models\user_withdraw;

class frontend_admin_deshbord_controller extends Controller
{

    public function admin_show()
    {
        // admin data
        $adminData = admin_account::where('id', 1)->first();
        // recharge
        $pen_recharge = user_recharge::where('st', 'pending') -> count();
        $total_recharge = user_recharge::where('st', 'success') -> sum('amount');

        // withdraw
        $pen_withdraw = user_withdraw::where('st', 'pending') -> count();
        $total_withdraw = user_withdraw::where('st', 'success') -> sum('amount');

        // user_account
        $user_account = user_account::orderBy('id', 'DESC')->paginate(10);
        // 24 h reset

        $compact = compact(
            'adminData',
            'user_account',

            'pen_recharge',
            'total_recharge',

            'pen_withdraw',
            'total_withdraw',
            // 'notification',
        );
        return view('admin.pages.deshbord.deshbord') -> with($compact);
    }
    // login_login
    public function login_login()
    {
        return view('admin.pages.account.account');
    }
}
