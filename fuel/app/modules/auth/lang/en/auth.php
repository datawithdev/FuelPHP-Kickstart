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
 * EN Lang File for the Auth Module
 * 
 * @package  Auth
 */

return array(
	'fields' => array(
		'username_or_email'     => 'Email Address',
		'password'              => 'Password',
		'retype_password'       => 'Retype Password',
		'first_name'            => 'First Name',
		'last_name'             => 'Last Name',
		'email'                 => 'Email Address',
		'username'              => 'Username',
		'button_register'       => 'Register',
		'button_reset_password' => 'Reset Your Password'
	),

	'messages' => array(
		'login_required' => '<h4 class="alert-header">Oops, Login Required!</h4> <p>Please login to view the requested page.</p>',
	),

	'login' => array(
		'page_title' => 'Please Login',
		'messages' => array(
			'failed' => '<h4 class="alert-heading">Invalid Username and/or Password</h4> <p>Oops, the username and/or password you entered is invalid. Please try again.</p>',
		)
	),
	
	'logout' => array(
		'messages' => array(
			'success' => '<h4 class="alert-heading">Successfully Logged Out</h4> <p>You can now close this page or login below.</p>',
		)
	),
	
	'register' => array(
		'page_title' => 'Create Your Account!',
		'messages' => array(
			'success' => '<h4 class="alert-heading">Account Created!</h4> <p>You have successfully registered your account. Please check your email for instructions on how to activate.</p>',
			'failed' => 'Oops, an error occured while creating your account.'
		)
	),
	
	'activate' => array(
		'messages' => array(
			'success' => '<h4 class="alert-heading">Email Address Verified!</h4> <p> Please login below.</p>',
			'failed' => '<h4>Oops, Something Went Wrong</h4> <p>Please check your email address to make sure you followed the right activation url.</p>',
		)
	),
	
	'reset_password' => array(
		'page_title' => 'Reset Your Password',
		'messages' => array(
			'success' => '<h4 class="alert-heading">Confirmation Email Has Been Sent</h4> <p>Please check your email for instructions how how to confirm your new password.</p>',
			'failed' => '<h4>Oops, Something Went Wrong</h4> <p>We were unable to confirm your account. </p>',
		)
	),
	
	'confirm_reset_password' => array(
		'messages' => array(
			'success' => '<h4 class="alert-heading">Your Password Has Been Reset</h4> <p>We have successfully confirmed your account and reset your password. Please login below using your email address and new password.</p>',
			'failed' => '<h4>Oops, Something Went Wrong</h4> <p>We were unable to confirm your account. </p>',
		)
	),
);