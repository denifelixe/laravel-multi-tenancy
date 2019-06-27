<?php

namespace App\Providers\Tenants\Databases\Connections;

use App\Exceptions\Tenant\NoTenantFoundException;
use App\Configurations\DatabaseConfiguration;
use App\Repositories\Master\Tenants\TenantsInterface;
use Illuminate\Support\ServiceProvider;

class TenantDatabaseConnectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (subdomain()) {
            try {
                DatabaseConfiguration::resetConnectionToTenantDatabase(subdomain());
            } catch (NoTenantFoundException $e) {
                abort(404);
            }
        }
    }
}
