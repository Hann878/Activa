<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\Contracts\JournalRepositoryInterface;
use App\Repositories\Contracts\TeacherClassRepositoryInterface;
use App\Repositories\Contracts\TeacherDashboardRepositoryInterface;
use App\Repositories\Contracts\TeacherRepositoryInterface;
use App\Repositories\Contracts\TeacherStudentRepositoryInterface;
use App\Repositories\JournalRepository;
use App\Repositories\TeacherClassRepository;
use App\Repositories\TeacherDashboardRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\TeacherStudentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class,
        );

        $this->app->bind(
            TeacherRepositoryInterface::class,
            TeacherRepository::class,
        );

        $this->app->bind(
            JournalRepositoryInterface::class,
            JournalRepository::class
        );

        $this->app->bind(
            TeacherDashboardRepositoryInterface::class,
            TeacherDashboardRepository::class
        );

        $this->app->bind(
            TeacherClassRepositoryInterface::class,
            TeacherClassRepository::class
        );

        $this->app->bind(
            TeacherStudentRepositoryInterface::class,
            TeacherStudentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
