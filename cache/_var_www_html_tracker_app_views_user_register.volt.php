<div class="page-header">
    <h2>Register for Tracker</h2>
</div>

<?= $this->tag->form(['user/register', 'id' => 'registerForm', 'onbeforesubmit' => 'return false']) ?>

    <fieldset>

        <div class="control-group">
            <?= $form->label('name', ['class' => 'control-label']) ?>
            <div class="controls">
                <?= $form->render('name', ['class' => 'form-control required']) ?>
                <div class="help-block">Please enter your full name</div>
            </div>
        </div>

        <div class="control-group">
            <?= $form->label('username', ['class' => 'control-label']) ?>
            <div class="controls">
                <?= $form->render('username', ['class' => 'form-control required']) ?>
                <div class="help-block">Please enter your desired user name</div>
            </div>
        </div>

        <div class="control-group required">
            <?= $form->label('email', ['class' => 'control-label']) ?>
            <div class="controls">
                <?= $form->render('email', ['class' => 'form-control required']) ?>
                <div class="help-block">Please enter your email</div>
            </div>
        </div>

        <div class="control-group">
            <?= $form->label('password', ['class' => 'control-label']) ?>
            <div class="controls">
                <?= $form->render('password', ['class' => 'form-control required']) ?>
                <div class="help-block">Please provide a valid password (minimum 8 characters)</div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="repeatPassword">Repeat Password</label>
            <div class="controls">
                <?= $this->tag->passwordField(['repeatPassword', 'class' => 'form-control required']) ?>
                <div class="help-block">The password does not match</div>
            </div>
        </div>

        <div class="form-actions">
            <?= $this->tag->submitButton(['Register', 'class' => 'btn btn-primary', 'onclick' => 'return SignUp.validate();']) ?>
            <p class="help-block">By signing up, you accept terms of use and privacy policy.</p>
        </div>

    </fieldset>
</form>