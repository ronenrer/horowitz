/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;

(function($){
  var jump=function(e){
    if (e){
      e.preventDefault();
      var target = $(this).attr("href");
      }else{
      var target = location.hash;
      }
      $('html,body').animate({
        scrollTop: $(target).offset().top
      },500,function(){
        location.hash = target;
     });
  };
  $('html, body').hide();
  $(document).ready(function(){
    $('a[href^=#]').bind("click", jump);
    if (location.hash){
     setTimeout(function(){
     $('html, body').scrollTop(0).show();
       jump();
    }, 0);
   }else{
      $('html, body').show();
    }
  });
})(jQuery); 
/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  if( viewport.width > 768 ) {    
    $('.navbar-nav .dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown(100);
    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp(110);
    });
    $(window).scroll(function() {
      var windscroll = $(window).scrollTop();
      if (windscroll >= 50) {
          $('.header nav').addClass('fixed');

      } else {
          $('.header nav').removeClass('fixed');
      }

  }).scroll();
}

  $('.panel-heading a').each(function() {
      $(this).click(function() {     
        if ($(this).parents("div.panel").hasClass('active')){
          $(this).parents("div.panel").removeClass('active');
        } else {
           $(".panel").removeClass('active');
           $(this).parents("div.panel").addClass('active');
        }
      });
  });

  $('.navbar-toggle').click(function () {
    $(this).toggleClass('active');
    $('.row-offcanvas').toggleClass('active');
  });
  $('.cell_body td a').click(function(e){
       e.preventDefault();
       e.stopImmediatePropagation(); //charles ma is right about that, but stopPropagation isn't also needed
  });
  $(function () {
    $('[data-toggle="popover"]').popover();
  });
   $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

   $('.home .video-container').click(function(){
    window.location = 'http://www.waterpark.co.il/רכישת-כרטיסים/';
  });
 $(function()
{     
    $('a.zoom').click(function(e)
    {
        e.preventDefault();

        var imgPath = $(this).data('imgpath');

        $('#photo-modal img').attr('src', imgPath);

        $("#photo-modal").modal('show');
    });

    $('img').on('click', function()
    {
        $("#photo-modal").modal('hide')
    });
});

equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto');
   topPostion = $el.position().top;

   if (currentRowStart !== topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
};
$(window).load(function() {
  equalheight('.benefits [class^="col-"]');
  equalheight('.recent-posts  [class^="col-"]');

});
$(window).resize(function() {
  equalheight('.benefits [class^="col-"]');
   equalheight('.recent-posts  [class^="col-"]');

});
 $(".top-search").click(function(e){
      e.preventDefault();
      $(".navbar-form").fadeToggle();
     });
}); /* end of as page load scripts */
