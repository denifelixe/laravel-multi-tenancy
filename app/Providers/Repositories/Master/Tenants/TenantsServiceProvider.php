<?php

namespace App\Providers\Repositories\Master\Tenants;

use App\Repositories\Master\Tenants\TenantsInterface;
use App\Repositories\Master\Tenants\Repositories\MySQLTenantsRepository;
use Illuminate\Support\ServiceProvider;

class TenantsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        switch (env('DB_CONNECTION')) {
            case 'mysql':
                
                $this->app->bind(
                    TenantsInterface::class,
                    MySQLTenantsRepository::class
                );

                break;
            
            default:
                break;
        }
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
