/**
 *
 * @author Nick Adams
 *
 */

$(function() {

	// Pop modal on failed signups.
	var failed = window.location.search;
	if (failed.includes('signup=failed')) {
		$("#signupModal").modal('show');
	}

	var feedbackPercentage = 0;
	var signupPassword = document.querySelector(".signup-form-wrapper input[name='password']");
	signupPassword.addEventListener("keyup", function() {

		var specialChars = /[\ !\"#\$%&\'\(\)\*\+,-\.\/:;<=>\?@\[\]\^_\`{}\|~]/g;
		var hasSpecialChars = specialChars.test(signupPassword.value);

		var numbers = /[0-9]/g;
		var hasNumbers = numbers.test(signupPassword.value);

		var lower = /[\a-z]/g;
		var hasLower = lower.test(signupPassword.value);

		var upper = /[\A-Z]/g;
		var hasUpper = upper.test(signupPassword.value);

		var hasLength = (signupPassword.value.length >= 8) ? true : false;

		feedbackPercentage = (hasLength + hasLower + hasUpper + hasNumbers + hasSpecialChars) * 20;

		function feedbackColor(percent) {
			if (percent < 50) {
				return "#f00";
			} else if (percent < 70) {
				return "#ff5e00";
			} else if (percent < 85) {
				return "#ffd507";
			} else if (percent === 100) {
				return "#33ff00";

			}

		}

		var feedbackBarStyles = "linear-gradient(90deg, " + feedbackColor(feedbackPercentage) + ", " + feedbackPercentage + "%, " + feedbackColor(feedbackPercentage) + ", " + feedbackPercentage + "%, transparent)";
		var feedbackBar = document.querySelector(".pw-criteria");

		feedbackBar.style.background = feedbackBarStyles;


	});


	var submitButton = document.querySelector(".signup-form-wrapper button[type='submit']");

	var signupInputs = [ 'first_name', 'last_name', 'email', 'company_name', 'password' ];

	signupInputs.forEach(function(inputName) {
		document.querySelector(".signup-form-wrapper [name='" + inputName + "']").addEventListener("keyup", function() {
			if (validSignup()) {
				submitButton.disabled = false;
			} else {
				submitButton.disabled = true;
			}
		});
	})


	function validSignup() {
		// valid password
		if (feedbackPercentage === 100) {
			console.log("checking for validity")
			// check that all inputs have values
			var formFilled = signupInputs.every(checkInput);

			function checkInput(input) {
				if (document.querySelector(".signup-form-wrapper [name='" + input + "']").value.length == 0) {
					return false;
				} else {
					return true;
				}
			}

			if (!formFilled) {
				return false
			} else {
				return true;
			}
			
		}

	}
});