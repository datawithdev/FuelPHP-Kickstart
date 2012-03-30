<?php
/**
 * Common Controller for the KickStart System
 *
 * @package    FuelPHP-KickStart
 * @version    1.0
 * @author     Daniel Berry <daniel@danielberry.me>
 * @license    MIT License
 * @copyright  2012 Daniiel Berry
 * @link       http://danielberry,me
 */

class Controller_Kickstart_Common extends Controller_Template
{
	protected $view        = '';
	protected $data        = array();

	/**
	 * @var string $require_login
	 * always assume we need a valid login.
	 */
	public $require_login = true;

	/**
	 * @var string $template
	 */
	public $template = 'templates/default';


	//-------------------------------------------------------------------------------------


	/**
	 * Custom Constructor for Kickstart
	 * @param Request  $request  
	 * @param Response $response 
	 */
	public function __construct(Request $request, Response $response)
	{
		parent::__construct($request, $response);

		// let's rock-n-roll with Kickstart!
		Kickstart::init();
	}


	//-------------------------------------------------------------------------------------


	public function router($method, $args)
	{
		/**
		 * Check for Required Login
		 * 
		 * redirect to login if login is required and no current user exists
		 */
		if ($this->require_login === true and !Sentry::check()) {

			/**
			 * Last Page Viewed
			 * we will use this to send the user back to this page once
			 * they have logged in.
			 */
			Session::set('last_viewed', Uri::create());

			/**
			 * redirect the user to the login page
			 * uses Response & Router
			 */
			Response::redirect(Router::get('auth/login'));
		}

		// call the called method
        return call_user_func_array(array($this, 'action_' . $method), $args);
	}


	//-------------------------------------------------------------------------------------
	

	/**
	 * @param null $response
	 * @return mixed
	 */
	public function after($response = null)
	{
		/*
		 * if no view has been assigned, let's create one!
		 * This takes the class name & method and assigns a view based on that.
		 */

		if (empty($this->view))
		{
			// create the view
			if (empty($module))
			{
				$this->view = Kickstart::$current_controller.'/'.Kickstart::$current_action;
			}
			else
			{
				$this->view = Kickstart::$current_module.'/'.Kickstart::$current_controller.'/'.Kickstart::$current_action;
			}
		}

		if (empty($this->template->content))
		{
			$this->template->content = View::forge($this->view, $this->data);
		}

		return parent::after($response);
	}
}

/** end of app/classes/controller/kickstart/common.php **/