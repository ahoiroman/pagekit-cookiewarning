<?php

use Doctrine\DBAL\Schema\Comparator;
use Pagekit\Config\Config;

return [
    
    /*
     * Installation hook
     *
     */
    'install'   => function ($app) {
        // Workaround: As extension got a new name, we need to migrate the config in the install routine
        if (!empty($app['config']->get('cookiewarning')->toArray())
            && empty($app['config']->get('spqr/cookiewarning')->toArray())
        ) {
            $app['config']->set('spqr/cookiewarning',
                $app->config('cookiewarning')->toArray());
        }
    },
    
    /*
     * Enable hook
     *
     */
    'enable'    => function ($app) {
    },
    
    /*
     * Uninstall hook
     *
     */
    'uninstall' => function ($app) {
        
        // remove the config
        $app['config']->remove('spqr/cookiewarning');
    },
    
    /*
     * Runs all updates that are newer than the current version.
     *
     */
    'updates'   => [],

];