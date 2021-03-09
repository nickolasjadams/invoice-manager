
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