<?php
$title = 'Invoice';
$css = [];
$js = [];
$back = "/invoices";
include 'partials/dashboard/beginlayout.view.php';
?>

<section class="invoice-wrapper">

    <div class="invoice-header">
        <div class="left">
            <h2>Company Name</h2>
            <address>
                address1<br>
                phone<br>
                website
            </address>
        </div>
        <div class="right">
            <table class="invoice-info">
                <tr>
                    <td>ID:</td>
                    <td>0000X</td>
                </tr>
                <tr>
                    <td>Amount:</td>
                    <td>$500.00</td>
                </tr>
                <tr>
                    <td>Due:</td>
                    <td>0x/30/2021</td>
                </tr>
            </table>
        </div>
    </div>
    

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