<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_withdraw;
use App\Models\admin_account;
use Illuminate\Support\Facades\DB;

class frontend_admin_withdraw_controller extends Controller
{
    // withdraw_new
    public function withdraw_new(Request $req)
    {
        $user_account = user_withdraw::orderBy('id', 'DESC')-> where('st', 'pending') -> paginate(10);
        $adminData = admin_account::where('id', 1) -> first();
        $compact = compact('user_account', 'adminData');
        return view('admin.pages.withdraw.new') -> with($compact);
    }

    // withdraw_success
    public function withdraw_success(Request $req)
    {
        $user_account = user_withdraw::orderBy('id', 'DESC')-> where('st', 'success') -> paginate(10);
        $adminData = admin_account::where('id', 1) -> first();
        $compact = compact('user_account', 'adminData');
        return view('admin.pages.withdraw.success') -> with($compact);
    }
    // withdraw_record
    public function withdraw_record(Request $req)
    {
        $startDate = Date('Y-m').'-01';
        $endDate = Date('Y-m-d');

        $monthlyData = user_withdraw::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"), DB::raw("SUM(amount) as total_amount, COUNT(*) as row"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('date', 'desc')
            ->where('st', 'success')
            ->paginate(10);
        $compact = compact('monthlyData');
        return view('admin.pages.withdraw.Monthly_record') -> with($compact);
    }
}
