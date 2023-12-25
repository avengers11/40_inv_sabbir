<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_package;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // admin save
        $admin = new admin_account;
        $admin->task_commission = "2";
        $admin->save();

        // package save
        for ($i = 0; $i <= 5; $i++) {
            $package = new user_package;
            $package->pk_name = "SUPER-$i";
            $package->task = $i * 2;
            $package->commission = $i * 2;
            $package->amount = $i * 100;
            $package->expired_date = $i + 30;
            $package->save();
        }

        // main_account
        $user_data = new user_account;
        $user_data->invite = 'main_account';
        $user_data->save();

        // account 1
        $user_data1 = new user_account;
        $user_data1->userName = "00";
        $user_data1->password = "00";
        $user_data1->invite = '1';
        $user_data1->gen1st = 'main_account';
        $user_data1->gen2nd = '';
        $user_data1->gen3rd = '';
        $user_data1->gen4th = '';
        $user_data1->gen5th = '';
        $user_data1->save();

        // account 2
        $user_data2 = new user_account;
        $user_data1->userName = "00";
        $user_data1->password = "00";
        $user_data2->invite = '2';
        $user_data2->gen1st = '1';
        $user_data2->gen2nd = 'main_account';
        $user_data2->gen3rd = '';
        $user_data2->gen4th = '';
        $user_data2->gen5th = '';
        $user_data2->save();

        // account 3
        $user_data3 = new user_account;
        $user_data1->userName = "00";
        $user_data1->password = "00";
        $user_data3->invite = '3';
        $user_data3->gen1st = '2';
        $user_data3->gen2nd = '1';
        $user_data3->gen3rd = 'main_account';
        $user_data3->gen4th = '';
        $user_data3->gen5th = '';
        $user_data3->save();

        // account 4
        $user_data4 = new user_account;
        $user_data1->userName = "00";
        $user_data1->password = "00";
        $user_data4->invite = '4';
        $user_data4->gen1st = '3';
        $user_data4->gen2nd = '2';
        $user_data4->gen3rd = '1';
        $user_data4->gen4th = 'main_account';
        $user_data4->gen5th = '';
        $user_data4->save();

        // account 5
        $user_data5 = new user_account;
        $user_data1->userName = "00";
        $user_data1->password = "00";
        $user_data5->invite = '5';
        $user_data5->gen1st = '4';
        $user_data5->gen2nd = '3';
        $user_data5->gen3rd = '2';
        $user_data5->gen4th = '1';
        $user_data5->gen5th = 'main_account';
        $user_data5->save();
    }
}
