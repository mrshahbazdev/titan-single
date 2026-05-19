<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('front.sidebar', function ($view) {
            $userName = session('username');
            $id = session('id');
            
            $user = null;
            if ($userName) {
                $user = \App\Models\Member::where('username', $userName)->first();
            }
            
            $rewards = [];
            if ($id) {
                $rewards = \App\Models\TodayReward::where('userId', $id)
                    ->where('created_at', date('Y-m-d'))
                    ->get()
                    ->toArray();
            }
            
            $query = \App\Models\SystemSetting::first();
            
            $view->with(compact('user', 'rewards', 'query'));
        });
    }
}
