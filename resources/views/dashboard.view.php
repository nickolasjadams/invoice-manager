<?php
use App\Helpers\Session;
$title = 'Dashboard';
$css = [];
$js = [];
$heading = "Welcome {$user->company_name}";
include 'partials/dashboard/beginlayout.view.php';
?>

	<?php if ($account_incomplete && !Session::user()->isAdmin()): ?>
	<div class="incomplete-account">
		<i class="fas fa-exclamation-circle"></i>
		You haven't finished your account.  Please <a href="/my-account">complete your account</a> now.
	</div>
	<?php endif ?>


	<h1>Dashboard</h1>

	<?php
		if (Session::user()->isAdmin()) {
			echo "Overdue: " . sizeof($overdue);
		} else {
			echo "Upcoming: " . sizeof($upcoming);
		}
	?>

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
	

<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>