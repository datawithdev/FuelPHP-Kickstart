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
 * Request password be reset
 * 
 * @package Auth
 */

class Controller_Password extends Controller_Module
{
	/**
	 * Reset the User's Password
	 */
	public function action_index()
	{
		if (\Input::method() === 'POST')
		{
			// setup some boring validation.
			$val = \Validation::forge();
			$val->add_callable('Kickstart_Validation');

			$val->add('email', __('auth.fields.email'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('valid_email');

			$val->add('password', __('auth.fields.password'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('min_length', 8)
				->add_rule('max_length', 18);

			$val->add('retype_password', __('auth.fields.retype_password'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('match_field', 'password');

			if ($val->run())
			{
				try
				{
					$reset = \Sentry::reset_password(\Input::post('email'), \Input::post('password'));

					if ($reset)
					{
						// load the email package so we can use it.
						\Package::load('email');

						$view = \View::forge('auth/email/reset_password')
							->set('email', $reset['email'])
							->set('reset_uri', \Router::get('auth/password/confirm').'/'.$reset['link'], false);

						$email = \Email::forge()
							->from(\Config::get('auth.reset_password.email_from_address'), \Config::get('auth.reset_password.email_from_name'))
							->to($reset['email'], $reset['email'])
							->subject(\Config::get('auth.reset_password.email_subject'))
							->html_body($view);


						// try to send the new email
						try
						{
							if ($email->send())
							{
								// yay, the email was successfully sent, so let's tell the user and redirect to login screen.
								\Message::success(__('auth.reset_password.messages.success'));
								\Response::redirect(\Router::get('auth/login'));
							}
						}
						catch (\EmailValidationFailedException $e)
						{
							\Message::error($e->getMessage());
						}
						catch (\EmailSendingFailedException $e)
						{
							\Message::error($e->getMessage());
						}
					}
					else
					{
						// mostly likely scenario is the email address was not registered.
						\Message::error(__('auth.reset_password.messages.failed'));
					}
				}
				catch (\SentryAuthException $e)
				{
					// issue resetting the password
					// store/set and display caught exceptions such as a user not existing or user is disabled
					\Message::error($e->getMessage());
				}
			}
			else
			{
				// something went wrong - shouldn't really happen
				\Message::error($val->show_errors());
				$this->data['errors'] = $val->error();
			}
		}

		// set the page title
		$this->template->set('page_title', __('auth.reset_password.page_title'));

		// set custom content since this is not in the standard module/controller/format
		$this->template->content = \View::forge('auth/reset_password', $this->data);
	}

	/**
	 * Confirm Password Reset
	 *
	 * This takes the login hash that was sent to the user from the url and
	 * compares it against the database. If it matched, than the user's password
	 * is reset to the password they selected when they initiated the request.
	 *
	 * @param $hash_login
	 * @param $hash_token
	 */
	public function action_confirm($hash_login, $hash_token)
	{
		if (!empty($hash_login) and !empty($hash_token))
		{
			try
			{
				// confirm password reset
				$confirm_reset = \Sentry::reset_password_confirm($hash_login, $hash_token, true);

				if ($confirm_reset)
				{
					// user was confirmed, so set success message and redirect to login
					\Message::success(__('auth.confirm_reset_password.messages.success'));
					\Response::redirect(\Router::get('auth/login'));
				}
				else
				{
					// the user was not confirmed so set error and redirect to reset password page.
					\Message::error(__('auth.confirm_reset_password.messages.failed'));
					\Response::redirect(\Router::get('auth/reset_password'));
				}

			}
			catch (\SentryAuthException $e)
			{
				// issue activating the user
				// store/set and display caught exceptions such as a user not existing or user is disabled
				\Message::error($e->getMessage());
			}
		}

		// set the page title
		$this->template->set('page_title', __('auth.reset_password.page_title'));

		// set custom content since this is not in the standard module/controller/format
		$this->template->content = \View::forge('auth/reset_password', $this->data);
	}
}

/** end logout.php **/
