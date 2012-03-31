<div class="row">
    <div class="span8 offset2">
        <div class="page-header">
            <h1>Forgot Your Password?</h1>
	        <p>Enter your email address and create a new password below. Once your email has been verified, we will send you an email with instructions on how to activate your new password.</p>
        </div>

        <!-- sysmessage if any. !-->
	    <?php echo Message::render(); ?>

	    <form name="form-reset-password" id="form-reset-password" method="post" class="form-horizontal" action="">

            <div class="control-group <?php echo !empty($errors['email']) ? 'error' : ''; ?>>
                <label class="control-label" for="email"><?php echo \Lang::get('auth.fields.email'); ?></label>

                <div class="controls">
                    <input type="email" class="input-xlarge" id="email" name="email" value="<?php echo \Input::post('email', ''); ?>">
                </div>
            </div>

            <div class="control-group <?php echo !empty($errors['password']) ? 'error' : ''; ?>">
                <label class="control-label" for="password"><?php echo \Lang::get('auth.fields.password'); ?></label>

                <div class="controls">
                    <input type="password" class="input-xlarge" id="password" name="password" value="<?php echo \Input::post('password', ''); ?>">
                </div>
            </div>

		    <div class="control-group <?php echo !empty($errors['retype_password']) ? 'errors' : ''; ?> ">
                <label class="control-label" for="retype_password"><?php echo \Lang::get('auth.fields.retype_password'); ?></label>

                <div class="controls">
                    <input type="password" class="input-xlarge" id="retype_password" name="retype_password" value="<?php echo \Input::post('retype_password', ''); ?>">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-large gray"><?php echo \Lang::get('auth.fields.button_reset_password'); ?></button>

                <span class="pull-right form-action-link-align">
                    <i class="icon-user"></i> Don't Have an Account? <a href="<?php echo Router::get('auth/register'); ?>">Sign Up!</a> <br />
	                <i class="icon-exclamation-sign"></i> Remembered Your Password? <a href="<?php echo \Router::get('auth/login'); ?>>Login!</a>
                </span>
            </div>
        </form>
    </div>
</div>