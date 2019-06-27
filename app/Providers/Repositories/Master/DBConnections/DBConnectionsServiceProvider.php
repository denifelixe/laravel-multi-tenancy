<?php

namespace App\Providers\Repositories\Master\DBConnections;

use App\Repositories\Master\DBConnections\DBConnectionsInterface;
use App\Repositories\Master\DBConnections\Repositories\MySQLDBConnectionsRepository;
use Illuminate\Support\ServiceProvider;

class DBConnectionsServiceProvider extends ServiceProvider
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
                    DBConnectionsInterface::class,
                    MySQLDBConnectionsRepository::class
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
