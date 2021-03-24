<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\User;
use Database\Connection as DB;
use PDO;

class APIController
{

    /**
     * Private session call. Returns non-admin users.
     * 
     * @return json
     */
    public function partners() {
        Session::check();
        header('Content-Type: application/json');

        if (isset($_REQUEST['id'])) {
            $id = sanitize($_REQUEST['id']);
            if (is_numeric($id)) {
                echo json_encode(User::where('id', '=', $id));
            }
        } else {
            echo json_encode(User::where('admin', '<>', '1'));
        }

    }

    /**
     * Public call. Returns non-admin users.
     * @param url_param verified : bool 
     * @param url_param active : bool
     * 
     * @return json
     */
    public function publicPartners() {

        $params = $this->partnersParameters();
        
        header('Content-Type: application/json');

        $partners = User::where('admin', '<>', '1');

        $verified_num = 0;
        $active_num = 0;

        if (isset($params['verified'])) {
            if ($params['verified'] == true) {
                $verified_num = 1;
            }
        }
        if (isset($params['active'])) {
            if ($params['active'] == true) {
                $active_num = 1;
            }
        }
        
        $db = DB::make();
        $statement = $db->prepare(
            "SELECT company_name, logo, created_at, verified, active FROM users" .
            "   WHERE admin  <> 1" .
            "   AND verified >= {$verified_num}" .
            "   AND active   >= {$active_num}"
        );
        // bind params not necessary because the input comes from myself.
        $statement->execute();
        $partners = $statement->fetchAll(PDO::FETCH_ASSOC);
        $db = null;

        echo json_encode($partners);

    }

    private function partnersParameters() {
        $params = [];
        if (isset($_REQUEST['verified'])) {
            $params['verified'] = $_REQUEST['verified'];
        }
        if (isset($_REQUEST['active'])) {
            $params['active'] = $_REQUEST['active'];
        }
        return $params;
    }

    public function verify() {
        Session::check();
        if (isset($_POST['id'])) {
            if (is_numeric($_POST['id'])) {
                User::verify($_POST['id']);
            }
        }
    }

    public function toggleActive() {
        Session::check();
        header('Content-Type: application/json');
        if (isset($_POST['id'])) {
            if (is_numeric($_POST['id'])) {
                echo json_encode(User::toggleActive($_POST['id']));
            }
        }
    }
}
