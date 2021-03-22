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

	<p>Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Reprehenderit, vero! Provident debitis exercitationem ipsum, dolorum vero ad ipsam nostrum? Odio officia, adipisci perspiciatis eaque vel explicabo illum nihil libero veritatis.</p>
	

<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>