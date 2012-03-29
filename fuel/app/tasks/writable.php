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
		// let's chmod some directories
		exec('chmod 777 '.APPPATH.'/logs');
		exec('chmod 777 '.APPPATH.'/cache');
		exec('chmod 777 '.APPPATH.'/config');
	}
}