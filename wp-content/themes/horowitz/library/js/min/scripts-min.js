function updateViewportDimensions(){var t=window,i=document,o=i.documentElement,e=i.getElementsByTagName("body")[0],n=t.innerWidth||o.clientWidth||e.clientWidth,a=t.innerHeight||o.clientHeight||e.clientHeight;return{width:n,height:a}}var viewport=updateViewportDimensions(),waitForFinalEvent=function(){var t={};return function(i,o,e){e||(e="Don't call this twice without a uniqueId"),t[e]&&clearTimeout(t[e]),t[e]=setTimeout(i,o)}}(),timeToWaitForLast=100;!function($){var t=function(t){if(t){t.preventDefault();var i=$(this).attr("href")}else var i=location.hash;$("html,body").animate({scrollTop:$(i).offset().top},500,function(){location.hash=i})};$("html, body").hide(),$(document).ready(function(){$("a[href^=#]").bind("click",t),location.hash?setTimeout(function(){$("html, body").scrollTop(0).show(),t()},0):$("html, body").show()})}(jQuery),jQuery(document).ready(function($){viewport.width>768&&($(".navbar-nav .dropdown").hover(function(){$(this).find(".dropdown-menu").first().stop(!0,!0).slideDown(100)},function(){$(this).find(".dropdown-menu").first().stop(!0,!0).slideUp(110)}),$(window).scroll(function(){var t=$(window).scrollTop();t>=50?$(".header nav").addClass("fixed"):$(".header nav").removeClass("fixed")}).scroll()),$(".panel-heading a").each(function(){$(this).click(function(){$(this).parents("div.panel").hasClass("active")?$(this).parents("div.panel").removeClass("active"):($(".panel").removeClass("active"),$(this).parents("div.panel").addClass("active"))})}),$(".navbar-toggle").click(function(){$(this).toggleClass("active"),$(".row-offcanvas").toggleClass("active")}),$(".cell_body td a").click(function(t){t.preventDefault(),t.stopImmediatePropagation()}),$(function(){$('[data-toggle="popover"]').popover()}),$(function(){$('[data-toggle="tooltip"]').tooltip()}),$(".home .video-container").click(function(){window.location="http://www.waterpark.co.il/רכישת-כרטיסים/"}),$(function(){$("a.zoom").click(function(t){t.preventDefault();var i=$(this).data("imgpath");$("#photo-modal img").attr("src",i),$("#photo-modal").modal("show")}),$("img").on("click",function(){$("#photo-modal").modal("hide")})}),equalheight=function(t){var i=0,o=0,e=new Array,n,a=0;$(t).each(function(){if(n=$(this),$(n).height("auto"),topPostion=n.position().top,o!==topPostion){for(currentDiv=0;currentDiv<e.length;currentDiv++)e[currentDiv].height(i);e.length=0,o=topPostion,i=n.height(),e.push(n)}else e.push(n),i=i<n.height()?n.height():i;for(currentDiv=0;currentDiv<e.length;currentDiv++)e[currentDiv].height(i)})},$(window).load(function(){equalheight('.main-testimonials [class^="col-"]'),equalheight('.recent-posts  [class^="col-"]')}),$(window).resize(function(){equalheight('#main-testimonials [class^="col-"]'),equalheight('.recent-posts  [class^="col-"]')}),$(".top-search").click(function(t){t.preventDefault(),$(".navbar-form").fadeToggle()})});