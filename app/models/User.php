<?php

namespace App\Models;

use Database\Connection as DB;
use PDO;

class User
{

    protected 
        $id, $email, $pw, $fname, $lname, $company, $logo,
        $phone, $address, $suite, $city, $state, $zip, 
        $admin, $verified, $active, $created_at;

    // public function __construct($email, $pw, $fname, $lname, $company) {

        
        
    // }


    public static function all() {
        $db = DB::make();

        $statement = $db->prepare('select * from users');
        $statement->execute();
        // return $statement->fetchAll(PDO::FETCH_OBJ);
        return $statement->fetchAll(PDO::FETCH_CLASS, User::class);



        // $db = null;
    }
}