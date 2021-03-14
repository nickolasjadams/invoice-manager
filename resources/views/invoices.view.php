<?php
$title = 'View Invoices';
$css = [];
$js = [];
$heading = "Invoices";
include 'partials/dashboard/beginlayout.view.php';
?>



<table>
    <tr>
        <th>Status</th>
        <th>ID</th>
        <th>Due</th>
        <th>Amount</th>
        <th>Summary</th>
    </tr>

    <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td><?= ucfirst($invoice->status); ?></td>
            <td><a href="invoice?id=<?= $invoice->id(); ?>"><?= $invoice->id(); ?></a></td>
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