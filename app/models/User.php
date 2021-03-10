<?php

namespace App\Models;

use App\Models\Model;

class User extends Model
{

    private $password;
    
    protected $id, $admin, $verified, $active;

    public
        $email,
        $first_name, $last_name,
        $company_company,
        $logo,
        $phone,
        $address, $suite, $city, $state, $zip, 
        $created_at;

}