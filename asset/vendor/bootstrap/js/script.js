// page scroll
$('.page-scroll').on('click', function(e) { 
	var tujuan = $(this).attr('href');
	var elemenTujuan = $(tujuan);

		$('html,body').animate({
			scrollTop:elemenTujuan.offset().top + 20
		}, 600, 'swing');

		e.preventDefault();

});
// end page scroll

// sticky navbar
$(document).ready(function(){
	$(window).scroll(function(){
		var myNav = document.getElementById('mynav');
		var scroll = $(window).scrollTop();
		if (scroll > 0) {
			myNav.classList.add("nav-colored");
		}
		else{
			myNav.classList.remove("nav-colored");
		}
	});
});
// end sticky navbar


function login() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if( username == "admin" && password == "admin123") {
        alert("login berhasil!");
        pindah = window.location.replace("assets/admin/utama.html")
        return pindah;
    } else {
        alert("Username / password salah!")
        return false;
    }
}

let $owl = $('#carousel1');
$owl.children().each(function(e) {
	$(this).attr('data-position', e);
});

$("#carousel1").owlCarousel({
	vertical: true,
	loop: true,
	center: true,
	margin: 0,
	responsiveClass: true,
	nav: false,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 2
		},
		1000: {
			items: 3
		}
	}
});

$(document).on('click', 'owl-ite,>div', function() {
	let $speed = 1000;
	$owl.trigger('to.owl.carousel', [$(this).data('position'), $speed]);
});