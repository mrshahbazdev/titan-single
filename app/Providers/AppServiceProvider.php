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
        // If a stale route cache (built before the /app/livewire-update route
        // existed) is present, delete it so Laravel falls back to loading the
        // route files for this request. This must happen in register() —
        // before RouteServiceProvider boots and latches onto the cache file.
        $cachedRoutesPath = $this->app->getCachedRoutesPath();

        if (is_file($cachedRoutesPath)) {
            $cachedRoutes = @file_get_contents($cachedRoutesPath);

            if ($cachedRoutes !== false && ! str_contains($cachedRoutes, 'app/livewire-update')) {
                @unlink($cachedRoutesPath);
            }
        }
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

        // Override Livewire's update URI so getUpdateUri() returns the custom
        // path even when routes are cached (cached routes load after boot,
        // so the web.php setUpdateRoute call won't run with caching).
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
