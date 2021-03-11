<?php

use App\Models\User;

session_start();

// TODO Sanitize input

$email = $_POST['email'];
$password = $_POST['password'];

$user_search = User::where('email', '=', $email);

// Try to find a matching user.
if (count($user_search) === 0) {
    echo '<div>no user found<div>';
    echo "<img src='https://media.tenor.com/images/b9d6a7ed15a2865b1a058eaa42826cb7/tenor.gif'>";  
    die();
}

// Check the password.
$user = $user_search[0];
if (password_verify($password, $user->password())) {
    $_SESSION['user'] = $user;
    header('Location: /dashboard');
    exit;
    die();
} else {
    echo 'password mismatch';
    echo '<img src="https://media1.tenor.com/images/c8c06e5efd412a8e8c6b14f1748c6185/tenor.gif">';
    die();
    
}  

