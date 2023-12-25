<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_recharge;
use App\Models\user_withdraw;
use App\Models\users_task_history;
use Illuminate\Support\Facades\DB;

class frontend_history_controller extends Controller
{
    // history_task_today_show
    public function history_task_today_show(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $data = DB::table('07_users_task_histories')
        ->select(
            '07_users_task_histories.commission as commission',
            DB::raw("DATE_FORMAT(07_users_task_histories.created_at, '%d %M, %Y %h:%i:%s %p') as date")
        )
        -> orderBy('07_users_task_histories.id', 'DESC')
        ->whereDate('07_users_task_histories.created_at', today())
        -> where('userID', $userData['id'])
        -> paginate(10);

        $compact = compact('data');
        return view('users.pages.history.task.today') -> with($compact);
    }

    // history_task_all_show
    public function history_task_all_show(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $data = users_task_history::orderBy('id', 'DESC')
        -> where('userID', $userData['id'])
        -> paginate(10);

        $compact = compact('data');
        return view('users.pages.history.task.today') -> with($compact);
    }

    // history_account_deposit
    public function history_account_deposit(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $data = user_recharge::orderBy('id', 'DESC') -> select(
                    '03_user_recharges.amount as amount',
                    '03_user_recharges.method as method',
                    '03_user_recharges.st as st',
                    '03_user_recharges.orderID as orderID',
                    DB::raw("DATE_FORMAT(03_user_recharges.created_at, '%d %b, %Y %h:%i:%s%p') as date"),
                )
                -> where('userID', $userData['id'])
                -> get();
        $compact = compact('data');
        return view('users.pages.history.deposit_history') -> with($compact);
    }

    // history_account_withdraw
    public function history_account_withdraw(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $data = user_withdraw::orderBy('id', 'DESC') ->select(
                    '04_user_withdraws.amount as amount',
                    '04_user_withdraws.method as method',
                    '04_user_withdraws.address as address',
                    '04_user_withdraws.st as st',
                    '04_user_withdraws.orderID as orderID',
                    DB::raw("DATE_FORMAT(04_user_withdraws.created_at, '%d %b, %Y %h:%i:%s%p') as date"),
                )
                -> where('userID', $userData['id'])
                -> get();
        $compact = compact('data');
        return view('users.pages.history.withdraw_history') -> with($compact);
    }

}
