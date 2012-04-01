<div class="row">
    <div class="span8 offset2">
        <div class="page-header">
            <h1>Please Login</h1>
        </div>

        <!-- sysmessage if any. !-->
        <?php echo Message::render(); ?>

        <form name="form-register" id="form-register" method="post" class="form-horizontal" action="">

            <div class="control-group <?php isset($errors['username_or_email']) ? 'error' : '' ?>">
                <label class="control-label" for="username_or_email"><?php echo Lang::get('auth.fields.username_or_email'); ?></label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="username_or_email" name="username_or_email" value="<?php echo Input::post('username_or_email', ''); ?>">
                </div>
            </div>

            <div class="control-group <?php isset($errors['password']) ? 'error' : '' ?>">
                <label class="control-label" for="password"><?php echo Lang::get('auth.fields.password'); ?></label>

                <div class="controls">
                    <input type="password" class="input-xlarge" id="password" name="password">
                </div>
            </div>

            <div class="control-group">
                 <div class="controls">
                    <label class="checkbox">
                       <input type="checkbox" id="rememberme" value="true">
                       Remember me on this computer
                   </label>
               </div>
           </div>


           <div class="form-actions">
                <button type="submit" class="btn btn-large gray">Login</button>

                <span class="pull-right form-action-link-align">
                    <i class="icon-question-sign"></i> Don't Have an Account? <a href="<?php echo Router::get('auth/register'); ?>">Sign Up!</a><br />
                    <i class="icon-lock"></i> Forgot Your Password? <a href="<?php echo Router::get('auth/password'); ?>">Reset Your Password</a>
                </span>
            </div>
        </form>
    </div>
</div>