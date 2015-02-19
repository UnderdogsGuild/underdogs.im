<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//Registers the Permission service.
        $this->app->bind('App\Services\Permission');
	}

}
