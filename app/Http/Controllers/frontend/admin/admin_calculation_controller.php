<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use App\Models\admin_account;
use App\Models\user_recharge;
use App\Models\user_withdraw;
use App\Models\balance_history;

class admin_calculation_controller extends Controller
{
    //calculation
    public function calculation()
    {
        $adminData = admin_account::where('id', 1) -> first();
        $total_deposit = user_recharge::where('st', 'success')->sum('amount');
        $total_withdraw = user_withdraw::where('st', 'success')->sum('amount');

        $compact = compact('adminData', 'total_deposit', 'total_withdraw');
        return view('admin.pages.calculation.calculation') -> with($compact);
    }

    // calculation_history 
    public function calculation_history()
    {
        $calculation_his = balance_history::orderBy('id', 'DESC') -> where('userID', '0')->paginate(10);

        $compact = compact( 'calculation_his');
        return view('admin.pages.calculation.history') -> with($compact);
    }
}
