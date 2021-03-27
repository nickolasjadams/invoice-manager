<?php

use App\Helpers\Session;

if (isset($_SESSION['user'])) {
	header("Location: /dashboard");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Partner Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="css/styles.css">

	<meta name="msapplication-TileImage" content="/images/favicons/win8-tile-144.png"/>
	<meta name="msapplication-TileColor" content="#1f379d"/>
	
	<link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/favicons/apple-touch-icon-192x192.png" sizes="192x192">
</head>
<body class="login">

	<main>
		<section class="intro">

			<img class="logo" src="/images/logo.png" alt="Nick Adams Logo">
			<h1>Partnership Service Manager</h1>
			<!-- <p>Still need to update signup tooltip</p> -->

		</section>

		<section class="form-wrapper">

			<?php

				if (isset($errors['login_mismatch'])) {
					bs4_alert("danger", $errors['login_mismatch']);
				}

				include 'partials/login/login-form.view.php';
				echo '<hr>';
				echo '<button type="button" class="fw tac btn btn-primary"  data-toggle="modal" data-target="#signupModal">Create an Account</a>';
			?>
			
		</section>
	</main>


	<footer>
		&copy; 2021 Nick Adams 
	</footer>


	<?php
		include 'partials/login/signup-form.view.php';
	?>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/login.js"></script>
</body>
</html>

<?php
Session::clearErrors();
?>