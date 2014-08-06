<?php namespace Andheiberg\Image;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class VimeoServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->package('andheiberg/vimeo');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Register 'Vimeo' instance container to our Vimeo object
		$this->app['vimeo'] = $this->app->share(function($app)
		{
			return new Vimeo(
				new Client(),
				$app['config']->get('services.vimeo.consumerKey'),
				$app['config']->get('services.vimeo.consumerSecret'),
				$app['config']->get('services.vimeo.token'),
				$app['config']->get('services.vimeo.tokenSecret')
			);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('vimeo');
	}

}