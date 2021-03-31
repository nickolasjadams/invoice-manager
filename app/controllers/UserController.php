<?php

namespace App\Controllers;

use App\Helpers\Facades\Log;
use App\Helpers\Session;
use App\Models\User;
use Exception;

class UserController
{

    public function __construct() {
        session_start();
    }

    public function index() {

        Session::clearErrors();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_search = User::where('email', '=', $email);

        // Try to find a matching user.
        if (count($user_search) === 0) {
            Session::pushError('login_mismatch', 'Incorrect email or password.');
            header('Location: /login');
            exit;
        }

        // Check the password.
        $user = $user_search[0];
        if (password_verify($password, $user->password())) {
            Session::clearErrors();
            $_SESSION['user'] = $user;
            header('Location: /dashboard');
            exit;
        } else {
            Session::pushError('login_mismatch', 'Incorrect email or password.');
            header('Location: /login');
            exit;
            
        }



    }

    public function store() {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $company_name = $_POST['company_name'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);


        // dd(password_verify($password, $hash_password));

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
            // dd($user);
            $user->save();
        } catch (Exception $e) {
            // TODO head back if there was an issue
            dd("what happened" . $e);
        }

        $_SESSION['user'] = $user;

        header("Location: /dashboard");


    }
}