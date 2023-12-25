<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;

class backend_admin_payment_controller extends Controller
{
    // payment_account
    public function payment_account(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "bkash_number" => $data['bkash_number'],
            "nagad_number" => $data['nagad_number'],
            "rocket_number" => $data['rocket_number'],
            "usdt_address" => $data['usdt_address'],
        ]);
        return back()->with('msg', 'Payment info successfully update!');
    }

    // payment_account_withdraw
    public function payment_account_withdraw(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "withdraw_bkash_number" => $data['withdraw_bkash_number'],
            "withdraw_nagad_number" => $data['withdraw_nagad_number'],
            "withdraw_rocket_number" => $data['withdraw_rocket_number'],
            "withdraw_usdt_address" => $data['withdraw_usdt_address'],
        ]);
        return back()->with('msg', 'Payment info successfully update!');
    }

    // payment_withdraw_limit
    public function payment_withdraw_limit(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "minWithdraw" => $data['minWithdraw'],
            "maxWithdraw" => $data['maxWithdraw'],
            "nextWIthdraw" => $data['nextWIthdraw'],
        ]);
        return back()->with('msg', 'Withdraw info successfully update!');
    }

    // payment_recharge_limit
    public function payment_recharge_limit(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "minDeposit" => $data['minDeposit'],
            "maxDeposit" => $data['maxDeposit'],
        ]);
        return back()->with('msg', 'Recharge info successfully update!');
    }

    // payment_recharge_com
    public function payment_recharge_com(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "depositGen1st" => $data['depositGen1st'],
            "depositGen2nd" => $data['depositGen2nd'],
            "depositGen3rd" => $data['depositGen3rd'],
            "depositGen4th" => $data['depositGen4th'],
            "depositGen5th" => $data['depositGen5th'],
        ]);
        return back()->with('msg', 'Recharge commission successfully update!');
    }

    // payment_genaration_com
    public function payment_genaration_com(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "taskGen1st" => $data['gen1st'],
            "taskGen2nd" => $data['gen2nd'],
            "taskGen3rd" => $data['gen3rd'],
            "taskGen4th" => $data['gen4th'],
            "taskGen5th" => $data['gen5th'],
        ]);
        return back()->with('msg', 'Genaration commission successfully update!');
    }

    // / payment_signup_bonuse
    public function payment_signup_bonuse(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "offer_balance" => $data['offer_balance'],
            "task_commission" => $data['task_commission'],
            "refer_bonuse" => $data['refer_bonuse'],
            "refer_bonuse_info" => $data['refer_bonuse_info'],
        ]);
        return back()->with('msg', 'Offer balance successfully update!');
    }

    // payment_dollaer_rate
    public function payment_dollaer_rate(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "dollar_rate" => $data['dollar_rate'],
        ]);
        return back()->with('msg', 'Doller rate successfully update!');
    }

    // payment_withdraw_charge
    public function payment_withdraw_charge(Request $req)
    {
        $data = $req->all();
        admin_account::where('id', 1)->update([
            "withdraw_charge" => $data['withdraw_charge'],
        ]);
        return back()->with('msg', 'Withdraw charge successfully update!');
    }
}
