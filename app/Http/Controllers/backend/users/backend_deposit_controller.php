<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_recharge;
use App\Models\user_account;
use App\Models\admin_account;

class backend_deposit_controller extends Controller
{
    // deposit_submit
    public function deposit_submit(Request $req)
    {
        $data = $req->all();

        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $adminData = admin_account::where('id', 1)->first();

        if ($adminData['minDeposit'] > $data['amount']) {
            return back()->with(['st' => false, 'msg' => 'Our minimum deposit amount is ' . $adminData['minDeposit'] . ' BDT!']);
        }

        if (user_recharge::where('userID', $userData['id'])->where('st', 'pending')->exists()) {
            return back()->with(['st' => false, 'msg' => 'You have alredy a pending recharge!']);
        }

        $db = new user_recharge;
        $db->number = $data['number'];
        $db->amount = $data['amount'];
        $db->userID = $userData['id'];
        $db->orderID = time();
        $db->method = $data['method'];
        $db->tranx = $data['tranx'];
        $db->type = "BDT";
        $db->st = 'pending';
        $db->save();
        return back()->with(['st' => true, 'msg' => 'Your request is successfully updated। Please wait 30m for accepted!']);
    }

    // deposit_method
    public function deposit_method(Request $req)
    {
        $data = $req->all();
        $adminData = admin_account::where('id', 1)->first();

        if ($data['method'] == "Bkash") {
            $number = $adminData['bkash_number'];
        } else if ($data['method'] == "Nagad") {
            $number = $adminData['nagad_number'];
        } else if ($data['method'] == "Rocket") {
            $number = $adminData['rocket_number'];
        } else {
            $number = $adminData['usdt_address'];
        }
        return response()->json(['number' => $number]);
    }
}
