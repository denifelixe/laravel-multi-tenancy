<?php

namespace App\Http\Controllers\Master\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Auth\TenantRegisterController\TenantRegisterRequestValidation;
use App\Repositories\Master\DBConnections\DBConnectionsInterface;
use App\Repositories\Master\Tenants\TenantsInterface;
use Illuminate\Http\Request;
use Exception;
use Throwable;

class TenantRegisterController extends Controller
{
	protected $db_connections_repo;
	
	protected $tenants_repo;

    //
	public function __construct(DBConnectionsInterface $db_connections_repo, TenantsInterface $tenants_repo)
	{
		$this->db_connections_repo = $db_connections_repo;
		$this->tenants_repo = $tenants_repo;
	}


    public function showTenantRegistrationForm()
    {
    	$db_connections = $this->db_connections_repo->getAllConnectionsIdAndName();

    	return view('master.auth.tenant_register', compact('db_connections'));
    }

    public function tenantRegister(TenantRegisterRequestValidation $request)
    {
        $this->tenants_repo->createNewTenant($request);

        return redirect(env('APP_PROTOCOL') . $request->input('subdomain') . '.' . env('APP_ROOT_DOMAIN'));
    }
}
