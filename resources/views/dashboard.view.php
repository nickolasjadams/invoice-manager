<?php
$title = 'Dashboard';
$css = [];
include 'partials/dashboard/beginlayout.view.php';
?>

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

