<?php
/**
 * Part of the Profile Module
 *
 * @package    FuelPHP-KickStart
 * @version    1.0
 * @author     Daniel Berry <daniel@danielberry.me>
 * @license    MIT License
 * @copyright  2012 Daniel Berry
 * @link       http://danielberry,me
 */

namespace Profile;

/**
 * User's Home Screen
 * 
 * @package Profile
 */
class Controller_Home extends Controller_Module
{
	public function action_index()
	{
		// set the page title
		$this->template->set('page_title', __('profile.home.page_title'));

		// set custom content since this is not in the standard module/controller/format
		$this->template->content = \View::forge('profile/home')->set('user', \Kickstart::user());
	}
}

/** end of modules/profile/classes/controller/home.php **/
