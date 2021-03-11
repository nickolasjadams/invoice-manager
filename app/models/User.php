<?php

namespace App\Models;

use App\Helpers\Facades\Log;
use App\Models\Model;

use Database\Connection as DB;
use Exception;
use App\Helpers\Facades\Auth;

class User extends Model
{

    private $password;
    
    protected $id, $admin, $verified, $active;

    public $email, $first_name, $last_name, $company_name, $logo,
        $phone, $address, $suite, $city, $state, $zip, $created_at;
    
    public function create($first_name, $last_name, $email, $company_name, $password) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->company_name = $company_name;
        $this->password = $password;
        return $this;
    }

    public function save() {
        $db = DB::make();
        $statement = $db->prepare(
            'INSERT INTO users ' .
            '       (first_name, last_name, email, company_name, password)' .
            "VALUES ((:first_name), (:last_name), (:email), (:company_name), (:password));"
        );
        $statement->bindParam(":first_name", $this->first_name);
        $statement->bindParam(":last_name", $this->last_name);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":company_name", $this->company_name);
        $statement->bindParam(":password", $this->password);
        $statement->execute();
        $db = null;
    }

    public function password() {
        return $this->password;
    }

    public function accountIncomplete() {
        try {
            return (
                Auth::currentUser()->address == NULL ||
                Auth::currentUser()->suite   == NULL ||
                Auth::currentUser()->city    == NULL ||
                Auth::currentUser()->state   == NULL ||
                Auth::currentUser()->zip     == NULL ||
                Auth::currentUser()->phone   == NULL ||
                Auth::currentUser()->logo    == NULL
            );
        } catch (Exception $e) {
            Log::debug("accountIncomplete called on NULL user.");
        }
        

    }
}