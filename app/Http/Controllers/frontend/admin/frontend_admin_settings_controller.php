<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;
use App\Models\add_new_post;
use App\Models\new_company_post;

class frontend_admin_settings_controller extends Controller
{
    // settings
    public function settings(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $compact = compact('adminData');
        return view('admin.pages.settings.index')->with($compact);
    }

    // ============POST==========
    // tools_post_users
    public function tools_post_users(Request $req)
    {
        $post = add_new_post::orderBy('id', 'DESC')->paginate(10);
        $compact = compact('post');
        return view('admin.pages.tools.post.users_show')->with($compact);
    }

    // tools_post_users_company
    public function tools_post_users_company()
    {
        $post = new_company_post::orderBy('id', 'DESC')->paginate(50);
        $compact = compact('post');
        return view('admin.pages.tools.post.compnay_show')->with($compact);
    }
}
