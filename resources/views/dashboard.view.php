<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="css/styles.css">

	<meta name="msapplication-TileImage" content="/images/favicons/win8-tile-144.png"/>
	<meta name="msapplication-TileColor" content="#1f379d"/>
	
	<link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/favicons/apple-touch-icon-192x192.png" sizes="192x192">
</head>
<body class="loggedin">

	<ul class="skip-nav">
		<li><a href="#main-wrapper">Skip to Main Content</a></li>
	</ul>

	<button id="nav-toggle"><i class="fas fa-bars"></i></button>
	<nav id="main-nav" class="sidenav">
		<img class="logo" src="/images/logo.png" alt="Logo">
		<ul>
			<li class="active"><a href="/dashboard"><i class="fas fa-chart-line" title="Dashboard"></i><span class="word">Dashboard</span></a></li>
			<li><a href="invoices.html"><i class="fas fa-envelope-open-text" title="Invoices"></i><span class="word">Invoices</span></a></li>
			<li><a href="myaccount.html"><i class="fas fa-user-circle" title="My Account"></i><span class="word">My Account</span></a></li>
			<li><a href="/logout"><i class="fas fa-power-off" title="Logout"></i><span class="word">Logout</span></a></li>
		</ul>
	</nav>

	<div id="main-wrapper">


		<main>

			<header class="header-bar">
				<h1>Welcome <?= $user->company_name ?></h1>
			</header>

			<section class="content">
				<?php
				if ($account_incomplete) { 
				?>
				<div class="incomplete-account">
					<i class="fas fa-exclamation-circle"></i>
					You haven't finished your account.  Please <a href="myaccount.html">complete your account</a> now.
				</div>
				<?php
				}
				?>


				<h1>Dashboard</h1>

				<p>Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Reprehenderit, vero! Provident debitis exercitationem ipsum, dolorum vero ad ipsam nostrum? Odio officia, adipisci perspiciatis eaque vel explicabo illum nihil libero veritatis.</p>

				<!-- <div class="boxes">

					<div class="box half">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/lMJvDi0KNlM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>

					<div class="box quarter">
						<img src="https://images.unsplash.com/photo-1492370284958-c20b15c692d2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1587&q=80" alt="">
					</div>

					<div class="box quarter">
						Hello World
					</div>

				</div> -->

			</section>

		</main>


		<footer>
			&copy; 2021 Nick Adams 
		</footer>

	</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>

