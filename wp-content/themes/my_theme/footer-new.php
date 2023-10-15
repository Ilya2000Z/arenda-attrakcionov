<?php 
wp_reset_query();
//global $menuInfoEcho;
//global $menuCategoriesEcho;
global $CONTACTS;
$menuInfoFooter = array(
			'theme_location'  => '',
			'menu'            => 'Футер меню',
			'container'       => 'div',
			'container_class' => 'block',
			'container_id'    => '',
			'menu_class'      => 'block_width mx-auto align-items-center',
			'menu_id'         => '',
			'echo'            => false,
			'fallback_cb'     => false,
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul class="%2$s" id="%1$s">%3$s</ul>',
			'depth'           => 1,
			'walker'          => ''
);
$menuInfoFooterEcho = wp_nav_menu( $menuInfoFooter );
$menuCategoriesFooter = array(
			'theme_location'  => '',
			'menu'            => 'Футер категории',
			'container'       => 'div',
			'container_class' => 'block',
			'container_id'    => '',
			'menu_class'      => 'block_width mx-auto align-items-center',
			'menu_id'         => '',
			'echo'            => false,
			'fallback_cb'     => false,
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul class="%2$s" id="%1$s">%3$s</ul>',
			'depth'           => 1,
			'walker'          => ''
);
$menuCategoriesFooterEcho = wp_nav_menu( $menuCategoriesFooter );
$custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
?>
<?php $current_year = date('Y'); ?>
<?php /* ?>
<div class="gray_block subscribe__block mx-auto">
	<div class="stuff container">
		<!-- SUBSCRIBE -->
		es_subbox($namefield = "NO", $desc = "", $group = "Public"); 
	</div>
</div>
<?php */ ?>
<section class="footer-new container-fluid">
	<div class="container g-0 py-5">
		<div class="row justify-content-md-around g-4 g-lg-0 d-flex">
			<div class="col-lg-3 col-md-12 col-lg-auto order-first">
				<div class="copyright">
					<div class="copyright-info row">
						<div class="col-lg-12 col-md-6 col-sm-12">
							<img width="262" height="31" src="<?php echo $custom_logo__url[0] ?>" class="card-img-top" alt="">
						</div>
						<div class="copyright-info__txt col-lg-12 col-md-6 col-sm-12">
							<p class="mb-0">
								Аренда Аттракционов © 2013-<?= $current_year ?><br>Все права защищены.
							</p>
							<a href="/accept-privacy/">Политика конфиденциальности</a>
						</div>
					</div>
					<div class="copyright-widget">
						<iframe src="https://yandex.ru/sprav/widget/rating-badge/156026706348" width="150" height="50" frameborder="0"></iframe>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 order-first order-md-1">
				<div class="vstack">
					<p class="h5">Категории</p>
					<div class="footer-items-category" style="-webkit-column-count: 2;-moz-column-count: 2;column-count: 2;">
						<?php
						$menuCategoriesFooterEcho = strip_tags($menuCategoriesFooterEcho, '<a>');
						echo $menuCategoriesFooterEcho;
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 order-3">
				<div class="vstack">
					<p class="h5">Меню</p>
					<?php
					$menuInfoFooterEcho = strip_tags($menuInfoFooterEcho, '<a>');
					echo $menuInfoFooterEcho;
					?>
				</div>
			</div>
			<div class="col-lg-auto order-4">
				<div class="vstack">
					<?= $CONTACTS ?>
				</div>
			</div>
		</div>
	</div>
</section>
<div id="messengers__fixblock">
	<?php
	if (function_exists('dynamic_sidebar'))
		// dynamic_sidebar('sidebar-messengers_left');
	?>
</div>
<? wp_footer(); ?>
<?php
global $video_src;
if( @$video_src ) { ?>
<?php } ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
            ( function () {
                'use strict';
                var loadedMetrica = false,
                    metricaId     = 24366505,
                    timerId;
                if ( navigator.userAgent.indexOf( 'YandexMetrika' ) > -1 ) {
                    loadMetrica();
                } else {
                    window.addEventListener( 'scroll', loadMetrica, {passive: true} );
                    window.addEventListener( 'touchstart', loadMetrica );
                    document.addEventListener( 'mouseenter', loadMetrica );
                    document.addEventListener( 'click', loadMetrica );
                    document.addEventListener( 'DOMContentLoaded', loadFallback );
                }
                function loadFallback() {
                    timerId = setTimeout( loadMetrica, 10000 );
                }
                function loadMetrica( e ) {
                    if ( e && e.type ) {
                        console.log( e.type );
                    } else {
                        console.log( 'DOMContentLoaded' );
                    }
                    if ( loadedMetrica ) {
                        return;
                    }
                    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js", "ym");
                    ym( metricaId, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true});
                    loadedMetrica = true;
                    clearTimeout( timerId );
                    window.removeEventListener( 'scroll', loadMetrica );
                    window.removeEventListener( 'touchstart', loadMetrica );
                    document.removeEventListener( 'mouseenter', loadMetrica );
                    document.removeEventListener( 'click', loadMetrica );
                    document.removeEventListener( 'DOMContentLoaded', loadFallback );
                }
            } )()
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/24366505" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Google Tag Manager -->
<script>
document.addEventListener('DOMContentLoaded', () => {
	setTimeout(initGTM, 3500);
});
document.addEventListener('scroll', initGTMOnEvent);
document.addEventListener('mousemove', initGTMOnEvent);
document.addEventListener('touchstart', initGTMOnEvent);
function initGTMOnEvent (event) {
	initGTM();
	event.currentTarget.removeEventListener(event.type, initGTMOnEvent);
}
function initGTM () {
	if (window.gtmDidInit) {
		return false;
	}
	window.gtmDidInit = true;
	const script = document.createElement('script');
	script.type = 'text/javascript';
	script.async = true;
	script.onload = () => { dataLayer.push({ event: 'gtm.js', 'gtm.start': (new Date()).getTime(), 'gtm.uniqueEventId': 0 }); }
	script.src = 'https://www.googletagmanager.com/gtm.js?id=GTM-MXVR8MC';
	document.head.appendChild(script);
}
</script>
<!-- End Google Tag Manager -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
	<script>
		var IP_ADDR = '<?= $_SERVER['REMOTE_ADDR'] ?>';
	</script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ingevents.4.0.8.min.js"></script>
	<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap5.1.3.bundle.min.js"></script>
	<!--<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>-->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.brazzers-carousel.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts-new.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts-redesign.js"></script>
<script>
		//alert('test');
		jQuery(document).ready(function() {
			jQuery(".fancybox").fancybox({
				openEffect: 'none',
				closeEffect: 'none',
				afterLoad: function() {
					this.content = this.content.html();
				}
			});
			<?php if (is_category()) {
			?>
				jQuery("div.product div.img-items.brazz").brazzersCarousel();
				jQuery("div.product div.img-items").toggleClass("brazz");
				jQuery('div.product').on('click', function(evt) {
					if (jQuery(evt.target).hasClass('active')) {
						var href = evt.target.hasAttribute('data-href') ?
							evt.target.getAttribute('data-href') :
							evt.currentTarget.getAttribute('data-href');
						//window.location.href = href;
					}
				});
			<?php }
			?>
		});
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];
		window.dataLayer.push({
			'event': 'ipEvent',
			'ipAddressYa': '<?= $_SERVER["REMOTE_ADDR"] ?>'
		});
	</script>
<script>
			$(function() {
				// get the sticky element
				let tempLeft = $('ul.block_width').width() - $('div.block').width() + 76;
				let stickyElm = document.querySelector('nav');
				let navBar = $('nav.navbar');
				let countsNav = $('ul.block_width li').length;
				let widthNavEl = $('ul.block_width li').length * 100;
				let navWidthEl = $('ul.block_width').width();
				let navWidthParentContEl = $('ul.block_width').parent().width();
				let leftClick = navWidthEl / countsNav;
				let heightNav = 0;
				//let swipeWidth = 0;
				//console.log(navWidthEl, widthNavEl);
				if (jQuery(window).width() >= 992) {
					jQuery('.dropdown-menu #menu-menyu-na-glavnoj').slick({
						slidesToShow: 11,
						dots: false,
						infinite: false,
						swipe: false,
						draggable: false,
						swipeToSlide: false,
						touchMove: false,
						//autoplay: true,
						//autoplaySpeed: 4000,
						speed: 300,
						arrows: true,
						slidesToScroll: 4,
						//variableWidth: true,
						//margin:12px,
						//loop:true,
						responsive: [{
							breakpoint: 1024,
							settings: {
								slidesToShow: 8,
								slidesToScroll: 1,
							}
						}]
					});
				}
				jQuery('.navbar > .second-row-nav #menu-menyu-na-glavnoj').slick({
					slidesToShow: 11,
					dots: false,
					infinite: false,
					swipe: false,
					draggable: false,
					swipeToSlide: false,
					touchMove: false,
					speed: 300,
					arrows: true,
					slidesToScroll: 4,
					//variableWidth: true,
					//margin:12px,
					//loop:true,
					responsive: [{
						breakpoint: 1024,
						settings: {
							slidesToShow: 8,
							slidesToScroll: 1,
						}
					}]
				});
				<?php //} 
				?>
				const observer = new IntersectionObserver(([e]) => e.target.classList.toggle('isSticky', e.boundingClientRect.top < 0), {
					threshold: [1]
				})
				observer.observe(stickyElm);
				$(window).scroll(function() {
					let top = $(window).scrollTop();
					let navSticky = $('nav.isSticky').height();
					let firstRowHNav = $('nav.navbar').height() - 6;
					//let document_height=$(document).height();
					heightNav = navSticky + 18;
					if (top >= 220 && !navBar.hasClass('isFixed')) {
						navBar.toggleClass('isFixed');
					} else if (top < 220 && navBar.hasClass('isFixed')) {
						navBar.toggleClass('isFixed');
					}
					$('.wrap-cat-menu').css({
						'top': heightNav + "px",
						'zIndex': 'auto'
					});
					<?php if (wp_is_mobile()) {
					?>
						$('.left-column').css({
							'top': heightNav + "px",
							'zIndex': 'auto'
						});
						$('.right-column .mobile-container-info-buttons').css({
							'top': firstRowHNav + "px !important",
							'paddingTop': '1px'
						});
					<?php }
					?>
				});
				<?php //if(!is_category()) { 
				?>
				$(window).resize(function() {
					leftInitial = $('ul.block_width').position().left;
					tempLeft = $('ul.block_width').width() - $('div.block').width() + 76;
					stickyElm = document.querySelector('nav');
					navBar = $('nav.navbar');
					countsNav = $('ul.block_width li').length;
					navWidthEl = $('ul.block_width').width();
					navWidthParentContEl = $('ul.block_width').parent().width();
					leftClick = navWidthEl / countsNav;
					heightNav = 0;
					if (navWidthParentContEl < navWidthEl) {
						$('#nav-right-btn').show();
					} else {
						$('#nav-right-btn, #nav-left-btn').hide();
					}
				});
				<?php //} 
				?>
			});
		</script>
</body>
</html>