<?php

use Pagekit\Application as App;

return [
	
	'name' => 'cookiewarning',
	
	'type' => 'extension',
	
	'main' => function( $app ) {
	},
	
	'autoload' => [
		'Spqr\\Cookiewarning\\' => 'src'
	],
	
	'nodes' => [],
	
	'routes' => [
		'/cookiewarning' => [
			'name'       => '@cookiewarning',
			'controller' => [
				'Spqr\\Cookiewarning\\Controller\\CookiewarningController'
			]
		],
	],
	
	'menu' => [
		'cookiewarning'           => [
			'label'  => 'Cookiewarning',
			'url'    => '@cookiewarning',
			'active' => '@cookiewarning(/*)?',
			'icon'   => 'cookiewarning:icon.svg'
		],
		'cookiewarning: settings' => [
			'parent' => 'cookiewarning',
			'label'  => 'Settings',
			'url'    => '@cookiewarning/settings',
			'access' => 'cookiewarning: manage settings'
		]
	],
	
	'permissions' => [
		'cookiewarning: manage settings' => [
			'title' => 'Manage settings'
		]
	],
	
	'settings' => '@cookiewarning/settings',
	
	'resources' => [
		'cookiewarning:' => ''
	],
	
	'config' => [
		'url'               => '',
		'position'          => 'bottom',
		'theme'             => 'classic',
		'message'           => '',
		'dismissbuttontext' => '',
		'policytext'        => '',
		'popup'             => [ 'textcolour' => '#404040', 'backgroundcolour' => '#efefef' ],
		'button'            => [ 'textcolour' => '#ffffff', 'backgroundcolour' => '#8ec760' ],
	],
	
	'events' => [
		'site' => function( $event, $app ) {
			$app->on(
				'view.content',
				function( $event, $test ) use ( $app ) {
					
					$module = App::module( 'cookiewarning' );
					$config = $module->config;
					
					$position               = ( !empty( $config[ 'position' ] ) ? $config[ 'position' ] : 'bottom' );
					$theme                  = ( !empty( $config[ 'theme' ] ) ? $config[ 'theme' ] : 'classic' );
					$url                    = ( !empty( $config[ 'url' ] ) ? App::url($config[ 'url' ]) : '#' );
					$message                = ( !empty( $config[ 'message' ] )
						? $config[ 'message' ]
						: __(
							'This website uses cookies. This ensures that the website is working correctly for your best experience on this website.'
						) );
					$dismiss                =
						( !empty( $config[ 'dismissbuttontext' ] ) ? $config[ 'dismiss' ] : __( 'Dismiss' ) );
					$policytext             =
						( !empty( $config[ 'policytext' ] ) ? $config[ 'policytext' ] : __( 'Learn more' ) );
					$buttontextcolour       =
						( !empty( $config[ 'button' ][ 'textcolour' ] ) ? $config[ 'button' ][ 'textcolour' ]
							: '#ffffff' );
					$buttonbackgroundcolour =
						( !empty( $config[ 'button' ][ 'backgroundcolour' ] )
							? $config[ 'button' ][ 'backgroundcolour' ] : '#8ec760' );
					$popuptextcolour        =
						( !empty( $config[ 'popup' ][ 'textcolour' ] ) ? $config[ 'popup' ][ 'textcolour' ]
							: '#404040' );
					
					$popupbackgroundcolour =
						( !empty( $config[ 'popup' ][ 'backgroundcolour' ] ) ? $config[ 'popup' ][ 'backgroundcolour' ]
							: '#efefef' );
					
					
					$script = "window.addEventListener('load', function(){
								window.cookieconsent.initialise({
	                                'palette': {
	                                    'popup': {
		                                    'background': '$popupbackgroundcolour',
		                                    'text': '$popuptextcolour'
	                                    },
									    'button': {
											'background': '$buttonbackgroundcolour',
										    'text': '$buttontextcolour'
									    }
	                                },
	                                'theme': '$theme',
                                    'position': '$position',
                                    'content': {
                                        'message': '$message',
                                        'dismiss': '$dismiss',
                                        'link': '$policytext',
                                        'href': '$url'                                                                                
                                    }
								})});";
					
					$app[ 'styles' ]->add(
						'cookieconsent',
						'cookiewarning:app/assets/cookieconsent/build/cookieconsent.min.css'
					);
					$app[ 'scripts' ]->add(
						'cookieconsent',
						'cookiewarning:app/assets/cookieconsent/build/cookieconsent.min.js'
					);
					$app[ 'scripts' ]->add( 'cookiewarning', $script, [], 'string' );
				}
			);
		}
	]
];