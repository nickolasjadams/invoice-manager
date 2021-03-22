<?php

use App\Models\Invoice;
use App\Helpers\DateTimeX as DateTime;
use App\Helpers\View;
use App\Helpers\Session;

Session::check();


if (Session::user()->isAdmin()) {
    $invoices = Invoice::all();
    foreach($invoices as $invoice) {
        $invoice->due_at = DateTime::displayFormat($invoice->due_at);
    }
} else {
    $invoices = Invoice::where('user_id', '=', Session::user()->id());
}


View::render('invoices', [
    'invoices' => $invoices,
    'admin' => Session::user()->isAdmin(),
]);

