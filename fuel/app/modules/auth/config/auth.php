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
 * Auth Module Config
 * 
 * @package  Auth
 */

return array(
	
	/**
	 * Where to redirect the user on a successful login
	 */
	'default_landing' => 'welcome/index',

	'register' => array(
		'email_from_address' => 'no-reply@phoenix-cms.com',
		'email_from_name' => \Config::get('site.title'),
		'email_subject' => 'Your New '.\Config::get('site.title').' Account.',
	),

	'reset_password' => array(
		'email_from_address' => 'no-reply@phoenix-cms.com',
		'email_from_name' => \Config::get('site.title'),
		'email_subject' => 'Reset Your '.\Config::get('site.title').' Passwrd.',
	)
);