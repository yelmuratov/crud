<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Group;
use App\Models\Student;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        View::composer('*', function ($view) {
            $view->with([
                'universityCount' => University::count(),
                'facilitiesCount' => Faculty::count(),
                'majorsCount' => Major::count(),
                'groupsCount' => Group::count(),
                'studentCount' => Student::count(),
            ]);
        });
    
    }
}
