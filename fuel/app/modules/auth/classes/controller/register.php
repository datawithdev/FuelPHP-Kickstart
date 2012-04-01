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
 * Register a New User's Account
 * 
 * @package Auth
 */

class Controller_Register extends Controller_Module
{
	/**
	 *  Register a New User
	 */
	public function action_index()
	{
		if (\Input::method() === 'POST')
		{
			$val = \Validation::forge();
			$val->add_callable('Kickstart_Validation');

			$val->add('metadata.first_name', __('auth.fields.first_name'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('name');

			$val->add('metadata.last_name', __('auth.fields.last_name'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('name');

			$val->add('email', __('auth.fields.email'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('valid_email')
				->add_rule('unique', 'users.email');

			$val->add('username', __('auth.fields.username'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('min_length', 6)
				->add_rule('unique', 'users.username')
				->add_rule('username');

			$val->add('password', __('auth.fields.password'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('min_length', 8)
				->add_rule('max_length', 18);

			$val->add('password_retype', __('auth.fields.retype_password'))
				->add_rule('trim')
				->add_rule('required')
				->add_rule('match_field', 'password');

			if ($val->run())
			{
				try
				{
					// create the user - no activation required
					$vars = array(
						'username' => \Input::post('username'),
						'email'    => \Input::post('email'),
						'password' => \Input::post('password'),
						'metadata' => array(
							'first_name' => \Input::post('metadata.first_name'),
							'last_name'  => \Input::post('metadata.last_name'),
						)
					);

					$user = \Sentry::user()->register($vars, false);

					if ($user)
					{
						// the user was created - send email notifying user account was created
						// email $link to $email
						\Package::load('email');

						$view = \View::forge('auth/email/activate')
							->set('first_name', \Input::post('metadata.first_name'))
							->set('username', \Input::post('username'))
							->set('password', \Input::post('password'))
							->set('activation_uri', \Router::get('auth/activate').'/index/'.$user['hash'])
							->set('login_uri', \Router::get('auth/login'));

						$email = \Email::forge()
							->from(\Config::get('auth.register.email_from_address'), \Config::get('auth.register.email_from_name'))
							->to(\Input::post('email'), \Input::post('metadata.first_name').\Input::post('metadata.last_name'))
							->subject(\Config::get('auth.register.email_subject'))
							->html_body($view);

						try
						{
							if ($email->send())
							{
								\Message::success(__('auth.register.messages.success'));
								\Response::redirect(\Router::get('auth/login'));
							}
						}
						catch (\EmailValidationFailedException $e)
						{
							\Message::error($e->getMessage());
						}
						catch (EmailSendingFailedException $e)
						{
							\Message::error($e->getMessage());
						}
					}
					else
					{
						// something went wrong - shouldn't really happen
						\Message::error(__('auth.register.failed'));
					}
				}
				catch (\SentryUserException $e)
				{
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
		$this->template->set('page_title', __('auth.register.page_title'));

		// set custom content since this is not in the standard module/controller/format
		$this->template->content = \View::forge('auth/register', $this->data);
	}
}