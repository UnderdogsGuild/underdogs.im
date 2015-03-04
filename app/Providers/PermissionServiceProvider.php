<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        //Manage IP address mapping
		$cidrs = [
            '199.27.128.0/21',
            '173.245.48.0/20',
            '103.21.244.0/22',
            '103.22.200.0/22',
            '103.31.4.0/22',
            '141.101.64.0/18',
            '108.162.192.0/18',
            '190.93.240.0/20',
            '188.114.96.0/20',
            '197.234.240.0/22',
            '198.41.128.0/17',
            '162.158.0.0/15',
            '104.16.0.0/12',
            '172.64.0.0/13',
            '2400:cb00::/32',
            '2606:4700::/32',
            '2803:f800::/32',
            '2405:b500::/32',
            '2405:8100::/32',
            ];
        \Request::setTrustedProxies($cidrs);
        \Request::setTrustedHeaderName(\Symfony\Component\HttpFoundation\Request::HEADER_CLIENT_IP, 'CF-Connecting-IP');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//Registers the Permission service.
        $this->app->bind('App\Services\PermissionsService');
	}

}
