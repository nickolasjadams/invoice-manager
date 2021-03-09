<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Partner Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="css/styles.css">

	<meta name="msapplication-TileImage" content="https://florist.frb.io/images/favicons/win8-tile-144.png"/>
	<meta name="msapplication-TileColor" content="#1f379d"/>
	
	<link rel="shortcut icon" href="https://florist.frb.io/images/favicons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="https://florist.frb.io/images/favicons/apple-touch-icon-192x192.png" sizes="192x192">
</head>
<body class="login">


	<main>
		<section class="intro">

			<img class="logo" src="https://nickjadams.com/images/logo.png" alt="Nick Adams Logo">
			<h1>Partnership Service Manager</h1>
			<!-- <p>Still need to update signup tooltip</p> -->

		</section>

		<section class="form-wrapper">
			
			<form action="a.php">
				<input type="text" required placeholder="Username" title="Username" />
				<input type="password" required placeholder="Password" title="Password" />
				<button class="fw mb20 btn btn-primary" type="submit">Log in</button>
			</form>
			<a href="#" class="block tar">Forgot password?</a>

			<hr>

			<button type="button" class="fw tac btn btn-primary"  data-toggle="modal" data-target="#signupModal">Create an Account</a>
		</section>
	</main>


	<footer>
		&copy; 2021 Nick Adams 
	</footer>


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
					<form action="#" class="row">
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



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/login.js"></script>
</body>
</html>

