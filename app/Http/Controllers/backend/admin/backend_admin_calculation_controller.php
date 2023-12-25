<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\balance_history;
use App\Models\admin_account;

class backend_admin_calculation_controller extends Controller
{
    //calculation_add
    public function calculation_add(Request $req)
    {
        $adminData = admin_account::where('id', 1) -> first();
        
        $data = $req->all();
        if($data['type'] == 'Promotion'){
            admin_account::where('id', 1)->update([
                'site_promotion' => $adminData['site_promotion'] + $data['amount']
            ]);
        }else{
            admin_account::where('id', 1)->update([
                'we_recived' => $adminData['we_recived'] + $data['amount']
            ]);
        }

        admin_account::where('id', 1)->update([
            'available_amount' => $adminData['available_amount'] - $data['amount']
        ]);

        $db = new balance_history;
        $db->userID = '0';
        $db->msg = $data['msg'] . ' || Type => ' . $data['type'] . ' || Available Amount => ' . $adminData['available_amount'] . '-' . $data['amount'] . '=' . ($adminData['available_amount'] - $data['amount']);
        $db->type = 'calculation';
        $db->save();
        return back()->with('msg', 'Your request successfully complate!');
    }
}
