<?php
$title = 'My Account';
$css = [];
$js = [];
$heading = "Settings";
include 'partials/dashboard/beginlayout.view.php';
?>

	

	<?php

	if (isset($errors['db_update'])) {
		bs4_alert("danger", $errors['db_update']);
	}
	if (isset($successes['password_change'])) {
		bs4_alert("success", $successes['password_change']);
	}
	if (isset($successes['info_change'])) {
		bs4_alert("success", $successes['info_change']);
	}

	
	?>

	<h2>Change Password</h2>
	<form class="settings-form" action="/my-account-password" method="POST">
		<div class="form-element <?= invalid_form_element('old_password'); ?>">
			<label for="old_password">Old Password <span>* <?= validate_form('old_password'); ?></span></label>
			<input type="password" name="old_password" id="old_password" required>
		</div>
		<div class="form-element <?= invalid_form_element('new_password'); ?>">
			<label for="new_password">New Password <span>* <?= validate_form('new_password'); ?></span></label>
			<input type="password" name="new_password" id="new_password" required>
		</div>
		<div class="form-element <?= invalid_form_element('confirm_password'); ?>">
			<label for="confirm_password">Confirm Password <span>* <?= validate_form('confirm_password'); ?></span></label>
			<input type="password" name="confirm_password" id="confirm_password" required>
		</div>
		<button type="submit" class="btn btn-primary">Update Password</button>
	</form>

	<hr>

	<h2>Company Info</h2>
	<form class="settings-form" action="/my-account-info" method="POST">
		<div class="form-element <?= invalid_form_element('email'); ?>">
			<label for="email">Email <span>* <?= validate_form('email'); ?></span></label>
			<input type="email" name="email" id="email" value="<?= persisted_or_stored('email', $user->email, ); ?>" required>
		</div>

		<div class="form-element <?= invalid_form_element('first_name'); ?>">
			<label for="first_name">First Name <span>* <?= validate_form('first_name'); ?></span></label>
			<input type="text" name="first_name" id="first_name" value="<?= persisted_or_stored('first_name', $user->first_name); ?>" required>
		</div>

		<div class="form-element <?= invalid_form_element('last_name'); ?>">
			<label for="last_name">Last Name <span>* <?= validate_form('last_name'); ?></span></label>
			<input type="text" name="last_name" id="last_name" value="<?= persisted_or_stored('last_name', $user->last_name); ?>" required>
		</div>

		<div class="form-element <?= invalid_form_element('company_name'); ?>">
			<label for="company_name">Company Name <span>* <?= validate_form('company_name'); ?></span></label>
			<input type="text" name="company_name" id="company_name" value="<?= persisted_or_stored('company_name', $user->company_name); ?>" required>
		</div>

		<div class="form-element <?= invalid_form_element('phone'); ?>">
			<label for="phone">Phone <span>* <?= validate_form('phone'); ?></span></label>
			<input type="text" name="phone" id="phone" value="<?= persisted_or_stored('phone', $user->phone); ?>" required>
		</div>

		<div class="form-element <?= invalid_form_element('address'); ?>">
			<label for="address">Address <span><?= validate_form('address'); ?></span></label>
			<input type="text" name="address" id="address" value="<?= persisted_or_stored('address', $user->address); ?>">
		</div>

		<div class="form-element <?= invalid_form_element('suite'); ?>">
			<label for="suite">Apartment/Suite/Other <span><?= validate_form('suite'); ?></span></label>
			<input type="text" name="suite" id="suite" value="<?= persisted_or_stored('suite', $user->suite); ?>">
		</div>

		<div class="form-element <?= invalid_form_element('city'); ?>">
			<label for="city">City <span><?= validate_form('city'); ?></span></label>
			<input type="text" name="city" id="city" value="<?= persisted_or_stored('city', $user->city); ?>">
		</div>

		<div class="form-element">
			<label for="state">State</label>
			<select name="state" id="state">
				<option value="" disabled <?= ($user->state == '') ? 'selected' : ''; ?>>Select a State</option>
				<option value="AL" <?= ($user->state == 'AL') ? 'selected' : ''; ?>>Alabama</option>
				<option value="AK" <?= ($user->state == 'AK') ? 'selected' : ''; ?>>Alaska</option>
				<option value="AZ" <?= ($user->state == 'AZ') ? 'selected' : ''; ?>>Arizona</option>
				<option value="AR" <?= ($user->state == 'AR') ? 'selected' : ''; ?>>Arkansas</option>
				<option value="CA" <?= ($user->state == 'CA') ? 'selected' : ''; ?>>California</option>
				<option value="CO" <?= ($user->state == 'CO') ? 'selected' : ''; ?>>Colorado</option>
				<option value="CT" <?= ($user->state == 'CT') ? 'selected' : ''; ?>>Connecticut</option>
				<option value="DE" <?= ($user->state == 'DE') ? 'selected' : ''; ?>>Delaware</option>
				<option value="DC" <?= ($user->state == 'DC') ? 'selected' : ''; ?>>District Of Columbia</option>
				<option value="FL" <?= ($user->state == 'FL') ? 'selected' : ''; ?>>Florida</option>
				<option value="GA" <?= ($user->state == 'GA') ? 'selected' : ''; ?>>Georgia</option>
				<option value="HI" <?= ($user->state == 'HI') ? 'selected' : ''; ?>>Hawaii</option>
				<option value="ID" <?= ($user->state == 'ID') ? 'selected' : ''; ?>>Idaho</option>
				<option value="IL" <?= ($user->state == 'IL') ? 'selected' : ''; ?>>Illinois</option>
				<option value="IN" <?= ($user->state == 'IN') ? 'selected' : ''; ?>>Indiana</option>
				<option value="IA" <?= ($user->state == 'IA') ? 'selected' : ''; ?>>Iowa</option>
				<option value="KS" <?= ($user->state == 'KS') ? 'selected' : ''; ?>>Kansas</option>
				<option value="KY" <?= ($user->state == 'KY') ? 'selected' : ''; ?>>Kentucky</option>
				<option value="LA" <?= ($user->state == 'LA') ? 'selected' : ''; ?>>Louisiana</option>
				<option value="ME" <?= ($user->state == 'ME') ? 'selected' : ''; ?>>Maine</option>
				<option value="MD" <?= ($user->state == 'MD') ? 'selected' : ''; ?>>Maryland</option>
				<option value="MA" <?= ($user->state == 'MA') ? 'selected' : ''; ?>>Massachusetts</option>
				<option value="MI" <?= ($user->state == 'MI') ? 'selected' : ''; ?>>Michigan</option>
				<option value="MN" <?= ($user->state == 'MN') ? 'selected' : ''; ?>>Minnesota</option>
				<option value="MS" <?= ($user->state == 'MS') ? 'selected' : ''; ?>>Mississippi</option>
				<option value="MO" <?= ($user->state == 'MO') ? 'selected' : ''; ?>>Missouri</option>
				<option value="MT" <?= ($user->state == 'MT') ? 'selected' : ''; ?>>Montana</option>
				<option value="NE" <?= ($user->state == 'NE') ? 'selected' : ''; ?>>Nebraska</option>
				<option value="NV" <?= ($user->state == 'NV') ? 'selected' : ''; ?>>Nevada</option>
				<option value="NH" <?= ($user->state == 'NH') ? 'selected' : ''; ?>>New Hampshire</option>
				<option value="NJ" <?= ($user->state == 'NJ') ? 'selected' : ''; ?>>New Jersey</option>
				<option value="NM" <?= ($user->state == 'NM') ? 'selected' : ''; ?>>New Mexico</option>
				<option value="NY" <?= ($user->state == 'NY') ? 'selected' : ''; ?>>New York</option>
				<option value="NC" <?= ($user->state == 'NC') ? 'selected' : ''; ?>>North Carolina</option>
				<option value="ND" <?= ($user->state == 'ND') ? 'selected' : ''; ?>>North Dakota</option>
				<option value="OH" <?= ($user->state == 'OH') ? 'selected' : ''; ?>>Ohio</option>
				<option value="OK" <?= ($user->state == 'OK') ? 'selected' : ''; ?>>Oklahoma</option>
				<option value="OR" <?= ($user->state == 'OR') ? 'selected' : ''; ?>>Oregon</option>
				<option value="PA" <?= ($user->state == 'PA') ? 'selected' : ''; ?>>Pennsylvania</option>
				<option value="RI" <?= ($user->state == 'RI') ? 'selected' : ''; ?>>Rhode Island</option>
				<option value="SC" <?= ($user->state == 'SC') ? 'selected' : ''; ?>>South Carolina</option>
				<option value="SD" <?= ($user->state == 'SD') ? 'selected' : ''; ?>>South Dakota</option>
				<option value="TN" <?= ($user->state == 'TN') ? 'selected' : ''; ?>>Tennessee</option>
				<option value="TX" <?= ($user->state == 'TX') ? 'selected' : ''; ?>>Texas</option>
				<option value="UT" <?= ($user->state == 'UT') ? 'selected' : ''; ?>>Utah</option>
				<option value="VT" <?= ($user->state == 'VT') ? 'selected' : ''; ?>>Vermont</option>
				<option value="VA" <?= ($user->state == 'VA') ? 'selected' : ''; ?>>Virginia</option>
				<option value="WA" <?= ($user->state == 'WA') ? 'selected' : ''; ?>>Washington</option>
				<option value="WV" <?= ($user->state == 'WV') ? 'selected' : ''; ?>>West Virginia</option>
				<option value="WI" <?= ($user->state == 'WI') ? 'selected' : ''; ?>>Wisconsin</option>
				<option value="WY" <?= ($user->state == 'WY') ? 'selected' : ''; ?>>Wyoming</option>
			</select>
		</div>

		<div class="form-element <?= invalid_form_element('zip'); ?>">
			<label for="zip">Zip <span><?= validate_form('zip'); ?></span></label>
			<input type="text" name="zip" id="zip" value="<?= persisted_or_stored('zip', $user->zip); ?>">
		</div>

		




		<button type="submit" class="btn btn-primary">Save</button>


	</form>

	<?php /* TODO Add a logo upload controller method.

	<hr>
	<h2>Company Logo</h2>
	<form class="settings-form" action="/upload-logo" method="post" enctype="multipart/form-data">
		<img src="<?= $user->logo ?>" alt="">
		<input type="file" id="logo_upload" name="logo_upload">
		<button type="submit" class="btn btn-primary">Upload</button>
		

	</form>
	 */ ?>
	

<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>