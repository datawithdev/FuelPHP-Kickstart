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
 * Let's Log the User Out
 * 
 * @package Auth
 */

class Controller_Logout extends Controller_Module
{
	public function action_index()
	{
		if (\Sentry::check())
		{
			\Sentry::logout();
		}

		// set message to the user
		\Message::info(__('auth.logout.messages.success'));
		\Response::redirect(\Router::get('auth/login'));
	}
}

/** end logout.php **/
