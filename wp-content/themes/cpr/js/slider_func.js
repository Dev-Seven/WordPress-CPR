//(function (jQuery) {
//
//
//
//			jQuery('#carousel_slider').flexslider({
//				animation: "slide",
//				controlNav: false,
//				animationLoop: false,
//				slideshow: false,
//				itemWidth: 364,
//				itemMargin: 24,
//				asNavFor: '#slider'
//			});
//			jQuery('#slider').flexslider({
//				animation: "fade",
//				controlNav: false,
//				animationLoop: false,
//				slideshow: false,
//				sync: "#carousel_slider",
//			});
//		
//  jQuery('.flexslider').flexslider({
//    animation: "slide",
//    animationLoop: false,
//    itemWidth: 600,
//    itemMargin:20,
//    minItems: 1.5,
//    maxItems:1.5
//});
//		
//jQuery('.faculty-slider').flexslider({
//    animation: "slide",
//    slideshow: false,  
//    animationLoop: true,
//    itemWidth: 336,
//    itemMargin: 20,
//    minItems:5,
//    maxItems:5,
//	controlNav: true,               //Boolean: Create navigation for paging control of each slide? Note: Leave true for manualControls usage
//    directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
//    prevText: "Previous",           //String: Set the text for the "previous" directionNav item
//    nextText: "Next"              //String: Set the text for the "next" directionNav item
//
//});
//		
//		
//		
//
//})(window.jQuery); 


//$(function() { 
//// Card's slider
//  var $carousel = $('.slider-for');
//
//  $carousel
//    .slick({
//      slidesToShow: 1,
//      slidesToScroll: 1,
//      arrows: false,
//      fade: true,
//	  autoplay: true,
//      adaptiveHeight: false,
//	  infinite: false,
//      asNavFor: '.slider-nav'
//    })
    
//  $('.slider-nav').slick({
//    slidesToShow:1,
//	slidesToScroll:4,
//    asNavFor: '.slider-for',
//    dots: false,
//	arrows: false,
//	draggable: false,
//	autoplay: true,
//	accessibility: false,
//    centerMode: false,
//    infinite: false,
//    focusOnSelect: true
//  });
//	
//	 $('.slider-nav .slick-slide').removeClass('slick-active');
//
// // Set active class to first thumbnail slides
// $('.slider-nav .slick-slide').eq(0).addClass('slick-active');
//
// // On before slide change match active thumbnail to current slide
// $('.slider-for').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
// 	var mySlideNumber = nextSlide;
// 	$('.slider-nav .slick-slide').removeClass('slick-active');
// 	$('.slider-nav .slick-slide').eq(mySlideNumber).addClass('slick-active');
//});

//});

//if ($(window).width() < 768) {
//          $('.slider-nav').slick({
//    slidesToShow:3,
//	slidesToScroll:1,
//    asNavFor: '.slider-for',
//    dots: false,
//	arrows: false,
//	draggable: true,
//	autoplay: false,
//	accessibility: false,
//    centerMode: false,
//    infinite: false,
//    focusOnSelect: true
//  });
//    }








$('.responsive').slick({
  dots: false,
  infinite: false,
  speed: 300,
  arrows: true,
  slidesToShow:1.5,
  slidesToScroll:1,
	responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow:1,
        slidesToScroll:1
      }
    },
		]
 });


$('.faculty-slider').slick({
  dots: false,
  infinite: false,
  speed: 300,
  arrows: false,
  slidesToShow:5,
  slidesToScroll:1,
	responsive: [
    {
      breakpoint: 1430,
      settings: {
        slidesToShow: 4,
        slidesToScroll:1
      }
    },
		 {
      breakpoint: 1200,
      settings: {
        slidesToShow:3,
        slidesToScroll:1
      }
    },
		 {
      breakpoint: 768,
      settings: {
        slidesToShow:2,
        slidesToScroll:1
      }
    },
		
		{
      breakpoint: 500,
      settings: {
        slidesToShow:1,
        slidesToScroll:1
      }
    },
		
		
		]
 });

		


$('.event-slider').slick({
  dots: false,
  infinite: false,
  speed: 300,
  arrows: false,
	slidesToShow:3,
  slidesToScroll:1,
	responsive: [
   	 {
      breakpoint: 1200,
      settings: {
        slidesToShow:2,
        slidesToScroll:1
      }
    },
		 {
      breakpoint: 768,
      settings: {
        slidesToShow:1.5,
        slidesToScroll:1
      }
    },
		
		{
      breakpoint: 500,
      settings: {
        slidesToShow:1,
        slidesToScroll:1
      }
    },
		
		
		]
 });
