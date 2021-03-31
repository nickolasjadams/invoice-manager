<?php

namespace App\Models;

use App\Models\Model;
use Database\Connection as DB;
use PDO;

class Invoice extends Model
{
    
    protected $id;

    public $user_id, $status, $due_at, $subtotal_amount, $discount, $taxes,
        $total_amount, $summary, $admin_note, $client_note;

    // user specific details
    public $company_name, $name, $email, $phone, $address, $suite, $city, $state, $zip;




    public static function store($post) {
        // dd($post);
        $db = DB::make();
        $statement = $db->prepare(
            'INSERT INTO invoices ' .
            '       (user_id, status, due_at, subtotal_amount, total_amount, summary, admin_note)' .
            "VALUES ((:user_id), (:status), (:due_at), (:subtotal_amount), (:total_amount), (:summary), (:admin_note));"
        );
        $statement->bindParam(":user_id", $post['partner']);
        $statement->bindParam(":status", $post['status']);
        $statement->bindParam(":due_at", $post['due_at']);
        $statement->bindParam(":subtotal_amount", $post['total_amount']); // no default value. Make it the same as the total.
        $statement->bindParam(":total_amount", $post['total_amount']);
        $statement->bindParam(":summary", $post['summary']);
        $statement->bindParam(":admin_note", $post['admin_note']);
        $statement->execute();

        // $error = $statement->errorInfo();
        // dd($error);
        $db = null;
    }
    
    public function create($due_at, $subtotal_amount, $total_amount) {
        $this->due_at = $due_at;
        $this->subtotal_amount = $subtotal_amount;
        $this->total_amount = $total_amount;
        return $this;
    }

    public function save() {
        $db = DB::make();
        $statement = $db->prepare(
            'INSERT INTO invoices ' .
            '       (due_at, subtotal_amount, total_amount)' .
            "VALUES ((:due_at), (:subtotal_amount), (:total_amount));"
        );
        $statement->bindParam(":due_at", $this->due_at);
        $statement->bindParam(":subtotal_amount", $this->subtotal_amount);
        $statement->bindParam(":total_amount", $this->total_amount);
        $statement->execute();
        $db = null;
    }

    public function companyName($user_id = null) {
        if ($user_id === null) {
            $user = $this->user;
        }
        $user = User::where('id', '=', $user_id)[0];
        return $user->company_name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function joinUserInfo($user_id) {
        $db = DB::make();
        $statement = $db->prepare(
            "SELECT " .
            "company_name, CONCAT(first_name, ' ', last_name) as name, email, phone, address, suite, city, state, zip FROM users " .
            "WHERE users.id = (:user_id);"
        );
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();
        $user = $statement->fetchAll(PDO::FETCH_ASSOC)[0];
        $this->company_name = $user['company_name'];
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->phone = $user['phone'];
        $this->address = $user['address'];
        $this->suite = $user['suite'];
        $this->city = $user['city'];
        $this->state = $user['state'];
        $this->zip = $user['zip'];
        $db = null; // close connection
        return $this;
    }

}