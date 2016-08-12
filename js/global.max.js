$(document).ready(function() {



$('.nav-branch-locations').click(function(){
	window.location.href = "/branch-locations";
});
$('.nav-about-mcu').click(function(){
	window.location.href = "/about-mcu";
});
$('.nav-join-mcu').click(function(){
	window.location.href = "/join-mcu";
});

if($('.pods-features-homepromo').length){
	$('.pods-features-homepromo p img, .pods-features-homepromo p a').each(function(){
		if($(this).prev('img').length || $(this).prev('a').length){
			$(this).css('display','none');
		} else {
			$(this).addClass('currentslide');
		}
	});
	setInterval(function(){
		$('.currentslide').css('position','absolute').next().addClass('currentslide').fadeIn(function(){
			$('.currentslide').css('position','relative');
			$('.currentslide:first').css({'display':'none','position':'absolute'}).removeClass('currentslide').appendTo('.pods-features-homepromo p');
		});
	},5000);
}


$('.chart-blue').each(function(){
	blue = $(this).height();
	white = $(this).next('.chart-white').height();
	if(blue > white){
		$(this).next('.chart-white').css('height',blue+'px');
	} else {
		$(this).css('height',white+'px');
	}
});

var breadcrumb = 'none';
if( $('.breadcrumbs').html()){
	breadcrumb = $('.breadcrumbs').html();
}
$('.pods-features-interior-main').each(function(){

	if($(this).next('.pods-features-interior-main').length && breadcrumb.indexOf("Loan Center") >= 0){
		$(this).children('.contain').append('<div class="border-loan">&nbsp;</div>');
	}
	if($(this).next('.pods-features-interior-main').length && breadcrumb.indexOf("Money Center") >= 0){
		$(this).children('.contain').append('<div class="border-save">&nbsp;</div>');
	}
	if($(this).next('.pods-features-interior-main').length && breadcrumb.indexOf("Account Tools") >= 0){
		$(this).children('.contain').append('<div class="border-account">&nbsp;</div>');
	}
	if($(this).next('.pods-features-interior-main').length && breadcrumb.indexOf("About MCU") >= 0){
		$(this).children('.contain').append('<div class="border-about">&nbsp;</div>');
	}
	if($(this).next('.pods-features-interior-main').length && breadcrumb.indexOf("Join MCU") >= 0){
		$(this).children('.contain').append('<div class="border-join">&nbsp;</div>');
	}
});

$('.locationArea').click(function(){
	if(!$(this).hasClass('current')){
		old = $(this).siblings('.current').attr('id');
		$(this).siblings().removeClass('current');
		city = $(this).parent('ul').parent('div').attr('id');
		area = $(this).attr('id');
		$(this).addClass('current');
		$(this).parent('ul').parent('div').children('.locationInfo.'+old).fadeOut(function(){
			$('#'+city+' .'+area).fadeIn();
		});
	}
});

$('#tmpl-search table').remove();

$(document).click(function(event) {
    if(!$(event.target).hasClass('lvl-0') && !$(event.target).parents('li').hasClass('lvl-0') && !$(event.target).parents('div').hasClass('nav-open') && !$(event.target).hasClass('nav-open')) {
		$('#main-nav li.current').animate({backgroundPositionY:'60px'},250, function(){
			$('#main-nav li.current').siblings('li').removeClass('currentsib');
			$('#main-nav li.current').removeClass('current');
		});
		$('.nav-open').slideUp(250);
		$('.nav-open ul').remove();
    }
})

$('.orange-btn').hover(function(){
		$(this).css('background-color','#00728f');
	}, function(){
		$(this).css('background-color','#ec881d');
});

$('.nav-loan-center, .nav-account-tools, .nav-money-center').click(function(event){
	event.preventDefault();
	if( $(this).hasClass('current') ){
		$(this).animate({backgroundPositionY:'60px'},250, function(){
			$(this).siblings('li').removeClass('currentsib');
			$(this).removeClass('current');
		});
		$('.nav-open').slideUp(250, function(){
			$('.nav-open ul').remove();
			$('.nav-open').css('height','inherit');
			$('.pods-features-auto-rate, .pods-features-fixed-rate').hide();
		});
	} else if( $(this).siblings().hasClass('current') ) {
		$('#main-nav ul li').removeClass('currentsib').removeClass('current');
		$(this).addClass('current');
		$(this).siblings().addClass('currentsib');
		if ($(window).width() < 1080) {
			$(this).animate({backgroundPositionY:'42px'},250);
		} else {
			$(this).animate({backgroundPositionY:'48px'},250);
		}
		$(this).siblings().css('background-position-y','60px');
		menu = $(this).children('ul.lvl-1').clone();
		menu.css({'display':'none','position':'absolute'}).prependTo('.nav-open').fadeIn('fast');
		height = $('.nav-open').children('ul.lvl-1:first-child').height();

		if( !$(this).hasClass('nav-loan-center') ){
			$('.pods-features-auto-rate, .pods-features-fixed-rate').fadeOut('fast');
			$('.nav-open').animate({'height':height+'px'});
		} else { $('.pods-features-auto-rate, .pods-features-fixed-rate').fadeIn('fast').css('display','inline-block'); $('.nav-open').animate({'height':height+75+'px'}); }
		$('.nav-open ul:nth-of-type(2)').fadeOut('fast',function(){
			$('.nav-open ul:nth-of-type(2)').remove();
			$('.nav-open ul').css('position','relative');
		});
	} else {
		$(this).children('ul').clone().prependTo('.nav-open');
		if( $(this).hasClass('nav-loan-center') ){
			$('.pods-features-auto-rate, .pods-features-fixed-rate').show().css('display','inline-block');
		}
		$(this).addClass('current');
		$(this).siblings().addClass('currentsib');
		$('.nav-open').slideDown(250);
		if ($(window).width() < 1080) {
			$(this).animate({backgroundPositionY:'42px'},250);
		} else {
			$(this).animate({backgroundPositionY:'48px'},250);
		}
	}

});

if ($(window).width() < 768) {
	$('#search').detach().insertBefore('#footer');
	$('.pods-none-right-column, .pods-features-disclaimer').detach().appendTo('#tmpl-interior .copy-wrap:last-child');
}

$(window).resize(function(){
	if ($(window).width() < 768) {
		$('#header #search').detach().insertBefore('#footer');
		$('.pods-none-right-column, .pods-features-disclaimer').detach().appendTo('#tmpl-interior .copy-wrap:last-child');
	}
	if ($(window).width() > 768) {
		$('footer #search').detach().insertAfter('#login');
		$('.pods-none-right-column, .pods-features-disclaimer').detach().prependTo('#tmpl-interior .copy-wrap:last-child');
	}
});

$('a').each(function(){
	href = $(this).prop('href');
	if (href.toLowerCase().indexOf("https") >= 0 && href.toLowerCase().indexOf("missouricu") < 1 && href.toLowerCase().indexOf("mfmnow") < 1){
		href = href.replace("https", "http");
		$(this).prop('href',href);
	}
});

setTimeout(function(){
		$('.hidden-hank').animate({top:'-12px'},500);
		var randNum = Math.floor(Math.random()*(21-1+1)+1);
		$('#hank-expand').html('<img src="/wp-content/uploads/static/hank-tips/Hank-Tips_'+randNum+'.jpg" alt="A tip from Hank" />');
	}, 1000);
	$('.hidden-hank').click(function() {
		$('.hidden-hank').animate({top:'-100px'},500, function(){
			$('#hank-expand').slideDown(500);
			setTimeout(function(){
				$('#hank-expand').slideUp(500, function(){
					$('.hidden-hank').animate({top:'-12px'},500);
					var randNum = Math.floor(Math.random()*(21-1+1)+1);
					$('#hank-expand').html('<img src="/wp-content/uploads/static/hank-tips/Hank-Tips_'+randNum+'.jpg" alt="A tip from Hank" />');
				});
			}, 10000);
		});
	});

});
