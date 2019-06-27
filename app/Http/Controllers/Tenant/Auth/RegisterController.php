<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Configurations\DatabaseConfiguration;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Users\UsersModel;
use App\Repositories\Master\Tenants\TenantsInterface;
use App\Repositories\Master\Users\UsersInterface;
use Throwable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    protected $users_repo;
    protected $tenants_repo;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UsersInterface $users_repo, TenantsInterface $tenants_repo)
    {
        $this->users_repo = $users_repo;
        $this->tenants_repo = $tenants_repo;

        $this->middleware('guest');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('tenant.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user_created = UsersModel::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        try {
            
            DatabaseConfiguration::resetConnectionToMasterDatabase();
            $this->users_repo->createNewUserWithTenantId($data, $this->tenants_repo->getTenantIdBySubdomain(subdomain()));

        } catch (Throwable $t) {

            DatabaseConfiguration::resetConnectionToTenantDatabase(subdomain());
            $user_created->delete();
            abort(500);

        }

        DatabaseConfiguration::resetConnectionToTenantDatabase(subdomain());

        return $user_created;

    }
}
