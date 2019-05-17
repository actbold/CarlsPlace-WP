(function($) {

    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };
    if($('body').hasClass('page-template-page-faq')){
            var tagQuery = getUrlParameter('tag');

            if(tagQuery){
                loadFaqs(tagQuery);
            }

        /* Load Frequently Asked Questions */
        $(document).on('click', '.faq--tag', function(e){
            e.preventDefault();

            loadFaqs($(this).data('tag'));
        });
        $(document).on('click', '.faq-question', function(e){
            var faq = $(this).parents('.faq');
            var answer = $(faq).find('.faq-answer');
            $(faq).toggleClass("faq--active");
            $(answer).slideToggle();
            console.log('clicked faq: ', faq);
        });
        function loadFaqs(tag){
            tag = tag || 0;
            var container = document.getElementById('frequently-asked-questions');
            return $.ajax({
                method: "POST",
                url: ajax.url,
                data: {
                    'action': 'load_faqs',
                    'security': ajax.security,
                    'tag': tag
                },
                beforeSend:function(){
                    container.innerHTML = '<div class="loader"><div></div><div></div><div></div></div>';
                }
            }).done(function(response) {
                var activeTag = $('.faq--tag[data-tag='+tag+']');
                $('.faq--tag').not(activeTag).removeClass('btn--active');
                $(activeTag).addClass('btn--active');
                container.innerHTML = response;
            });
        }
    }
	
	$(document).ready(function(){
		 $('.gallery-slider').slick({
		    dots: true,
			  autoplay: false,			  
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows:true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              arrows: true,
            }
          },
          {
            breakpoint: 600,
            settings: {
              arrows: false, 
              autoplay: true,
              slidesToShow: 1,
              slidesToScroll: 1,                 
              speed: 600,    
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,                
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
		 }
		 );
        }).on('setPosition', function (event, slick) {
	slick.$slides.css('height', slick.$slideTrack.height() + 'px');
});
	
	
		$(document).ready(function(){
		 $('.carousel, .carousel-prod').slick({
		 dots: true,
			 autoplay: true,
			 arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
		 }
		 );
        });


const dropdownNavigation = document.getElementById('dropdown-navigation');
const shopCategoriesLink = document.getElementById('shop-categories-link');
const shopCategoriesMenu = document.getElementById('shop-categories-menu');
const shopMaterialsLink = document.getElementById('shop-materials-link');
const shopMaterialsMenu = document.getElementById('shop-materials-menu');
const mobileNavToggle = document.getElementById('mobile-navigation-toggle');
const menuLinks = document.querySelectorAll('.menu-link');


 $('.logo').mouseover(function( event ) {
     shopMaterialsMenu.style.display = 'none';
     shopCategoriesMenu.style.display = 'none';
     shopMaterialsMenu.classList.remove('menu--active');
     shopCategoriesMenu.classList.remove('menu--active');
 });

 $('.top-bar').mouseover(function( event ) {
    shopMaterialsMenu.style.display = 'none';
    shopCategoriesMenu.style.display = 'none';
    shopMaterialsMenu.classList.remove('menu--active');
    shopCategoriesMenu.classList.remove('menu--active');
});

$('.main-header ~ main').mouseover(function( event ) {
    shopMaterialsMenu.style.display = 'none';
    shopCategoriesMenu.style.display = 'none';
    shopMaterialsMenu.classList.remove('menu--active');

});

	var MainBanner = $(".main-banner"),
	Banner = $(".nav-banner"),
	BannerContent = $("#banner-content"),
	Slides = $(Banner).children(),
	SlideCount = $(Slides).length,
	SlideLink = $(".banner-control > a"),
	Counter = 0;
	//Function to Change Slide every 5 seconds
	function rotateSlide() {
var NextSlide = $(Slides).eq(++Counter % SlideCount),
	NextSlideBG = $(NextSlide).data("background"),
	NextSlideContent = $(NextSlide).data("content");
	//Remove Active Class From Icon
	if($(SlideLink).hasClass("_active")){
		$(SlideLink).removeClass("_active");
	}
	//Add Active Class to Current Icon & Set Slide BG / Content
	$(NextSlide).find("a").addClass("_active"),
	$(MainBanner).css('background-image', 'url(' + NextSlideBG + ')'),		$(BannerContent).html(NextSlideContent);
	}
	setInterval(rotateSlide, 7000);
	//Change Slide On Click
	$(SlideLink).on("click",function(e){
		e.preventDefault();
		var SlideControl = $(this).parents(".banner-control"),
		 	NewBG = $(SlideControl).data("background"),
		 	NewContent = $(SlideControl).data("content");
		
		if($(SlideLink).hasClass("_active")){
			$(SlideLink).removeClass("_active");
		}
		$(this).addClass("_active");
 		$(MainBanner).css('background-image', 'url(' + NewBG + ')');
 		$(BannerContent).html(NewContent);
	});


// fix filter tabs


    $(".accordion-section-1 .accordion-section-title").on( "click", function(e) {
        e.preventDefault();
        var currentAttrvalue = $(this).attr('href');
        if($(e.target).is('.active')){
            $(this).removeClass('active');
            $('.accordion-section-1 .accordion-section-content:visible').slideUp(300);
        } else {
            $('.accordion-section-1 .accordion-section-title').removeClass('active').filter(this).addClass('active');
            $('.accordion-section-1 .accordion-section-content').slideUp(300).filter(currentAttrvalue).slideDown(300);
        }
    });


    $(".accordion-section-2 .accordion-section-title").on( "click", function(e) {
        e.preventDefault();
        var currentAttrvalue = $(this).attr('href');
        if($(e.target).is('.active')){
            $(this).removeClass('active');
            $('.accordion-section-2 .accordion-section-content:visible').slideUp(300);
        } else {
            $('.accordion-section-2 .accordion-section-title').removeClass('active').filter(this).addClass('active');
            $('.accordion-section-2 .accordion-section-content').slideUp(300).filter(currentAttrvalue).slideDown(300);
        }
    });

    $(".accordion-section-3 .accordion-section-title").on( "click", function(e) {
        e.preventDefault();
        var currentAttrvalue = $(this).attr('href');
        if($(e.target).is('.active')){
            $(this).removeClass('active');
            $('.accordion-section-3 .accordion-section-content:visible').slideUp(300);
        } else {
            $('.accordion-section-3 .accordion-section-title').removeClass('active').filter(this).addClass('active');
            $('.accordion-section-3 .accordion-section-content').slideUp(300).filter(currentAttrvalue).slideDown(300);
        }
    });

    $(".accordion-section-4 .accordion-section-title").on( "click", function(e) {
        e.preventDefault();
        var currentAttrvalue = $(this).attr('href');
        if($(e.target).is('.active')){
            $(this).removeClass('active');
            $('.accordion-section-4 .accordion-section-content:visible').slideUp(300);
        } else {
            $('.accordion-section-4 .accordion-section-title').removeClass('active').filter(this).addClass('active');
            $('.accordion-section-4 .accordion-section-content').slideUp(300).filter(currentAttrvalue).slideDown(300);
        }
    });

    // new tabs

    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
	
	
	$('.tab-testi .item').mouseover(function(el){
			$(this).find('.descr').css("top", "0");
	})
	$('.tab-testi .item').mouseout(function(el){
			$(this).find('.descr').css("top", "-100%");
	})
				
  $('.readmore-testimonial').click(function(){
    $(this).prev('.more-text-testimonial').slideToggle('fast');
    $(this).text(function(i, v){
      return v === 'Read more' ? 'Read less' : 'Read more';
    });
    return false;
  });


})(jQuery);
