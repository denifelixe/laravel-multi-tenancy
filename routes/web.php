<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| command "php artisan route:list" to see all the route lists.
|
*/

/**
 * In order to ensure your sub-domain routes are reachable, you should 
 * register sub-domain routes before registering root domain routes.  
 * This will prevent root domain routes from overwriting
 * sub-domain routes which have the same URI path.
 */
Route::domain('{tenant}.' . env('APP_ROOT_DOMAIN'))->group(function ($tenant) {

    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::namespace('Tenant')->group(function () {

    	// Authentication routes automatically made by doing command "php artisan make:auth"
		// Available route lists can be seen in vendor/laravel/framework/src/Illuminate/Routing/Router.php line 1144 or you can see it by command "php artisan route:list"
		Auth::routes();

		Route::middleware(['auth'])->group(function () {
		    
		    Route::get('/', 'Home\HomeController@index')->name('tenant.home');

		});

	});

});

// Controllers Within The "App\Http\Controllers\Admin" Namespace
Route::namespace('Master')->group(function () {
	
	Route::get('/', 'Home\HomeController@index')->name('master.home');

	Route::get('signin', 'Auth\TenantSignInController@showTenantSignInForm')->name('master.tenant.sign_in');
	Route::post('signin', 'Auth\TenantSignInController@tenantSignIn');

	Route::get('register', 'Auth\TenantRegisterController@showTenantRegistrationForm')->name('master.tenant.register');
	Route::post('register', 'Auth\TenantRegisterController@tenantRegister');

});