<?php

namespace App\Providers;

use App\Models\Booking;
use App\Observers\BookingObserver;
use App\Repositories\BookingRepository;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use App\Repositories\Interfaces\ResourceRepositoryInterface;
use App\Repositories\ResourceRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ResourceRepositoryInterface::class, ResourceRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Booking::observe(BookingObserver::class);
    }
}
