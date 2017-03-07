<?php

namespace Spqr\Cookiewarning\Controller;

use Pagekit\Application as App;

/**
 * @Access(admin=true)
 */
class CookiewarningController
{
	/**
	 * @return mixed
	 */
	public function indexAction()
	{
		return App::response()->redirect( '@cookiewarning/settings' );
	}
	
	/**
	 * @Access("cookiewarning: manage settings")
	 */
	public function settingsAction()
	{
		$module = App::module( 'cookiewarning' );
		$config = $module->config;
		
		return [
			'$view' => [
				'title' => __( 'Cookiewarning Settings' ),
				'name'  => 'cookiewarning:views/admin/settings.php'
			],
			'$data' => [
				'config' => App::module( 'cookiewarning' )->config()
			]
		];
	}
	
	/**
	 * @Request({"config": "array"}, csrf=true)
	 * @param array $config
	 *
	 * @return array
	 */
	public function saveAction( $config = [] )
	{
		App::config()->set( 'cookiewarning', $config );
		
		return [ 'message' => 'success' ];
	}
	
}