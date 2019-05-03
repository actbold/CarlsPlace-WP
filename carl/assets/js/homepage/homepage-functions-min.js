(function($) {

//Start Banner
$.fn.StartBanner = function() {
	console.log('---slider banners');
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
}


})(jQuery);