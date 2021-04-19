<?php

use App\Helpers\Facades\Auth;
use App\Helpers\View;
use App\Helpers\Session;
use App\Models\Invoice;
use Database\Connection as DB;

Session::check();

$current_user = Auth::currentUser();
$account_incomplete = $current_user->accountIncomplete();



$now = date("Y-m-d") . ' 00:00:00';
$overdue = Invoice::where('due_at', '<', $now); // admin

// need to hceck status, total amount, and user_id

$db = DB::make();
$sql  = "SELECT * FROM invoices" .
        " WHERE status = 'sent'" .
        " AND total_amount > '0.00'" .
        " AND user_id = '" . Session::user()->id() . "';";
$statement = $db->prepare($sql);
$statement->execute();
$upcoming = $statement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Invoice');
$db = null; // close connection




$user = $_SESSION['user'];
View::render('dashboard', [
    'user' => $user,
    'overdue' => $overdue,
    'upcoming' => $upcoming,
    'account_incomplete' => $account_incomplete
]);


