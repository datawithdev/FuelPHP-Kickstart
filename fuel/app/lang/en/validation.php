<?php

return array(
	'required'      => ':label is required and must contain a value.',
	'min_length'    => ':label has to contain at least :param:1 characters.',
	'max_length'    => ':label may not contain more than :param:1 characters.',
	'exact_length'  => ':label must contain exactly :param:1 characters.',
	'match_value'   => ':label must contain the value :param:1.',
	'match_pattern' => ':label must match the pattern :param:1.',
	'match_field'   => ':label must match the field :param:1.',
	'valid_email'   => ':label must contain a valid email address.',
	'valid_emails'  => ':label must contain a list of valid email addresses.',
	'valid_url'     => ':label must contain a valid URL.',
	'valid_ip'      => ':label must contain a valid IP address.',
	'numeric_min'   => 'The minimum numeric value of :label must be :param:1',
	'numeric_max'   => 'The maximum numeric value of :label must be :param:1',
	'valid_string'  => 'The valid string rule :rule failed for field :label',

	/**
	 * Start of custom fields
	 */
	'unique'		=> ':label is already in use.',
	'password'		=> 'Your password must contain letters, numbers and special characters and be between :param:1 and :param:2 characters in length.'
);
