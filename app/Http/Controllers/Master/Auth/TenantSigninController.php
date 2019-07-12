<?php

namespace App\Http\Controllers\Master\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Auth\TenantSignInController\TenantSignInRequestValidation;

class TenantSignInController extends Controller
{
    //

    public function showTenantSignInForm()
    {
    	return view('master.auth.tenant_sign_in');
    }

    public function tenantSignIn(TenantSignInRequestValidation $request)
    {
    	return redirect(env('APP_PROTOCOL') . $request->input('subdomain') . '.' . env('APP_ROOT_DOMAIN'));
    }
}
