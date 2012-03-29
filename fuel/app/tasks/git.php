<?php
/**
 * Task to setup directory permissions
 *
 * @package    FuelPHP-Quickstart
 * @version    1.0
 * @author     Daniel Berry <daniel@danielberry.me>
 * @license    MIT License
 * @copyright  2012 Daniiel Berry
 * @link       http://danielberry,me
 */

namespace Fuel\Tasks;

class Git
{
	public function run()
	{
		// add files to assume unchanged in git
		exec('git update-index --assume-unchanged '.APPPATH.'/config/development/db.php');
		exec('git update-index --assume-unchanged '.APPPATH.'/config/migrations.php');
	}
}