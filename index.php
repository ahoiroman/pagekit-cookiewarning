<?php

use Pagekit\Application as App;

return [
    
    'name' => 'spqr/cookiewarning',
    
    'type' => 'extension',
    
    'main' => function ($app) {
    },
    
    'autoload' => [
    ],
    
    'nodes' => [],
    
    'routes' => [],
    
    'menu' => [],
    
    'permissions' => [],
    
    'settings' => 'cookiewarning-settings',
    
    'resources' => [
        'spqr/cookiewarning:' => '',
    ],
    
    'config' => [
        'url'               => '',
        'position'          => 'bottom',
        'theme'             => 'classic',
        'message'           => '',
        'dismissbuttontext' => '',
        'policytext'        => '',
        'popup'             => [
            'textcolour'       => '#404040',
            'backgroundcolour' => '#efefef',
        ],
        'button'            => [
            'textcolour'       => '#ffffff',
            'backgroundcolour' => '#8ec760',
        ],
    ],
    
    'events' => [
        'site'         => function ($event, $app) {
            $app->on('view.content', function ($event, $test) use ($app) {
                
                $module = App::module('spqr/cookiewarning');
                $config = $module->config;
                
                $position   = (!empty($config['position']) ? $config['position']
                    : 'bottom');
                $theme      = (!empty($config['theme']) ? $config['theme']
                    : 'classic');
                $url        = (!empty($config['url']) ? App::url($config['url'])
                    : '#');
                $message    = (!empty($config['message']) ? $config['message']
                    : __('This website uses cookies. This ensures that the website is working correctly for your best experience on this website.'));
                $dismiss    = (!empty($config['dismissbuttontext'])
                    ? $config['dismissbuttontext'] : __('Dismiss'));
                $policytext = (!empty($config['policytext'])
                    ? $config['policytext'] : __('Learn more'));
                $buttontextcolour
                            = (!empty($config['button']['textcolour'])
                    ? $config['button']['textcolour'] : '#ffffff');
                $buttonbackgroundcolour
                            = (!empty($config['button']['backgroundcolour'])
                    ? $config['button']['backgroundcolour'] : '#8ec760');
                $popuptextcolour
                            = (!empty($config['popup']['textcolour'])
                    ? $config['popup']['textcolour'] : '#404040');
                
                $popupbackgroundcolour
                    = (!empty($config['popup']['backgroundcolour'])
                    ? $config['popup']['backgroundcolour'] : '#efefef');
                
                
                $script
                    = "window.addEventListener('load', function(){
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
                
                $app['styles']->add('cookieconsent',
                    'spqr/cookiewarning:app/assets/cookieconsent/cookieconsent.min.css');
                $app['scripts']->add('cookieconsent',
                    'spqr/cookiewarning:app/assets/cookieconsent/cookieconsent.min.js');
                $app['scripts']->add('cookiewarning', $script, [], 'string');
            });
        },
        'view.scripts' => function ($event, $scripts) use ($app) {
            $scripts->register('cookiewarning-settings',
                'spqr/cookiewarning:app/bundle/cookiewarning-settings.js',
                ['~extensions', 'input-link', 'vue']);
        },
    ],
];