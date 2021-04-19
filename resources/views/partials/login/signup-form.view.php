<?php
// I'm not sure this is being recognized as php by heroku.
?>
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <div class="signup-form-wrapper">
                <form action="/signup" method="POST" class="row">
                    <?php
                    if (isset($errors['signup_errors'])) {
                        bs4_alert("danger", $errors['signup_errors']);
                    }

                    ?>
                    <div class="flexcol50 input-field <?php echo invalid_form_element('first_name'); ?>">
                        <div class="error"><?= validate_form('first_name'); ?></div>
                        <input type="text" name="first_name" required placeholder="First Name" title="First Name" value="<?= persisted('first_name') ?>" />
                    </div>
                    <div class="flexcol50 input-field <?= invalid_form_element('last_name'); ?>">
                        <div class="error"><?= validate_form('last_name'); ?></div>
                        <input type="text" name="last_name" required placeholder="Last Name" title="Last Name" value="<?= persisted('last_name'); ?>" />
                    </div>
                    <div class="flexcol100 input-field <?= invalid_form_element('email'); ?>">
                        <div class="error"><?= validate_form('email'); ?></div>
                        <input type="email" name="email" required placeholder="Email" title="Email" value="<?= persisted('email'); ?>" />
                    </div>
                    <div class="flexcol100 input-field <?= invalid_form_element('company_name'); ?>">
                        <div class="error"><?= validate_form('company_name'); ?></div>
                        <input type="text" name="company_name" required placeholder="Company Name" title="Company Name" value="<?= persisted('company_name'); ?>" />
                    </div>
                    <div class="flexcol100 input-field <?= invalid_form_element('password'); ?>">
                        <div class="error"><?= validate_form('password'); ?></div>
                        <input type="password" name="password" required placeholder="Password" title="Password" />
                    </div>
                    <div class="pw-criteria"></div>

                    <?php // <i class='far fa-check-circle mr5 success'></i> ?>
                    <div class="pw-hint" data-toggle="tooltip" data-html="true" title="

                    <div>at least 8 characters in length.</div>
                    <div></i>at least 1 lowercase letter.</div>
                    <div></i>has at least 1 uppercase letter.</div>
                    <div></i>has at least 1 number.</div>
                    <div></i>has at least 1 special character.</div>


                    "><span class="far fa-question-circle"></span></div>
                    <button type="submit" disabled class="fw btn btn-primary">Sign Up</button>
                    
                </form>
            </div>

        </div>
    </div>
    </div>
</div>