<?php
$title = 'Invoice';
$css = [];
$js = [];
$back = "/invoices";
include 'partials/dashboard/beginlayout.view.php';
?>

<section class="invoice-wrapper">

    <?php if ($invoice === null) : ?>
        <p>No invoice to display.</p>
    
    <?php else : ?>

        

        <div class="invoice-header">
            <div class="left">
                <div><strong>From: </strong></div>
                <div>Nick Adams</div>
                <address>
                    123 NotMyRealAddress St.<br>
                    Boise ID, 83706
                </address>
                <div class="status"><?= $invoice->status; ?></div>
            </div>
            <div class="right">
                <div><strong>To: </strong></div>
                <div><?= $invoice->company_name; ?></div>
                <address>    
                    <!-- 
                        This is a scenario where break tags are appropriate.
                     -->
                    <?= ($invoice->address != null) ? $invoice->address . '<br>' : ''; ?>
                    <?= ($invoice->suite != null) ? $invoice->suite . '<br>' : ''; ?>
                    <?php if (isset($invoice->city) && isset($invoice->state) && isset($invoice->zip)) {
                        echo "{$invoice->city} {$invoice->state}, {$invoice->zip}<br>";
                    }
                    ?>
                    <?= ($user->phone != null) ? $user->phone . '<br>' : ''; ?>
                </address>
                <table class="invoice-info">
                    <tr>
                        <td>ID:</td>
                        <td>
                            <?php
                            // TODO: would like to prepend zeros.  Will do that later with code I wrote earlier this semester. 0000X
                            echo $invoice->id();
                            ?>
                            </td>
                    </tr>
                    <tr>
                        <td>Amount:</td>
                        <td>$<?= $invoice->total_amount ?></td>
                    </tr>
                    <tr>
                        <td>Due:</td>
                        <td><?= $invoice->due_at; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="invoice-body">
            <!-- Stretch goals. Line items go here. -->

            
            <div class="summary mt20">
                <div>Summary: </div>
                <?= $invoice->summary; ?>
            </div>
        </div>


    <?php endif ?>

    
    

</section>


<section class="stripe-wrapper">
    
    <p>Pay</p>

    <button id="stripe-more">
        <i class="fas fa-chevron-up"></i>
    </button>


</section>




<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>