<?php

namespace App\Models\Master\Tenants;

use App\Models\Master\DBConnections\DBConnectionsModel;
use Illuminate\Database\Eloquent\Model;

class TenantsModel extends Model
{
    //

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'tenants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subdomain', 'db_connection', 'db_url', 'db_host', 'db_port', 'db_name', 'db_username', 'db_password', 'db_socket', 'db_foreign_keys'
    ];


    public function db_connection_model()
    {
    	return $this->hasOne(DBConnectionsModel::class, 'id', 'db_connection');
    }
}
