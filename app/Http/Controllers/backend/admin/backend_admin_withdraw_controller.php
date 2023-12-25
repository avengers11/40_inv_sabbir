<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_withdraw;
use App\Models\user_account;

class backend_admin_withdraw_controller extends Controller
{
    // withdraw_success
    public function withdraw_success($id)
    {
        $withdraw_data = user_withdraw::where('id', $id)->first();
        $userData = user_account::findOrFail($withdraw_data['userID']);

        // r_amount
        $r_amount = $withdraw_data['amount'];

        // user update
        user_account::where('id', $withdraw_data['userID'])->update([
            'totalWithdraw' => $userData['totalWithdraw'] + $r_amount,
            'nextWithdraw' => $userData['nextWithdraw'] - 1,
        ]);

        user_withdraw::where('id', $id)->update([
            "st" => "success"
        ]);
        return back()->with('msg', 'Withdraw Request successfully done!');
    }

    // withdraw_undo
    public function withdraw_undo($id)
    {
        $withdraw_data = user_withdraw::where('id', $id)->first();
        $userData = user_account::findOrFail($withdraw_data['userID']);

        // r_amount
        $r_amount = $withdraw_data['amount'];

        // user update
        user_account::where('id', $withdraw_data['userID'])->update([
            'totalWithdraw' => $userData['totalWithdraw'] - $r_amount,
            'nextWithdraw' => $userData['nextWithdraw'] + 1,
        ]);

        user_withdraw::where('id', $id)->update([
            "st" => "pending"
        ]);

        return back()->with('msg', 'Withdraw Request successfully done!');
    }
    // withdraw_rejected
    public function withdraw_rejected($id)
    {
        $withdrawData = user_withdraw::where('id', $id)->first();
        $userData = user_account::findOrFail($withdrawData['userID']);

        $withdraw_amount = $withdrawData['amount'];

        user_account::where('id', $withdrawData['userID'])->update([
            'totalAmount' => $userData['totalAmount'] + $withdraw_amount,
            'todaysAmount' => $userData['todaysAmount'] + $withdraw_amount,
            'nextWithdraw' => '00',
        ]);

        user_withdraw::where('id', $id)->update([
            "st" => "rejected"
        ]);
        return back()->with('msg', 'Withdraw Request successfully rejected!');
    }
}
