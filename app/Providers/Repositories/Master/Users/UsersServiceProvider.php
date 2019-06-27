<?php

namespace App\Providers\Repositories\Master\Users;

use App\Repositories\Master\Users\UsersInterface;
use App\Repositories\Master\Users\Repositories\MySQLUsersRepository;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        //
        switch (env('DB_CONNECTION')) {
            case 'mysql':
                
                $this->app->bind(
                    UsersInterface::class,
                    MySQLUsersRepository::class
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
