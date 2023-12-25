<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_package;
use App\Models\package_history;
use App\Models\home_slider;
use App\Models\add_new_post;
use App\Models\new_company_post;
use App\Models\company_profile_likes;

class frontend_home_controller extends Controller
{
    public function home_show(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $package_data = user_package::orderBy('amount', 'ASC')->get();
        $slider = home_slider::orderBy("id", "DESC")->get();
        $post = add_new_post::orderBy('id', 'DESC')->paginate(50);

        if ($req->session()->has('csrf')) {
            $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();

            // this month
            if ($userData['thisMonth'] != date("M")) {
                user_account::where('csrf', $req->session()->get('csrf'))->update([
                    "thisMonth" => date("M"),
                    "nextWithdraw" => $adminData['nextWIthdraw'],
                ]);
            }

            // refreshDay
            if ($userData['refreshDay'] < time()) {
                $task = 0;
                $pk_all_data = package_history::where('user_id', $userData['id'])->where('expired_date', '>', time())->get();
                foreach ($pk_all_data as $key => $value) {
                    $package_data_active = user_package::where('id', $value['pk_id'])->first();
                    $task = $task + $package_data_active['task'];
                }
                user_account::where('csrf', $req->session()->get('csrf'))->update([
                    "todayIncome" => '00',
                    "todayRaferIncome" => '00',
                    "todaysRechargeIncome" => '00',
                    "easterdayIncome" => $userData['todayIncome'],
                    "easterdayRaferIncome" => $userData['todayRaferIncome'],
                    "easterdayRechargeIncome" => $userData['todaysRechargeIncome'],
                    "task" => $task,
                    "todaysAmount" => $userData['totalAmount'],
                    "refreshDay" => strtotime(date('d M Y') . " 11:59:59pm"),
                ]);
            }
        } else {
            $userData = [
                "picture" => "",
            ];
        }

        $compact = compact('adminData', 'userData', 'package_data', "slider", 'post');
        return view('users.pages.home.home')->with($compact);
    }

    // index_show
    public function index_show()
    {
        return view('users.pages.home.index');
    }

    // invite_show
    public function invite_show(Request $req)
    {
        $admin_data = admin_account::where('id', 1)->first();
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $compact = compact('admin_data', 'userData');
        return view('users.pages.home.others.invite')->with($compact);
    }

    // deposit_show
    public function deposit_show(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $compact = compact('adminData', 'userData');
        return view('users.pages.home.balance.deposit')->with($compact);
    }

    // withdraw_show
    public function withdraw_show(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $compact = compact('adminData', 'userData');
        return view('users.pages.home.balance.withdraw')->with($compact);
    }

    // info_show
    public function info_show(Request $req)
    {
        $post = new_company_post::orderBy('id', 'DESC')->paginate(50);
        $userData = [];
        if($req -> session() -> has('csrf')){
            $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        }

        $compact = compact('post', 'userData');
        return view('users.pages.home.others.info')->with($compact);
    }

    // company_show
    public function company_show(Request $req)
    {
        $post = new_company_post::orderBy('id', 'DESC')->paginate(50);
        $like = company_profile_likes::count();

        $userData = [];
        if($req -> session() -> has('csrf')){
            $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        }

        $compact = compact('post', 'userData', 'like');
        return view('users.pages.home.others.company')->with($compact);
    }

    // vip_show
    public function vip_show(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $package_data = user_package::orderBy('amount', 'ASC')->get();

        if ($userData['refreshDay'] < time()) {
            $task = 0;
            $pk_all_data = package_history::where('user_id', $userData['id'])->where('expired_date', '>', time())->get();
            foreach ($pk_all_data as $key => $value) {
                $package_data_active = user_package::where('id', $value['pk_id'])->first();
                $task = $task + $package_data_active['task'];
            }
            user_account::where('csrf', $req->session()->get('csrf'))->update([
                "todayIncome" => '00',
                "todayRaferIncome" => '00',
                "todaysRechargeIncome" => '00',
                "easterdayIncome" => $userData['todayIncome'],
                "easterdayRaferIncome" => $userData['todayRaferIncome'],
                "easterdayRechargeIncome" => $userData['todaysRechargeIncome'],
                "task" => $task,
                "todaysAmount" => $userData['totalAmount'],
                "refreshDay" => strtotime(date('d M Y') . " 11:59:59pm"),
            ]);
        }
        $compact = compact('adminData', 'userData', 'package_data');
        return view('users.pages.home.components.vip_card')->with($compact);
    }

    // terms_show
    public function terms_show()
    {
        return view("users.pages.home.terms_condition");
    }
}
