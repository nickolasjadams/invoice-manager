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
                <h2><?= $user->company_name; ?></h2>
                <address>
                    <!-- 
                        This is a scenario where break tags are appropriate.
                     -->
                    <?= ($user->address != null) ? $user->address . '<br>' : ''; ?>
                    <?= ($user->suite != null) ? $user->suite . '<br>' : ''; ?>
                    <?php if (isset($user->city) && isset($user->state) && isset($user->zip)) {
                        echo "{$user->city} {$user->state}, {$user->zip}<br>";
                    }
                    ?>
                    <?= ($user->phone != null) ? $user->phone . '<br>' : ''; ?>
                </address>
            </div>
            <div class="right">
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