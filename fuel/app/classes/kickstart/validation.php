<?php
/**
 * Custom Validations
 *
 * @package    FuelPHP-KickStart
 * @version    1.0
 * @author     Daniel Berry <daniel@danielberry.me>
 * @license    MIT License
 * @copyright  2012 Daniel Berry
 * @link       http://danielberry,me
 */

class Kickstart_Validation
{
	/**
	 * Check to see if a value is unique
	 *
	 * @static
	 * @param $val
	 * @param $options
	 * @return bool
	 */
	public static function _validation_unique($val, $options)
	{
		list($table, $field) = explode('.', $options);

		$result = DB::select("LOWER (\"$field\")")
			->where($field, '=', Str::lower($val))
			->from($table)->execute();

		return ! ($result->count() > 0);
	}

	/**
	 * Valdiate Username
	 *
	 * used to verify that a username contains valid characters.
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_username($val)
	{
		if (preg_match('/^[a-z\d_]{5,20}$/i', $val))
		{
			return true;
		}

		return false;
	}

	/**
	 * Validate Password Format
	 * 
	 * makes sure a user submitted password meets the requirements
	 * 
	 * @param  string  $val      user entered password to validate
	 * @param  array   $options  minimum & maximum values
	 * @return bool          returns true or false
	 */
	public static function _validation_password($val, $min_length = 8, $max_length = 18)
	{
		if (preg_match('/^[.a-zA-Z_0-9-!@#$%\^&*()]{'.$min_length.','.$min_length.'}$/', $val))
		{
			return true;
		}

		return false;
	}

	public static function _validation_name($val)
	{
		if (preg_match("#^[-A-Za-z' ]*$#", $val))
		{
			return true;
		}

		return false;
	}
}


/* end of classes/kickstart/validation.php */
