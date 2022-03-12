<?php

namespace App\Providers;
use App;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\MeiliSearchCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

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
        Health::checks([
            MeiliSearchCheck::new(),
            DatabaseCheck::new(),
            EnvironmentCheck::new(),

        ]);

        App::bind('applist',function() {
            return new \App\Facades\AppList;
        });

    }
}
