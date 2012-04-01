<p style="font-size: 18px; font-weight: bold;">
    Hi <?php echo $first_name; ?>, <br/>
    You need to activate your <?php echo \Config::get('kickstart.site.name'); ?> account before continuing.  Please click on or paste the following URI to continue.
</p>

<p> <?php echo $activation_uri; ?></p>

<p style="font-size: 14px; font-weight: bold;">Login Details:</p>

<p>
    <b>Login Url:</b><?php echo $login_uri; ?> <br/>
    <b>Username:</b> <?php echo $username; ?> <br/>
</p>

<p>
    Sincerely, <br />
	The <?php echo \Config::get('kickstart.site.name'); ?> Team
</p>