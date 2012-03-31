<?php
/**
 * A generic message handler
 *
 * use the message class to store single or an array of messages.  These messages can be any type and are rendered using
 * the templates in your custom theme.  An $options array is available for you to specify any custom data that you might
 * require for your custom theme.
 *
 * @author     Weztec Limited/Berry Media Group
 * @license    TBD
 * @copyright  2012 Weztec Limited/Berry Media Group
 * @link       http://www.weztec.com / http://www.berrymediagroup.com
 * @email      info@weztec.com / daniel@berrymediagroup.com
 * @package    PhoenixCMS
 * @version    2.0
 * @created    2/25/12 4:18 AM
 *
 */

/**
 * Custom Exceptions Exceptions
 */
class NoMessageTypeException extends FuelException {}
class NoMessageTextException extends FuelException {}

/**
 * Phoenix CMS Message Class
 */
class Message
{
	/**
	 * @var array store the messages
	 */
	protected static $_messages = array();

	/**
	 * generic function to add a message or an array of messages to the stack
	 *
	 * <code>
	 * Message::add('generic', 'The action was successful', array('closeable' => true, 'notification' => 'classname', 'custom' => 'option');
	 * Message::add('form_error', $val->show_errors(), array('closeable' => true, 'notification' => 'classname', 'custom' => 'option');
	 * </code>
	 *
	 * @static
	 * @param null $type
	 * @param null $body
	 * @param array $options
	 * @throws NoMessageTextException|NoMessageTypeException
	 */
	public static function add($type, $body, $options = array())
	{
		if (empty($type))
		{
			throw new NoMessageTypeException('No message type was specified.');
		}
		elseif (empty($body))
		{
			throw new NoMessageTextException('No message text was specified.');
		}

		if (!is_array($body))
		{
			array_push(static::$_messages, array(
				'type' => $type,
				'body' => trim($body),
				'options' => $options
			));
		}
		else
		{
			foreach($body as $msg)
			{
				array_push(static::$_messages, array(
					'type' => $type,
					'body' => trim($msg),
					'options' => $options
				));
			}
		}
	}

	/**
	 * Check to see if any messages have been added.
	 *
	 * @static
	 * @param null $type
	 * @return int
	 */
	public static function count($type = null)
	{
		if (empty($type))
		{
			return (bool) count(static::$_messages);
		}
		else
		{
			$count = 0;

			foreach (static::$_messages as $msg)
			{
				if ($msg['type'])
				{
					$count++;
				}
			}

			return $count;
		}
	}

	/**
	 * Get the Messages
	 *
	 * Get the stored messages.  You can include or exclude the message types you want to display.
	 *
	 * <code>
	 * // include only the info messages
	 * <?php echo Message::render(array('info'));?>
	 *
	 * // display all but the info messages.
	 * <?php echo Message::render(array(), array('info'));?>
	 * </code>
	 *
	 * @static
	 * @param array $included
	 * @param array $excluded
	 * @return array|bool
	 */
	public static function get($included = array(), $excluded = array())
	{
		if (empty(static::$_messages))
		{
			static::$_messages = Session::get_flash('messages');
		}

		if (static::count())
		{
			$messages = array();

			if (!empty($included))
			{
				foreach(static::$_messages as $msg)
				{
					if (in_array($msg['type'], $included))
					{
						$messages[] = $msg;
					}
				}
			}
			else
			{
				foreach(static::$_messages as $msg)
				{
					if (!in_array($msg['type'],  $excluded))
					{
						$messages[] = $msg;
					}
				}
			}

			return $messages;
		}

		// nothing to do
		return false;
	}

	/**
	 * render messages using views
	 *
	 * this method will render the message or message array using the theme in your theme/yourtheme/templates/messages
	 * directory. The theme to use is determined by the message type or in the case of notifications by the template
	 * set in the options.  The options are optional and can be used to specify any additional information that you might
	 * need for your custom message templates.
	 *
	 * <code>
	 *  echo Message::render('success');
	 * </code>
	 *
	 * @static
	 * @param array $included
	 * @param array $excluded
	 * @return bool
	 */
	public static function render($included = array(), $excluded = array())
	{
		$messages = static::get($included, $excluded);

		if (!empty($messages))
		{
			foreach($messages as $msg)
			{
				$data['messages'] = $msg['body'];
				$data['options']  = $msg['options'];

				if ($msg['type'] === 'notification' and $msg['options']['locked'] === '')
				{
					echo View::forge('templates/messages/'.$msg['options']['template'], $data, false);
				}
				else
				{
					echo View::forge('templates/messages/'.$msg['type'], $data, false);
				}
			}
		}

		// there is nothing for us to render
		return false;
	}

	/**
	 * clear all stored messages
	 *
	 * @static
	 */
	static public function clear()
	{
		static::$_messages = array();
	}

	/**
	 * add a success message
	 *
	 * This is an alias for Message::add('success', 'message here');
	 *
	 * <code>
	 * Message::success('Your Update was successful', array('custom' => 'option');
	 * </code>
	 *
	 * @static
	 * @param null $message
	 * @param array $options
	 */
	public static function success($message = null, $options = array())
	{
		static::add('success', $message, $options);
	}

	/**
	 * add an error message
	 *
	 * This is an alias for Message::add('error', 'message here');
	 *
	 * <code>
	 * Message::error('Your Update was successful', array('custom' => 'option');
	 * </code>
	 *
	 * @static
	 * @param null $message
	 * @param array $options
	 */
	public static function error($message = null, $options = array())
	{
		static::add('error', $message, $options);
	}

	/**
	 * add an info message
	 *
	 * This is an alias for Message::add('info', 'message here');
	 *
	 * <code>
	 * Message::info('Your Update was successful', array('custom' => 'option');
	 * </code>
	 *
	 * @static
	 * @param null $message
	 * @param array $options
	 */
	public static function info($message = null, $options = array())
	{
		static::add('info', $message, $options);
	}

	/**
	 * add a warning message
	 *
	 * This is an alias for Message::add('warning', 'message here');
	 *
	 * <code>
	 * Message::warning('Your Update was successful', array('custom' => 'option');
	 * </code>
	 *
	 * @static
	 * @param null $message
	 * @param array $options
	 */
	public static function warning($message = null, $options = array())
	{
		static::add('warning', $message, $options);
	}

	/**
	 * add a notification message
	 *
	 * <code>
	 * Message::notification('Your Update was successful', array('sticky' => 'classname', 'closeable' => true);
	 * </code>
	 *
	 * Notifications can be used to add a sticky message to your page.  See the example in the default template
	 * for more information.
	 *
	 * Required Options:
	 * 'template' => the message template you want to use for the notification.
	 *
	 * This is an alias for Message::add('notification', 'message here', array('template' => 'success'));
	 *
	 * @static
	 * @param null $message
	 * @param array $options
	 * @example themes/phoenix/templates/messages/notification/
	 */
	public static function notification($message = null, $options = array())
	{
		static::add('notification', $message, $options);
	}

	/**
	 * saves all pending messages to session flash
	 *
	 * @param void
	 * @param string
	 * @return void
	 */
	public static function to_flash()
	{
		// save any messages in flash
		Session::set_flash('messages', static::$_messages);
	}


	public static function check_messages()
	{
		// do we have any messages in flash?
		$messages = Session::get_flash('messages');

		// if there were any stored, add them to the messages array
		if ( is_array($messages) )
		{
			// restore the messages
			foreach($messages as $message)
			{
				static::add($message['type'], $message['body'], $message['options']);
			}
		}
	}
}

/** end of messages.php **/