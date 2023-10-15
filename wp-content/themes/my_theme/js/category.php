<!DOCTYPE html>
<html lang="en">
…
<?php get_header('new');

$cat = get_category(get_query_var('cat'), false);
$parentCatID = $cat->parent;

$cnt_list = get_field('cnt_list', $cat);
$tovar_segment = get_field('сегмент', $cat);

?>

<div class="container">
	<?php
		$videoCatMp4 = types_render_termmeta("videoforcats2", array("output" => "raw"));
		$videoCatWebm = types_render_termmeta("videoforcats3", array("output" => "raw"));
	?>
	<div class="row">
		<div class="col-12 caption text-center">
			<?
			//$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( '' ) );
			$parent = $cat->parent;
			while ($parent) :
				$parents[] = $parent;
				$new_parent = get_term_by('id', $parent, get_query_var('taxonomy'));
				$parent = $new_parent->parent;
			endwhile;
			if (!empty($parents)) :
				$parents = array_reverse($parents);
				$url = '';
				foreach ($parents as $parent) :
					$item = get_term($parent);
					$url = $url . '/' . $item->slug . '/';
					$output .= '<a class="breadcrumbs-catalog__item" href="' . $url . '">' . $item->name . '</a>' . '<span class="breadcrumbs-catalog__item-dmtr">-</span>';
				endforeach;
			endif;
			?>
			<div class="breadcrumbs-catalog">
				<a class="breadcrumbs-catalog__item" href="/">Главная</a>
				<span class="breadcrumbs-catalog__item-dmtr">-</span>
				<?= $output ?>
				<span class="breadcrumbs-catalog__item"><?= $cat->name ?></span>
			</div>
			<h1 class="text-center"><?= $cat->name ?></h1>
		</div>
	</div>
</div>
<?
if (1 == 2) {
	$args = array('parent' => $cat->term_id);
	$menu_name = 'custom_accordion_menu';
	$locations = get_nav_menu_locations();
	$menu_accordion_items = wp_get_nav_menu_items($locations[$menu_name]);
	$thisURL = get_nopaging_url();
	foreach ($menu_accordion_items as $menu_item) {
		if ($thisURL == $menu_item->url) {
			$main_level = $menu_item->menu_item_parent;
			$sub_categories = get_nav_menu_item_children($menu_item->menu_item_parent, $menu_accordion_items);
			if (count($sub_categories)) { ?>
				<div class="subcategories-list-wrp">
					<div class="container">
						<? if (wp_is_mobile()) { ?>
							<div class="subcategories-list">
								<span class="subcategories-list__item subcategories-list__item-mob">
									<? $icon = get_field('иконка', $sub_categories[0]->ID); ?>
									<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																											?>" alt="<?= $sub_categories[0]->title ?>" title="<?= $sub_categories[0]->title ?>">
									<? $ttl = get_field('название_для_блока_над_аккордионом', $sub_categories[0]->ID); ?>
									<a href="<?= $sub_categories[0]->url ?>" class="subcategories-list__item-txt"><?= $ttl ? $ttl : $sub_categories[0]->title; ?></a>
								</span>
								<div class="subcategories-list__dropdown">
									<? $i = 1;
									foreach ($sub_categories as $category) { ?>
										<? if ($i == 1 || get_field('скрыть_в_блоке_над_аккордионом', $category->ID)) {
											$i++;
											continue;
										} ?>
										<div class="subcategories-list__item-wrp">
											<? if ($menu_item->ID == $category->ID) { ?>
												<span class="subcategories-list__item subcategories-list__item--active">
													<?
													$icon = get_field('иконка', $category->ID);
													$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
													?>
													<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																															?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
													<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
												</span>
											<? } else { ?>
												<a href="<?= $category->url ?>" class="subcategories-list__item">
													<?
													$icon = get_field('иконка', $category->ID);
													$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
													?>
													<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																															?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
													<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
												</a>
											<? } ?>
										</div>
									<? } ?>
								</div>
							</div>
						<? } else { ?>

							<div class="categories-cards-list row subcategories-list">
								<? $hidden_elem = array();
								$i = 1;
								foreach ($sub_categories as $category) { ?>
									<? if ($i > 10) {
										if ($category->menu_item_parent !== $main_level) {
											if (!get_field('показать_в_материнской_категории', $category->ID)) {
												continue;
											} else {
												$hidden_elem[] = $category;
												if (is_user_logged_in()) {

													//echo '<pre>'.var_dump($category).'</pre>';
													//echo $category->title;
													//exit;

												}
												continue;
											}
											continue;
										}
										$hidden_elem[] = $category;
										continue;
									} ?>
									<? if (get_field('скрыть_в_блоке_над_аккордионом', $category->ID)) {
										continue;
									} ?>
									<? if ($category->menu_item_parent !== $main_level) {
										if (!get_field('показать_в_материнской_категории', $category->ID)) {
											continue;
										}
										$category = get_nav_menu_item_children($category->menu_item_parent, $menu_accordion_items)[0]; ?>
										<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
											<? if ($menu_item->ID == $category->ID) { ?>
												<span class="subcategories-list__item subcategories-list__item--active">
													<?
													$icon = get_field('иконка', $category->ID);
													$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
													?>
													<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																															?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
													<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
												</span>
											<? } else { ?>
												<a href="<?= $category->url ?>" class="subcategories-list__item">
													<?
													$icon = get_field('иконка', $category->ID);
													$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
													?>
													<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																															?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
													<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
												</a>
											<? } ?>
										</div>
									<? } else { ?>
										<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
											<? if ($menu_item->ID == $category->ID) { ?>
												<span class="subcategories-list__item subcategories-list__item--active">
													<?
													$icon = get_field('иконка', $category->ID);
													$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
													?>
													<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																															?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
													<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
												</span>
											<? } else { ?>
												<a href="<?= $category->url ?>" class="subcategories-list__item">
													<?
													$icon = get_field('иконка', $category->ID);
													$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
													?>
													<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																															?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
													<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
												</a>
											<? } ?>
										</div>
									<? } ?>
								<? $i++;
								} ?>
							</div>
							<div class="categories-cards-list row categories-cards-list--loadmore subcategories-list" style="display:none">
								<? $i = 1;
								$ii = 0;
								foreach ($hidden_elem as $category) { ?>
									<? //if($category->menu_item_parent !== $main_level) { continue; } 
									?>
									<? if (get_field('скрыть_в_блоке_над_аккордионом', $category->ID)) {
										continue;
									} ?>
									<? //if($category->menu_item_parent !== $main_level) {
									//if (!get_field('показать_в_материнской_категории', $category->ID)) { continue; }
									//$category = get_nav_menu_item_children($category->menu_item_id, $menu_accordion_items)[0]; 
									?>
									<!--<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
										<? if ($menu_item->ID == $category->ID) { ?>
											<span class="subcategories-list__item subcategories-list__item--active">
												<?
												$icon = get_field('иконка', $category->ID);
												$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
												?>
												<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																														?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
												<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
											</span>
										<? } else { ?>
											<a href="<?= $category->url ?>" class="subcategories-list__item">
												<?
												$icon = get_field('иконка', $category->ID);
												$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
												?>
												<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																														?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
												<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
											</a>
										<? } ?>
									</div>-->
									<? //} else { 
									?>
									<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
										<? if ($menu_item->ID == $category->ID) { ?>
											<span class="subcategories-list__item subcategories-list__item--active">
												<?
												$icon = get_field('иконка', $category->ID);
												$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
												?>
												<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																														?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
												<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
											</span>
										<? } else { ?>
											<a href="<?= $category->url ?>" class="subcategories-list__item">
												<?
												$icon = get_field('иконка', $category->ID);
												$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
												?>
												<img width="42" height="42" class="subcategories-list__item-img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png 
																														?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
												<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
											</a>
										<? } ?>
									</div>
									<? //} 
									?>
								<? $ii++;
								} ?>
							</div>
							<? if ($ii > 0) { ?>
								<span class="categories-cards-list__loadmore categories-cards-list__loadmore--dark categories-cards-list__loadmore--show orange-btn orange-btn--transparent"><span>Загрузить еще <?= $ii ?></span><span style="display:none;">Скрыть</span></span>
							<? } ?>
						<? } ?>
					</div>
				</div>
	<? }
			break;
		}
	}
	?>
	<? // } 
	?>
<? } ?>
<div class="container catalog-products">
	<div class="row">
		<!-- stuff  -->
		<div class="d-none d-lg-block col col-lg-3 left sticky-accordion">
			<div class="vstack gap-3"><!--sticky-top wrap-cat-menu -->
				<?
				/*$accordion = get_field('accordion_cat_1_lvl_two', 'options');
				if(count($accordion)) { 
					$url = explode('/', trim($_SERVER['REQUEST_URI'],'/')); */
				?>
				<!--<div id="accordion">
						<?
						//foreach($accordion as $item) { 
						//	$next_lvl = $item['под_уровень'];
						//	$icon = $item['иконка_уровень'];
						//	$name = $item['название_уровень'];
						//	$link = $item['ссылка_уровень'];
						///	echo accordion_recursive($next_lvl, $icon, $name, $link);
						//} 
						?>
					</div>-->
				<? //} 
				?>
				<div id="accordion">
					<div class="card">
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
				</div>
				<?php if (function_exists('dynamic_sidebar'))
					dynamic_sidebar('sidebar-navcat_bottom'); ?>
				<!-- <div class="loftForEvent d-flex"><a class="btn w-100 bg-orange" href="/ploshchadka-v-stile-atrium-pro-platforma/">Площадка Pro-Platforma</a></div> -->
			</div>
		</div>
		<div class="col-lg-9 right">
			<? if (function_exists('types_render_termmeta') && (@$videoCatMp4 || @$videoCatWebm)) { ?>
				<div class="mb-3">
					<div class="ratio ratio-16x9 video-container">
						<?php
						// if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $videoCat, $match)) {
						// 	//$video_id = $match[1];
						// 	global $video_src;
						// 	$video_src = $match[1];
						// }
						//echo $videoCat;

							echo "<video poster=\"" . get_template_directory_uri() . "/images/videocatposter.jpg\" loop muted autoplay playsinline>";
							if ($videoCatMp4) echo "<source src=\"{$videoCatMp4}\" type=\"video/mp4\">";
							if ($videoCatWebm) echo "<source src=\"{$videoCatWebm}\" type=\"video/webm\">";
							echo "</video>";
						
						?>
						<!-- <div id="player"></div> -->
					</div>
				</div>
			<? } ?>

			<?
			$banner = get_field('банер', $cat);
			if ($banner) { ?>
				<div class="mb-3">
					<div class="image-banner">
						<img src="<?= $banner ?>" alt="" title="">
					</div>
				</div>
			<? } ?>
			<!-- START new filter -->

			<? //if(is_user_logged_in()) { 
			?>
			<?
			session_start();
			$sort_data = isset($_SESSION['sort_data']) ? $_SESSION['sort_data'] : 0;
			?>
			<? if (!wp_is_mobile()) { ?>
				<div class="filter-wrapper">
					<div class="filter">
						<div class="fsort">
							<div class="fsort_btn">
								<span class="fsort_btn-line"></span>
								<span class="fsort_btn-line"></span>
								<span class="fsort_btn-line"></span>
							</div>
							<div class="fsort_dropdown">
								<? //$sort_data == 0 ? 'active' : ''  ?>
								<? //$sort_data === 'price_down' ? 'active' : ''  ?>
								<span class="fsort_item <?= $sort_data == 0 ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="none">По популярности</span>
								<span class="fsort_item <?= $sort_data === 'price_down' ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="price_down">По цене убывание</span>
								<span class="fsort_item <?= $sort_data === 'price_up' ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="price_up">По цене возрастание</span>
								<!--<span class="fsort_item <?= $sort_data === 'date_up' ? 'active' : '' ?>" data-category="<?= $cat->term_id ?>" data-sort="date_up">От нового к старому</span>
							<span class="fsort_item <?= $sort_data == 'date_down' ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="date_down">От старого к новому</span>-->
							</div>
						</div>
						<div class="filter-labels">
							<?
							if (1 == 2) {
								$args = array('parent' => $cat->term_id);
								$menu_name = 'custom_accordion_menu';
								$locations = get_nav_menu_locations();
								$menu_accordion_items = wp_get_nav_menu_items($locations[$menu_name]);
								$thisURL = get_nopaging_url();
								foreach ($menu_accordion_items as $menu_item) {
									if ($thisURL == $menu_item->url) {
										$main_level = $menu_item->menu_item_parent;
										$sub_categories = get_nav_menu_item_children($menu_item->menu_item_parent, $menu_accordion_items);
										if (count($sub_categories)) {
											$i = 1;
											foreach ($sub_categories as $category) {
												if (get_field('скрыть_в_блоке_над_аккордионом', $category->ID)) {
													continue;
												}
												$active_element = '<a href="' . $category->url . '" class="filter-item">';
												$active_element_end = '</a>';
												if ($menu_item->ID == $category->ID) {
													$active_element = '<span class="filter-item filter-item--active">';
													$active_element_end = '</span>';
												}
												echo $active_element;
												$icon = get_field('иконка', $category->ID);
												$rubrika = get_field('рубрика', $category->ID);
												// if(is_user_logged_in(  )) {
												// 	var_dump($rubrika);
												// }
												$ttl = get_field('название_для_блока_над_аккордионом', $category->ID); ?>
												<img width="42" height="42" class="filter-item_img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
												<span class="filter-item_txt"><?= $ttl ? $ttl : $category->title; ?></span>
												<?
												echo $active_element_end;
												$i++;
											}
										}
										break;
									}
								}
							}
							$labels = get_field('метки', $cat);
							if ($labels) {
								$hash = sanitize_text_field($_GET['label']); ?>
								<span class="filter-item filter-item-all <?= $hash ? '' : 'filter-item--active'; ?>">Все</span>
								<? foreach ($labels as $label) {
									$icon = $label['иконка'];
									$label_text = $label['название_метки'];
									$ttl = $label['текст']; 
								
									if(!empty($label['рубрика'])) {
										$catID = $label['рубрика'];
										// var_dump($catID);
										$termItemLink = get_term_link((int) $catID);
									}
									?>
									
									<?php 
										// var_dump($label['рубрика']);
										if(isset($termItemLink)) {
									?>
										<a href="<?= $termItemLink ?>" class="filter-item">
											<img width="42" height="42" class="filter-item_img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ?>" alt="<?= $ttl ?>" title="<?= $ttl ?>">
											<span class="filter-item_txt"><?= $ttl ?></span>
										</a>
										
									<? 
										unset($termItemLink);
									} else { ?>
									<a style="display:none;" href="<?= $thisURL . '?label=' . $label_text ?>"><?= $ttl ?></a>
									<span data-label="<?= $label_text ?>" class="filter-item filter-item-label <?= $hash == $label_text ? 'filter-item--active' : ''; ?>">
										<img width="42" height="42" class="filter-item_img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ?>" alt="<?= $ttl ?>" title="<?= $ttl ?>">
										<span class="filter-item_txt"><?= $ttl ?></span>
									</span>
									
									<?  
										}
									} 
									?>
							<? } ?>
						</div>
						<? if ($labels) { ?>
							<div class="filter-labels filter-show-all">
								<span counter=""></span>
								<svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.2464 17.1725C11.8388 18.0743 13.1612 18.0743 13.7536 17.1725L22.4826 3.88612C23.1379 2.88866 22.4224 1.5625 21.2289 1.5625H3.77105C2.57758 1.5625 1.86209 2.88866 2.51741 3.88613L11.2464 17.1725Z" fill="white" stroke="#D9D9D9" stroke-width="3" />
								</svg>
							</div>
						<? } ?>
					</div>
				</div>
			<? } else { ?>
				<div class="filter-mobile">
					<div class="filter-dropdown filter-dropdown--sort">
						<div class="filter-dropdown_active">
							<span></span>
						</div>
						<div class="filter-dropdown_icon">
							<svg width="10" height="8" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.2464 17.1725C11.8388 18.0743 13.1612 18.0743 13.7536 17.1725L22.4826 3.88612C23.1379 2.88866 22.4224 1.5625 21.2289 1.5625H3.77105C2.57758 1.5625 1.86209 2.88866 2.51741 3.88613L11.2464 17.1725Z" fill="white" stroke="#D9D9D9" stroke-width="3" />
							</svg>
						</div>
						<div class="filter-dropdown_list">
							<span class="fsort_item filter-dropdown_list-item <?= $sort_data == 0 ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="none">По популярности</span>
							<span class="fsort_item filter-dropdown_list-item <?= $sort_data === 'price_down' ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="price_down">По цене убывание</span>
							<span class="fsort_item filter-dropdown_list-item <?= $sort_data === 'price_up' ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="price_up">По цене возрастание</span>
							<!--<span class="fsort_item filter-dropdown_list-item <?= $sort_data == 'date_up' ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="date_up">От нового к старому</span>
							<span class="fsort_item filter-dropdown_list-item <?= $sort_data == 'date_down' ? 'active' : ''  ?>" data-category="<?= $cat->term_id ?>" data-sort="date_down">От старого к новому</span>-->
						</div>
					</div>

					<div class="filter-dropdown filter-dropdown--labels">
						<div class="filter-dropdown_active">
							<span></span>
						</div>
						<div class="filter-dropdown_icon">
							<svg width="10" height="8" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.2464 17.1725C11.8388 18.0743 13.1612 18.0743 13.7536 17.1725L22.4826 3.88612C23.1379 2.88866 22.4224 1.5625 21.2289 1.5625H3.77105C2.57758 1.5625 1.86209 2.88866 2.51741 3.88613L11.2464 17.1725Z" fill="white" stroke="#D9D9D9" stroke-width="3" />
							</svg>
						</div>
						<div class="filter-dropdown_list">
							<?
							if (1 == 2) {
								$args = array('parent' => $cat->term_id);
								$menu_name = 'custom_accordion_menu';
								$locations = get_nav_menu_locations();
								$menu_accordion_items = wp_get_nav_menu_items($locations[$menu_name]);
								$thisURL = get_nopaging_url();
								foreach ($menu_accordion_items as $menu_item) {
									if ($thisURL == $menu_item->url) {
										$main_level = $menu_item->menu_item_parent;
										$sub_categories = get_nav_menu_item_children($menu_item->menu_item_parent, $menu_accordion_items);
										if (count($sub_categories)) {
											$i = 1;
											foreach ($sub_categories as $category) {
												if (get_field('скрыть_в_блоке_над_аккордионом', $category->ID)) {
													continue;
												}
												$active_element = '<a href="' . $category->url . '" class="filter-item filter-dropdown_list-item">';
												$active_element_end = '</a>';
												if ($menu_item->ID == $category->ID) {
													$active_element = '<span class="filter-item filter-dropdown_list-item filter-item--active">';
													$active_element_end = '</span>';
												}
												echo $active_element;
												$icon = get_field('иконка', $category->ID);
												$ttl = get_field('название_для_блока_над_аккордионом', $category->ID); ?>
												<img width="42" height="42" class="filter-item_img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
												<span class="filter-item_txt"><?= $ttl ? $ttl : $category->title; ?></span>
										<?
												echo $active_element_end;
												$i++;
											}
										}
										break;
									}
								}
							}
							$labels = get_field('метки', $cat);
							if ($labels) {
								$hash = sanitize_text_field($_GET['label']);
								?>
									<a class="filter-item filter-dropdown_list-item filter-item-label <?= $hash ? '' : 'filter-item--active'; ?>">
										<span class="filter-item_txt">Все</span>
									</a>
								<?
								foreach ($labels as $label) {
									$icon = $label['иконка'];
									$label_text = $label['название_метки'];
									$ttl = $label['текст'];
									if(!empty($label['рубрика'])) {
										$catID = $label['рубрика'];
										// var_dump($catID);
										$termItemLink = get_term_link((int) $catID);
									}

									if(isset($termItemLink)) {
									?>
										<a href="<?= $termItemLink ?>" class="filter-item filter-dropdown_list-item">
											<img width="42" height="42" class="filter-item_img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ?>" alt="<?= $ttl ?>" title="<?= $ttl ?>">
											<span class="filter-item_txt"><?= $ttl ?></span>
										</a>
									<?
										unset($termItemLink);
									} else { ?>

									<a href="<?= $thisURL . '?label=' . $label_text ?>" data-label="<?= $label_text ?>" class="filter-item filter-dropdown_list-item filter-item-label <?= $hash == $label_text ? 'filter-item--active' : ''; ?>">
										<img width="42" height="42" class="filter-item_img" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ?>" alt="<?= $ttl ?>" title="<?= $ttl ?>">
										<span class="filter-item_txt"><?= $ttl ?></span>
									</a>
								<? } } ?>
							<? } ?>
						</div>
					</div>
				</div>
			<? } ?>
			<? //} 
			?>

			<!-- END new filter -->
			<?
			$cat = get_category(get_query_var('cat'), false);

			$quer_object = get_queried_object();

			$taxonomy = $quer_object->taxonomy;
			$term_id = $quer_object->term_id;

			if (isset($_GET['order']) && ($_GET['order'] == 'desc' || $_GET['order'] == 'asc')) {
				$order = strtolower($_GET['order']);
				$order = ($order == 'asc') ? 'desc' : 'asc';
			} else {
				$order = 'asc';
			}

			// $putHtml = "<div class=\"caption\" style=\"min-height: 30px;\"><h1 $crosslinkIsOn>$cat->name</h1>$crossLinkSimp" . "$crossLinkPres</div>";

			//TODO: Добавить товары по сегментам. При данному условии отключить пагинацию
			// echo "<pre>";
			// var_dump($tovar_segment);
			// echo "</pre>";
			?>
			<div class="loadmore-wrapper" data-paged="<?= get_query_var('paged') ? get_query_var('paged') : 1; ?>">
				<div class="loadmore row row-cols-2 row-cols-md-2 row-cols-lg-3 g-4">

					<? if (isset($_GET['sort'])) {

						go_filter($cat->cat_ID);

						while (have_posts()) {
							the_post();
							get_template_part('loop', 'category_new');
						}

						wp_reset_postdata();

						if ( (int) $wp_query->max_num_pages > 1 && (int) get_query_var('paged') !== (int) $wp_query->max_num_pages) { ?>
							<script>
								var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
								var posts_vars = '<?php echo serialize($wp_query->query_vars) ?>';
								var current_page = <?php echo ( (int) get_query_var('paged')) ? (int) get_query_var('paged') : 1; ?>;
								var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
							</script>
							<div class="text-center more pt-4"><button class="btn" id="loadmore">Показать ещё</button></div>
							<?php }
					} else {

						if (empty($tovar_segment)) {

							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

							if(is_user_logged_in(  )) {
								// var_dump($paged);
							}

							$args = array(
								'cat' => (int) $term_id,
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => 60,
								'paged' => (int) $paged,
								'no_found_rows' => false
								'order' => 'ASC'
							);
							if ($hash) {
								$args['posts_per_page'] = -1;
								$args['meta_query'] = array(
									'key' => 'filter_labels',
									'value' => $hash . ',',
									'compare' => 'LIKE'
								);
							}
							if ($sort_data === 'price_up') {
								$args['meta_key'] = 'wpcf-price_stuff';
								$args['orderby'] = 'meta_value_num'; // если сортировка по числу, то используй классификатор _num
								$args['ignore_sticky_posts'] = true;
								$args['order'] = 'ASC';
							} elseif ($sort_data === 'price_down') {
								$args['meta_key'] = 'wpcf-price_stuff';
								$args['orderby'] = 'meta_value_num'; // если сортировка по числу, то используй классификатор _num
								$args['ignore_sticky_posts'] = true;
								$args['order'] = 'DESC';
							} elseif ($sort_data === 'date_up') {
								$args['orderby'] = 'date';
								$args['ignore_sticky_posts'] = true;
								$args['order'] = 'ASC';
							} elseif ($sort_data === 'date_down') {
								$args['orderby'] = 'date';
								$args['ignore_sticky_posts'] = true;
								$args['order'] = 'DESC';
							} else {
								// var_dump($hash);
								if ($hash) {
									$args['meta_key'] = 'wpcf-price_stuff';
									$args['orderby'] = 'meta_value_num'; // если сортировка по числу, то используй классификатор _num
									$args['order'] = 'ASC';
									$args['posts_per_page'] = -1;
								}
							}


							$query2 = new WP_Query($args);

							while ($query2->have_posts()) {

								$query2->the_post();

								get_template_part('loop', 'category_new');
							}
							wp_reset_postdata();


							echo "</div>";

							if ((int) $query2->max_num_pages > 1 && (int) get_query_var('paged') !== (int) $query2->max_num_pages) { ?>
								<script>
									var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
									var posts_vars = '<?php echo serialize($query2->query_vars) ?>';
									var current_page = <?php echo ((int) get_query_var('paged')) ? (int) get_query_var('paged') : 1; ?>;
									var max_pages = '<?php echo (int) $query2->max_num_pages; ?>';
								</script>
								<div class="text-center more pt-4"><button class="btn" id="loadmore" <?= "data-query='" . serialize($query2->query_vars) . "'" ?> data-max="<?= $query2->max_num_pages; ?>" data-paged="<?= (int) get_query_var('paged') ? (int) get_query_var('paged') : 1; ?>">Показать ещё</button></div>
					<?php
							}
						} else {
							// if( isset($_COOKIE['debug']) ) {
							// echo "<pre>";
							// var_dump($tovar_segment);
							$params = ['param1' => $tovar_segment];
							get_template_part('loop', 'category_segment', $params);
							// echo "</pre>";
							// die();
							// }

							echo "</div>";
						}
					}
					if (function_exists('emm_paginate') && empty($tovar_segment) && $query2->max_num_pages > 1 && (int) get_query_var('paged') !== (int) $query2->max_num_pages) {
						emm_paginate();
					} elseif (function_exists('emm_paginate') && empty($tovar_segment)) {
						emm_paginate();
					}
					?>
				</div>
			</div>
		</div>

		<div class="container">
			<?= do_shortcode('[sales_shortcode]') ?>
		</div>

		<div class="clearfix"></div>
		<?php if (!is_paged()) { ?>
			<? if ($cnt_list) { ?>
				<div class="content-blocks-wrapper">
					<div class="container">
						<div class="content-blocks row">
							<? $i = 1;
							$count_cnt = count($cnt_list);
							foreach ($cnt_list as $item) { ?>
								<div class="content-blocks__item row col-lg-12 <?= $i == $count_cnt && ($count_cnt % 2) != 0 ? 'col-sm-12' : 'col-sm-6' ?>">
									<div class="content-blocks__item-col col-lg-6 col-12">
										<?= $item['ttl'] ? '<h3>' . $item['ttl'] . '</h3>' : '' ?>
										<?= $item['txt'] ?>
									</div>
									<div class="content-blocks__item-col col-lg-6 col-12">
										<div class="content-blocks__slider">
											<? foreach ($item['imgs'] as $itm) { ?>
												<div>
													<img class="grunge content-blocks__slider-img" src="<?= $itm['картинка'] ?>" title="" alt="">
												</div>
											<? } ?>
										</div>
									</div>
								</div>
							<? $i++;
							} ?>
						</div>
					</div>
				</div>
			<? } ?>
			<div class="gray_block">
				<div class="stuff container">
					<?
					if (is_page(5627)) {
						if (have_posts()) {
							while (have_posts()) {
								the_post();
								the_content();
							} // end while
						} // end if
					}
					$d = explode("###", category_description());
					foreach ($d as &$item) {
						$item = mb_ereg_replace("\s", " ", $item);
					}
					if ($d[1] == '') echo $d[0];
					else echo $d[1];
					?>
				</div>
			</div>
		<?php }
		get_footer('new');
		?>