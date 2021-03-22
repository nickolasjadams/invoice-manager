<?php

namespace App\Models;

use App\Models\Model;
use Database\Connection as DB;

abstract class Status {
    const DRAFT     = 'draft';
    const SENT      = 'sent';
    const CANCELLED = 'cancelled';
    const UNPAID    = 'unpaid';
}

class Invoice extends Model
{
    
    protected $id;

    public $user_id, $status, $due_at, $subtotal_amount, $discount, $taxes,
        $total_amount, $summary, $admin_note, $client_note;
    
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

}