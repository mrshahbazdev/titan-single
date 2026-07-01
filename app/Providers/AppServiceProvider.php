<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        // Always remove public/hot file to prevent Vite dev server loading on shared hosting
        if (file_exists(public_path('hot'))) {
            @unlink(public_path('hot'));
        }

        // Use a custom Livewire update route to avoid the /livewire/ prefix,
        // which is blocked on the production LiteSpeed server.
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/app/livewire-update', $handle)
                ->middleware('web');
        });

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
