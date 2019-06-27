<?php 

namespace App\Repositories\Master\Tenants;

use App\Http\Requests\Master\Auth\TenantRegisterController\TenantRegisterRequestValidation;

interface TenantsInterface 
{
	public function getDatabaseConnectionDriverBySubdomain(string $subdomain): string;

	public function getDatabaseConnectionBySubdomain(string $subdomain): array;

	public function getTenantIdBySubdomain(string $subdomain): string;

	public function createNewTenant(TenantRegisterRequestValidation $request): void;
}