<?php

namespace App\Controllers;

use App\Helpers\View;
use App\Helpers\Session;
use App\Helpers\Status;
use App\Models\User;
use ReflectionClass;
use App\Helpers\Facades\Log;
use App\Models\Invoice;
use App\Helpers\DateTimeX as DateTime;

class InvoiceController
{
    public function __construct() {
        Session::check();
    }

    public function index() {
        if (Session::user()->isAdmin()) {
            $invoices = Invoice::all("due_at", "DESC");
            foreach($invoices as $invoice) {
                $invoice->due_at = DateTime::displayFormat($invoice->due_at);
            }
        } else {
            $invoices = Invoice::where('user_id', '=', Session::user()->id());
        }
        
        
        View::render('invoices', [
            'invoices' => $invoices,
            'admin' => Session::user()->isAdmin(),
            'successes' => Session::getSuccesses()
        ]);
    }

    public function show() {
        $invoice = $this->validateInvoice();
        $invoice->due_at = DateTime::displayFormat($invoice->due_at);


        View::render('invoice', [
            'user' => Session::user(),
            'invoice' => $invoice
        ]);

    }

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
    private function validateInvoice() {

        if (isset($_GET['id'])) {
            
            $invoice_id = sanitize($_GET['id']);
            
            if (is_numeric($invoice_id)) {

                if (isset(Invoice::where('id', '=', $invoice_id)[0])) {

                    $invoice = Invoice::where('id', '=', $invoice_id)[0];
                    $invoice = $invoice->joinUserInfo(1);

                    if (Session::user()->isAdmin() || Session::user()->id() === $invoice->user_id) {
                        return $invoice;
                    }
                }
                
            }
        }
        return null;
    }

    /**
     * Admin method. Shows form to create an invoice.
     */
    public function create() {

        // This should be optimized to select only the id and company name.
        // I'm running on a tight deadline, so I'll come back to that later.
        $partners = User::all();

        if (Session::user()->isAdmin()) {
            View::render('create', [
                'partners' => $partners,
                'errors' => Session::getErrors(),
                'successes' => Session::getSuccesses(),
                'form_data' => Session::getFormData()
            ]);
        } else {
            header("Location: /dashboard", 403);
            exit;
        }
        
    }

    /**
     * Admin method. Sends an invoice to a client.
     */
    public function send() {
        if (Session::user()->isAdmin()) {
            
            Session::clearErrors();
            Session::clearSuccesses();
            Session::clearFormData();
            Session::snapshotFormData();
            
            
            // required fields
            if (isset($_POST['status']) &&
            isset($_POST['partner']) &&
            isset($_POST['total_amount']) &&
            isset($_POST['due_at']) &&
            isset($_POST['summary']))
            {
                
                $_POST = array_map("sanitize", $_POST);



                // validate data

                $statusTypes = (new ReflectionClass(Status::class))->getConstants();

                if (!in_array($_POST['status'], $statusTypes)) {
                    Session::pushError('status', 'Must use a status from the selection. ');
                }

                
                // d($_POST['partner']);
                // d($partners);
                
                // see if partner exists in results.
                
                /**
                 * @return mixed
                 */
                function partner_exists() {
                    $partners = User::all();
                    foreach ($partners as $partner) {
                        if ($partner->id() == $_POST['partner']) {
                            return true;
                        }
                    }
                    return false;

                }
                
                if (!is_numeric($_POST['partner']) || !partner_exists()) {
                    Session::pushError('partner', 'Must use a partner from the selection.');
                }

                if (!is_numeric($_POST['total_amount'])) {
                    Session::pushError('total_amount', 'Must be a numeric value.');
                }

                // $date_regex = '/[\d]{2}\-[\d]{2}\-[\d]{4}/';
                $date_regex = '/[\d]{4}\-[\d]{2}\-[\d]{2}/';
                if (!preg_match($date_regex, $_POST['due_at'])) {
                    Session::pushError('due_at', 'Must be formatted \'mm/dd/yyyy\'.');
                }

                if (strlen($_POST['summary']) < 1) {
                    Session::pushError('summary', 'is a required field.');
                }

                if (count(Session::getErrors()) > 0) {
                    header("Location: /create");
                    exit;
                }


                Log::info("User {$_POST['partner']} has changed their company info.");
                Session::clearErrors();
                Session::clearFormData();
                Session::pushSuccess('invoice_created', 'Invoice has been saved/sent.');

                // TODO !!! Create the invoice in the database.

                Invoice::store($_POST);
                header("Location: /invoices");
                exit;


            } else {
                Session::pushError('required_fields', 'Please fill all required fields.');
                header("Location: /create");
                exit;
            }
            
                

        } else {
            header("Location: /dashboard", 403);
            exit;
        }
    }
}