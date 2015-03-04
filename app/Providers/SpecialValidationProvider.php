<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SpecialValidationProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->app->validator->resolver( function( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
            return new \App\Services\SpecialValidation($translator, $data, $rules, $messages, $customAttributes);
        } );
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{

	}

}
