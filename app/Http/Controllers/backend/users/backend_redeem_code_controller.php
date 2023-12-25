<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\redeem_code;
use App\Models\user_account;
use App\Models\balance_history;
use DB;

class backend_redeem_code_controller extends Controller
{
    //personal_redeem_code
    public function personal_redeem_code(Request $req)
    {
        $data = $req -> all();
        if(redeem_code::where('redeem_code', $data['redeem_code']) -> count() == 0){
            return response() -> json(['st' => false, 'msg' => 'Inavlid redeem code!']);
            return false;
        }
        if(redeem_code::where('redeem_code', $data['redeem_code']) -> where('st', 'use') -> count() > 0){
            return response() -> json(['st' => false, 'msg' => 'This is already used!']);
            return false;
        }
        $redeemData = redeem_code::where('redeem_code', $data['redeem_code']) -> first();
        redeem_code::where('redeem_code', $data['redeem_code']) -> update(['st' => 'use']);
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        user_account::where('csrf', $req -> session() -> get('csrf'))->update(['totalAmount' => DB::raw('totalAmount+'.$redeemData['amount'])]);

        $db = new balance_history;
        $db -> userID = $userData['id'];
        $db -> amount = $redeemData['amount'];
        $db -> msg = '<p class="win">You are recived <span class="amount">'.$redeemData['amount'].'</span> BDT from REDEEM CODE '.$redeemData['redeem_code'].'<span>:)</span></p>';
        $db -> save();
        
        return response() -> json(['st' => true, 'amount' => $redeemData['amount']]);
    }
}
