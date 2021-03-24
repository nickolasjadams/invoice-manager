<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Helpers\View;
use App\Models\User;

class PartnersController
{
    
    public function __construct() {
        Session::check();
    }

    /**
     * Admin Method - Manage Partners page
     */
    public function index() {

        $user = Session::user();

        if ($user->isAdmin()) {

            $partners = User::where('admin', '=', '0');

            $partners_json = json_encode($partners);

            View::render('partners', [
                'user' => $user,
                'partners' => $partners,
                'partners_json' => $partners_json,
                // 'errors' => Session::getErrors(),
                // 'successes' => Session::getSuccesses(),
                // 'form_data' => Session::getFormData()
            ]);
        } else {
            header('Location: /dashboard', 403);
            exit;
        }

        

    }


}