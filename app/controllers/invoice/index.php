<?php

use App\Models\Invoice;
use App\Helpers\DateTimeX as DateTime;
use App\Helpers\View;


// (new Invoice)->create(DateTime::dbFormat(6,10,2021), 3500, 3500)->save();

// TODO logic to check if this is an admin or not. If not then use where to grab user specific invoices.
$invoices = Invoice::all();
foreach($invoices as $invoice) {
    $invoice->due_at = DateTime::displayFormat($invoice->due_at);
}

View::render('invoices', [
    'invoices' => $invoices
]);

