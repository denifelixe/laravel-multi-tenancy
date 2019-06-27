<?php 

namespace App\Repositories\Master\Users\Repositories;

use App\Models\Master\Users\UsersModel;
use App\Repositories\Master\Users\UsersInterface;
use Illuminate\Support\Facades\DB;

class MySQLUsersRepository implements UsersInterface
{
	protected $users;

	/**
     * Create a new Repository instance.
     *
     * @return void
     */
    public function __construct(UsersModel $users)
    {
        $this->users = $users;
    }

	public function createNewUserWithTenantId(array $data, string $tenant_id): void
	{
		DB::transaction(function () use ($data, $tenant_id) {

			if (!$user = $this->users->where('email', $data['email'])->first()) {
				$user = $this->users->create([
					'email' => $data['email']
				]);
			}

			DB::table('user_tenants')->insert([
				'user_id' => $user->id,
				'tenant_id' => $tenant_id
			]);

		});
	}
}