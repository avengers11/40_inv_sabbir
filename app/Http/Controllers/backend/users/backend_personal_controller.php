<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use File;

class backend_personal_controller extends Controller
{
    // personal_data_up
    public function personal_data_up(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $data = $req -> all();

        if(!empty($req -> file('file'))){
            $pic = $req -> file('file');
            $pic_name = time().$pic -> getClientOriginalName();
            $pic -> move('images\users', $pic_name);
        }else{
            $pic_name = $userData['picture'];
        }

        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "fName" => $data['fName'],
            "lName" => $data['lName'],
            "picture" => $pic_name,
        ]);

        return back() -> with(['st' => true, 'msg' => 'Your personal data successfully updated!']);
    }
    // update_users_data
    public function update_users_data(Request $req)
    {
        $data = $req -> all();
        if($data['type'] == "username"){
            if(user_account::where('userName', $data['data']) -> exists()){
                return response() -> json(['st' => false, 'data' => 'Username is already exists!']);
            }else{
                user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                    "userName" => $data['data'],
                ]);
                return response() -> json(['st' => true, 'data' => 'Username successfully update!']);
            }

        }else if($data['type'] == "password"){
            user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                "password" => $data['data'],
            ]);
            return response() -> json(['st' => true, 'data' => 'Password successfully update!']);
        }else if($data['type'] == "number"){
            if(user_account::where('mobileNumber', $data['data']) -> exists()){
                return response() -> json(['st' => false, 'data' => 'Number is already exists!']);
            }else{
                user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                    "mobileNumber" => $data['data'],
                ]);
                return response() -> json(['st' => true, 'data' => 'Number successfully update!']);
            }
        }
        else{
            if(user_account::where('email', $data['data']) -> exists()){
                return response() -> json(['st' => false, 'data' => 'Email is already exists!']);
            }else{
                user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                    "email" => $data['data'],
                ]);
                return response() -> json(['st' => true, 'data' => 'Email successfully update!']);
            }
        }

    }

    // users_personal_controller_bank_setting_bdt
    public function users_personal_controller_bank_setting_bdt(Request $req)
    {
        $data = $req -> all();
        user_account::where('csrf', $req -> session() -> get('csrf'))->update([
            "acc_bdt_method" => $data["acc_bdt_method"],
            "acc_bdt_number" => $data["acc_bdt_number"],
            "acc_bdt_name" => $data["acc_bdt_name"],
        ]);
        return back() -> with('msg', 'Your bank account successfully updated!');
    }

    // users_personal_controller_bank_setting_usdt
    public function users_personal_controller_bank_setting_usdt(Request $req)
    {
        $data = $req -> all();
        user_account::where('csrf', $req -> session() -> get('csrf'))->update([
            "acc_usdt_method" => $data["acc_usdt_method"],
            "acc_usdt_address" => $data["acc_usdt_address"],
            "acc_usdt_name" => $data["acc_usdt_name"],
        ]);
        return back() -> with('msg', 'Your usdt account successfully updated!');
    }


    // users_personal_info_personal_update_controller
    public function users_personal_info_personal_update_controller(Request $req)
    {
        $data = $req -> all();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        // check img
        $img_name = "";
        if(!empty($req -> file('img'))){
            $img = $req -> file('img');
            $img_name = time().".".$img -> getClientOriginalExtension();
            $img -> move(public_path('images/users_profile'), $img_name);
            File::delete(public_path('images/users_profile/'.$userData['picture']));
        }else{
            $img_name = $userData['picture'];
        }

        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "picture" => $img_name,
            "fName" => $data['fName'],
            "lName" => $data['lName'],
            "mobileNumber" => $data['mobileNumber'],
            "email" => $data['email'],
        ]);
        return back() -> with(['st' => true, 'msg' => 'Your personal data successfully updated!']);
    }

    // users_personal_info_password_controller
    public function users_personal_info_password_controller(Request $req)
    {
        $data = $req -> all();
        if(strlen($data['new_password']) < 6){
            return back() -> with(['st' => false, 'msg' => "Password must be at last 6 digit!"]);
        }
        if(!user_account::where('csrf', $req -> session() -> get('csrf')) -> where("password", $data['password']) -> exists()){
            return back() -> with(['st' => false, 'msg' => "Your old password doesn't match"]);
        }
        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "password" => $data['new_password'],
        ]);
        return back() -> with(['st' => true, 'msg' => 'Your password successfully updated!']);
    }

    // users_personal_info_profile_controller
    public function users_personal_info_profile_controller(Request $req)
    {
        $pic = $req -> file('img');
        $pic_name = time().".".$pic -> getClientOriginalExtension();
        $pic -> move('images/users_profile', $pic_name);
        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "picture" => $pic_name,
        ]);
        return back() -> with('msg', 'Your profile successfully updated!');
    }
}
