<?php $custom_logo__url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full'); ?>
<!DOCTYPE html>
<html lang="ru-RU">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	if (is_front_page()) {
		echo '<title>' . wp_title('', true) . '</title>';
	} else {
		echo '<title>' . get_post_meta(get_the_ID(), '_aioseop_title', true) . '</title>';
	} ?>
	<?
	if (!empty(get_post_meta(get_the_ID(), '_aioseop_description', true))) {
		$meta_description = get_post_meta(get_the_ID(), '_aioseop_description', true);
	}
	?>

	<meta name='yandex-verification' content='53fd104a94673a75' />
	<meta name='yandex-verification' content='7cead0a94bd9dd3b' />
	<link rel="icon" href="/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">

	<? wp_head(); ?>

	<?php
	if (is_single()) {
		$inlineStyle = get_post_meta($post->ID, 'wpcf-inline-style', true);
		if (!empty($inlineStyle)) {
			echo $inlineStyle;
		}
	}
	?>
</head>

<body class="main-page" <?php body_class('body-inside'); ?>>
<?php
echo get_query_var('label');
echo get_query_var(‘label’);
?>
	<?php
	$menuInfo = array(
		'theme_location'  => '',
		'menu'            => 'Верхнее меню',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'flex-column text-end nav-pages p-0',
		'menu_id'         => 'top_menu',
		'echo'            => false,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 1,
		'walker'          => ''
	);

	$menu_stuff = array(
		'theme_location'  => '',
		'menu'            => 'Меню в категории',
		'container'       => false,
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'cat_menu',
		'menu_id'         => '',
		'echo'            => false,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="%2$s" id="%1$s">%3$s</ul>',
		'depth'           => 1,
		/*'walker'          => new catListWalker()*/
	);

	global $menuInfoEcho;
	global $CONTACTS;

	$menuStuff = wp_nav_menu($menu_stuff);
	$menuInfoEcho = wp_nav_menu($menuInfo);


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

	?>

	<div class="section-space">

	</div>

	<?
	$menu_items_blue = get_field('подстветка_пунктов', 'options');
	//if($menu_items_blue) { 
	?>
	<style>
		<?
		$selectors_first = '';
		$selectors_second = '';
		foreach ($menu_items_blue as $item) {
			$selector_first .= '.second-row-nav li.block_width_item:nth-child(' . $item['номер_по_счету'] . '),';
			$selector_second .= '.second-row-nav li.block_width_item:nth-child(' . $item['номер_по_счету'] . ') .menu-image-title,';
		} ?><?= trim($selector_first, ',') ?> {
			background: rgba(58, 175, 240, 0.1);
			border: 1px solid rgba(58, 175, 240, 0.8);
			outline: none !important;
		}

		<?= trim($selector_second, ',') ?> {
			font-weight: 700;
			font-size: 13px;
			color: #3aaff0;
		}
	</style>
	<? //} 
	?>

	<nav class="navbar w-100 sticky-top d-flex navbar-light sticky-top justify-content-center p-0"> <? //sticky-top 
																									?>
		<div class="first-row-nav d-flex justify-content-center w-100">
			<div class="container p-1 w-100 d-flex align-items-center justify-content-between justify-items-lg-between flex-nowrap">
				<div class="dropdown">
					<button class="btn btn-light dropdown-toggle hamburger-menu-button" id="burger" data-bs-auto-close="outside" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><span class="hamburger-menu-button-open"></span><? if (wp_is_mobile()) { ?><span class="mob-text-btn">МЕНЮ</span><? } ?></button>
					<div class="dropdown-menu dropdown-menu-lg-end mt-0 w-100 p-0 p-lg-4" aria-labelledby="burger">
						<? if (wp_is_mobile()) { ?>
							<div class="mobile-container-menu">
								<div class="nav-mob">
									<?php
									$menuInfoEcho = strip_tags($menuInfoEcho, '<ul><li><a>');
									echo $menuInfoEcho;
									?>
								</div>
								<span class="mobile-container-menu__title">Категории</span>
								<?
								wp_nav_menu([
									'theme_location' => 'custom_accordion_menu',
									//'menu_class' => 'accordion',
									'container' => 'div',
									//'items_wrap' => '%3$s',
									'container_class' => 'accordion-categories',
									'walker' => new WP_Bootstrap4_Collapse_Walker()
								]);
								//wp_nav_menu_no_ul();
								?>
							</div>
						<? } ?>
						<!--<div class="container">
							<div class="row align-items-center nav-block-pages">
								<div class="col-lg-3">
									<div class="hstack">
										<?php
										//$menuInfoEcho = strip_tags($menuInfoEcho, '<ul><li><a>');
										//echo $menuInfoEcho;
										?>
									</div>
								</div>
								<div class="col-lg-9">
									<? //do_shortcode('[sales_shortcode_head]') 
									?>
									
								</div>
							</div>
						</div>-->
						<div class="container">
							<div class="row align-items-center nav-block-pages">
								<div class="col-lg-12">
									<?php
									$menuInfoEcho = strip_tags($menuInfoEcho, '<ul><li><a>');
									echo $menuInfoEcho;
									?>
								</div>
								<div class="col-lg-12">

									<div class="second-row-nav container">
										<?php echo $menuCategoriesEcho; ?>
										<button class="nav-left-arrow btn btn-light" id="nav-left-btn"><i class="bi bi-chevron-double-left fs-4"></i></button>
										<button class="nav-right-arrow btn btn-light" id="nav-right-btn"><i class="bi bi-chevron-double-right fs-4"></i></button>

										<?
										// wordpress does not group child menu items with parent menu items
										$menuLocations = get_nav_menu_locations();
										$navbar_items = wp_get_nav_menu_items($menuLocations['home_menu']);
										$child_items = [];

										// pull all child menu items into separate object
										foreach ($navbar_items as $key => $item) {
											if ($item->menu_item_parent) {
												array_push($child_items, $item);
												unset($navbar_items[$key]);
											}
										}

										// push child items into their parent item in the original object
										foreach ($navbar_items as $item) {
											foreach ($child_items as $key => $child) {
												if ($child->menu_item_parent == $item->ID) {
													if (!$item->child_items) {
														$item->child_items = [];
													}

													array_push($item->child_items, $child);
													unset($child_items[$key]);
												}
											}
										}

										?>

										<div class="menu-slider-cat">
											<? foreach ($navbar_items as $parent) { ?>
												<? if ($parent->child_items) { ?>
													<div data-parent-id="menu-item-<?= $parent->ID ?>" class="menu-slider-cat__item">
														<?
														foreach ($parent->child_items as $child) {
															$icon_img = get_field('иконка', $child->ID);
															if ($icon_img) {
																$icon_img = $icon_img;
															} else {
																$icon_img = '/wp-content/uploads/water_icon_36x36-3.png';
															}
														?>
															<a class="menu-slider-cat__item-link" href="<?= $child->url ?>">
																<img class="menu-slider-cat__item-icon" src="<?= $icon_img ?>">
																<span class="menu-slider-cat__item-name"><?= $child->title ?></span>
															</a>
														<? } ?>
													</div>
												<? } ?>
											<? } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a class="navbar-brand me-3" style="margin-left: 0.8rem !important;" href="/">
					<? if (wp_is_mobile()) { ?>
						<img width="46" height="36" src="<?php echo get_template_directory_uri(); ?>/images/logo-mobile.svg" alt="" class="d-inline-block align-text-top">
					<? } else { ?>
						<!-- <img width="170" height="46" src="<?php echo get_template_directory_uri(); ?>/images/logo@v7.png" alt="" class="d-inline-block align-text-top"> -->
						<img width="170" height="46" src="<?php echo $custom_logo__url[0] ?>" alt="" class="d-inline-block align-text-top">
					<? } ?>
				</a>
				<form class="d-flex me-0 me-lg-auto search-click">
					<input id="search-new" class="form-control me-2 d-none d-sm-inline" type="search" placeholder="Поиск..." aria-label="Search">
					<span class="btn btn-light me-2 d-inline d-sm-none"><i class="bi bi-search fs-4"></i></span>
					<? if (wp_is_mobile()) { ?>
						<span class="close">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.92871 16.0713L16.0708 1.92915" stroke="#414141" stroke-width="2.5" stroke-linecap="round" />
								<path d="M1.92871 1.92871L16.0708 16.0708" stroke="#414141" stroke-width="2.5" stroke-linecap="round" />
							</svg>
						</span>
					<? } ?>
				</form>
				<a class="btn btn-light linkcatalog-top me-2 d-none d-lg-inline" href="/attrakciony/custom-attrakciony/"><span>Каталог</span></a>
				<?= do_shortcode('[ccc_my_favorite_list_menu slug="" text="" style=""]') ?>
				<ul class="navbar-nav me-2">
					<li class="nav-item">
						<a class="btn btn-light phone-top" target="_blank" href="tel:+74952564047"><i class="bi bi-telephone fs-5"></i><span class="d-none d-lg-inline"> 8 (495) 256-40-47</span></a>
					</li>
				</ul>
				<a class="nav-msgs nav-msgs--wha me-2 p-0 btn btn-light d-flex align-items-center" target="_blank" href="https://api.whatsapp.com/send?phone=79264953442"><img width="46" height="46" src="<?php echo get_template_directory_uri(); ?>/images/new/wa_icon_1.svg" alt="" class="d-inline-block align-text-top"></a>
				<a class="nav-msgs nav-msgs--tg me-2 p-0 btn btn-light d-sm-flex d-none align-items-center" target="_blank" href="https://t.me/+79254094728"><!--+79258901817--><img width="46" height="46" src="<?php echo get_template_directory_uri(); ?>/images/new/tg_icon_1.svg" alt="" class="d-inline-block align-text-top"></a>

				<!-- <a class="btn btn-light me-2 d-sm-inline-block d-none" href="#"><i class="bi bi-suit-heart fs-4"></i></a> -->
			</div>
			<script>
				document.addEventListener('DOMContentLoaded', () => {

					let button = document.getElementById('burger'),
						span = button.getElementsByTagName('span')[0];
					//$('#mobile-container-menu-content .collapse').collapse({ toggle: false, parent: $('#mobile-container-menu-content') });
					$('.mobile-container-menu-buttons .btn-check').click(e => {
						e.preventDefault();
						$('#mobile-container-menu-content .collapse.show').collapse('hide');
					});

					$('#burger').on('show.bs.dropdown', function() {
						console.log("show");
						if ($(window).width() >= 992) {
							$(".dropdown-menu #menu-menyu-na-glavnoj").slick("refresh");
						}
						//$(".navbar > .second-row-nav #menu-menyu-na-glavnoj").slick("refresh");
						span.classList.toggle('hamburger-menu-button-close');
						$('body').toggleClass('overflow-hidden');
					}).on('shown.bs.dropdown', function() {
						console.log("shown");
					}).on('hide.bs.dropdown', function() {
						span.classList.toggle('hamburger-menu-button-close');
						$('body').toggleClass('overflow-hidden');
						console.log("hide");
					}).on('hidden.bs.dropdown', function() {
						console.log("hidden");
					});
				});
			</script>
		</div>

		<?php //include_once("menu.php"); 
		?>

		



		<?php //} 
		?>

	</nav>