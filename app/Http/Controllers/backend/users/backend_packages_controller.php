<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_package;
use App\Models\user_account;
use App\Models\package_history;
use App\Models\admin_account;

class backend_packages_controller extends Controller
{
    // get_package_data
    public function get_package_data(Request $req, $data)
    {
        $data_g = user_package::where('type', $data)->orderBy('package_name', 'ASC')->get();
        $dataCount = user_package::where('type', $data)->orderBy('package_name', 'ASC')->count();
        if ($dataCount > 0) {
            return response()->json(['st' => true, 'data' =>  $data_g]);
        } else {
            return response()->json(['st' => false]);
        }
    }

    // buy_package_data
    public function buy_package_data(Request $req)
    {
        $data = $req->all();
        $package_data = user_package::where('id', $data['id'])->first();
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        if ($package_data['amount'] <= $userData['totalAmount']) {
            if (package_history::where('pk_type', $package_data['type'])->where('st', 'active')->where('user_id', $userData['id'])->exists()) {
                return response()->json(['st' => false, 'data' => 'You are already work in this platform!']);
            } else {
                if (package_history::where('pk_id', $data['id'])->where('st', 'active')->where('user_id', $userData['id'])->exists()) {
                    return response()->json(['st' => false, 'data' => 'You are already purchase this package!']);
                } else {
                    user_account::where('csrf', $req->session()->get('csrf'))->update([
                        'totalAmount' => $userData['totalAmount'] - $package_data['amount'],
                        'holdAmount' => $userData['holdAmount'] + $package_data['amount'],
                        'task' => $userData['task'] + $package_data['task'],
                        'todaysAmount' => intval($userData['todaysAmount']) - intval($package_data['amount']),
                    ]);

                    $db = new package_history;
                    $db->available_task = $package_data['task'];
                    $db->pk_type = $package_data['type'];
                    $db->user_id = $userData['id'];
                    $db->pk_id = $data['id'];
                    $db->st = 'active';
                    $db->save();
                    return response()->json(['st' => true]);
                }
            }
        } else {
            return response()->json(['st' => false, 'data' => "You don't have sufficient balance!"]);
        }
    }
    // upgrade_package_data
    public function upgrade_package_data(Request $req, $pk_id)
    {
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $pk_data = user_package::findOrFail($pk_id);
        $pk_hi_data = package_history::where('st', 'active')->where('user_id', $userData['id'])->where('pk_type', $pk_data['type'])->first();
        $active_pk_data = user_package::findOrFail($pk_hi_data['pk_id']);

        if ($userData['totalAmount'] < ($pk_data['amount'] - $active_pk_data['amount'])) {
            return response()->json(['st' => false, 'data' => "You don't have sufficient balance!"]);
            return false;
        }
        user_account::where('csrf', $req->session()->get('csrf'))->update([
            'totalAmount' => $userData['totalAmount'] - ($pk_data['amount'] - $active_pk_data['amount']),
            'holdAmount' => $userData['holdAmount'] + ($pk_data['amount'] - $active_pk_data['amount']),
            'todaysAmount' => $userData['todaysAmount'] - ($pk_data['amount'] - $active_pk_data['amount'])
        ]);
        package_history::where('id', $pk_hi_data['id'])->update([
            'st' => 'cancelled'
        ]);
        $db = new package_history;
        $db->available_task = $pk_data['task'];
        $db->pk_type = $pk_data['type'];
        $db->user_id = $userData['id'];
        $db->pk_id = $pk_data['id'];
        $db->st = 'active';
        $db->save();
        return response()->json(['st' => true]);
    }

    // package_cancelled
    public function package_cancelled(Request $req, $pk_id, $pk_hi_id)
    {
        $pk_hi_data = package_history::findOrFail($pk_hi_id);
        if ($pk_hi_data['st'] != "active") {
            return false;
        }

        $package_data = user_package::findOrFail($pk_id);
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $adminData = admin_account::where('id', 1)->first();

        $thirt_amount = $package_data['amount'] - ((intval($package_data['amount']) * $adminData['cancal_fee']) / 100);
        user_account::where('csrf', $req->session()->get('csrf'))->update([
            'totalAmount' => $userData['totalAmount'] + $thirt_amount,
            'holdAmount' => intval($userData['holdAmount']) - intval($package_data['amount']),
            'todaysAmount' => intval($userData['todaysAmount']) + intval($package_data['amount']),
        ]);
        $pk_hi_data = package_history::where('id', $pk_hi_id)->update([
            'st' => 'cancelled'
        ]);

        return redirect(route('success_show', ['msg' => 'Your package successfully cancelled. Fee ' . $adminData['cancal_fee'] . '%']));
    }

    // users_packages_buynow_controller
    public function users_packages_buynow_controller(REquest $req, $id)
    {
        $card_data = user_package::where('id', $id)->first();
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();

        // check balance
        if ($card_data['amount'] > $userData['totalAmount']) {
            return back()->with(['st' => false, 'msg' => "Insufficient account balance!"]);
        }

        // amount up
        user_account::where('csrf', $req->session()->get('csrf'))->update([
            "totalAmount" => $userData['totalAmount'] - $card_data['amount'],
            "task" => $userData['task'] + $card_data['task'],
        ]);

        // add new history
        $db = new package_history;
        $db->user_id = $userData['id'];
        $db->pk_id = $card_data['id'];
        $db->expired_date = time() + (86400 * $card_data['expired_date']);
        $db->save();

        if ($userData['referCommission'] > 0 && $card_data['amount'] > 1499) {
            // gen1st_commission
            if (!empty($userData['gen1st'])) {
                $userData_gen1st =  user_account::where('invite', $userData['gen1st'])->first();
                $gen1st_commission = 200;
                user_account::where('invite', $userData['gen1st'])->update([
                    'totalAmount' => $userData_gen1st['totalAmount'] + $gen1st_commission,
                    'todaysAmount' => $userData_gen1st['todaysAmount'] + $gen1st_commission,
                    'todayRaferIncome' => $userData_gen1st['todayRaferIncome'] + $gen1st_commission,
                    'totalTeamRevenue' => $userData_gen1st['totalTeamRevenue'] + $gen1st_commission,
                ]);
            }
        }

        return back()->with(['st' => true, 'msg' => "You are successfully purchase a packege!"]);
    }
}
