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
 * Let's Get the User Logged In!
 * 
 * @package Auth
 */

class Controller_Login extends Controller_Module
{
	public function action_index()
	{
		if (\Input::method() === 'POST')
		{
			// add validation
			$val = \Validation::forge();

			//$val->set_message('valid_email', 'Enter a valid email address');

			$val->add('username_or_email', __('auth.fields.username_or_email'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('valid_email');

			$val->add('password', __('auth.fields.password'))
				->add_rule('trim')
				->add_rule('required');

			if ($val->run())
			{
				// try to log a user in
				try
				{
					// log the user in
					$valid_login = \Sentry::login(\Input::post('username_or_email'), \Input::post('password'), \Input::post('rememberme'));

					if ($valid_login)
					{
						\Response::redirect(\Router::get('auth/landing'));
					}
					else
					{
						\Message::error(__('auth.login.messages.failed'));
					}

				}
				catch (\SentryAuthException $e)
				{
					// issue logging in via Sentry - lets catch the sentry error thrown
					// store/set and display caught exceptions such as a suspended user with limit attempts feature.
					\Message::error($e->getMessage());
				}
			}
			else
			{
				// let's show an error message
				\Message::error($val->show_errors());

				// send back the errors
				$this->data['errors'] = $val->errors();
			}
		}

		// set the page title
		$this->template->set('page_title', __('auth.login.page_title'));

		// set custom content since this is not in the standard module/controller/format
		$this->template->content = \View::forge('auth/login', $this->data);
	}
}

/** end of auth/classes,php **/
