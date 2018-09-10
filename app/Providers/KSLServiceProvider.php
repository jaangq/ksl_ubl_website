<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class KSLServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once app_path() . '/Helpers/KSL/Alerts.php';
        require_once app_path() . '/Helpers/KSL/LessMore.php';
        require_once app_path() . '/Helpers/KSL/Linking.php';
        require_once app_path() . '/Helpers/KSL/NavLessons.php';
    }
}
