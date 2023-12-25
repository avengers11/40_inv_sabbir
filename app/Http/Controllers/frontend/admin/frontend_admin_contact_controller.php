<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;

class frontend_admin_contact_controller extends Controller
{
    // contact
    public function contact(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $compact = compact('adminData');
        return view('admin.pages.contact.index') -> with($compact);
    }
}
