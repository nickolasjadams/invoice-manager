<?php
session_start();

use App\Helpers\Facades\Auth;
use App\Helpers\View;

$current_user = Auth::currentUser();
$account_incomplete = $current_user->accountIncomplete();

// TODO user auth session check should probably go in one place.
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    View::render('dashboard', [
        'user' => $user,
        'account_incomplete' => $account_incomplete
    ]);
} else {
    header('Location: /');
    exit;
}


