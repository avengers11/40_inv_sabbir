<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_package;
use App\Models\admin_account;
use App\Models\balance_history;
use App\Models\users_task_history;
use App\Models\task_video;

class backend_task_controller extends Controller
{
    // task_get_video
    public function task_get_video(Request $req)
    {
        $req_data = $req->all();

        $data = task_video::find($req_data['videoID']);
        return response()->json(['data' => $data]);
    }

    // task_get_commission
    public function task_get_commission(Request $req, $id)
    {
        $adminData = admin_account::where('id', 1)->first();
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        if (!$req->session()->has('task')) {
            return redirect(route('web_task_show'))->with(['st' => false, 'msg' => 'Invalid request!']);
        } else {
            $req->session()->forget('task');
        }

        if ($userData['task'] > 0) {
            // my_commission
            $my_commission = $adminData['task_commission'];
            // user amount update
            user_account::where('csrf', $req->session()->get('csrf'))->update([
                'totalAmount' => $userData['totalAmount'] + $my_commission,
                'todayIncome' => $userData['todayIncome'] + $my_commission,
                'totalTaskIncome' => $userData['totalTaskIncome'] + $my_commission,
                'task' => $userData['task'] - 1
            ]);

            $products_data = new users_task_history;
            $products_data->userID = $userData['id'];
            $products_data->info = "Your video earning";
            $products_data->commission = $my_commission;
            $products_data->save();

            // gen1st_commission
            if (!empty($userData['gen1st'])) {
                $userData_gen1st =  user_account::where('invite', $userData['gen1st'])->first();
                $gen1st_commission = ($my_commission / 100) * $adminData['taskGen1st'];

                user_account::where('invite', $userData['gen1st'])->update([
                    'totalAmount' => $userData_gen1st['totalAmount'] + $gen1st_commission,
                    'todaysAmount' => $userData_gen1st['todaysAmount'] + $gen1st_commission,
                    'todayRaferIncome' => $userData_gen1st['todayRaferIncome'] + $gen1st_commission,
                    'totalTeamRevenue' => $userData_gen1st['totalTeamRevenue'] + $gen1st_commission,
                ]);
            }

            // gen2nd_commission
            if (!empty($userData['gen2nd'])) {
                $userData_gen2nd =  user_account::where('invite', $userData['gen2nd'])->first();
                $gen2nd_commission = ($my_commission / 100) * $adminData['taskGen2nd'];

                user_account::where('invite', $userData['gen2nd'])->update([
                    'totalAmount' => $userData_gen2nd['totalAmount'] + $gen2nd_commission,
                    'todaysAmount' => $userData_gen2nd['todaysAmount'] + $gen2nd_commission,
                    'todayRaferIncome' => $userData_gen2nd['todayRaferIncome'] + $gen2nd_commission,
                    'totalTeamRevenue' => $userData_gen2nd['totalTeamRevenue'] + $gen2nd_commission,
                ]);
            }

            // gen3rd_commission
            if (!empty($userData['gen3rd'])) {
                $userData_gen3rd =  user_account::where('invite', $userData['gen3rd'])->first();
                $gen3rd_commission = ($my_commission / 100) * $adminData['taskGen3rd'];

                user_account::where('invite', $userData['gen3rd'])->update([
                    'totalAmount' => $userData_gen3rd['totalAmount'] + $gen3rd_commission,
                    'todaysAmount' => $userData_gen3rd['todaysAmount'] + $gen3rd_commission,
                    'todayRaferIncome' => $userData_gen3rd['todayRaferIncome'] + $gen3rd_commission,
                    'totalTeamRevenue' => $userData_gen3rd['totalTeamRevenue'] + $gen3rd_commission,
                ]);
            }

            // gen4th_commission
            if (!empty($userData['gen4th'])) {
                $userData_gen4th =  user_account::where('invite', $userData['gen4th'])->first();
                $gen4th_commission = ($my_commission / 100) * $adminData['taskGen4th'];

                user_account::where('invite', $userData['gen4th'])->update([
                    'totalAmount' => $userData_gen4th['totalAmount'] + $gen4th_commission,
                    'todaysAmount' => $userData_gen4th['todaysAmount'] + $gen4th_commission,
                    'todayRaferIncome' => $userData_gen4th['todayRaferIncome'] + $gen4th_commission,
                    'totalTeamRevenue' => $userData_gen4th['totalTeamRevenue'] + $gen4th_commission,
                ]);
            }

            // gen5th_commission
            if (!empty($userData['gen5th'])) {
                $userData_gen5th =  user_account::where('invite', $userData['gen5th'])->first();
                $gen5th_commission = ($my_commission / 100) * $adminData['taskGen5th'];

                user_account::where('invite', $userData['gen5th'])->update([
                    'totalAmount' => $userData_gen5th['totalAmount'] + $gen5th_commission,
                    'todaysAmount' => $userData_gen5th['todaysAmount'] + $gen5th_commission,
                    'todayRaferIncome' => $userData_gen5th['todayRaferIncome'] + $gen5th_commission,
                    'totalTeamRevenue' => $userData_gen5th['totalTeamRevenue'] + $gen5th_commission,
                ]);
            }

            // response
            return redirect(route('web_task_show'))->with(['st' => true, 'msg' => 'You are successfully get your commission!']);
        } else {
            return redirect(route('web_task_show'))->with(['st' => false, 'msg' => 'No more works today!']);
        }
    }

    // task_get_users_data
    public function task_get_users_data(Request $req)
    {
        $data = user_account::where('csrf', $req->session()->get('csrf'))->first();
        return response()->json(['data' => $data]);
    }
}
