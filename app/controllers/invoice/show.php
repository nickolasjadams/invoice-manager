<?php

use App\Helpers\View;
use App\Helpers\Session;
use App\Models\Invoice;
use App\Helpers\DateTimeX as DateTime;

Session::check();



$invoice = validateInvoice();
$invoice->due_at = DateTime::displayFormat($invoice->due_at);

View::render('invoice', [
    'user' => Session::user(),
    'invoice' => $invoice
]);

/**
 * Checks the id set in GET is
 * - set
 * - is a number
 * - exists
 * - the user is allowed to see it
 * Returns the Invoice if valid. Otherwise returns null.
 * 
 * @return Invoice
 */
function validateInvoice() {

    if (isset($_GET['id'])) {
        
        $invoice_id = sanitize($_GET['id']);
        
        if (is_numeric($invoice_id)) {

            if (isset(Invoice::where('id', '=', $invoice_id)[0])) {
                $invoice = Invoice::where('id', '=', $invoice_id)[0];
                if (Session::user()->isAdmin() || Session::user()->id() === $invoice->user_id) {
                    return $invoice;
                }
            }
            
        }
    }
    return null;
}