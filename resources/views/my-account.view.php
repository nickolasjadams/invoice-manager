<?php
$title = 'My Account';
$css = [];
$js = [];
$heading = "Settings";
include 'partials/dashboard/beginlayout.view.php';
?>

	<h2>Change Password</h2>
	<form class="settings-form">
		<div class="form-element">
			<label for="old_password">Old Password: </label>
			<input type="password" name="old_password" id="old_password">
		</div>
		<div class="form-element">
			<label for="new_password">New Password: </label>
			<input type="password" name="new_password" id="new_password">
		</div>
		<div class="form-element">
			<label for="confirm_password">Confirm Password: </label>
			<input type="password" name="confirm_password" id="confirm_password">
		</div>
		<button type="submit" class="btn btn-primary">Update Password</button>
	</form>

	<hr>

	<form class="settings-form">
		<div class="form-element">
			<label for="email">Email: </label>
			<input type="email" name="email" id="email" value="nickadams335@u.boisestate.edu">
		</div>

		<div class="form-element">
			<label for="first_name">First Name: </label>
			<input type="text" name="first_name" id="first_name" value="Nick">
		</div>

		<div class="form-element">
			<label for="last_name">Last Name: </label>
			<input type="text" name="last_name" id="last_name" value="Adams">
		</div>

		<div class="form-element">
			<label for="company_name">Company Name: </label>
			<input type="text" name="company_name" id="company_name" value="Company LLC">
		</div>

		<div class="form-element">
			<label for="address">Address</label>
			<input type="text" name="address" id="address">
		</div>

		<div class="form-element">
			<label for="address2">Apartment/Suite/Other</label>
			<input type="text" name="address2" id="address2">
		</div>

		<div class="form-element">
			<label for="city">City</label>
			<input type="text" name="city" id="city">
		</div>

		<div class="form-element">
			<label for="state">State</label>
			<select name="state" id="state">
				<option value="" disabled selected>Select a State</option>
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>
		</div>

		<div class="form-element">
			<label for="zip">Zip</label>
			<input type="text" name="zip" id="zip">
		</div>




		<button type="submit" class="btn btn-primary">Save</button>


	</form>
	

<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>