<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_withdraw;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_recharge;

class backend_withdraw_controller extends Controller
{
    // withdraw_submit
    public function withdraw_submit(Request $req)
    {
        $data = $req->all();
        $adminData = admin_account::where('id', 1)->first();
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $withdraw_amount = $data['amount'];
        /*
        =================
            validation
        =================
        */
        // thisMonth
        if ($userData['nextWithdraw'] < 1) {
            return back()->with(['st' => false, 'msg' => 'Your monthly withdraw limit is expired!']);
        }

        // min withdraw
        if (intval($withdraw_amount) < intval($adminData['minWithdraw'])) {
            return back()->with(['st' => false, 'msg' => "Our minimum withdraw amount is " . $adminData['minWithdraw'] . " BDT!"]);
        }
        // account balance
        if (intval($withdraw_amount) > intval($userData['totalAmount'])) {
            return back()->with(['st' => false, 'msg' => "Insufficient account balance!"]);
        }
        // any pending withdraw
        if (user_withdraw::where('userID', $userData['id'])->where('st', 'pending')->exists()) {
            return back()->with(['st' => false, 'msg' => "You have alreday a pending withdraw!"]);
        }
        // next withdraw
        if (intval($userData['nextWithdraw']) > intval(time())) {
            $secound_difarence = $userData['nextWithdraw'] - time();
            $houres_later = ($secound_difarence / 60) / 60;
            return back()->with(['st' => false, 'msg' => "Your next withdraw is " . number_format($houres_later) . "h later!"]);
        }
        // any deposit
        // if(user_recharge::where('userID', $userData['id'])->where('st', 'success')->count() < 1){
        //     return back() -> with(['st' => false, 'msg' => "অর্থ উত্তলনের জন্য আপনাকে সর্বনিম্ন ".$adminData['minDeposit'].'$ ডিপজিট করতে হবে']);
        // }

        $db = new user_withdraw;
        $db->amount = $data['amount'];
        $db->userID = $userData['id'];
        $db->orderID = time();
        $db->method = $data['method'];
        $db->address = $data['address'];
        $db->st = 'pending';
        $db->save();

        user_account::where('csrf', $req->session()->get('csrf'))->update([
            'totalAmount' => $userData['totalAmount'] - $withdraw_amount,
            'todaysAmount' => $userData['todaysAmount'] - $withdraw_amount,
        ]);

        return back()->with(['st' => true, 'msg' => "You are successfully withdraw " . $withdraw_amount . " BDT! Please wait 24h for proceed this!"]);
    }
}
