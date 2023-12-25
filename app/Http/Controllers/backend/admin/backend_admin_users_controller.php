<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use Illuminate\Support\Facades\Hash;

class backend_admin_users_controller extends Controller
{
    // users_ban
    public function users_ban(Request $req, $id)
    {
        user_account::where('id',$id) -> update([
            "accSt" => "ban"
        ]);
        return back() -> with('msg', 'User account successfully ban!');
    }
    // users_unban
    public function users_unban(Request $req, $id)
    {
        user_account::where('id',$id) -> update([
            "accSt" => "active"
        ]);
        return back() -> with('msg', 'User account successfully unban!');
    }

    // users_login
    public function users_login(Request $req, $id)
    {
        $csrf = Hash::make(time().$id);
        $req -> session() -> put('csrf', $csrf);
        user_account::where('id', $id) -> update(['csrf' =>  $csrf]);
        return redirect(route('web_home_show'));
    }

    // users_update
    public function users_update(Request $req, $id)
    {
        $data = $req -> all();
        user_account::where('id', $id) -> update([
            "fName" => $data['fName'],
            "lName" => $data['lName'],
            "userName" => $data['userName'],
            "password" => $data['password'],
            "mobileNumber" => $data['mobileNumber'],
            "email" => $data['email'],
            "gen1st" => $data['gen1st'],
            "gen2nd" => $data['gen2nd'],
            "gen3rd" => $data['gen3rd'],
            "gen4th" => $data['gen4th'],
            "gen5th" => $data['gen5th'],
            "invite" => $data['invite'],
            "totalAmount" => $data['totalAmount'],
            "todaysAmount" => $data['todaysAmount'],
            "bonusAmount" => $data['bonusAmount'],
            "totalDeposit" => $data['totalDeposit'],
            "totalWithdraw" => $data['totalWithdraw']
        ]);
        return back() -> with('msg', 'User account successfully update!');
    }

}
