<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;
use File;

class backend_admin_settings_controller extends Controller
{
    // settings_logo
    public function settings_logo(Request $req)
    {
        $adminData = admin_account::find(1);
        // delete
        File::delete(public_path('images/site/'.$adminData['logo']));

        $pic = $req -> file('logo');
        $pic_name = time().$pic -> getClientOriginalName();
        $pic -> move('images/site', $pic_name);

        $data = $req -> all();
        admin_account::where('id', 1)->update([
            "logo" => $pic_name,
        ]);
        return back()->with('msg', 'Website logo successfully update!');
    }

    // settings_title
    public function settings_title(Request $req)
    {
        $data = $req -> all();
        admin_account::where('id', 1)->update([
            "title" => $data['title'],
        ]);
        return back()->with('msg', 'Website title successfully update!');
    }

    // settings_update_account
    public function settings_update_account(Request $req)
    {
        $data = $req -> all();
        admin_account::where('id', 1)->update([
            "admin_username" => $data['admin_username'],
            "admin_password" => $data['admin_password'],
        ]);
        return back()->with('msg', 'Website security successfully update!');
    }

    // settings_notice_update
    public function settings_notice_update(Request $req)
    {
        $data = $req -> all();
        admin_account::where('id', 1)->update([
            "home_notice_header" => $data['home_notice_header'],
            "home_notice_content" => $data['home_notice_content'],
        ]);
        return back()->with('msg', 'Website notice successfully update!');
    }

    // settings_deposit_withdraw
    public function settings_deposit_withdraw(Request $req)
    {
        $data = $req -> all();
        admin_account::where('id', 1)->update([
            "withdraw_info" => $data['withdraw_info'],
            "deposit_info" => $data['deposit_info'],
        ]);
        return back()->with('msg', 'Website notice successfully update!');
    }
}
