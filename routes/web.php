<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\JourneyController;
use App\Http\Controllers\Front\JsubmissionController;
use App\Http\Controllers\Front\JhistoryController;
use App\Http\Controllers\Front\WalletController;
use App\Http\Controllers\Front\WithdrawalController;
use App\Http\Controllers\Front\DepositController;
use App\Http\Controllers\Front\InvitationController;
use App\Http\Controllers\Front\ReferralController;
use App\Http\Controllers\Front\SecurityController;
use App\Http\Controllers\Front\BankController;
use App\Http\Controllers\Front\VerificationController;
use App\Http\Controllers\Front\TextPageController;
use App\Livewire\Backend\Login as AdminLogin;
use App\Livewire\Backend\Memberlist;
use App\Livewire\Backend\Agent;
use App\Livewire\Backend\Levels;
use App\Livewire\Backend\Singleorder;
use App\Livewire\Backend\Rechargerecord;
use App\Livewire\Backend\Withdrawrecorde;
use App\Livewire\Backend\Mall as MallLivewire;
use App\Livewire\Backend\Text;
use App\Livewire\Backend\Role;
use App\Livewire\Backend\Adminuser;
use App\Livewire\Backend\Bank as BankLivewire;
use App\Livewire\Backend\Trailperiod;
use App\Livewire\Backend\SiteSettings;
use App\Livewire\Backend\ArtisanRunner;
use App\Livewire\Backend\Rechargerequested;
use App\Livewire\Backend\Addannouncements;
use App\Livewire\UserDetails;
use App\Http\Controllers\Admin\LogoutController;

/*
|--------------------------------------------------------------------------
| Public Routes (No Auth Required)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

// Auth routes
Route::get('/auth/login', [AuthController::class, 'login'])->name('front.login');
Route::post('/auth/login', [AuthController::class, 'loginPost'])->name('front.login.post');
Route::get('/auth/signup', [AuthController::class, 'signup']);
Route::post('/auth/signup', [AuthController::class, 'signupPost']);
Route::get('/auth/reg', [AuthController::class, 'signup']);
Route::post('/auth/authenticate', [AuthController::class, 'credentialcheck']);
Route::get('/auth/signoff', [AuthController::class, 'signoff']);

/*
|--------------------------------------------------------------------------
| Frontend Routes (Auth Required)
|--------------------------------------------------------------------------
*/

Route::middleware(['front.auth'])->group(function () {

    // Verification routes
    Route::match(['get', 'post'], '/verification/send_otp', [VerificationController::class, 'sendOtp']);
    Route::post('/verification/verify_otp', [VerificationController::class, 'verifyOtp']);

    // Routes that also require verified user
    Route::middleware(['verified.user'])->group(function () {

        // Home / Dashboard
        Route::get('/home', [HomeController::class, 'home']);

        // Journey / Tasks
        Route::get('/journey', [JourneyController::class, 'index']);
        Route::post('/proxy/level_claim', [JourneyController::class, 'claimLevel']);
        Route::get('/jsubmission', [JsubmissionController::class, 'index']);
        Route::get('/jsubmission/submit', [JsubmissionController::class, 'submit']);
        Route::get('/jhistory', [JhistoryController::class, 'index']);
        Route::get('/jhistory/productSubmit', [JhistoryController::class, 'productSubmit']);

        // Wallet
        Route::get('/wallet', [WalletController::class, 'index']);
        Route::post('/wallet/walletUpdate', [WalletController::class, 'walletUpdate']);

        // Withdrawal
        Route::get('/withdrawal', [WithdrawalController::class, 'index']);
        Route::get('/withdrawal/withdrawalhistory', [WithdrawalController::class, 'withdrawalhistory']);
        Route::post('/withdrawal/request', [WithdrawalController::class, 'request']);

        // Deposit
        Route::match(['get', 'post'], '/deposit', [DepositController::class, 'index']);
        Route::get('/deposit/deposithistory', [DepositController::class, 'deposithistory']);

        // Invitation
        Route::get('/invitation', [InvitationController::class, 'index']);

        // Referral
        Route::get('/referral', [ReferralController::class, 'index']);

        // Security
        Route::get('/security', [SecurityController::class, 'index']);
        Route::post('/security/passchange', [SecurityController::class, 'passchange']);

        // Bank
        Route::get('/banks', [BankController::class, 'index']);
        Route::get('/bank', [BankController::class, 'index']);

        // Text Pages
        Route::get('/about', [TextPageController::class, 'about']);
        Route::get('/faqs', [TextPageController::class, 'faqs']);
        Route::get('/term', [TextPageController::class, 'term']);
        Route::get('/gettouch', [TextPageController::class, 'gettouch']);
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Livewire Components)
|--------------------------------------------------------------------------
*/

// Admin auth (no middleware - guest only)
Route::get('/admin', AdminLogin::class)->middleware('guest')->name('login');
Route::get('/admin/logout', [LogoutController::class, 'logout'])->name('logout');

// Admin protected routes (Livewire)
Route::middleware(['auth'])->group(function () {
    Route::get('/livewire/user', UserDetails::class);
    Route::get('/member', Memberlist::class);
    Route::get('/member/agent', Agent::class);
    Route::get('/member/grade', Levels::class);
    Route::get('/member/continuousOrder/', Singleorder::class);
    Route::get('/trade/rechargelist', Rechargerecord::class);
    Route::get('/trade/withdrawlist', Withdrawrecorde::class);
    Route::get('/mall/product', MallLivewire::class);
    Route::get('/mall/text', Text::class);
    Route::get('/systems/role', Role::class);
    Route::get('/systems/users', Adminuser::class);
    Route::get('/systems/bank', BankLivewire::class);
    Route::get('/systems/trialperiod', Trailperiod::class);
    Route::get('/trade/rechargerequest', Rechargerequested::class);
    Route::get('/systems/announcements', Addannouncements::class);
    Route::get('/systems/sitesettings', SiteSettings::class);
    Route::get('/systems/artisan', ArtisanRunner::class);
});
