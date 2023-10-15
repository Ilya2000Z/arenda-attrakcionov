<?php
$menuCategories = array(
	'theme_location'  => '',
	'menu'            => 'Меню на главной',
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
global $menuCategoriesEcho;
$menuCategoriesEcho = wp_nav_menu($menuCategories);
if (!is_category()) {
	echo '<div class="second-row-nav container d-none d-lg-flex flex-nowrap">';
	echo $menuCategoriesEcho;
?>
	<button class="nav-left-arrow btn btn-light" id="nav-left-btn"><i class="bi bi-chevron-double-left fs-4"></i></button>
	<button class="nav-right-arrow btn btn-light" id="nav-right-btn"><i class="bi bi-chevron-double-right fs-4"></i></button>
	</div>
<?php } ?>
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
		<?php if (!is_category()) { ?>
			$('#menu-menyu-na-glavnoj').slick({
				dots: false,
				infinite: false,
				speed: 300,
				arrows: true,
				slidesToShow: 12,
				slidesToScroll: 1,
				variableWidth: true,
				responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 11,
						slidesToScroll: 1,
					}
				}]
			});
		<?php } ?>
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
			if (top >= 720 && !navBar.hasClass('isFixed')) {
				navBar.toggleClass('isFixed');
			} else if (top < 720 && navBar.hasClass('isFixed')) {
				navBar.toggleClass('isFixed');
			}
			$('.wrap-cat-menu').css({
				'top': heightNav + "px",
				'zIndex': 'auto'
			});
			<?php if (!wp_is_mobile()) { ?>
				$('.left-column').css({
					'top': heightNav + "px",
					'zIndex': 'auto'
				});
				$('.right-column .mobile-container-info-buttons').css({
					'top': firstRowHNav + "px",
					'paddingTop': '1px'
				});
			<?php } ?>
		});
		<?php if (!is_category()) { ?>
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
		<?php } ?>
	});
</script>