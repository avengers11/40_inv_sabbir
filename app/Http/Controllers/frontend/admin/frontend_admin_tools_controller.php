<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_package;
use App\Models\task_video;
use App\Models\home_slider;

class frontend_admin_tools_controller extends Controller
{
    // daynamic_task
    public function daynamic_task(Request $req)
    {
        return view('admin.pages.tools.dynamin_task');
    }

    // dynamic_package
    public function dynamic_package(Request $req)
    {
        $pk_data = user_package::orderBy('pk_name', 'ASC') -> get();
        $compact = compact('pk_data');
        return view('admin.pages.tools.dynamic_package') -> with($compact);
    }

    // dynamic_package_add
    public function dynamic_package_add(Request $req)
    {
        return view('admin.pages.tools.dynamic_package_add');
    }

    // dynamic_package_update
    public function dynamic_package_update($id)
    {
        $user_account = user_package::findOrFail($id);
        $compact = compact('user_account', 'id');
        return view('admin.pages.tools.dynamic_package_update') -> with($compact);
    }
    // ----------
    // ads

    // tools_ads_show
    public function tools_ads_show(Request $req)
    {
        $ads = task_video::orderBy('id', 'DESC') -> paginate(10);
        $compact = compact('ads');
        return view('admin.pages.tools.task_ads.show') -> with($compact);
    }

    // tools_ads_add
    public function tools_ads_add(Request $req)
    {
        return view('admin.pages.tools.task_ads.add');
    }

    // tools_all_all_controller
    public function tools_all_all_controller()
    {
        $slider = home_slider::orderBy('id', 'DESC') -> paginate(10);
        $compact = compact('slider');
        return view('admin.pages.tools.slider.all') -> with($compact);
    }
   
}
