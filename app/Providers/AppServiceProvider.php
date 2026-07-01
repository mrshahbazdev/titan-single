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
        // Remove public/hot file on non-local environments to prevent Vite dev server loading
        if (app()->environment('production', 'staging') && file_exists(public_path('hot'))) {
            @unlink(public_path('hot'));
        }

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

        view()->composer(['components.layouts.sidebar', 'components.layouts.header'], function ($view) {
            $settings = \App\Models\SystemSetting::first();
            $siteLogoUrl = $settings && $settings->siteLogo ? $settings->siteLogo : null;
            $view->with('siteLogoUrl', $siteLogoUrl);
        });
    }
}
