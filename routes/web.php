<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// new
use App\Http\Controllers\frontend\users\frontend_account_controller;
use App\Http\Controllers\frontend\users\frontend_home_controller;
use App\Http\Controllers\frontend\users\frontend_history_controller;
use App\Http\Controllers\frontend\users\frontend_task_controller;
use App\Http\Controllers\frontend\users\frontend_chat_controller;
use App\Http\Controllers\frontend\users\frontend_personal_controller;

// admin
use App\Http\Controllers\frontend\admin\frontend_admin_deshbord_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_users_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_recharge_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_withdraw_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_payment_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_contact_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_tools_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_settings_controller;
use App\Http\Controllers\frontend\admin\admin_calculation_controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/change_language', function (Request $request) {
    if ($request->session()->has('len')) {
        if ($request->session()->get('len') == "bn") {
            $request->session()->put('len', 'en');
        } else {
            $request->session()->put('len', 'bn');
        }
    } else {
        $request->session()->put('len', 'bn');
    }

    return back();
})->name('change_language');


Route::middleware(['len'])->group(function () {
    // index
    // Route::get('/', [frontend_home_controller::class, 'index_show']) -> name('web_index_show');

    // account
    Route::group(['prefix' => 'account'], function () {
        Route::get('/login', [frontend_account_controller::class, 'account_show_login'])->name('web_account_show_login');
        Route::get('/signup', [frontend_account_controller::class, 'account_show_signup'])->name('web_account_show_signup');
    });
    // terms_condition
    Route::get('/terms_condition', [frontend_home_controller::class, 'terms_show'])->name('web_terms_show');
    // company
    Route::group(['prefix' => 'company'], function () {
        Route::get('/', [frontend_home_controller::class, 'company_show'])->name('web_company_show');
    });
    // support
    Route::group(['prefix' => 'support'], function () {
        Route::get('/', [frontend_chat_controller::class, 'support_show'])->name('web_support_show');
    });
    // Notification
    Route::get('/notification', [frontend_home_controller::class, 'info_show'])->name('web_info_show');

    // home
    Route::get('/', [frontend_home_controller::class, 'home_show'])->name('web_home_show');

    // user middlw ware
    Route::middleware(['userID'])->group(function () {
        // package
        Route::get('/package', [frontend_home_controller::class, 'vip_show'])->name('web_vip_show');
        // invite
        Route::get('/invite', [frontend_home_controller::class, 'invite_show'])->name('web_invite_show');
        // task
        Route::group(['prefix' => 'task'], function () {
            Route::get('/', [frontend_task_controller::class, 'task_show'])->name('web_task_show');
            Route::get('/session/{id}', [frontend_task_controller::class, 'session_task_show'])->name('web_session_task_show');
            Route::get('/video/{id}', [frontend_task_controller::class, 'task_video_show'])->name('web_task_video_show');
        });
        // personal
        Route::group(['prefix' => 'personal'], function () {
            Route::get('/', [frontend_personal_controller::class, 'personal_show'])->name('web_personal_show');
            // team
            Route::group(['prefix' => 'team'], function () {
                Route::get('/report/{id}', [frontend_personal_controller::class, 'personal_team_report'])->name('web_personal_team_report');
                // Route::get('/member/{id}', [frontend_personal_controller::class, 'personal_team_member']) -> name('web_personal_team_member');
            });
            Route::get('/password', [frontend_personal_controller::class, 'personal_password'])->name('web_personal_password');
            Route::get('/info', [frontend_personal_controller::class, 'personal_info'])->name('web_personal_info');
            Route::get('/gift', [frontend_personal_controller::class, 'personal_gift'])->name('web_personal_gift');
            Route::get('/bank/{data}', [frontend_personal_controller::class, 'personal_bank'])->name('web_personal_bank');
        });

        // deposit
        Route::group(['prefix' => 'deposit'], function () {
            Route::get('/', [frontend_home_controller::class, 'deposit_show'])->name('web_deposit_show');
        });

        // withdraw
        Route::group(['prefix' => 'withdraw'], function () {
            Route::get('/', [frontend_home_controller::class, 'withdraw_show'])->name('web_withdraw_show');
        });

        // history
        Route::group(['prefix' => 'history'], function () {
            Route::group(['prefix' => 'task'], function () {
                Route::get('/today', [frontend_history_controller::class, 'history_task_today_show'])->name('web_history_task_today_show');
                Route::get('/all', [frontend_history_controller::class, 'history_task_all_show'])->name('web_history_task_all_show');
            });
            // account
            Route::group(['prefix' => 'account'], function () {
                Route::get('/deposit', [frontend_history_controller::class, 'history_account_deposit'])->name('web_history_account_deposit');
                Route::get('/withdraw', [frontend_history_controller::class, 'history_account_withdraw'])->name('web_history_account_withdraw');
            });
        });

        // add new post
        Route::get('support/post', [frontend_chat_controller::class, 'support_post_show'])->name('web_support_post_show');

        // logout
        Route::group(['prefix' => 'logout'], function () {
            Route::get('/', [frontend_account_controller::class, 'users_logout'])->name('web_users_logout');
        });
    });
});



// ==================
// admin
// ==================
Route::any('/admin/login', [frontend_admin_deshbord_controller::class, 'login_login'])->name('login_login');

Route::middleware(['adminID'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [frontend_admin_deshbord_controller::class, 'admin_show'])->name('admin_show');
        // users
        Route::group(['prefix' => 'users'], function () {
            Route::get('/all', [frontend_admin_users_controller::class, 'users_all'])->name('show_users_all');
            Route::get('/active', [frontend_admin_users_controller::class, 'users_active'])->name('show_users_active');
            Route::get('/ban', [frontend_admin_users_controller::class, 'users_ban'])->name('show_users_ban');
            Route::get('/profile/{id}', [frontend_admin_users_controller::class, 'users_profile'])->name('show_users_profile');
        });

        // recharge
        Route::group(['prefix' => 'recharge'], function () {
            Route::get('/new', [frontend_admin_recharge_controller::class, 'recharge_new'])->name('show_recharge_new');
            Route::get('/success', [frontend_admin_recharge_controller::class, 'recharge_success'])->name('show_recharge_success');
            Route::get('/record', [frontend_admin_recharge_controller::class, 'recharge_record'])->name('show_recharge_record');
        });

        // withdraw
        Route::group(['prefix' => 'withdraw'], function () {
            Route::get('/new', [frontend_admin_withdraw_controller::class, 'withdraw_new'])->name('show_withdraw_new');
            Route::get('/success', [frontend_admin_withdraw_controller::class, 'withdraw_success'])->name('show_withdraw_success');
            Route::get('/record', [frontend_admin_withdraw_controller::class, 'withdraw_record'])->name('show_withdraw_record');
        });

        // payment
        Route::group(['prefix' => 'payment'], function () {
            Route::get('/', [frontend_admin_payment_controller::class, 'payment'])->name('show_payment');
        });
        // contact
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', [frontend_admin_contact_controller::class, 'contact'])->name('show_contact');
        });
        // tools
        Route::group(['prefix' => 'tools'], function () {
            // packages
            Route::group(['prefix' => 'packages'], function () {
                Route::get('/dynamic_package', [frontend_admin_tools_controller::class, 'dynamic_package'])->name('packages.show_dynamic_package');
                Route::get('/dynamic_package_add', [frontend_admin_tools_controller::class, 'dynamic_package_add'])->name('packages.show_dynamic_package_add');
                Route::get('/dynamic_package_update/{id}', [frontend_admin_tools_controller::class, 'dynamic_package_update'])->name('packages.show_dynamic_package_update');
            });
            // ads
            Route::group(['prefix' => 'ads'], function () {
                Route::get('/video', [frontend_admin_tools_controller::class, 'tools_ads_show'])->name('ads.show_tools_show');
                Route::get('/add', [frontend_admin_tools_controller::class, 'tools_ads_add'])->name('ads.show_tools_add');
                Route::get('/update/{id}', [frontend_admin_tools_controller::class, 'tools_ads_update'])->name('ads.show_tools_update');
            });
            // home slider
            Route::group(['prefix' => 'slider'], function () {
                Route::get('/all', [frontend_admin_tools_controller::class, 'tools_all_all_controller'])->name('slider.tools_slider_all_web');
            });
            Route::group(['prefix' => 'post'], function () {
                Route::get('/users', [frontend_admin_settings_controller::class, 'tools_post_users'])->name('post.show_tools_users');
                Route::get('/users_company', [frontend_admin_settings_controller::class, 'tools_post_users_company'])->name('post.show_tools_users_company');
            });
        });
        // settings
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', [frontend_admin_settings_controller::class, 'settings'])->name('show_settings');
        });

        // calculation
        Route::group(['prefix' => 'calculation'], function () {
            Route::get('/', [admin_calculation_controller::class, 'calculation'])->name('show_calculation');
            Route::get('/history', [admin_calculation_controller::class, 'calculation_history'])->name('show_calculation_history');
        });
    });
});

// test
Route::get("/test", function () {
    // echo date("M");
    echo $_SERVER['HTTP_USER_AGENT'];
});


// php artisan make:controller frontend/users/frontend_account_controller
