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
	

<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>