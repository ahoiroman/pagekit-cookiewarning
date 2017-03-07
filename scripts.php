<?php

use Doctrine\DBAL\Schema\Comparator;

return [
	
	/*
	 * Installation hook
	 *
	 */
	'install'    => function( $app ) {
	},
	
	/*
	 * Enable hook
	 *
	 */
	'enable'    => function( $app ) {
	},
	
	/*
	 * Uninstall hook
	 *
	 */
	'uninstall' => function( $app ) {
		
		// remove the config
		$app[ 'config' ]->remove( 'cookiewarning' );
	},
	
	/*
	 * Runs all updates that are newer than the current version.
	 *
	 */
	'updates'   => [
	],

];