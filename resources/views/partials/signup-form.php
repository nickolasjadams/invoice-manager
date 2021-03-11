<!-- Signup modal -->
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
                    <div class="flexcol50 input-field">
                        <input type="text" name="first_name" required placeholder="First Name" title="First Name" />
                    </div>
                    <div class="flexcol50 input-field">
                        <input type="text" name="last_name" required placeholder="Last Name" title="Last Name" />
                    </div>
                    <div class="flexcol100 input-field">
                        <input type="email" name="email" required placeholder="Email" title="Email" />
                    </div>
                    <div class="flexcol100 input-field">
                        <input type="text" name="company_name" required placeholder="Company Name" title="Company Name" />
                    </div>
                    <div class="flexcol100 input-field">
                        <input type="password" name="password" required placeholder="Password" title="Password" />
                    </div>
                    <div class="pw-criteria"></div>
                    <div class="pw-hint" data-toggle="tooltip" data-html="true" title="

                    <div><i class='far fa-check-circle mr5 success'></i>at least 8 characters in length.</div>
                    <div><i class='far fa-times-circle mr5 danger'></i>at least 1 lowercase letter.</div>
                    <div><i class='far fa-times-circle mr5 danger'></i>has at least 1 uppercase letter.</div>
                    <div><i class='far fa-times-circle mr5 danger'></i>has at least 1 number.</div>
                    <div><i class='far fa-times-circle mr5 danger'></i>has at least 1 special character.</div>


                    "><span class="far fa-question-circle"></span></div>
                    <button type="submit" disabled class="fw btn btn-primary">Sign Up</button>
                    
                </form>
            </div>

        </div>
    </div>
    </div>
</div>