<?php

use App\Helpers\Session;

$title = 'Create Invoice';
$css = [];
$js = ['js/create-invoice.js'];
$heading = "Create Invoice";
include 'partials/dashboard/beginlayout.view.php';
?>

<?php

    d($errors);

	if (isset($errors['required_fields'])) {
		bs4_alert("danger", $errors['required_fields']);
	}

	
?>


<form class="settings-form" action="/send" method="POST">

    <div class="form-element">
        <label for="status">Status</label>
        <select name="status" id="status" required>
        <?php /* TODO Add draft editing features. Then uncomment this.
            <option value="draft" 
            
                if (isset($form_data['status'])) {
                    if ($form_data['status'] == 'draft')  {
                        echo 'selected';
                    }
                }
            ?>
            >Draft</option><?php */ ?>
            <option value="sent"
            <?php
                if (isset($form_data['status'])) {
                    if ($form_data['status'] == 'sent')  {
                        echo 'selected';
                    }
                }
            ?>
            >Sent</option>
            <!-- <option value="cancelled">Cancelled</option> -->
            <!-- <option value="unpaid">Unpaid</option> -->
        </select>
    </div>

    <div class="form-element">
        <label for="partner">Partner</label>
        <select name="partner" id="partner" required>
            <option disabled selected value>Select a Partner</option>
            <?php foreach($partners as $partner) : ?>
            <option value="<?= $partner->id(); ?>" 
            <?php
                if (isset($form_data['partner'])) {
                    if ($form_data['partner'] == $partner->id()) {
                        echo 'selected';
                    }
                }
            ?>><?= $partner->company_name; ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-element <?= invalid_form_element('total_amount'); ?>">
        <label for="total_amount">Total Amount <span><?= validate_form('total_amount'); ?></span></label>
        <input type="text" name="total_amount" id="total_amount" value="<?= persisted('total_amount'); ?>" required>
    </div>

    <div class="form-element <?= invalid_form_element('due_at'); ?>">
        <label for="due_at">Due Date <span><?= validate_form('due_at'); ?></span></label>
        <input type="date" name="due_at" id="due_at" value="<?= persisted('due_at'); ?>" required>
    </div>

    <div class="form-element <?= invalid_form_element('summary'); ?>">
        <label for="summary">Summary <span><?= validate_form('summary'); ?></span></label>
        <textarea name="summary" id="summary" required><?= persisted('summary'); ?></textarea>
    </div>

    <div class="form-element <?= invalid_form_element('admin_note'); ?>">
        <label for="admin_note">Admin Note (Private) <span><?= validate_form('admin_note'); ?></span></label>
        <textarea name="admin_note" id="admin_note"><?= persisted('admin_note'); ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send Invoice</button>

</form>



<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>