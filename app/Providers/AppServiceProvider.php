<?php

namespace App\Providers;

use App\Category;
use App\Department;
use App\HospitalDetails;
use App\OvertimeAmount;
use App\Patient;
use App\Product;
use App\Roles;
use App\User;
use Carbon\Traits\Date;
use function foo\func;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        view()->composer('*', function ($view) {
            $todaysDate = \date('y/m/d');
            $categories = Category::all();
            $departments = Department::all();
            $roles = Roles::all();
            $AllUsers = User::all();
            $patients = Patient::all();
            $products = Product::all();
            $regions = DB::table('regions')->get()->all();
            $countries = DB::table('countries')->get()->all();
            $info = HospitalDetails::first();
            $overtime = OvertimeAmount::all();
            $view->with(compact('overtime','categories', 'todaysDate', 'departments', 'roles', 'AllUsers', 'products', 'regions', 'countries', 'patients','info'));

        });
    }
}
