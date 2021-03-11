<?php
session_start();

use App\Models\User;

// TODO Sanitize input

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$company_name = $_POST['company_name'];
$password = $_POST['password'];
$hash_password = password_hash($password, PASSWORD_DEFAULT);

// TODO validate stuff. 
// if it's not good we'll need to go back
// We'll need to report the errors
// and write a url query to use with js
// the js will open the bootstrap modal
// and show which inputs have issues.

// TODO ensure user doesn't already exist

// header();

try {
    $user = new User;
    $user->create($first_name, $last_name, $email, $company_name, $hash_password);
    $user->save();
} catch (Exception $e) {
    // TODO head back if there was an issue
}

$_SESSION['user'] = $user;

header("Location: /dashboard");
