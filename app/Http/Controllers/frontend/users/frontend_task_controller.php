<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\task_video;

class frontend_task_controller extends Controller
{
    // task_show
    public function task_show(Request $req)
    {
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $adminData = admin_account::where('id', 1)->first();
        if ($userData['task'] > 10) {
            $task = 10;
        } else {
            $task = $userData['task'];
        }
        $videoTask = task_video::inRandomOrder()->take($task)->get();
        $compact = compact('userData', 'adminData', 'videoTask');
        return view('users.pages.task.task')->with($compact);
    }

    // session_task_show
    public function session_task_show(Request $req, $id)
    {
        $req->session()->put('task', $id);
        return redirect(route('web_task_video_show', ['id' => $id]));
    }

    // task_video_show
    public function task_video_show(Request $req, $id)
    {
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $adminData = admin_account::where('id', 1)->first();
        $videoTask = task_video::find($id);
        if (!$req->session()->has('task')) {
            return redirect(route('web_task_show'));
        }
        $compact = compact('userData', 'adminData', 'videoTask', 'id');
        return view('users.pages.task.video')->with($compact);
    }
}
