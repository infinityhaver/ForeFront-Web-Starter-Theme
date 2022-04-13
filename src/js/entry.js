import 'script-loader!jquery';
import 'script-loader!bootstrap/dist/js/bootstrap.bundle.min.js';
import 'script-loader!lightslider';
import 'script-loader!slick-carousel';
import 'script-loader!sticky-scroll';
import 'script-loader!smartmenus';
import 'script-loader!table2csv';
import 'hamburgers/dist/hamburgers.css';
import retina from 'retinajs';
import AOS from 'aos';
import velocity from 'velocity-animate';
import fontawesome from '@fortawesome/fontawesome';
import faSolid from '@fortawesome/fontawesome-free-solid';
import faBrands from '@fortawesome/fontawesome-free-brands';
import fancybox from '@fancyapps/fancybox';
import 'smartmenus/dist/css/sm-core-css.css';
import 'smartmenus/dist/css/sm-simple/sm-simple.scss';
import 'slick-carousel/slick/slick.scss';
import 'slick-carousel/slick/slick-theme.scss';
import '../scss/entry.scss';

jQuery(document).ready(function($) {

	// tab content block
	$('.ffw-tabber').on('click', function() {
		$(this).siblings().removeClass('active');
	});
	
	// desktop header search toggle
	$('li.dt-search a').on('click', function() {
		$(this).children().toggleClass('fa-search fa-times');
		$('.dt-search-wrap').toggleClass('open closed');
	});


	// bootstrap popovers -- see: https://getbootstrap.com/docs/5.0/components/popovers/ for more info
	$(document).ready(function() {
		if($('[data-bs-toggle="popover"]')[0]) {
			var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
			var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
				return new bootstrap.Popover(popoverTriggerEl)
			});
			// dismiss the popover on click
			var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
				trigger: 'focus'
			});
		}
	});

	// bootstrap tooltips -- see: https://getbootstrap.com/docs/5.0/components/tooltips/ for more info
	$(document).ready(function() {
		if($('[data-bs-toggle="tooltip"]')[0]) {
			var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
			var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
				return new bootstrap.Tooltip(tooltipTriggerEl)
			});
		}
	});

	// hamburger stuffs
	var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
	var hamburgers = document.querySelectorAll(".hamburger");
	if (hamburgers.length > 0) {
		forEach(hamburgers, function(hamburger) {
			hamburger.addEventListener("click", function() {
				this.classList.toggle("is-active");
			}, false);
		});
	}

	// accordions
	$('.accordion-toggle').on('click', function() {
		$(this).next('.accordion-toggled').slideToggle('fast');
		$(this).children('.accordion-arrow').toggleClass('arrow-down arrow-up');
	});

	// header search toggle
	$('#search-toggle').on('click', function() {
		$(this).toggleClass('glass').toggleClass('close');
		$('#search-box').toggleClass('open');
		$('#top-search').focus();
	});

	// fancybox
	$(document).ready(function() {
		$("a.fancybox").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	600, 
			'speedOut'		:	200, 
			'overlayShow'	:	false
		});
	});

	// add responsive class to all images
	$(function() {
		$('img').addClass('img-fluid');
	});

	// primary menu
	$(function() {
		$('.sm').smartmenus({
			subMenusSubOffsetX: 1,
			subMenusSubOffsetY: -3
		});
	});

	// primary navigation toggle
	$('.nav-toggle').on('click', function() {
		$('.primary-nav-wrap').slideToggle('fast');
	});

	// scroll back to top button
	$(document).ready(function($){
		// browser window scroll (in pixels) after which the "back to top" link is shown
		var offset = 300,
			//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
			offset_opacity = 1200,
			//duration of the top scrolling animation (in ms)
			scroll_top_duration = 300,
			//grab the "back to top" link
			$back_to_top = $('.cd-top');
		//hide or show the "back to top" link
		$(window).scroll(function(){
			( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
			if( $(this).scrollTop() > offset_opacity ) { 
				$back_to_top.addClass('cd-fade-out');
			}
		});
		//smooth scroll to top
		$back_to_top.on('click', function(event){
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0 ,
				}, scroll_top_duration
			);
		});
	});

	// acf slider
	$('.slider-prev').on('click', function(){
		$(this).parent().prev().slick('slickPrev');
	});
	$('.slider-next').on('click', function(){
		$(this).parent().prev().slick('slickNext');
	});

	// header scroll effects
	$(document).ready(function($){
		var offset = 106,
			header = $('#masthead');
		$(window).scroll(function(){
			($(this).scrollTop() > offset ) ? header.addClass('fixed-header') : header.removeClass('fixed-header');
		});
	});

	function headerEffects() {
		var navbar = $('#masthead');
		$(window).scroll(function () {
			var scrollPosition = $(window).scrollTop();
			if (scrollPosition > 130)
				navbar.addClass('site-header--scrolled');
			else
				navbar.removeClass('site-header--scrolled');
		});
	}
	(function(){
		var doc = document.documentElement;
		var w = window
		var prevScroll = w.scrollY || doc.scrollTop;
		var curScroll;
		var direction = 0;
		var prevDirection = 0;
		var header = document.getElementById('masthead');
		var checkScroll = function() {
			curScroll = w.scrollY || doc.scrollTop;
			if (curScroll > prevScroll) { 
				//scrolled up
				direction = 2;
			}
			else if (curScroll < prevScroll) { 
				//scrolled down
				direction = 1;
			}
			if (direction !== prevDirection) {
				toggleHeader(direction, curScroll);
			}
			prevScroll = curScroll;
		};
		var toggleHeader = function(direction, curScroll) {
			if (direction === 2 && curScroll > 54) { 
				//replace 52 with the height of your header in px
				header.classList.add('hide');
				prevDirection = direction;
			}
			else if (direction === 1) {
				header.classList.remove('hide');
				prevDirection = direction;
			}
		};
		window.addEventListener('scroll', checkScroll);
	})();

	// custom 404
	$(function () {
		$().ready(function () {
			(function () {
				var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
				window.requestAnimationFrame = requestAnimationFrame
			})();
			var canvas = document.getElementById('canvas-404');
			if (canvas === null)return;
			setTimeout(function () {
				$('.js-toaster_lever').delay(200).animate({top: 30}, 100);
				$('.js-toaster_toast').removeClass('js-ag-hide').addClass('js-ag-animated js-ag-bounce-in-up')
			}, 800);
			var ctx = canvas.getContext("2d"),
				loading = true;
				canvas.height = 210;
				canvas.width = 300;
			var parts = [],
				minSpawnTime = 100,
				lastTime = new Date().getTime(),
				maxLifeTime = Math.min(6000, (canvas.height / (1.5 * 60) * 1000)),
				emitterX = canvas.width / 2 - 50,
				emitterY = canvas.height - 10,
				smokeImage = new Image();
			function spawn() {
				if (new Date().getTime() > lastTime + minSpawnTime) {
					lastTime = new Date().getTime();
					parts.push(new smoke(emitterX, emitterY))
				}
			}
			function render() {
				if (loading) {
					load();
					return false
				}
				var len = parts.length;
				ctx.clearRect(0, 0, canvas.width, canvas.height);
				while (len--)if (parts[len].y < 0 || parts[len].lifeTime > maxLifeTime) {
					parts.splice(len, 1)
				} else {
					parts[len].update();
					ctx.save();
					var offsetX = -parts[len].size / 2, offsetY = -parts[len].size / 2;
					ctx.translate(parts[len].x - offsetX, parts[len].y - offsetY);
					ctx.rotate(parts[len].angle / 180 * Math.PI);
					ctx.globalAlpha = parts[len].alpha;
					ctx.drawImage(smokeImage, offsetX, offsetY, parts[len].size, parts[len].size);
					ctx.restore()
				}
				spawn();
				requestAnimationFrame(render)
			}
			function load() {
				if (loading) {
					setTimeout(load, 3000);
				} else {
					render();
				}
			}
			render();
		});
	});

	// csv exports
	$(document).ready(function() {
		$('#example-dl').on('click', function() {
			$("#example-csv").table2csv({
				filename: 'example'
			});
		});
	});

	// animate on scroll init
	AOS.init({ once: true, duration: 700 });

});