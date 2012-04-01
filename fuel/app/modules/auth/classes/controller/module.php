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

namespace Auth;

/**
 * Module Controller for Auth Module
 * 
 * @package Auth
 */

class Controller_Module extends \Controller_Kickstart_Common
{
	/**
	 * @var string require_login
	 * always assume we need a valid login.
	 */
	public $require_login = false;

	/**
	 * Setup the Controller
	 */
	public function before()
	{
		// load the user module language file
		\Lang::load('auth', true);

		// let's load user module config!
		\Config::load('auth', true);

		parent::before();
	}
}