<?php

use App\Helpers\Facades\Auth;
use App\Helpers\View;
use App\Helpers\Session;

Session::check();

$current_user = Auth::currentUser();
$account_incomplete = $current_user->accountIncomplete();


$user = $_SESSION['user'];
View::render('dashboard', [
    'user' => $user,
    'account_incomplete' => $account_incomplete
]);


