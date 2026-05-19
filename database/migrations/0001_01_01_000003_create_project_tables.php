<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('systemsettings', function (Blueprint $table) {
            $table->id();
            $table->string('siteTitle')->nullable();
            $table->string('siteLogo')->nullable();
            $table->string('siteUrl')->nullable();
            $table->decimal('minWithdrawal', 12, 2)->default(0);
            $table->decimal('maxWithdrawal', 12, 2)->default(0);
            $table->integer('withdrawalTimes')->default(0);
            $table->decimal('minRecharge', 12, 2)->default(0);
            $table->decimal('maxRecharge', 12, 2)->default(0);
            $table->integer('rechargeTimes')->default(0);
        });

        Schema::create('memberlevels', function (Blueprint $table) {
            $table->id();
            $table->integer('level')->default(1);
            $table->string('levelName');
            $table->integer('orderReciveLimit')->default(0);
            $table->integer('ordersGrabbed')->default(0);
            $table->decimal('commissionRate', 8, 4)->default(0);
            $table->decimal('price', 12, 2)->default(0);
            $table->string('levelImage')->nullable();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('qrImage')->nullable();
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('phN')->nullable();
            $table->decimal('balance', 12, 2)->default(0);
            $table->integer('avalibleDailyOrders')->default(0);
            $table->integer('takeTodayOrders')->default(0);
            $table->decimal('todaycommission', 12, 2)->default(0);
            $table->integer('credibility')->default(100);
            $table->string('inviteCode')->nullable();
            $table->string('myCode')->unique();
            $table->tinyInteger('status')->default(1);
            $table->integer('memberLevel')->default(1);
            $table->decimal('frozenAmout', 12, 2)->default(0);
            $table->integer('grabOrder')->default(0);
            $table->string('registrationTime')->nullable();
            $table->string('lastLongInTime')->nullable();
            $table->tinyInteger('orderStatus')->default(1);
            $table->tinyInteger('withdrawalStatus')->default(1);
            $table->string('paymentPassword')->nullable();
            $table->tinyInteger('memberAgent')->default(0);
            $table->tinyInteger('taskStatus')->default(0);
        });

        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referrer_id');
            $table->unsignedBigInteger('referred_id');
        });

        Schema::create('userbankinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('name')->nullable();
            $table->string('cardNumber')->nullable();
            $table->string('bankName')->nullable();
            $table->string('phoneNumber')->nullable();
        });

        Schema::create('user_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('phone_number')->nullable();
            $table->string('otp_code')->nullable();
            $table->integer('otp_sent_count')->default(0);
            $table->integer('otp_attempts')->default(0);
            $table->tinyInteger('is_verified')->default(0);
            $table->timestamp('last_otp_sent')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->decimal('productPrice', 12, 2)->default(0);
            $table->string('productImage')->nullable();
            $table->string('productCategory')->nullable();
            $table->text('productDescription')->nullable();
            $table->tinyInteger('status')->default(1);
        });

        Schema::create('productcategories', function (Blueprint $table) {
            $table->id();
            $table->string('categoryName');
            $table->tinyInteger('status')->default(1);
        });

        Schema::create('productorder', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('productId');
            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('comission', 12, 2)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('time')->nullable();
        });

        Schema::create('todayrewards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->decimal('reward', 12, 2)->default(0);
            $table->integer('tasks')->default(0);
            $table->string('created_at')->nullable();
        });

        Schema::create('rechargelist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('username')->nullable();
            $table->decimal('orderAmout', 12, 2)->default(0);
            $table->string('created_at')->nullable();
        });

        Schema::create('withdrawlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('username')->nullable();
            $table->decimal('orderAmount', 12, 2)->default(0);
            $table->string('mobile')->nullable();
            $table->string('bankCard')->nullable();
            $table->string('bankName')->nullable();
            $table->string('name')->nullable();
            $table->string('created_at')->nullable();
            $table->tinyInteger('oprate')->default(0);
        });

        Schema::create('homerotators', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('addTime')->nullable();
        });

        Schema::create('customerservicelist', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('qq')->nullable();
            $table->string('weChat')->nullable();
            $table->string('link')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('workTime')->nullable();
            $table->string('addTime')->nullable();
        });

        Schema::create('textmanagements', function (Blueprint $table) {
            $table->id();
            $table->string('pageName');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
        });

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->tinyInteger('status')->default(1);
        });

        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message')->nullable();
            $table->tinyInteger('status')->default(1);
        });

        Schema::create('continuousorders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->integer('continuous')->default(0);
            $table->decimal('amount', 12, 2)->default(0);
            $table->tinyInteger('status')->default(0);
        });

        Schema::create('rechargerequests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount', 12, 2)->default(0);
            $table->string('tid')->nullable();
            $table->string('method')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('trial_periods', function (Blueprint $table) {
            $table->id();
            $table->integer('tasks')->default(0);
            $table->integer('days')->default(0);
        });

        Schema::create('user_trials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('trial_end_date')->nullable();
            $table->tinyInteger('payment_status')->default(0);
        });

        // Admin backend tables
        Schema::create('systemusers', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('addroles', function (Blueprint $table) {
            $table->id();
            $table->string('roleName');
            $table->tinyInteger('frontPage')->default(0);
            $table->tinyInteger('systemManagement')->default(0);
            $table->tinyInteger('shoppingMallManagement')->default(0);
            $table->tinyInteger('memberManagement')->default(0);
            $table->tinyInteger('transactionManagement')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addroles');
        Schema::dropIfExists('systemusers');
        Schema::dropIfExists('user_trials');
        Schema::dropIfExists('trial_periods');
        Schema::dropIfExists('rechargerequests');
        Schema::dropIfExists('continuousorders');
        Schema::dropIfExists('announcements');
        Schema::dropIfExists('payment_methods');
        Schema::dropIfExists('textmanagements');
        Schema::dropIfExists('customerservicelist');
        Schema::dropIfExists('homerotators');
        Schema::dropIfExists('withdrawlists');
        Schema::dropIfExists('rechargelist');
        Schema::dropIfExists('todayrewards');
        Schema::dropIfExists('productorder');
        Schema::dropIfExists('productcategories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('user_verifications');
        Schema::dropIfExists('userbankinfos');
        Schema::dropIfExists('referrals');
        Schema::dropIfExists('members');
        Schema::dropIfExists('memberlevels');
        Schema::dropIfExists('systemsettings');
    }
};
