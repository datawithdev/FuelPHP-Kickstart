<?php

/**
 * Extending the FuelPHP Response Class
 * 
 * We need to be able to carry our flash messages over after a redirect. So we're
 * going to slightly modify FuelPHP's standard Redirect to check for messages. If
 * message(s) exist, that we will call Message::to_flash() to store the messages.
 *
 * @package    FuelPHP-KickStart
 * @version    1.0
 * @author     Daniel Berry <daniel@danielberry.me>
 * @license    MIT License
 * @copyright  2012 Daniiel Berry
 * @link       http://danielberry,me
 */


 class Response extends Fuel\Core\Response
 {
	 /**
	  * @static
	  * @param string $url
	  * @param string $method
	  * @param int $code
	  * @return mixed
	  */
	 public static function redirect($url = '', $method = 'location', $code = 302)
	 {
		 if (Message::count() >= 1)
		 {
			 // save outstanding messages to flash
			 Message::to_flash();
		 }

		 $response = new static;

		 $response->set_status($code);


		 if (strpos($url, '://') === false)
		 {
			 $url = $url !== '' ? \Uri::create($url) : \Uri::base();
		 }

		 if ($method == 'location')
		 {
			 $response->set_header('Location', $url);
		 }
		 elseif ($method == 'refresh')
		 {
			 $response->set_header('Refresh', '0;url='.$url);
		 }
		 else
		 {
			 return;
		 }

		 \Event::shutdown();

		 $response->send(true);
		 exit;
	 }
 }

 /** end of response.php **/
 