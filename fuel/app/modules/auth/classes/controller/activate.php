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
 * Activate the User's Account
 * 
 * @package Auth
 */

class Controller_Activate extends Controller_Module
{
	/**
	 * Activate a User
	 *
	 * We are using the Sentry Auth package for FuelPHP.  The user is sent
	 * an email containing a link that had the user hash in it. This user
	 * hash is validated against the db to verify the user's email address.
	 *
	 * No view is required. Fail & Success are both passed to back to the
	 * Login view with the appropriate message.
	 *
	 * @param $hash_login
	 * @param $hash_token
	 */
	public function action_index($hash_login, $hash_token)
	{
		// try to log a user in
		try
		{
			// log the user in
			$activate_user = \Sentry::activate_user($hash_login, $hash_token);

			if ($activate_user)
			{
				// the user is now activated
				\Message::success(__('auth.activate.messages.success'));
			}
			else
			{
				// the user is now activated
				\Message::error(__('auth.activate.messages.failed'));
			}

		}
		catch (\SentryAuthException $e)
		{
			// issue activating the user
			// store/set and display caught exceptions such as a suspended user with limit attempts feature.
			\Message::error($e->getMessage());
		}

		// redirect to the login page as this view doesn't exist.
		\Response::redirect(\Router::get('auth/login'));
	}
}