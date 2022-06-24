<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;

use App\View\Components\Alert;

use App\View\Components\Input\Button;

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
        //trình khởi tạo ứng dụng
        // Blade::directive('datetime', function($expression){
        //     $expression = trim($expression,'\'');
        //     $expression = trim($expression,'""');
        //     $dateObject = date_create($expression);
        //     if (!empty($dateObject)){
        //         $dateFormat = $dateObject -> format('d/m/Y H:i:s');
        //         return $dateFormat ;

        //     }
        //     return false;

        // });

        // Blade::if('env', function ($environment) {
        //     // return app()->environment($environment);
        //     if (config('app.env') === $environment) {
        //         return true;
        //     }
        //     return false;
        // });

        Blade::component('package-alert',Alert::class);
        Blade::component('package-button',Button::class);

    }
}
