(function($) {

	//Carousel home page
	$(".carousel-prod").slick({
		nextArrow: '<img class="next-arr" src="wp-content/themes/carl/assets/img/home/arr-right-carousel.png" alt="icon"></img>',
		prevArrow: '<img class="prev-arr" src="wp-content/themes/carl/assets/img/home/arr-left-carousel.png" alt="icon"></img>',
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
		{
			breakpoint: 1450,
			settings: {
				arrows: false
			}
		},
		{
			breakpoint: 992,
			settings: {
				arrows: false,
				slidesToShow: 1,
				centerMode: true,
				variableWidth: true
			}
		}
		]
	});
	//Carousel home page



	//Search button
	$(".sb-icon-search").click(function() {
		$(this).parent().parent().addClass("sb-search-open");
		$(".sb-search-input").focus();
	});

	$(function($){
		$(document).mouseup(function (e){ 
			var div = $(".sb-search"); 
		if (!div.is(e.target) // 
			&& div.has(e.target).length === 0) { 
			div.removeClass("sb-search-open");
	}
});
	});
	//Search button

	//SVG Fallback
	/*
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};
	*/
	//SVG Fallback


	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};
	//Chrome Smooth Scroll

//No image drag
$("img, a").on("dragstart", function(event) { event.preventDefault(); });
	//No image drag

	//Carousel home page
	$(".carousel-materials").slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: false,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				arrows: false,
				slidesToShow: 1,
				centerMode: true,
				variableWidth: true
			}
		}
		]
	});
	//Carousel home page

	//Dropdown menu
	$(".dropdown > .dropdown-toggle").click(function() {
		if ($(this).hasClass("active")) {
			$(this).next().hide();
			$(this).removeClass("active");
		} else {
			$(".dropdown > .dropdown-toggle").removeClass("active");
			$(".dropdown > .dropdown-toggle").next().hide();
			$(".dropdown-submenu > .dropdown-item").removeClass("active");
			$(".dropdown-submenu > .dropdown-item").next().hide();
			$(this).addClass("active");
			$(this).next().show();
		}
	});

	$(".dropdown-submenu > .dropdown-item").click(function() {
		if ($(this).hasClass("active")) {
			$(this).next().hide();
			$(this).removeClass("active");
		} else {
			$(".dropdown-submenu > .dropdown-item").removeClass("active");
			$(".dropdown-submenu > .dropdown-item").next().hide();
			$(this).addClass("active");
			$(this).next().show();
		}
	});

	$(function($){
		$(document).mouseup(function (e){ 
			var div = $(".dropdown"); 
			if (!div.is(e.target) // 
				&& div.has(e.target).length === 0) { 
				$(".dropdown > .dropdown-toggle").removeClass("active");
				$(".dropdown > .dropdown-toggle").next().hide();
				$(".dropdown-submenu > .dropdown-item").removeClass("active");
				$(".dropdown-submenu > .dropdown-item").next().hide();
			}
		});
	});
	//Dropdown menu

	// scroll_to_element
	(function() {
		var scrollToElement = function(trigger, anchor) {
			$(trigger).click(function(e) {
				e.preventDefault();
				$('html, body').animate({
					scrollTop: $(anchor).offset().top
				}, 1000);
				return false;
			});
		}
		
		scrollToElement('.waypoint', '.system-res');

	})();
  // scroll_to_element

  	//Carousel testimonials
  	$(".carousel-testi").slick({
  		infinite: true,
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		nextArrow: '<img class="next-arr" src="wp-content/themes/carl/assets/img/resources/arr-right-carousel.png" alt="icon"></img>',
  		prevArrow: '<img class="prev-arr" src="wp-content/themes/carl/assets/img/resources/arr-left-carousel.png" alt="icon"></img>',
  		responsive: [
  		{
  			breakpoint: 1200,
  			settings: {
  				arrows: false,
  				slidesToShow: 1,
  				centerMode: true,
  				variableWidth: true
  			}
  		}
  		]
  	});
	//Carousel testimonials

	//Carousel stock
	$(".resource .carousel").slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: false,
		responsive: [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 1,
				centerMode: true,
				variableWidth: true
			}
		}
		]
	});

	$(".system-res .carousel").slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 1,
				centerMode: true,
				variableWidth: true
			}
		}
		]
	});

	$(".compare .carousel").slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 1,
				centerMode: true,
				variableWidth: true
			}
		}
		]
	});

	$(".related-articles .carousel").slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: false,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 1,
				centerMode: true,
				variableWidth: true
			}
		}
		]
	});
	//Carousel stock

	//Equal heights
	$(".carousel-prod .card").equalHeights();
	$(".related-prod .card").equalHeights();
	$(".related-prod .item").equalHeights();
	//Equal heights

	//Mobile Footer menu

	var clientWidth = document.body.clientWidth;

	if(clientWidth <= 1199) {

		$(".footer .menu-title").click(function() {
			if ($(this).hasClass("active")) {
				$(this).next().slideUp("fast");
				$(this).removeClass("active");
			} else {
				$(".footer .menu-title").removeClass("active");
				$(this).addClass("active");
				$(".footer .menu-list").slideUp("fast");
				$(this).next().slideDown("fast");
			}
		});

	}
	//Mobile Footer menu

	//Mobile Header menu
	$(".burger").click(function() {
		$(".main-header .menu-container").toggleClass("active");
	});

	$(function($){
		$(document).mouseup(function (e){ 
			var div = $(".menu-container, .burger"); 
		if (!div.is(e.target) // 
			&& div.has(e.target).length === 0) {
			$(".menu-container").removeClass("active");
	}
});
	});
	//Mobile Header menu

	//Product card slider
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		focusOnSelect: true,
		variableWidth: true,
		arrows: false,
		responsive: [
		{
			breakpoint: 576,
			settings: {
				arrows: false,
				variableWidth: false,
				slidesToShow: 3
			}
		}
		]
	});
	//Product card slider

	//Carousel product page
	$(".related-prod .carousel").slick({
		nextArrow: '<img class="next-arr" src="wp-content/themes/carl/assets/img/resources/arr-right-carousel.png" alt="icon"></img>',
		prevArrow: '<img class="prev-arr" src="wp-content/themes/carl/assets/img/resources/arr-left-carousel.png" alt="icon"></img>',
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
		{
			breakpoint: 1350,
			settings: {
				arrows: false
			}
		},
		{
			breakpoint: 1200,
			settings: {
				arrows: false,
				slidesToShow: 1,
				centerMode: true,
				variableWidth: true
			}
		}
		]
	});
	//Carousel product page

	//Table hide column
	if(clientWidth <= 1199) {

		$(".radio-group .custom-control").click(function() {
			$('.compari .compare-table td').hide();
			$(".compari .compare-table thead th").hide();
			$(".compari .compare-table thead th:first-child").show();
			$('.compari .compare-table td:nth-child(' + $(this).children("input").val() + '), .compari .compare-table thead th:nth-child(' + $(this).children("input").val() + ')').show();
			$(".compari .compare-table .table tr.info td").show();
		}).first().click();

	}

	 //Table hide column



})(jQuery);