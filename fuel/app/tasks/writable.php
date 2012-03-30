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

class Writable
{
	public function run()
	{
		chmod(APPPATH.'/logs', 0777);
		chmod(APPPATH.'/cache', 0777);
		chmod(APPPATH.'/config', 0777);
	}
}