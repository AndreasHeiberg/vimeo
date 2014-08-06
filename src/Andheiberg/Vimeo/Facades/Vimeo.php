<?php namespace Andheiberg\Vimeo\Facades;

use Illuminate\Support\Facades\Facade as Facade;

/**
 * @see \Andheiberg\Vimeo\Vimeo
 */
class Vimeo extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'vimeo'; }

}