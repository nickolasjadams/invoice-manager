<?php

namespace App\Controllers;

use App\Helpers\Facades\Log;
use App\Helpers\Session;
use App\Helpers\View;
use App\Models\User;

class MyAccountController
{

    public function __construct() {
        Session::check();
    }

    public function index() {

        View::render('my-account', [
            'user' => Session::user(),
            'errors' => Session::getErrors(),
            'successes' => Session::getSuccesses(),
            'form_data' => Session::getFormData()
        ]);
    }
    
    /**
     * Update the password of the current user.
     */
    public function updatePassword() {

        if (isset($_POST['old_password']) &&
            isset($_POST['new_password']) &&
            isset($_POST['confirm_password']))
        {
            $old_password = e($_POST['old_password']);
            $new_password = e($_POST['new_password']);
            $confirm_password = e($_POST['confirm_password']);

            $email = Session::user()->email;

            $user = User::where('email', '=', $email)[0];

            Session::clearErrors();
            Session::clearSuccesses();

            // Validate
            if (!password_verify($old_password, $user->password())) {
                Session::pushError('old_password', 'Incorrect password.');
            }
            if ($user->password() === $new_password) {
                Session::pushError('new_password', 'Cannot match old password.');
            }
            if ($new_password !== $confirm_password) {
                Session::pushError('confirm_password', 'Does not match new password.');
            }
            if (count(Session::getErrors()) > 0) {
                header("Location: /my-account");
                exit;
            }

            $user->setPassword($user->id(), $new_password);
            Log::info("User {$user->id()} has changed their password");
            Session::clearErrors();
            Session::pushSuccess('password_change', 'Password has been changed.');
            header("Location: /my-account");
            exit;

        }

    }

    public function updateInfo() {
        // required fields
        if (isset($_POST['email']) &&
            isset($_POST['first_name']) &&
            isset($_POST['last_name']) &&
            isset($_POST['company_name']))
        {
            $_POST = array_map("sanitize", $_POST);
            $email = $_POST['email'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $company_name = $_POST['company_name'];
            if (isset($_POST['address'])) { 
                $address = $_POST['address'];
            }
            if (isset($_POST['suite'])) { 
                $suite = $_POST['suite'];
            }
            if (isset($_POST['city'])) { 
                $city = $_POST['city'];
            }
            if (isset($_POST['state'])) { 
                $state = $_POST['state'];
            }
            if (isset($_POST['zip'])) { 
                $zip = $_POST['zip'];
            }

            $email = Session::user()->email;

            $user = User::where('email', '=', $email)[0];

            Session::clearErrors();
            Session::clearSuccesses();

            

            // Validate
            $email_regex = '/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/m';
            if (!preg_match($email_regex, $email)) {
                Session::pushError('email', 'Not a valid email format.');
            }
            if (strlen($first_name) > 50) {
                Session::pushError('first_name', 'Must be 50 or less characters.');
            }
            if (strlen($last_name) > 50) {
                Session::pushError('last_name', 'Must be 50 or less characters.');
            }
            if (strlen($company_name) > 50) {
                Session::pushError('company_name', 'Must be 50 or less characters.');
            }
            if (isset($state)) {
                if (strlen($state) != 2) {
                    Session::pushError('state', 'Select a state from the dropdown.');
                }
            }
            if ($zip != "") {
                if (strlen($zip) !== 5 || !preg_match('/[0-9]{5}/', $zip)) {
                    Session::pushError('zip', 'Must be 5 digits.');
                }
            }
            if (count(Session::getErrors()) > 0) {
                header("Location: /my-account");
                exit;
            }

            Session::snapshotFormData();
            $user->updateInfo(Session::getFormData());
            Session::updateUser($user);

            Log::info("User {$user->id()} has changed their company info.");
            Session::clearErrors();
            Session::pushSuccess('info_change', 'Company Info has been updated.');
            header("Location: /my-account");
            exit;


        }

    }

    public function updateLogo() {

    }

    private function saveLogoToFS() {

    }

    private function saveLogoToS3() {

    }
}