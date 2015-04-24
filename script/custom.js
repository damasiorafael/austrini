
/* NAVBAR EFFECT -------------------------------------------------------------------- */

	function getScrollTop() {
		browserSupportsBoxModel = '';
		return window.pageYOffset || (browserSupportsBoxModel && document.documentElement.scrollTop) || document.body.scrollTop;
	}
	$(window).scroll(function() {
		positionTop = parseInt(getScrollTop(), 10);
		if(positionTop<=200){
			$('nav', document.body).removeClass('nav-fixed');
			$('.top-button', document.body).removeClass('show');
		}else{
			$('nav', document.body).addClass('nav-fixed');
			$('.top-button', document.body).addClass('show');
		}
		positionTop<=406 ? $('#breadcrumbs').removeClass('breadcrumbs-fixed') : $('#breadcrumbs').addClass('breadcrumbs-fixed') ;
	});


/* MENU INIZIALIZE ------------------------------------------------------------------- */
	$('.menu-nav', document.body).menuResponsive();


/* CAROUSEL FEEDBACK ----------------------------------------------------------------- */
	$('#carousel-feedback', document.body).carousel({
		interval: 100000
	});


/* CAROUSEL EVENTOS ------------------------------------------------------------------ */
	$('#carousel').carousel({
		interval: 2000
	});


/* SPINNER  -------------------------------------------------------------------------- */
	$(function() {
		$("#adults", document.body).spinner({
			min: 1,
			max: 20
		});
		$("#children", document.body).spinner({
			min: 0,
			max: 20
		});
	});


/* SLIDER  --------------------------------------------------------------------------- */
	$(document).ready(function(){

		$('#top').nivoSlider({
			effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: 500, // Slide transition speed
	        pauseTime: 3000, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: false, // Next & Prev navigation
	        controlNav: true, // 1,2,3... navigation
	        controlNavThumbs: false, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        //manualAdvance: false, // Force manual transitions
	        //prevText: 'Prev', // Prev directionNav text
	        //nextText: 'Next', // Next directionNav text
	        randomStart: true, // Start on a random slide
	        //beforeChange: function(){}, // Triggers before a slide transition
	        //afterChange: function(){}, // Triggers after a slide transition
	        //slideshowEnd: function(){}, // Triggers after all slides have been shown
	        //lastSlide: function(){}, // Triggers when last slide is shown
	        //afterLoad: function(){}
		});

		$('.slide .backstretch img', document.body).on('dragstart', function(event) { event.preventDefault(); });

		$(".slidecontent", document.body).each(function(){
			$(this).css('margin-top', -$(this).height()/2);
		});

	});


/* SCROLL TOP  ----------------------------------------------------------------------- */
	$('#menu-nav', document.body).scrollTopAll({
		speed: 1400,
		easing: 'easeInOutQuart'
	});


/* ANIMATE EFFECT  ------------------------------------------------------------------- */
	new WOW().init();


/* GRID A LICIOUS  ------------------------------------------------------------------- */
	$("#article-list", document.body).gridalicious({
		gutter: 1,
		width: 333
	});


/* BUTTON SCROLL TOP  ---------------------------------------------------------------- */
	$(".top-button", document.body).on('click', function(){
		$('html, body').animate({ 
				scrollTop: 0
		}, 1400, 'easeInOutQuart');
		return false;
	});


/* DTPICKER  ------------------------------------------------------------------------- */
	$(function(){

		$('.dtpicker', document.body).appendDtpicker({
			"dateOnly": true,
			"dateFormat": "MM/DD/YYYY",
			"autodateOnStart": true,
			"closeOnSelected": true,
			"todayButton": false,
			"futureOnly": true
		});

		function getdate(dateStart, dayStart) {

			date    = new Date(dateStart);
			newdate = new Date(date);

			dayStart=='-' ? newdate.setDate(newdate.getDate() - 1) 
						  : newdate.setDate(newdate.getDate() + 1) ;

			newdate.getDate() <= 9 ? dd = '0'+newdate.getDate() : dd = newdate.getDate() ; 
			newdate.getMonth()+1 <= 9 ? mm = '0'+(newdate.getMonth()+1) : mm = newdate.getMonth()+1 ; 
			y = newdate.getFullYear();

			someFormattedDate = mm + '/' + dd + '/' + y;
			return someFormattedDate;
		}

		$fromField = $('input#from', document.body);
		$fromTo = $('input#to', document.body);
		$send = $('#send-reservation', document.body);

		$fromField.on('change', function(){

			// data from
			dataFromFormatted = this.value;
			dataFrom = dataFromFormatted.split('/');
			var from = new Date(dataFrom[2], dataFrom[0]-1, dataFrom[1], 0,0,0,0);

			// data to
			dataTo = $fromTo.val();
			dataTo = dataTo.split('/');
			var to = new Date(dataTo[2], dataTo[0]-1, dataTo[1], 0,0,0,0);

			if(to <= from){
				$fromTo.handleDtpicker('setDate', getdate(dataFromFormatted, '+'));
			}

		});

		$fromTo.on('change', function(){

			// data from
			dataFromFormatted = $fromField.val();
			dataFrom = dataFromFormatted.split('/');
			var from = new Date(dataFrom[2], dataFrom[0]-1, dataFrom[1], 0,0,0,0);

			// data to
			dataTo = this.value;
			dataTo = dataTo.split('/');
			var to = new Date(dataTo[2], dataTo[0]-1, dataTo[1], 0,0,0,0);

			if(from >= to){
				$fromTo.handleDtpicker('setDate', getdate(dataFromFormatted, '+'));
			}

		});

		//Set today Date
		today = new Date();
		today.getDate() <= 9 ? todayDate = '0'+today.getDate() 
							 : todayDate = today.getDate() ;
		today.getMonth()+1 <= 9 ? todayMonth = '0'+(today.getMonth()+1) 
							  : todayMonth = today.getMonth()+1 ;
		todayYear  = today.getFullYear();

		$fromField.val(todayMonth+'/'+todayDate+'/'+todayYear);
		$fromTo.val(getdate(today,'+'));

	});