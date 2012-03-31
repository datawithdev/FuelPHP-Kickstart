<?php
/**
 * Part of the Auth Module
 *
 * @package    FuelPHP-KickStart
 * @version    1.0
 * @author     Daniel Berry <daniel@danielberry.me>
 * @license    MIT License
 * @copyright  2012 Daniel Berry
 * @link       http://danielberry,me
 */

/**
 * Custom Routing for the Auth Module
 * 
 * @package  Auth
 */
return array(
	'auth/login'	  		   => 'auth/login', // the default login page
	'auth/logout'  			   => 'auth/logout',
	'auth/landing'             => 'user/dashboard',
	'auth/activate'            => 'auth/activate',
	'auth/register'            => 'auth/register',
	'auth/password'            => 'auth/password',
	'auth/password/confirm'    => '/auth/password/confirm',
);

/** end of auth/config/routes.php **/
