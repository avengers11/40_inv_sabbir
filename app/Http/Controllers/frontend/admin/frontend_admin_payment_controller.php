<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;

class frontend_admin_payment_controller extends Controller
{
    // payment
    public function payment(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $compact = compact('adminData');
        return view('admin.pages.payment.index') -> with($compact);
    }
}
