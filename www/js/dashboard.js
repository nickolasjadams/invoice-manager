
if (window.localStorage.getItem("nav") == "less") {
	toggleNav();
}

function toggleNav() {
	$(".sidenav").toggleClass("less");
	$("#nav-toggle").toggleClass("less");
	if ($(".sidenav").hasClass("less")) {
		window.localStorage.setItem("nav", "less");
	} else {
		window.localStorage.setItem("nav", "more");
	}

}

function togglePaymentSidebar() {

	$(".stripe-wrapper").toggleClass("less");

	if (!$(".sidenav").hasClass("less")) {
		$(".sidenav").toggleClass("less");
		$("#nav-toggle").toggleClass("less");
	}

	if (!$(".stripe-wrapper").hasClass("less")) {
		if (window.localStorage.getItem("nav") == "more") {
			$(".sidenav").toggleClass("less");
			$("#nav-toggle").toggleClass("less");
		}
	}

}




// event listeners
if ($("#nav-toggle").length) {
	document.querySelector("#nav-toggle").addEventListener("click", function() {
		toggleNav();
	});
}

if ($("#stripe-more").length) {
	document.querySelector("#stripe-more").addEventListener("click", function() {
		togglePaymentSidebar();
	});
}

/**
 * Removes Stripe payment navbar.
 * Sets invoice totals to zero after payment.
 * Changes the invoice status.
 * Shows an alert of successful payment.
 */
function successfulPayment() {
	
	$(".stripe-wrapper").css("right", "-300px")

	setTimeout(function() {
		$("#nav-toggle").removeClass("less");
		$("#main-nav").removeClass("less");
		$(".stripe-wrapper").remove();
		$("#ui-messages").addClass("activate")
		$("#ui-messages").html("Success");
		setTimeout(function() {
			$("#ui-messages").css("top", "0vh");
			
			setTimeout(function() {
				$("#invoice-amount").html("0.00");
				var classes = document.querySelector(".status-btn").classList;
				for (var i = 0; i < classes.length; i++) {
					if (classes[i].includes('bg-')) {
						classes.remove(classes[i]);
						break;
					}
				}
				$(".status-btn").addClass('bg-success');
				$(".status-btn").html('Paid');
				$("#ui-messages").css("height", "0vh");
			}, 2000);
		}, 200);
	}, 1000);

	


}
