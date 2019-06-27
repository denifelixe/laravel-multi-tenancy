<?php

namespace App\Http\Controllers\Master\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Auth\TenantSigninController\TenantSigninRequestValidation;

class TenantSigninController extends Controller
{
    //

    public function showTenantSigninForm()
    {
    	return view('master.auth.tenant_signin');
    }

    public function tenantSignin(TenantSigninRequestValidation $request)
    {
    	return redirect(env('APP_PROTOCOL') . $request->input('subdomain') . '.' . env('APP_ROOT_DOMAIN'));
    }
}
