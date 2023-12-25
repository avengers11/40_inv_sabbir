<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_account;

class backend_admin_deshbord_controller extends Controller
{
    public function search_profile($id)
    {
        // search_profile
        if(user_account::where('userName', $id) -> orWhere('mobileNumber', $id) -> exists()){
            $userdata = user_account::where('userName', $id) -> orWhere('mobileNumber', $id) -> first();
            return response()->json(['st' => true, 'data' => $userdata]);
        }else{
            return response()->json(['st' => false]);
        }
    }
     // update_notification_data
     public function update_notification_data(Request $req)
     {
         admin_account::where('id', 1)->update([
             "notification" => '0'
         ]);
     }
     // update_notification_data_get
     public function update_notification_data_get(Request $req)
     {
        $data = admin_account::where('id', 1)->first();
        return response()->json(['data' => $data]);
     }
}
