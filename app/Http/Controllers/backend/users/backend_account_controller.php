<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_account;
use Illuminate\Support\Facades\Hash;
use App\Models\users_task_history;

class backend_account_controller extends Controller
{
    //users_accounts_signup_insert
    public function users_accounts_signup_insert(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $data = $req->all();

        // $agent = $_SERVER['HTTP_USER_AGENT'];
        // if (strpos($agent, 'Chrome') == false || strpos($agent, 'Firefox') == false) {
        //     return response()->json(['one_device' => 'Please use Chrome Or Firefox browser for create a account!']);
        // }

        // check user is exists ??
        // if (user_account::where('uniqeID', $_SERVER['HTTP_USER_AGENT'])->exists()) {
        //     return response()->json(['one_device' => 'You are already create a account using this phone!']);
        // }


        // validation
        // ===============
        // username
        if (user_account::where('userName', $data['username'])->exists()) {
            return response()->json(['username' => 'This username is already exists!']);
        }
        // number
        if (user_account::where('mobileNumber', $data['number'])->exists()) {
            return response()->json(['number' => 'This number is already exists!']);
        }
        // invite
        if (!empty($data['invite']) && !user_account::where('invite', $data['invite'])->exists()) {
            return response()->json(['invite' => 'Invalid invitation code!']);
        }
        // password
        if ($data['password'] != $data['con_password']) {
            return response()->json(['password' => "Your confirmed password doesn't match!"]);
        }

        function generateRandomText($length)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $text = '';
            for ($i = 0; $i < $length; $i++) {
                $randomIndex = rand(0, strlen($characters) - 1);
                $text .= $characters[$randomIndex];
            }
            return $text;
        }

        $randomText = generateRandomText(10);
        if (user_account::where('invite', $randomText)->exists()) {
            return response()->json(['invite' => "Network error! Please try again later!"]);
        }

        // random img
        $randomImgData = [
            "0" => "random1.jpg",
            "1" => "random2.jpg",
            "2" => "random3.jpg",
            "3" => "random4.jpg",
        ];
        $randomImg = rand(0, 3);

        // =========with invitation code=========
        if (!empty($data['invite'])) {
            // find user
            $invitorData = user_account::where('invite', $data['invite'])->first();
            user_account::where('invite', $data['invite'])->update([
                "totalAmount" => $invitorData['totalAmount'] + $adminData['refer_bonuse']
            ]);

            // users_task_history
            $products_data = new users_task_history;
            $products_data->userID = $invitorData['id'];
            $products_data->info = "Your refer earning";
            $products_data->commission = $adminData['refer_bonuse'];
            $products_data->save();


            $csrf = Hash::make(time() . $data['number']);
            $db = new user_account;
            $db->fName = $data['fName'];
            $db->lName = $data['lName'];
            $db->userName = $data['username'];
            $db->mobileNumber = $data['number'];
            $db->email = $data['username'] . '@gmail.com';
            $db->password = $data['password'];
            $db->picture = $randomImgData[$randomImg];
            $db->invite = $randomText;
            $db->totalAmount = $adminData['offer_balance'];
            $db->nextWithdraw = $adminData['nextWIthdraw'];
            $db->uniqeID = $_SERVER['HTTP_USER_AGENT'];
            $db->referCommission = "1";
            // invitor st

            // 1st gen
            $db->gen1st = $data['invite'];
            // 2nd gen
            $db->gen2nd = $invitorData['gen1st'];
            // 3rd gen
            $db->gen3rd = $invitorData['gen2nd'];
            // 4th gen
            $db->gen4th = $invitorData['gen3rd'];
            // 5th gen
            $db->gen5th = $invitorData['gen4th'];

            // invitor end
            $db->csrf = $csrf;
            $db->save();

            $req->session()->put('csrf', $csrf);
            return response()->json(['st' => true]);
        }
        // =========with out invitation code=========
        else {
            $csrf = Hash::make(time() . $data['number']);

            $db = new user_account;
            $db->fName = $data['fName'];
            $db->lName = $data['lName'];
            $db->userName = $data['username'];
            $db->mobileNumber = $data['number'];
            $db->email = $data['username'] . '@gmail.com';
            $db->password = $data['password'];
            $db->invite = $randomText;
            $db->picture = $randomImgData[$randomImg];
            $db->csrf = $csrf;
            $db->totalAmount = $adminData['offer_balance'];
            $db->nextWithdraw = $adminData['nextWIthdraw'];
            $db->uniqeID = $_SERVER['HTTP_USER_AGENT'];
            $db->referCommission = "1";
            if ($db->save()) {
                $req->session()->put('csrf', $csrf);
                return response()->json(['st' => true]);
            }
        }
    }
    // users_accounts_login
    public function users_accounts_login(Request $req)
    {
        $data = $req->all();
        $userNameCpont = user_account::where('userName', $data['userName'])->count();
        if ($userNameCpont > 0) {
            $userData = user_account::where('userName', $data['userName'])->where('password', $data['password'])->first();
            $userDataCount = user_account::where('userName', $data['userName'])->where('password', $data['password'])->count();
            if ($userDataCount > 0) {
                if ($userData['accSt'] == 'ban') {
                    return response()->json(['st' => false, 'password' => "Your account has ban, contact us!"]);
                }
                $csrf = Hash::make(time() . $data['userName']);
                $req->session()->put('csrf', $csrf);
                user_account::where('id', $userData['id'])->update(['csrf' =>  $csrf]);
                return response()->json(['st' => true]);
            } else {
                return response()->json(['st' => false, 'password' => "Your password couldn't match!"]);
            }
        } else {
            return response()->json(['st' => false, 'username' => "Your username couldn't match!"]);
        }
    }

    // users_logout
    public function users_logout(Request $req)
    {
        $req->session()->forget('csrf');
        return back();
    }

    // users_accounts_signup_send
    public function users_accounts_signup_send(Request $req)
    {
        $data = $req->all();

        $rand = rand(100000, 999999);
        return response()->json(['code' => $rand]);
    }
}
