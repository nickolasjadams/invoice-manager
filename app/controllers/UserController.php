<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\User;

class UserController
{

    public function __construct() {
        session_start();
    }

    public function index() {

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



    }

    public function store() {

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


    }
}