<?php 

namespace App\Repositories\Master\Users;

interface UsersInterface 
{
	public function createNewUserWithTenantId(array $data, string $tenant_id): void;
}