<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\add_new_post;
use App\Models\user_account;
use App\Models\company_profile_likes;

class backend_users_chat_controller extends Controller
{
    //chat_newpost
    public function chat_newpost(Request $req)
    {
        $data = $req->all();
        $filename = "default.png";
        if (!empty($req->file("file"))) {
            $file = $req->file("file");
            $file_ex = strtolower($file->getClientOriginalExtension());
            $filename = time() . "." . $file_ex;
            if ($file_ex != "png" && $file_ex != "jpg" && $file_ex != "webp" && $file_ex != "jpeg") {
                return back()->with(['st' => false, 'msg' => 'Supported extension file is PNG, JPG, JPEG & WEBP!']);
            }
            $file->move(public_path('images/new_post'), $filename);
        }
        // userData
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();

        $db = new add_new_post;
        $db->userID = $userData['id'];
        $db->content = $data['content'];
        $db->style = $data['style'];
        $db->img = $filename;
        $db->save();

        return back()->with(['st' => true, 'msg' => 'Your post successfully added!']);
    }

    // chat_like
    public function chat_like($id)
    {
        $db = new company_profile_likes;
        $db->user_id = $id;
        $db->save();;
        return back()->with(['st' => true, 'msg' => 'You are successfully liked our company profiled!']);
    }
}
