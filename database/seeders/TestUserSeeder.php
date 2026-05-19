<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        // ── System Settings ──
        DB::table('systemsettings')->updateOrInsert(
            ['id' => 1],
            [
                'siteTitle' => 'Crownbridge Laravel',
                'siteLogo' => '',
                'siteUrl' => 'http://localhost:8000',
                'minWithdrawal' => 100,
                'maxWithdrawal' => 50000,
                'withdrawalTimes' => 3,
                'minRecharge' => 100,
                'maxRecharge' => 50000,
                'rechargeTimes' => 5,
            ]
        );

        // ── Member Level (required for frontend member) ──
        DB::table('memberlevels')->insertOrIgnore([
            'id' => 1,
            'level' => 1,
            'levelName' => 'Basic',
            'orderReciveLimit' => 10,
            'ordersGrabbed' => 5,
            'commissionRate' => 0.005,
            'price' => 0,
        ]);

        // ── Admin Role (Super Admin with all permissions) ──
        DB::table('addroles')->insertOrIgnore([
            'id' => 1,
            'roleName' => 'Super Admin',
            'frontPage' => 1,
            'systemManagement' => 1,
            'shoppingMallManagement' => 1,
            'memberManagement' => 1,
            'transactionManagement' => 1,
        ]);

        // ── Backend Test User (Admin) ──
        // Login: username = admin, password = admin123
        DB::table('systemusers')->updateOrInsert(
            ['username' => 'admin'],
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'Super Admin',
            ]
        );

        // ── Frontend Test User (Member) ──
        // Login: username = testuser, password = test123
        DB::table('members')->updateOrInsert(
            ['username' => 'testuser'],
            [
                'qrImage' => '',
                'username' => 'testuser',
                'email' => 'test@example.com',
                'password' => md5('test123'),
                'phN' => '03001234567',
                'balance' => 1000,
                'avalibleDailyOrders' => 10,
                'takeTodayOrders' => 0,
                'todaycommission' => 0,
                'credibility' => 100,
                'inviteCode' => '',
                'myCode' => 'TEST01',
                'status' => 1,
                'memberLevel' => 1,
                'frozenAmout' => 0,
                'grabOrder' => 5,
                'registrationTime' => (string) time(),
                'lastLongInTime' => (string) time(),
                'orderStatus' => 1,
                'withdrawalStatus' => 1,
                'paymentPassword' => md5('000000'),
                'memberAgent' => 0,
                'taskStatus' => 0,
            ]
        );

        // ── Text Management Pages ──
        $pages = ['about', 'faqs', 'term', 'gettouch'];
        foreach ($pages as $page) {
            DB::table('textmanagements')->updateOrInsert(
                ['pageName' => $page],
                [
                    'pageName' => $page,
                    'title' => ucfirst($page),
                    'content' => '<p>This is the ' . $page . ' page content.</p>',
                ]
            );
        }

        // ── Payment Method ──
        DB::table('payment_methods')->updateOrInsert(
            ['id' => 1],
            [
                'name' => 'Bank Transfer',
                'account_number' => '1234567890',
                'account_name' => 'Crownbridge',
                'status' => 1,
            ]
        );
    }
}
