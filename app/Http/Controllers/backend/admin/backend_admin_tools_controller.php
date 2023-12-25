<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_package;
use App\Models\task_video;
use App\Models\home_slider;
use App\Models\add_new_post;
use App\Models\new_company_post;
use File;

class backend_admin_tools_controller extends Controller
{
    // tools_update_package_delete
    public function tools_update_package_delete($id)
    {
        user_package::find($id)->delete();
        return back()->with('msg', 'Redeem code successfully delete!');
    }
    // tools_package_add
    public function tools_package_add(Request $req)
    {
        $data = $req->all();

        $pic = $req->file('img');
        $pic_name = time() . "." . $pic->getClientOriginalExtension();
        $pic->move(public_path('images/vip'), $pic_name);

        $db = new user_package;
        $db->img = $pic_name;
        $db->pk_name = $data['pk_name'];
        $db->task = $data['task'];
        $db->commission = $data['commission'];
        $db->amount = $data['amount'];
        $db->expired_date = $data['expired_date'];
        $db->save();

        return back()->with('msg', 'Packages successfully added!');
    }

    // tools_package_update_data
    public function tools_package_update_data(Request $req, $id)
    {
        $data = $req->all();

        $pk_data = user_package::find($id);
        if (!empty($req->file('img'))) {
            $pic = $req->file('img');
            $pic_name = time() . "." . $pic->getClientOriginalExtension();
            $pic->move(public_path('images/vip'), $pic_name);
            File::delete(public_path('images/vip/' . $pk_data['img']));
        } else {
            $pic_name = $pk_data['img'];
        }

        user_package::where('id', $id)->update([
            "img" => $pic_name,
            "pk_name" => $data['pk_name'],
            "task" => $data['task'],
            "commission" => $data['commission'],
            "amount" => $data['amount'],
            "expired_date" => $data['expired_date'],
        ]);
        return back()->with('msg', 'Packages successfully updated!');
    }

    // tools_update_package_update_data_img
    public function tools_update_package_update_data_img(Request $req, $id)
    {
        $pic = $req->file('package_img');
        $pic_name = time() . "." . $pic->getClientOriginalExtension();
        $pic->move('images/packages', $pic_name);

        user_package::where('id', $id)->update([
            "package_img" => $pic_name
        ]);

        return back()->with('msg', 'Package successfully added!');
    }

    /*
    |--------------
    |tools ads
    |--------------
    */
    // tools_ads_add
    public function tools_ads_add(Request $req)
    {
        $img = $req->file('img');
        $img_name = time() . "." . $img->getClientOriginalExtension();
        $img->move('images/task', $img_name);

        $vid = $req->file('video');
        $vid_name = time() . "." . $vid->getClientOriginalExtension();
        $vid->move('video/task_video', $vid_name);

        $data = $req->all();
        $db = new task_video;
        $db->title = $data['title'];
        $db->header = $data['header'];
        $db->time = $data['time'];

        $db->img = $img_name;
        $db->video = $vid_name;
        $db->save();

        return back()->with('msg', 'Ads successfully added!');
    }

    // tools_ads_delete
    public function tools_ads_delete(Request $req, $id)
    {
        task_video::findOrFail($id)->delete();
        return back()->with('msg', 'Ads successfully delete!');
    }

    // tools_slider_add_controller
    public function tools_slider_add_controller(Request $req)
    {
        $img = $req->file('img');
        $img_name = time() . "." . $img->getClientOriginalExtension();
        $img->move('images/home/slider', $img_name);

        $data = $req->all();
        $db = new home_slider;
        $db->img = $img_name;
        $db->save();

        return back()->with('msg', 'Slider successfully delete!');
    }

    // tools_slider_delte_controller
    public function tools_slider_delte_controller($id)
    {
        home_slider::findOrFail($id)->delete();
        return back()->with('msg', 'Slider successfully delete!');
    }


    // ===============POST==========
    public function tools_post_delete_controller($id)
    {
        add_new_post::findOrFail($id)->delete();
        return back()->with('msg', 'Post successfully delete!');
    }

    // tools_post_users_company_controller
    public function tools_post_users_company_controller(Request $req)
    {
        $file = $req->file('img');
        $file_name = "default.png";
        if (!empty($file)) {
            $file_name = time() . $file->getClientOriginalName();
            $file->move('images/company', $file_name);
        }

        $data = $req->all();
        $db = new new_company_post;
        $db->img = $file_name;
        $db->content = $data['content'];
        $db->save();
        return back()->with('msg', 'Your post successfully publish.');
    }

    // tools_post_company_delete_controller
    public function tools_post_company_delete_controller($id)
    {
        new_company_post::findOrFail($id)->delete();
        return back()->with('msg', 'Post successfully delete!');
    }
}
