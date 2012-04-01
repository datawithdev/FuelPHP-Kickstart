<?php

/**
 * Kick-starts, Kickstart!!!
 * 
 * The Kickstart Class contains var, methods and wrappers that are used throughout the Kickstart Core system.
 * Common uses are variables that will be used in several different locations, wrappers to provide a common
 * call in case the package changes in the future.
 * 
 * 
 * @package    FuelPHP-KickStart
 * @version    1.0
 * @author     Daniel Berry <daniel@danielberry.me>
 * @license    MIT License
 * @copyright  2012 Daniel Berry
 * @link       http://danielberry,me
 */

class Kickstart
{
	/**
	 * contains the current module in Request::active()->module
	 * @var string  $current_module  contains the current module
	 */
	public static $current_module = '';

	/**
	 * Denamespaced Controller
	 * @var string  $current_module  contains the current controller
	 */
	public static $current_controller = '';

	/**
	 * contains the current action (method)
	 * @var string  $current_module  contains the current action
	 */
	public static $current_action = '';


	//-------------------------------------------------------------------------------
	

	/**
	 * Initialize the Kickstart Class. Everything happens here first.
	 * * Get the Current Module, Controller and Action
	 * 
	 * @return  void
	 */
	public static function init()
	{
		// current module, controller, action
		static::get_current_mca();

		// get messages
		Message::check_messages();

		// let's load the kickstart config
		Config::load('kickstart', true);
	}


	//-------------------------------------------------------------------------------
	


	/**
	 * Wrapper method for the Sentry User Class
	 * 
	 * This will return the current user object, will return null if there is no current user.
	 * 
	 * Example Usage:
	 * <code>
	 * Kickstart::user()->get('username');
	 * </code>
	 * 
	 * @return  object  the current user object
	 */
	public static function user()
	{
		return Sentry::user();
	}


	//-------------------------------------------------------------------------------


	/**
	 * get the current module/controller/action
	 */
	/**
	 * Ge the Current Module, Controller and Action
	 * 
	 * This uses the Request::active() method provided by FuelPHP to give us the current module, denamespaced controller and action.
	 * 
	 * * Phoneix::$current_module
	 * * Phoneix::$current_controller
	 * * Kickstart::$current_action
	 * 
	 * @return  null
	 */
	public static function get_current_mca()
	{
		static::$current_module 	= Request::active()->module;
		static::$current_controller = Str::lower(preg_replace(array('/^Controller_/', '/_/'), array('', '/'), Inflector::denamespace(Request::active()->controller)));
		static::$current_action 	= Request::active()->action;
	}
}

/** end of app/classes/kickstart.php **/
