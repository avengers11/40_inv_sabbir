<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notice_bord;
use App\Models\user_account;

class backend_noticeBord_controller extends Controller
{
    //notice_bord_insert
    public function notice_bord_insert(Request $req)
    {
        $file = $req -> file('file');
        if(!empty($file)){
            $file_name = time().$file -> getClientOriginalName();
            $file -> move('images/notice_bord', $file_name);
        }

        $data = $req -> all();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $db = new notice_bord;
        $db -> userID = $userData['id'];
        $db -> img = $file_name ?? "";
        $db -> msg = $data['msg'];
        $db -> save();
        return back() -> with('msg', 'Your message successfully publish.');
    }

    // notice_bord_delete
    public function notice_bord_delete($id)
    {
        notice_bord::find($id) -> delete();
        return back() -> with('msg', 'User message successfully delete.');
    }

    // notice_bord_ban
    public function notice_bord_ban($id)
    {
        user_account::where('id', $id)->update(['accSt' => 'ban']);
        return back() -> with('msg', 'User successfully ban.');
    }

}
