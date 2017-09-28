<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Kieugiay;
use App\Loaigiay;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('publicUrl',getenv('PUBLIC_URL'));
        View::share('adminUrl',getenv('ADMIN_URL'));
        View::share('publicfiles',getenv('PUBLIC_FILES'));
        View::share('arKieu',Kieugiay::all());
        View::share('arLoai',Loaigiay::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
