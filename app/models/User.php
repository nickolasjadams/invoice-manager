<?php

namespace App\Models;

use App\Helpers\Facades\Log;
use App\Models\Model;

use Database\Connection as DB;
use App\Helpers\Session;
use Exception;
use PDO;

class User extends Model
{

    private $password, $admin;

    public $id, $verified, $active, $email, $first_name, $last_name, $company_name, $logo,
        $phone, $address, $suite, $city, $state, $zip, $created_at;
        
    /**
     * Creates and returns a User object. Does not save to database.
     * Save to database by chaining the save method.
     *
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $email
     * @param  string $company_name
     * @param  string $password plaintext
     * @return User
     */
    public function create($first_name, $last_name, $email, $company_name, $hash_password) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->company_name = $company_name;
        $this->password = $hash_password;
        return $this;
    }
    
    /**
     * Save a user object with the minimum requirements from the create method
     * to the database.
     */
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
    
    /**
     * Returns the password.
     *
     * @return string Password
     */
    public function password() {
        return $this->password;
    }

    /**
     * Returns the verified status.
     *
     * @return bool verified
     */
    public function verified() {
        return ($this->verified) ? true : false;
    }

    /**
     * Admin function: verify a client.
     * @param mixed $id
     */
    public static function verify($id) {
        if (Session::user()->isAdmin() && is_numeric($id)) {
            $db = DB::make();
            $statement = $db->prepare(
                'UPDATE users ' .
                '   SET verified = 1' .
                '   WHERE id = ' . $id
            );
            $statement->execute();
            $db = null;
        }
    }

    public static function toggleActive($id) {
        if (Session::user()->isAdmin() && is_numeric($id)) {
            $db = DB::make();
            $fetchStatement = $db->prepare('SELECT active from users WHERE id = (:id)');
            $fetchStatement->bindParam(':id', $id);
            $fetchStatement->execute();
            $active_status = $fetchStatement->fetchAll(PDO::FETCH_ASSOC)[0]['active'];
            if ($active_status == 0) {
                $active_status = 1;
            } else {
                $active_status = 0;
            }

            $statement = $db->prepare(
                'UPDATE users ' .
                '   SET active = (:active)' .
                '   WHERE id = (:id)'
            );
            $statement->bindParam(':active', $active_status);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $db = null;
            return $active_status;
        }
    }

    /**
     * Returns the active status.
     *
     * @return bool active
     */
    public function active() {
        return ($this->active) ? true : false;
    }

        
    /**
     * Sets password on object and saves to database.
     *
     * @param  mixed $id
     * @param  string $password plaintext
     * @return void
     */
    public function setPassword($id, $password) {
        $password = htmlspecialchars($password);
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hash_password;
        $db = DB::make();
        $statement = $db->prepare(
            'UPDATE users ' .
            '   SET password = (:password)' .
            '   WHERE id = ' . $id
        );
        $statement->bindParam(":password", $this->password);
        $statement->execute();
        $db = null;
    }

    public function isAdmin() {
        return $this->admin;
    }
    
    /**
     * Updates company info on the object and saves to database.
     *
     * @param  mixed $form_data_array Assosiative array can be retrieved by post or session. email, first_name, last_name, company_name, phone, address, suite, city, state, zip
     * @return bool Returns true if successful
     */
    public function updateInfo($form_data_array) {

        // update this object
        foreach ($form_data_array as $key => $value) {
            if (array_key_exists($key, $form_data_array)) {
                $this->{$key} = $form_data_array[$key];
            }
        }

        $id = $this->id();
        $db = DB::make();
        $statement = $db->prepare(
            'UPDATE users ' .
            '   SET email = (:email), first_name = (:first_name), last_name = (:last_name), company_name = (:company_name),' .
            '       phone = (:phone), address = (:address), suite = (:suite), city = (:city), state = (:state), zip = (:zip)' .
            '   WHERE id = (:id)'
        );
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":first_name", $this->first_name);
        $statement->bindParam(":last_name", $this->last_name);
        $statement->bindParam(":company_name", $this->company_name);
        $statement->bindParam(":phone", $this->phone);
        $statement->bindParam(":address", $this->address);
        $statement->bindParam(":suite", $this->suite);
        $statement->bindParam(":city", $this->city);
        $statement->bindParam(":state", $this->state);
        $statement->bindParam(":zip", $this->zip);
        $statement->bindParam(":id", $this->id);
        $success = $statement->execute();
        $db = null;
        if (!$success) {
            Session::pushError('db_update', 'Error updating your account. Please try again later.');
            Log::error("User {$this->id()} account database could not be updated.");
            return false;
        }
        return true;
    }
    
    /**
     * Returns a boolean based on whether the company 
     * has filled out their additional information details:
     * Address, city, state, zip, and phone.
     *
     * @return bool
     */
    public function accountIncomplete() {
        try {
            return (
                $this->address == NULL ||
                $this->city    == NULL ||
                $this->state   == NULL ||
                $this->zip     == NULL ||
                $this->phone   == NULL
            );
        } catch (Exception $e) {
            Log::debug("accountIncomplete called on NULL user.");
        }
    }

    public static function exists($email) {
        $db = DB::make();
        $statement = $db->prepare("SELECT email FROM users WHERE email = (:email)");
        $statement->bindParam(':email', $email);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        d($users);
        $db = null;
        return (sizeof($users) > 0) ? true : false;
    }
}