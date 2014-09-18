<?php namespace Andheiberg\Vimeo;

use Illuminate\Support\ServiceProvider;

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
				$app['config']->get('services.vimeo.clientId'),
				$app['config']->get('services.vimeo.clientSecret'),
				$app['config']->get('services.vimeo.token')
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
