<?php

use App\Helpers\Session;

$title = 'View Invoices';
$css = [];
$js = [];
$heading = "Invoices";
include 'partials/dashboard/beginlayout.view.php';

if (isset($successes['invoice_created'])) {
    bs4_alert("success", $successes['invoice_created']);
}
?>

<table class="invoices <?= (Session::user()->isAdmin()) ? 'admin' : ''; ?>">
    <tr>
        <th>Status</th>
        <th>ID</th>
        <?= $admin ? '<th>Company</th>' : ''; ?>
        <th>Due</th>
        <th>Amount</th>
        <th>Summary</th>
    </tr>

    <?php if (sizeof($invoices) === 0) : ?>
        <tr><td colspan="5"><p class="mb0 p30 tac">No invoices found.</p></td></tr>
    <?php endif ?>

    <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td><?php status_tag($invoice->transformStatus()); ?></td>
            <td><a href="invoice?id=<?= $invoice->id(); ?>"><?= $invoice->id(); ?></a></td>
            <?= $admin ? "<td>{$invoice->companyName($invoice->user_id)}</td>" : ''; ?>
            <td><?= $invoice->due_at; ?></td>
            <td>$<?= $invoice->total_amount; ?></td>
            <td><?= $invoice->summary; ?></td>
        </tr>
    <?php endforeach ?>

</table>

	
	

<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>