<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_package;
use App\Models\search_content;

class backend_users_home_controller extends Controller
{
    // home_card_show
    public function home_card_show(Request $req)
    {
        $userData = user_account::where('csrf', $req->session()->get('csrf'))->first();
        $data = user_package::orderBy('minAmount', 'ASC')->get();
        foreach ($data as $datas) {
            $st = $userData['vipBase'] == $datas['package_name'] ? 'active' : '';
            $result[] = [
                'name' => $datas['package_name'],
                'min_amount' => $datas['minAmount'],
                'max_amount' => $datas['maxAmount'],
                'task' => $datas['task'],
                'commission' => $datas['commission'],
                'img' => $datas['img'],
                'st' => $st
            ];
        }
        return response()->json($result);
    }

    // search
    function search(Request $req)
    {
        $data = $req->all();
        $dataType = search_content::where('title', 'LIKE',  "%" . $data['title'] . "%")->get();
        return response()->json($dataType);
    }
}
