/* Developed 2014.07.23 by: ============
// 	Trozzolo Communications Group
// 	811 Wyandotte, Kansas City, MO 64105
// 	816.842.8111 | trozzolo.com
// for: CMS */

//===================================
//  Document Ready Logic

$(document).ready(function() {

	topNav();

	var pathname = window.location.pathname;
	//alert(pathname);

	// load functions according to page
	switch(pathname){
		case '/':	// home
			homePage();
			break;
		case '/user':
			//= LOGIN BUTTON ====================//
			$('body').on('click', '.login-button', function(e) {
				e.preventDefault();
				login();
			});
			break;
		default:
			servicePages();
			newsWire();			// service pages
			//fourPodsCarousel();	// service pages
			servicePodsCarousel();	// service pages
	}

	//= FAUX BUTTON ====================//
	// acts/looks like a button - calls function identified in 'data-function'
	// button must have a data parameter ('data-function') whose value = name of function to call
	$('body').on('click', '.faux-button', function(e) {
		e.preventDefault();
		//var functionToCall = thisdata = $(this).attr('data-function');
		var functionToCall = thisdata = $(this).data('function');
		window[functionToCall]();
	});

	//= close-out-nav ==================//
	$('body').on('click', '.close-out-nav', function(e) {
		$(this).parent().toggle('slow');
		closeOverlay();
	});

	//= close-out-nav ==================//
	$('body').on('click', '.service-highlights-button', function(e) {
		var curId    = $(this).attr('id');
		var curArr   = curId.split('-');
		var curRecId = curArr[1];	// unique table record id
		var curSect  = 'servhighcopy-'+curRecId;
		$().fadeIn('slow');
	});

	//= LOWER RIGHT TRIANGLE ============//
	resizeTriangle();
	$( window ).resize(function() {
		resizeTriangle();
	});

	//= FORM INLINE LABEL IE8 & IE9 =====//
	// this is for IE8 & 9 since they don't support HTML5's placeholder attribute
	$(function(){
		if( !('placeholder' in document.createElement('input')) ){
			$("[placeholder]").focus(function(){
				if( this.value == $(this).attr("placeholder") ){
					this.value = '';
				}
			})
			.blur(function(){
				if( this.value === "" ){
					this.value = $(this).addClass('empty').attr("placeholder");
				}
			})
			.blur();
		}
	});

});

//===================================
//  Functions

//--- BEGIN: page specific doc ready functions ---//

function homePage(){

	//= NEWSWIRE LINKS ===//
	$(".news-wire ul li p a").mouseover(function(){
		$(".news-wire ul li p a").css("color", "#e5e7e9");
	});
	$(".news-wire ul li p a").mouseout(function(){
		$(".news-wire ul li p a").css("color", "#fff");
	});

	//= service hover ==================//
	$('body').on('mouseenter','.service',function(){
		$(this).stop().animate({"opacity": 1}, 300);
	});
	$('body').on('mouseleave','.service',function(){
		$(this).stop().animate({"opacity": .5}, 300);
	});

	//= NEWS ============================//
	var curhot = '';
	var hotdiv = '';

	$(function () {
		timerSpeed = 5000;
		var bgColor = '#0095c3';
		queueNewCat(timerSpeed,bgColor);
		var interval = setInterval(function(){
			ticker(timerSpeed);
		}, timerSpeed);

		$('.cate').click(function(){
			clearInterval(interval);
			if (window.console) console.log('note:' +timerSpeed);
			$('#news-wrap').find('*').stop(true,true);
			var newsCategory = $(this).attr('id').replace("-tab", "");
			var position = $(this).position().left - 743;

			switch(newsCategory){
				case 'investments':
					bgColor = '#f99d31';
					break;
				case 'acquisitions':
					bgColor = '#61116a';
					break;
				case 'corporate-services':
					bgColor = '#6cb33f';
					break;
				default:		// 'development'
					bgColor = '#0095c3';
					break;
			}
			$('.current-slider').animate({backgroundPositionX:position+"px", backgroundColor:"#"+bgColor}, 500);
			$('.news-btm').animate({backgroundColor:"#"+bgColor, width:'100%'}, 500);

			$('.current-cat').children('ul').css({		// reset
				'top':'0',
				'left':'-743px'
			});

			$('.current-cat').removeClass('current-cat');
			$('.current-news').removeClass('current-news');
			$('#'+newsCategory).addClass('current-cat');
			$('.current-cat').children('ul').children('li:first').addClass('current-news');
			queueNewCat(timerSpeed,bgColor);
			interval = setInterval(function(){
				ticker(timerSpeed);
			}, timerSpeed);
		});
	});

	//= NAV-HOME ====================//
	$( ".nav-home" ).on( "mouseenter", function() {
		$(this).children('.home-title').stop().animate({left:350},330);
		$(this).children('img').animate({width:360, margin:-5},200);
	});
	$( ".nav-home" ).on( "mouseleave", function() {
		var text1 = $(this).children('.home-title').html();
		var text = text1.replace(" ", "");
		if (text != curhot) {
			$(this).children('.home-title').animate({left:120},350);
			$(this).children('img').animate({width:350, margin:0},200);
		}
	});

	$( ".nav-home" ).on( "click", function() {
		//$("#searchover").animate({top:193},500);
		var text1 = $(this).children('.home-title').html();
		var text = text1.replace(" ", "");
		var myDiv = $('#expanded');
		if (text != curhot) {
			$('#'+hotdiv).children('.home-title').animate({left:120},350);
			$('#'+hotdiv).children('img').animate({width:350, margin:0},800);
			hotdiv = $(this).attr('id');
			curhot = text;
			$.ajax({
					url: '?expanded='+curhot,
					type: 'HTML'
				})
				.done(function(newHtml) {
					myDiv.animate({opacity:.1},'200',function(){
						myDiv.data('oHeight',myDiv.height())
							 .html(newHtml)
							 .css('height','auto')
							 .data('nHeight',myDiv.height())
							 .height(myDiv.data('oHeight'))
							 .show()
							 .animate({opacity:1,height: myDiv.data('nHeight')},{ queue: false, duration: 800 });
						$(".close-out").click(function(){
							$('.home-title:contains('+text+')').animate({left:120},350);
							hotdiv = '';
							curhot = '';
							closeEle(myDiv);
						});
					});
				})
				.fail(function(jqXHR, textStatus) {
					podHtml = '<p>Currently Unavailable: ' + textStatus+'</p>';
			});
		} else {	// close div
			hotdiv = '';
			curhot = '';
			closeEle(myDiv);
		}
	});
}

function servicePages(){
	//= SERVICE PAGES INPAGE NAV ========//
	$(".ip-nav").click(function() {
		$(this).siblings().removeClass('hot');
		$(this).addClass('hot');
		tb = $(this).attr('id').replace("-tab", "");
		of = $("#" + tb).offset().top;
		navof = $(this).position().top;
		$('#inpage-tab-nav').animate({
			top: (of - navof - 143)	/143
		}, 'slow');
		$(this).animate({
			marginRight: "6",
			backgroundColor: "#0095c3"
		}, 'slow');
		$(this).siblings().animate({
			marginRight: "72",
			backgroundColor: "#999"
		}, 'slow');
		$('html,body').animate({
			scrollTop: (of - navof - 62)
		}, 'slow');
	});
	$(".ip-nav").hover(function() {
		if (!$(this).hasClass('hot')) {
			$(this).css('background-color', '#888');
		}
	}, function() {
		if (!$(this).hasClass('hot')) {
			$(this).css('background-color', '#999');
		}
	});
	$(window).scroll(function() {
		serviceScroll('none');
	});

	//= FOUR IMAGE PODS ================//
	$(".cars-part").click(function() {
		var curId    = $(this).attr('id');
		var curArr   = curId.split('-');
		var curLoc   = curArr[1];	// 'mid' / 'bot'
		var curSect  = 'serv-head-'+curLoc;
		var curRecId = curArr[2];	// unique table record id
		var carsSub  = $('#cars-sub-'+curLoc);

		serviceScroll(curSect);
		if (!$(this).hasClass('selected')) {
			var divId = '';
			var expandHtml = '';

			$('#cars-'+curLoc).trigger("configuration", {auto: false});
			$('.selected').children('.serv-title').animate({
				left: 0
			}, 350);
			$(this).parent().children(".cars-part").removeClass('selected');
			$(this).addClass('selected');
			$(this).animate({
				opacity: 1
			});
			$(this).parent().children(".cars-part:not(.selected)").animate({
				opacity: 0.5
			});
			expandHtml = $('#cars-sub-'+curLoc+'-'+curRecId).html();
			if (carsSub.css('display') == 'none') {
				carsSub.html(expandHtml);
				carsSub.slideDown();
			} else {
				carsSub.animate({opacity : .1},400, function(){
					carsSub.html(expandHtml);
					carsSub.animate({opacity : 1},400);
				});
			}
		} else {
			$(this).removeClass('selected');
			$(this).children('.serv-title').animate({
				left: 0
			}, 350);
			carsSub.slideUp();
			$('#cars-'+curLoc).trigger("configuration", {auto: true});
			$(this).siblings().animate({ opacity: 1	});
			carsSub.html('');
		}
	});
	$(".cars-part").hover(function() {
		$(this).children('.serv-title, .prop-title').stop().animate({
			left: 175
		}, 330);
		$(this).children('img').animate({
			width: 180,
			margin: -5
		}, 200);
	}, function() {
		if (!$(this).hasClass('selected')) {
			$(this).children('.serv-title, .prop-title').animate({
				left: 0
			}, 350);
		}
		$(this).children('img').animate({
			width: 175,
			margin: 0
		}, 200);
	});

	$('body').on('click','.cars-sub .close-out',function() {
		var curCar = $(this).parent().attr('id').replace("-sub", "");
		$('#'+curCar).trigger("configuration", {auto: true});
		$('#'+curCar).children("li.cars-part")
			.removeClass('selected')
			.animate({ opacity: 1	})
			.children('.serv-title, .prop-title').animate({ left: 0 }, 350);

		$(this).parent().slideUp('800',function(){
			var curSect = $(this).siblings('.serv-section').attr('id');
			$(this).html('');
			serviceScroll(curSect);
		});
	});
}

function servicePodsCarousel(){
	$('#cars-mid').carouFredSel({
		items		: 4,
		direction	: "left",
		circular	: true,
		infinite	: true,
		scroll 		: {
			items			: 1,
			easing			: "linear", //"linear" and "swing", built in: "quadratic", "cubic" and "elastic"
			duration		: 500,
			pauseOnHover	: true
		}
	});
	$('#cars-bot').carouFredSel({
		items		: 4,
		direction	: "left",
		circular	: true,
		infinite	: true,
		scroll 		: {
			items			: 1,
			easing			: "linear", //"linear" and "swing", built in: "quadratic", "cubic" and "elastic"
			duration		: 500,
			pauseOnHover	: true
		}
	});
}


//--- END: page specific doc ready functions ---//

function serviceScroll(curSect){
	if(curSect === 'none'){
		curSect = '';
		var winHt = ($(window).height()/3)*2;
		$(".serv-section").each(function() {
			if ($(window).scrollTop() > $(this).offset().top - winHt) {
				curSect = $(this).attr('id');
			}
		});
	}
	if (curSect !== '' && !$("#inpage-tab-nav").is(':animated')) {
		of = $('#' + curSect).offset().top;
		curSectTab = '#' + curSect + '-tab';
		curNavof = $(curSectTab).offset().top;
		if (of != (curNavof + 54)) {
			$(curSectTab).siblings().removeClass('hot');
			$(curSectTab).addClass('hot');
			$(curSectTab).animate({
				marginRight: "6",
				backgroundColor: "#0095c3"
			}, 'slow');
			navof = $(curSectTab).position().top;
			$('#inpage-tab-nav').animate({
				top: (of - navof -104)	//-142
			}, 'slow');
			$(curSectTab).siblings().animate({
				marginRight: "72",
				backgroundColor: "#999"
			}, 'slow');
		}
	}
}

function topNav(){

	//= NAV-MAIN ========================//
	$( ".nav-main ul.lvl-0 li.lvl-0" ).on( "mouseenter", function() {
		var xPos = $(this).position().left;
		var varmto = (xPos-200)*-1;
		$('#nav-slider').animate({right:varmto},230);
	});

	$( "#header" ).on( "mouseleave", function() {
		$('#nav-slider').animate({right:-400},230);
	});

	//= NAV LINK: nav-contact-us ======//
	$('body').on('click', '.nav-contact-us', function(e) {
		e.preventDefault();
		openOverlay(0);
		$('#overlay').on('click',function(){
			$('#pod-contact-us').fadeOut('slow');
			closeOverlay();
		});
		if($('#pods-user-client-portal').is(':visible')) {
			$('#pods-user-client-portal').fadeOut('slow');
		}
		$('#pod-contact-us').toggle('slow');
	});

	//= NAV LINK: nav-client-portal ===//
	$('body').on('click', '.nav-client-portal', function(e) {
		e.preventDefault();
		openOverlay(0);
		$('#overlay').on('click',function(){
			$('#pods-user-client-portal').fadeOut('slow');
			closeOverlay();
		});
		if($('#pod-contact-us').is(':visible')) {
			$('#pod-contact-us').fadeOut('slow');
		}
		$('#pods-user-client-portal').toggle('slow');
	});
}


function openOverlay(val){
	if( $('#overlay').length < 1 ) {
		$('body').prepend('<div id="overlay" />').each(function() {
			if( val || val === 0 ) {
				if( val === 0 ) {
					$('#overlay').css({'opacity':0});
				}
				$('#overlay').fadeIn('slow').animate({backgroundColor: 'rgba(0,0,0,'+val+')'}, 500);
			} else {
				$('#overlay').fadeIn('slow');
			}
		});
	}
}

function closeOverlay(){
	if( $('#overlay').length ){
		$('#overlay').fadeOut('400',function(){
			$('#overlay').remove();
		});
	}
}

function addContactData(){
	$.ajax({
			url: '?id=0&table=contact&action=do_add',
			type: 'POST',
			data: $('form').serialize()
		}).done(function(data) {
			//$('#pod-contact-us').html(data);
		}).fail(function(jqXHR, textStatus) {
			$('#pod-contact-us').html('<p>There was a problem sending your information: ' + textStatus+'</p>');
	});
}

function resizeTriangle(){
	var wide = $(window).width();
	var newWidth = 264;			// width of triangle
	var container = 890 + 50;	// width of main container + padding
	if (wide < (newWidth + container) ) {
		newWidth = (wide - container);
		if(newWidth < 0){ newWidth = 0; }
	}
	$('.blue-slice').css('width',newWidth);
}

function closeEle(myDiv){
	$(myDiv)
		.slideUp(800)
		.animate({
			opacity  : 0,
			"height" : 0 },
			{ queue: false, duration: 800 }
		);
	$(myDiv).html('');
}

function newsWire(){
	timerSpeed = 5000;
	var newsTicker = function() {
		setTimeout(function() {
			var h = (parseInt($('.news-ticker li:first').outerHeight()) * -1); // get the height of the li element, multiply by -1 to be negative
			$('.news-ticker li:first').animate( {marginTop: h + 'px'}, 800, function() {
				$(this).detach().appendTo('ul.news-ticker').removeAttr('style');
			});
			newsTicker();
		}, timerSpeed);
	};
	newsTicker();
}

function fourPodsCarousel(){
	var curCar = '';
	var temp = 0;
	var w = 175;
	var ulWidth = 0;
	$('ul.four-img-wrap').each(function(){
		curCar = $(this);
		temp = $('li',curCar).length;
		if(temp > 4){

			w = (parseInt($('li.cars-part:first',curCar).outerWidth())); // get the width of the li element
			ulWidth = (temp * w) + (10 * temp);
			$(curCar).css('width',ulWidth);

	if (window.console) console.log('note:' +temp +' * '+w +' = ' +ulWidth);
			w = w *-1;
			timerSpeed = 5000;

			var carousel4 = function() {
				setTimeout(function() {
					$('li.cars-part:first',curCar).animate( {marginLeft: w + 'px'}, 800, function() {
						$(this).detach().appendTo(curCar).removeAttr('style');
					});
					carousel4();
				}, timerSpeed);
			};
			carousel4();
		}
	});
}

function ticker(timerSpeed){
	if( $('li.current-news').next('li').length === 0 ){	// end of category news items | move to next category
		var currentCat = $('.current-cat');
		currentCat.nextOrFirst('.news-wire').addClass('current-cat');	// loop categories
		currentCat.children('ul').fadeOut('500',function(){
			currentCat.removeClass('current-cat');
			currentCat.children('ul').children('li.current-news').removeClass('current-news');
			$('.current-cat ul li:first').addClass('current-news');
			$('.current-cat').children('ul').fadeIn('fast');
			currentCat.children('ul').css({		// reset
				'top':'0',
				'left':'-743px'
			});
			var curCat = $('.current-cat').attr('id');
			switch(curCat){
				case 'investments':
					bgColor = '#f99d31';
					break;
				case 'acquisitions':
					bgColor = '#61116a';
					break;
				case 'corporate-services':
					bgColor = '#6cb33f';
					break;
				default:		// 'development'
					bgColor = '#0095c3';
					$('.current-slider').animate({backgroundPositionX:"+=175px", backgroundColor:"#0095c3"}, 250,
						function(){
							$('.current-slider').css('background-position-x','-917px');
							$('.current-slider').animate({backgroundPositionX:"-743px"}, 250);
						});
					break;
			}
			queueNewCat(timerSpeed,bgColor);
			$('.current-slider').animate({backgroundPositionX:"+=175px", backgroundColor:bgColor}, 500);
		});
	} else {	// move to next category story
		if (window.console) console.log('note: next story');
		$('li.current-news').next('li').addClass('current-news');
		$('li.current-news:first').removeClass('current-news');
		$('.current-cat ul').animate({top:'-=37px'}, 500);
	}
}

function queueNewCat(timerSpeed,bgColor){
	var newsCount = $('.current-cat ul li').length;
	var newsCount = $('.current-cat').children('ul').children('li').length;
if (window.console) console.log('note:' +newsCount);
	var timer = (timerSpeed * newsCount)-1000;
	$('.news-btm').animate({backgroundColor:bgColor, width:'100%'}, 500);
	$('.current-cat ul').show().animate({left:'0'}, 500, function(){
		$('.news-btm').animate({width:'0'}, timer, 'linear');
	});
}

function login(){
	$.ajax({
			url: '?login=attempt',
			type: 'POST',
			data: $('form').serialize()
		}).done(function(returnMsg) {
			if(returnMsg == 'Success'){
				$('.login-msg').html('Successfully logged in').fadeIn('slow');
				location.reload();
			} else {
				$('.login-msg').html(returnMsg).fadeIn('slow');
			}
		}).fail(function(jqXHR, textStatus) {
			$('.login-msg').html('Login Failed: ' + textStatus).fadeIn('slow');
	});
}

// = jQuery extended ========== //

/********************************************************************************
* jQuery.nextOrFirst()
* PURPOSE:  Works like next(), except gets the first item from siblings if there is no "next" sibling to get.
********************************************************************************/
jQuery.fn.nextOrFirst = function(selector){
var next = this.next(selector);
return (next.length) ? next : this.prevAll(selector).last();
}

/********************************************************************************
* jQuery.prevOrLast()
* PURPOSE: Works like prev(), except gets the last item from siblings if there is no "prev" sibling to get.
********************************************************************************/
jQuery.fn.prevOrLast = function(selector){
var prev = this.prev(selector);
return (prev.length) ? prev : this.nextAll(selector).last();
}
