$(".popup-with-zoom-anim").magnificPopup({
    type: "inline",
    fixedContentPos: !1,
    fixedBgPos: !0,
    overflowY: "auto",
    closeBtnInside: !0,
    preloader: !1,
    midClick: !0,
    removalDelay: 300,
    mainClass: "my-mfp-zoom-in",
    callbacks: {
        open: function() {
          	$('.smart-captcha').height(120);
            $('.button_form').prop('disabled', true);
        }
    }
}), $(".navbar__burger").click(function () {
    $(".sidebar").hasClass("sidebar-close") ? $(".sidebar").removeClass("sidebar-close") : $(".sidebar").addClass("sidebar-close")
}), $(".sidebar__icon").click(function (i) {
    $(this).hasClass("sidebar__icon-rotate") ? ($(this).removeClass("sidebar__icon-rotate"), $(this).parent().css({background: ""}), $(this).parent().next(".sidebar__button").css({"margin-top": ""}), $(this).siblings(".sidebar__drop").css({display: ""})) : ($(this).addClass("sidebar__icon-rotate"), $(this).parent().css({background: "#000000"}), $(this).parent().next(".sidebar__button").css({"margin-top": $(this).siblings(".sidebar__drop").height()}), $(this).siblings(".sidebar__drop").css({display: "block"}))
}), $(".image-popup-vertical-fit").magnificPopup({
    type: "image",
    closeOnContentClick: !0,
    mainClass: "mfp-img-mobile",
    image: {verticalFit: !0},
    zoom: {enabled: !0, duration: 300}
}), $(function () {
    $(".sidebar__item li a").each(function () {
        var i = window.location.href, a = this.href;
        null != i.match(a) && ($(this).parent().css({background: "#000000"}), $(this).css({color: "#ccc"}))
    })
}), $(function () {
    $(".mini-sidebar li a").each(function () {
        var i = window.location.href, a = this.href;
        null != i.match(a) && $(this).css({color: "#ccc", "text-decoration": "underline"})
    })
}), $(function () {
    $(".navbar__panel li a").each(function () {
        var i = window.location.href, a = this.href;
        null != i.match(a) && $(this).css({color: "#000"})
    })
}), $(".sidebar__drop li").removeClass("sidebar__button"), $(".phone").mask("+7 999 999-9999"), jQuery(document).ready(function (s) {
    s(".phone").mask("+7 (999) 999-99-99"), s(".callback__form").on("submit", function (i) {
        i.preventDefault();
        var a = s(this), e = s(this).find(".callback-answer");
        s.ajax({
            url: "/wp-content/themes/metrels/handler.php",
            type: "POST",
            data: a.serialize(),
            beforeSend: function () {
                e.empty()
            },
            success: function (i) {
                e.text(i), a.find(".callback__field").val(""), a.find(".callback__button").fadeOut("100"), a.find(".callback__block").fadeOut("300"), a.parent().animate({height: "100%"})
            },
            error: function () {
                e.text("Произошла ошибка! Попробуйте позже.")
            }
        })
    })
});

window.onscroll = function () {
    myFunction()
};

var navbar = document.getElementById("whatsaap__btn-wrap");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky - 70) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}

$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
});