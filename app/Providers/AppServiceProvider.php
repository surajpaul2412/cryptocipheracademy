<?php

namespace App\Providers;
use App\HomeNotification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['welcome', 'layouts.frontend.app', 'errors.404'], function ($view) {
            $sharedHomeNotification = null;

            try {
                if (Schema::hasTable('home_notifications')) {
                    $sharedHomeNotification = HomeNotification::query()->first();
                }
            } catch (\Throwable $exception) {
                $sharedHomeNotification = null;
            }

            $sharedAnnouncementText = trim((string) optional($sharedHomeNotification)->notify_text);

            if ($sharedAnnouncementText === '') {
                $sharedAnnouncementText = 'New Fast Forward courses added. Go checkout Quickly !!';
            }

            $view->with(compact('sharedHomeNotification', 'sharedAnnouncementText'));
        });
    }
}
