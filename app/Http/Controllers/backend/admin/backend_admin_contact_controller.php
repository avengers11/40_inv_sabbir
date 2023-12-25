<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;

class backend_admin_contact_controller extends Controller
{
    // contact_telegram
    public function contact_telegram(Request $req)
    {
        $data = $req -> all();
        $adminData = admin_account::where('id', 1)->update([
            "teligram_link" => $data['teligram_link'],
            "teligram_channel" => $data['teligram_channel'],
            "telegram_agent" => $data['telegram_agent'],
            "facebook_agent" => $data['facebook_agent'],
            "whatsApp_agent" => $data['whatsApp_agent'],
        ]);
        return back()->with('msg', 'Telegram data successfully update!');
    }
}
