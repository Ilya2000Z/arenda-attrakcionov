function getPatternVideo(videoWidth, videoHeight, link) {
	return '<iframe width="' + videoWidth + '" height="' + videoHeight + '" src="' + link + '?autoplay=1" frameborder="0" allowfullscreen allow="autoplay"></iframe>';
}

$(function() {

	let sliders = '';

	//three items slider
	sliders = $('.three-items-slider');
	sliders.each(function(index){
		$(this).addClass("instance-" + index);

		let swiper = new Swiper('.three-items-slider.instance-' + index + ' .swiper', {
			loop: false,
			slidesPerView: 3,
			spaceBetween: 26,
			navigation: {
				nextEl: ".three-items-slider.instance-" + index + " .swiper-button-next",
				prevEl: ".three-items-slider.instance-" + index + " .swiper-button-prev",
			},
			breakpoints: {
				768: {
					slidesPerView: 3,
				},
				576: {
					slidesPerView: 2,
					centeredSlides: false,
				},
				0: {
					slidesPerView: 'auto',
					centeredSlides: true,
				}
			}
		});
	});


	//four items slider
	sliders = $('.four-items-slider');
	sliders.each(function(index){
		$(this).addClass("instance-" + index);

		let swiper = new Swiper('.four-items-slider.instance-' + index + ' .swiper', {
			loop: false,
			slidesPerView: 4,
			spaceBetween: 21,
			navigation: {
				nextEl: ".four-items-slider.instance-" + index + " .swiper-button-next",
				prevEl: ".four-items-slider.instance-" + index + " .swiper-button-prev",
			},
			breakpoints: {
				1200: {
					slidesPerView: 4,
				},
				768: {
					slidesPerView: 3,
				},
				576: {
					slidesPerView: 2,
					centeredSlides: false,

				},
				0: {
					slidesPerView: 'auto',
					centeredSlides: true,
				}
			}
		});
	});

	//any items slider
	sliders = $('.any-items-slider');
	sliders.each(function(index){
		$(this).addClass("instance-" + index);

		let swiper = new Swiper('.any-items-slider.instance-' + index + ' .swiper', {
			loop: false,
			slidesPerView: 'auto',
			spaceBetween: 30,
			navigation: {
				nextEl: ".any-items-slider.instance-" + index + " .swiper-button-next",
				prevEl: ".any-items-slider.instance-" + index + " .swiper-button-prev",
			},
			breakpoints: {
				576: {
					slidesPerView: 'auto',
					centeredSlides: false,

				},
				0: {
					// centeredSlides: true,
				}


			}
		});
	});

	// thumbs slider
	sliders = $('.thumbs-gallery');
	sliders.each(function(index){

		$(this).addClass("instance-" + index);

		let swiper = new Swiper('.thumbs-gallery.instance-' + index + ' .thumbs-block .swiper', {
			spaceBetween: 12,
			slidesPerView: 4,
			freeMode: true,
			watchSlidesProgress: true,
			navigation: {
				nextEl: ".thumbs-gallery.instance-" + index + " .thumbs-block .swiper-button-next",
				prevEl: ".thumbs-gallery.instance-" + index + " .thumbs-block .swiper-button-prev",
			},
		});

		let swiper2 = new Swiper('.thumbs-gallery.instance-' + index + ' .preview-block', {
			spaceBetween: 10,
			thumbs: {
				swiper: swiper,
			},
		});
	});

	//popup gallery
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tClose: 'Закрыть (Esc)',
		tLoading: 'Загрузка #%curr%...',
		mainClass: 'popup-gallery-modal mfp-with-zoom',
		gallery: {
			tPrev: 'Предыдущее (Клавиша влево)', // Alt text on left arrow
			tNext: 'Следующее (Клавиша вправо)', // Alt text on right arrow
			tCounter: '%curr% из %total%', // Markup for "1 of 7" counter
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		zoom: {
			enabled: true, // By default it's false, so don't forget to enable it

			duration: 300, // duration of the effect, in milliseconds
			easing: 'ease-in-out', // CSS transition easing function

			// The "opener" function should return the element from which popup will be zoomed in
			// and to which popup will be scaled down
			// By defailt it looks for an image tag:
			opener: function(openerElement) {
				// openerElement is the element on which popup was initialized, in this case its <a> tag
				// you don't need to add "opener" option if this code matches your needs, it's defailt one.
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		},
		image: {
			tError: 'Ошибка загрузки <a href="%url%">изображения #%curr%</a>'//,
		}
	});

	//popup-img
	$(document).magnificPopup({
		delegate: '.popup-img',
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true,
			titleSrc: 'titleSrc'
		},
		zoom: {
			enabled: true, // By default it's false, so don't forget to enable it

			duration: 300, // duration of the effect, in milliseconds
			easing: 'ease-in-out', // CSS transition easing function

			// The "opener" function should return the element from which popup will be zoomed in
			// and to which popup will be scaled down
			// By defailt it looks for an image tag:
			opener: function(openerElement) {
				// openerElement is the element on which popup was initialized, in this case its <a> tag
				// you don't need to add "opener" option if this code matches your needs, it's defailt one.
				// return openerElement;
				// если это картинка карточки .product-offer-card. то надо переписать путь к картинке для зума
				if (openerElement.closest('.product-offer-card_image').length > 0) {
					return (openerElement.closest('.product-offer-card_image').children('.common-image'));
				}else{
					return openerElement;
				}
			}
		}


	});

	//открытие закрытие спойлеров
	$(document).on('click', '.spoiler-block .spoiler-title', function(event) {
		$(this).toggleClass('open');
		$(this).next('.spoiler-content').slideToggle();
	});

	// .seo bottom block show hide
	$(document).on('click', '.seo-section .text', function(event) {
		$(this).toggleClass('show');
	});

	// about team section mobile hide show
	if ($(window).width() < 768) {
		$(document).on('click', '.about-team-section .about-team-wrapper .text', function(event) {
			$(this).toggleClass('show');
		});
	}

	// .subcategories-wrapper mobile
	if ($(window).width() < 768) {
		$(document).on('click', '.subcategories-wrapper .mobile-title', function(event) {
			$(this).toggleClass('on');
			$(this).next('.wrapper').slideToggle();
		});
	}

	// Показываем видео ютюб по клику
	$('.video-slide').on('click', function (e) {
		link = $(this).data('link');
		var parent = $(this);
		videoWidth = parent.width();
		videoHeight = parent.height();
		parent.css({
			'width': videoWidth,
			'height': videoHeight
		});
		parent.addClass('loading');
		parent.html(getPatternVideo(videoWidth, videoHeight, link));
	});


});
