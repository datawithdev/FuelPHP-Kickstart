<div class="row">
	<div class="span8 offset2">

		<div class="page-header">
			<h1>Let's Get Started <small>Create your <?php echo Config::get('site.title'); ?> Account!</small></h1>
		</div>

		<!-- sysmessage if any. !-->
		<?php echo Message::render(); ?>

		<form name="form-create" id="form-create" method="post" class="form-horizontal" action="">

			<fieldset>
				<legend>Profile Details</legend>
				<div class="control-group <?php echo !empty($errors['metadata.first_name']) ? 'error' : ''; ?>">
					<label class="control-label" for="first_name"><?php echo Lang::get('auth.fields.first_name'); ?></label>

					<div class="controls">
						<input type="text" class="input-xlarge" id="first_name" name="metadata[first_name]" value="<?php echo Input::post('metadata.first_name', ''); ?>">
						<p class="help-block"><?php echo !empty($errors['metadata.first_name']) ? $errors['metadata.first_name'] : '' ; ?></p>
					</div>
				</div>

				<div class="control-group <?php echo !empty($errors['metadata.last_name']) ? 'error' : ''; ?>">
					<label class="control-label" for="last_name"><?php echo Lang::get('auth.fields.last_name'); ?></label>

					<div class="controls">
						<input type="text" class="input-xlarge" id="last_name" name="metadata[last_name]" value="<?php echo Input::post('metadata.last_name', ''); ?>">
						<p class="help-block"><?php echo !empty($errors['metadata.last_name']) ? $errors['metadata.last_name'] : '' ; ?></p>
					</div>
				</div>

				<div class="control-group <?php echo !empty($errors['email']) ? 'error' : ''; ?>">
					<label class="control-label" for="email"><?php echo Lang::get('auth.fields.email'); ?></label>

					<div class="controls">
						<input type="text" class="input-xlarge" id="email" name="email" value="<?php echo Input::post('email', ''); ?>">
						<p class="help-block"><?php echo !empty($errors['email']) ? $errors['email'] : '' ; ?></p>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Your Login</legend>

				<div class="control-group <?php echo !empty($errors['username']) ? 'error' : ''; ?>">
					<label class="control-label" for="username"><?php echo Lang::get('auth.fields.username'); ?></label>

					<div class="controls">
						<input type="text" class="input-xlarge" id="username" name="username" value="<?php echo Input::post('username', ''); ?>">
						<p class="help-block"><?php echo !empty($errors['username']) ? $errors['username'] : 'min. 6 characters, no spaces or special characters. Underscores (_) are allowed.' ; ?></p>
					</div>
				</div>

				<div class="control-group <?php echo !empty($errors['password']) ? 'error' : ''; ?>">
					<label class="control-label" for="password"><?php echo Lang::get('auth.fields.password'); ?></label>

					<div class="controls">
						<input type="password" class="input-xlarge" id="password" name="password" value="<?php echo Input::post('password', ''); ?>">
						<p class="help-block"><?php echo !empty($errors['password']) ? $errors['password'] : 'min 8 characters, no spaces, must contain upper and lowercase.' ; ?></p>
					</div>
				</div>

				<div class="control-group <?php echo !empty($errors['password_retype']) ? 'error' : ''; ?>">
					<label class="control-label" for="password_retype"><?php echo Lang::get('auth.fields.retype_password'); ?></label>

					<div class="controls">
						<input type="password" class="input-xlarge" id="password_retype" name="password_retype" value="<?php echo Input::post('password_retype', ''); ?>">
						<p class="help-block"><?php echo !empty($errors['password_retype']) ? $errors['password_retype'] : 'Retype the password you entered above.' ; ?></p>
					</div>
				</div>
			</fieldset>

			<div class="form-actions">
				<button type="submit" class="btn btn-large gray"><?php echo Lang::get('auth.fields.button_register'); ?></button>

                <span class="pull-right form-action-link-align">
                    <i class="icon-info-sign"></i> Already have an account? <a href="<?php echo Uri::create('auth/login'); ?>">Log In</a> <br/>
	                <i class="icon-lock"></i> Forgot Your Password? <a href="<?php echo Uri::create('auth/password'); ?>">Reset Your Password</a>
                </span>
			</div>
		</form>
	</div>
</div>
