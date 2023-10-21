<?php get_header('new');
$cat = get_category(get_query_var('cat'), false);
$parentCatID = $cat->parent;
$cnt_list = get_field('cnt_list', $cat);
$tovar_segment = get_field('сегмент', $cat);
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>
<?php
echo explode('label=',$_GET['q'])[1];
?>
<?php if(get_nopaging_url() !== 'https://dev.arenda-attrakcionov.ru/master-klassy/') { ?>
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
							echo "<video poster=\"" . get_template_directory_uri() . "/images/videocatposter.jpg\" loop muted autoplay playsinline>";
							if ($videoCatMp4) echo "<source src=\"{$videoCatMp4}\" type=\"video/mp4\">";
							if ($videoCatWebm) echo "<source src=\"{$videoCatWebm}\" type=\"video/webm\">";
							echo "</video>";
						?>
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
								$hash = sanitize_text_field(explode('label=',$_GET['q'])[1]); ?>
								<span class="filter-item filter-item-all <?= $hash ? '' : 'filter-item--active'; ?>">Все</span>
								<? foreach ($labels as $label) {
									$icon = $label['иконка'];
									$label_text = $label['название_метки'];
									$ttl = $label['текст'];
									if(!empty($label['рубрика'])) {
										$catID = $label['рубрика'];
										$termItemLink = get_term_link((int) $catID);
									}
									?>
									<?php
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
								$hash = sanitize_text_field(explode('label=',$_GET['q'])[1]);
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
						if ($wp_query->max_num_pages > 1 && (int) get_query_var('paged') !== (int) $wp_query->max_num_pages) { ?>
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
								//'order' => 'DESC'
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
			<?php } } else { ?>
                    <div class="main-page">
                        <div class="main-content">
                            <div class="first-screen">
                                <div class="bg-image">
                                    <img src="/wp-content/uploads/first-screen-bg-1.jpg" alt="foto">
                                </div>
                                <div class="container">
                                    <div class="columns-wrapper">
                                        <div class="left-col">
                                            <div class="top round-block">
                                                <h2 class="title">Мастер-классы</h2>
                                                <div class="text-block">
                                                    <p>Более 200 выездных мастер-классов с выездом по Москве и МО. Наши высококлассные мастера помогут вам разнообразно и творчески провести досуг.</p>
                                                </div>
                                                <div class="advantages-wrapper">
                                                    <div class="orange-advantage-block">
                                                        <div class="main-text">200+</div>
                                                        <div class="small-text">Мастер-классов</div>
                                                    </div>
                                                    <div class="orange-advantage-block">
                                                        <div class="main-text">5 лет</div>
                                                        <div class="small-text">На рынке</div>
                                                    </div>
                                                    <div class="orange-advantage-block">
                                                        <div class="main-text infinity-symbol-wrapper"><span class="infinity-symbol">∞</span></div>
                                                        <div class="small-text">Всё включено</div>
                                                    </div>
                                                </div>
                                                <div class="orange-advantage-block">
                                                    <div class="main-text">Собственная студия</div>
                                                    <div class="small-text">В Москве</div>
                                                </div>
                                            </div>
                                            <div class="bottom round-block">
                                                <form>
                                                    <div class="left">
                                                        <input type="text" placeholder="Имя">
                                                        <input type="tel" placeholder="Телефон">
                                                        <label class="custom-checkbox-wrapper agreement-checkbox">
                                                            Я согласен на обработку персональных данных
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="right">
                                                        <div class="feedback-type-choose-wrapper">
                                                            <div class="option">
                                                                <input type="radio" name="feedback-type-choose" checked>
                                                                <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.1" height="22.92" viewBox="0 0 65.74 64.96"><path d="m36.93,45.98c-1.12.08-1.97-.51-2.79-1.16-4.03-3.19-7.72-6.75-11.17-10.56-1.13-1.25-2.24-2.53-3.25-3.89-1.3-1.75-1.07-3.86.53-5.03.36-.27.8-.38,1.24-.47.98-.21,1.91-.57,2.71-1.17,1.09-.83,1.51-2.59,1.01-4.1-.27-.81-.59-1.61-1.07-2.34-2.13-3.24-3.88-6.69-5.61-10.15-.61-1.21-1.22-2.46-2.23-3.42-1.81-1.74-3.83-1.96-5.88-.52-2.27,1.59-4.45,3.32-6.3,5.41-1.69,1.9-2.42,4.16-2.24,6.67.14,1.87.86,3.59,1.62,5.28,2.62,5.85,5.75,11.41,9.63,16.53,3.01,3.97,6.34,7.65,10.09,10.94,6.05,5.31,12.74,9.62,20.09,12.89,1.72.77,3.41,1.6,5.27,2.04,3.23.76,5.95-.18,8.3-2.35,1.8-1.66,3.27-3.62,4.74-5.58,1.88-2.5.7-5.73-1.55-7.22-1.75-1.16-3.61-2.15-5.44-3.18-2.42-1.37-4.85-2.72-7.3-4.03-.96-.51-1.96-.92-3.1-.96-1.78-.06-2.85.83-3.58,2.34-.29.6-.4,1.25-.61,1.87-.49,1.46-1.49,2.17-3.03,2.17" style="fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px"/></svg>
                                                            </div>
                                                            <div class="option">
                                                                <input type="radio" name="feedback-type-choose">
                                                                <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.19" height="22.92" viewBox="0 0 65.74 64.96"><defs><style>.cls-1{fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px}</style></defs><path class="cls-1" d="m29.47,24.46c-.29.69-.78,1.23-1.3,1.75-1.97,1.98-2.11,5.46-.19,7.58,1.11,1.22,2.26,2.4,3.5,3.5,1.65,1.47,3.56,1.75,5.63,1.1,1.1-.34,1.91-1.11,2.73-1.87,1.28-1.18,3.64-1.19,4.91,0,1.51,1.42,3,2.88,4.4,4.41,1.25,1.36,1.3,3.16.33,4.58-.56.83-1.33,1.47-2.06,2.15-1.34,1.24-2.91,1.9-4.73,2.02-1.02.06-2.03,0-3.05,0-1.76-.01-3.49-.3-5.18-.74-4.01-1.04-7.57-2.95-10.63-5.76-3.21-2.95-5.54-6.48-6.94-10.62-1.04-3.07-1.36-6.24-1.29-9.46.03-1.41.39-2.74,1.11-3.95.7-1.17,1.71-2.08,2.71-2.98,1.35-1.22,3.6-1.24,4.92,0,1.28,1.2,2.5,2.47,3.77,3.68.92.88,1.61,1.85,1.61,3.18,0,0-.15,1.14-.26,1.42Z"/><path class="cls-1" d="m1.48,63.58c1.42-.04,2.73-.29,3.76-.5,3.54-.71,7.08-1.43,10.63-2.14.17-.04.35-.07.52-.13,1.5-.55,2.85-.16,4.22.51,2.39,1.16,4.96,1.79,7.58,2.2,2.31.37,4.66.46,6.99.26,6.44-.55,12.24-2.77,17.3-6.85,3.87-3.11,6.83-6.92,8.93-11.41,1.2-2.56,2.02-5.25,2.45-8.04.37-2.4.5-4.81.31-7.26-.26-3.27-.95-6.42-2.17-9.45-1.29-3.21-3.1-6.12-5.36-8.76-2.91-3.39-6.38-6.02-10.38-7.94-2.5-1.2-5.14-2.03-7.89-2.49-2-.33-4.01-.55-6.03-.5-4.61.12-9,1.14-13.16,3.16-3.88,1.89-7.21,4.48-10.03,7.72-3.61,4.14-5.93,8.95-7.05,14.32-.47,2.25-.65,4.56-.6,6.86.08,3.19.61,6.3,1.62,9.33.4,1.19.8,2.41,1.44,3.49.51.87.26,1.71.09,2.54-.87,4.31-1.81,8.6-2.69,12.9-.12.58-.48,2.18-.48,2.18Z"/></svg>
                                                            </div>
                                                            <div class="option">
                                                                <input type="radio" name="feedback-type-choose">
                                                                <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.7548 0.921519C23.653 0.83363 23.5292 0.775196 23.3967 0.75252C23.2641 0.729844 23.1279 0.743787 23.0028 0.792846L1.62846 9.15757C1.36848 9.2593 1.14853 9.44263 1.00162 9.68002C0.854718 9.91742 0.788798 10.1961 0.813763 10.4741C0.838727 10.7522 0.953227 11.0146 1.14007 11.2221C1.32691 11.4295 1.57601 11.5707 1.84995 11.6245L7.55792 12.7456V19.0938C7.55803 19.3881 7.64609 19.6756 7.8108 19.9195C7.9755 20.1634 8.20933 20.3525 8.48227 20.4626C8.75522 20.5727 9.05483 20.5987 9.34265 20.5372C9.63047 20.4758 9.89337 20.3298 10.0976 20.1179L12.9073 17.2038L17.2927 21.0481C17.5604 21.285 17.9055 21.4159 18.263 21.4162C18.4191 21.4158 18.5742 21.3913 18.7228 21.3434C18.9665 21.2663 19.1856 21.1267 19.3585 20.9385C19.5313 20.7503 19.6518 20.5201 19.7079 20.2708L23.9921 1.64609C24.0222 1.51515 24.016 1.37848 23.9742 1.2508C23.9324 1.12312 23.8565 1.00927 23.7548 0.921519ZM2.07881 10.3789C2.07477 10.368 2.07477 10.356 2.07881 10.3452C2.08358 10.3415 2.08893 10.3386 2.09463 10.3367L18.939 3.74281L8.04413 11.5475L2.09463 10.3831L2.07881 10.3789ZM9.18635 19.2383C9.15728 19.2684 9.11989 19.2893 9.07894 19.2981C9.03799 19.3069 8.99534 19.3034 8.95642 19.2879C8.91751 19.2724 8.88408 19.2456 8.86042 19.2111C8.83675 19.1765 8.82391 19.1357 8.82354 19.0938V13.621L11.9549 16.3632L9.18635 19.2383ZM18.475 19.985C18.4672 20.0207 18.45 20.0536 18.4251 20.0803C18.4003 20.107 18.3687 20.1266 18.3337 20.1369C18.2979 20.1494 18.2595 20.1521 18.2224 20.1447C18.1853 20.1373 18.1509 20.12 18.1227 20.0947L9.20745 12.2742L22.429 2.79886L18.475 19.985Z" fill="#383838"/></svg>
                                                            </div>
                                                        </div>
                                                        <button>Оставить заявку</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="right-col">
                                            <img src="/wp-content/uploads/pic1-1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <section class="master-classes-categories">
                            <div class="container">
                                <h2 class="h1 title-with-margin">Категории мастер-классов</h2>
                                <div class="master-class-cards-wrapper">
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
                                        $hash = sanitize_text_field(explode('label=',$_GET['q'])[1]); ?>
                                        <? foreach ($labels as $label) {
                                            $icon = $label['иконка'];
                                            $label_text = $label['название_метки'];
                                            $ttl = $label['текст'];
                                            if(!empty($label['рубрика'])) {
                                                $catID = $label['рубрика'];
                                                $termItemLink = get_term_link((int) $catID);
                                            }
                                            ?>
                                            <?php
                                            if(isset($termItemLink)) {
                                                ?>
                                                <div class="master-class-card">
                                                    <a style="display:none;" href="<?= $termItemLink ?>"><?= $ttl ?></a>
                                                    <img style="max-width:50%;" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ?>" alt="<?= $ttl ?>" title="<?= $ttl ?>">
                                                    <p class="text"><?= $ttl ?></p>
                                                </div>
                                                <?
                                                unset($termItemLink);
                                            } else { ?>
                                                <div class="master-class-card">
                                                    <a style="display:none;" href="<?= $thisURL . '?label=' . $label_text ?>"><?= $ttl ?></a>
                                                    <img style="max-width:50%;" src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ?>" alt="<?= $ttl ?>" title="<?= $ttl ?>">
                                                    <p class="text"><?= $ttl ?></p>
                                                </div>
                                                <?
                                            }
                                        }
                                        ?>
                                    <? } ?>

                                </div>
                        </section>
                    </div>
                    <div>
                        <section class="profitable-offers-section">
                            <div class="container">
                                <h2 class="h1 title-with-margin">Выгодные предложения</h2>
                                <div class="container">
                                    <?= do_shortcode('[sales_shortcode]') ?>
                                </div>
                                <div class="three-items-slider">
                                    <div class="swiper">
                                        <div class="swiper-wrapper popup-gallery">
                                            <div class="swiper-slide">
                                                <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                                    <img src="/wp-content/uploads/pic2-1.png" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                                    <img src="/wp-content/uploads/pic2-1.png" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                                    <img src="/wp-content/uploads/pic2-1.png" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                                    <img src="/wp-content/uploads/pic2-1.png" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                                    <img src="/wp-content/uploads/pic2-1.png" alt="">
                                                </a>
                                            </div>





                                        </div>
                                    </div>
                                    <div class="swiper-button-next"><span>></span></div>
                                    <div class="swiper-button-prev"><span><</span></div>
                                </div>
                            </div>
                        </section>
                    </div>


                    <div>
                        <section class="about-team-section">
                            <div class="container">
                                <h2 class="h1 title-with-margin">Наша команда профессионалов</h2>
                                <div class="add-padding-border">
                                    <div class="about-team-wrapper">
                                        <div class="text">
                                            <p>Наша компания предоставляет услуги профессиональных ведущих мастер-классов. Мы сотрудничаем с опытными профессионалами, которые могут провести мастер-классы по различным темам, таким как кулинария, рукоделие, искусство и многое другое. Ведущие мастер-классов нашей компании имеют богатый опыт работы и готовы поделиться своими знаниями и навыками с участниками мастер-классов. Мы гарантируем интересное и познавательное времяпрепровождение для всех участников мероприятия. Наша компания предоставляет услуги профессиональных ведущих мастер-классов. Мы сотрудничаем с опытными профессионалами, которые могут провести мастер-классы по различным темам, таким как кулинария, рукоделие, искусство и многое другое.</p>
                                        </div>
                                        <div class="pictures">
                                            <div class="team-person-card">
                                                <div class="avatar">
                                                    <img src="/wp-content/uploads/ava-1.jpg" alt="">
                                                </div>
                                                <div class="name">Мария</div>
                                            </div>
                                            <div class="team-person-card">
                                                <div class="avatar">
                                                    <img src="/wp-content/uploads/ava-1.jpg" alt="">
                                                </div>
                                                <div class="name">Сигизмундроздофил</div>
                                            </div>
                                            <div class="team-person-card">
                                                <div class="avatar">
                                                    <img src="/wp-content/uploads/ava-1.jpg" alt="">
                                                </div>
                                                <div class="name">Анатолий</div>
                                            </div>
                                            <div class="team-person-card">
                                                <div class="avatar">
                                                    <img src="/wp-content/uploads/ava-1.jpg" alt="">
                                                </div>
                                                <div class="name">Айран-Жульбан-Углы</div>
                                            </div>
                                            <div class="team-person-card">
                                                <div class="avatar">
                                                    <img src="/wp-content/uploads/ava-1.jpg" alt="">
                                                </div>
                                                <div class="name">Мария</div>
                                            </div>
                                            <div class="team-person-card">
                                                <div class="avatar">
                                                    <img src="/wp-content/uploads/ava-1.jpg" alt="">
                                                </div>
                                                <div class="name">Мария</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>


                    <div>
                        <section class="held-masterclasses-section">
                            <div class="container">
                                <h2 class="h1 title-with-margin">Проведенные мастер-классы</h2>
                                <div class="four-items-slider mb30">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide held-mc-card">
                                                <a href="#" class="img-link">
                                                    <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                                    <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                                                </a>
                                            </div>
                                            <div class="swiper-slide held-mc-card">
                                                <a href="#" class="img-link">
                                                    <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                                    <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                                                </a>
                                            </div>
                                            <div class="swiper-slide held-mc-card">
                                                <a href="#" class="img-link">
                                                    <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                                    <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                                                </a>
                                            </div>
                                            <div class="swiper-slide held-mc-card">
                                                <a href="#" class="img-link">
                                                    <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                                    <!-- думаю, размер этого текста, а именно количество символов надо регулировать на беке -->
                                                    <span class="text">Мехенди на выпускном для ребенка на корпоратив бла бла бла бла бла бла блша харикришнахарихари</span>
                                                </a>
                                            </div>
                                            <div class="swiper-slide held-mc-card">
                                                <a href="#" class="img-link">
                                                    <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                                    <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"><span>></span></div>
                                    <div class="swiper-button-prev"><span><</span></div>
                                </div>
                            </div>
                        </section>
                    </div>


                    <div>
                        <section class="feedback-global-section">
                            <div class="container">
                                <h2 class="h1 title-with-margin">Оставьте заявку</h2>
                                <form class="feedback-global-form">
                                    <div class="left">
                                        <input type="text" placeholder="Имя">
                                        <input type="tel" placeholder="Телефон">
                                        <label class="custom-checkbox-wrapper agreement-checkbox">
                                            Я согласен на обработку персональных данных
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="right">
                                        <div class="feedback-type-choose-wrapper">
                                            <div class="option">
                                                <input type="radio" name="feedback-type-choose2" checked>
                                                <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.1" height="22.92" viewBox="0 0 65.74 64.96"><path d="m36.93,45.98c-1.12.08-1.97-.51-2.79-1.16-4.03-3.19-7.72-6.75-11.17-10.56-1.13-1.25-2.24-2.53-3.25-3.89-1.3-1.75-1.07-3.86.53-5.03.36-.27.8-.38,1.24-.47.98-.21,1.91-.57,2.71-1.17,1.09-.83,1.51-2.59,1.01-4.1-.27-.81-.59-1.61-1.07-2.34-2.13-3.24-3.88-6.69-5.61-10.15-.61-1.21-1.22-2.46-2.23-3.42-1.81-1.74-3.83-1.96-5.88-.52-2.27,1.59-4.45,3.32-6.3,5.41-1.69,1.9-2.42,4.16-2.24,6.67.14,1.87.86,3.59,1.62,5.28,2.62,5.85,5.75,11.41,9.63,16.53,3.01,3.97,6.34,7.65,10.09,10.94,6.05,5.31,12.74,9.62,20.09,12.89,1.72.77,3.41,1.6,5.27,2.04,3.23.76,5.95-.18,8.3-2.35,1.8-1.66,3.27-3.62,4.74-5.58,1.88-2.5.7-5.73-1.55-7.22-1.75-1.16-3.61-2.15-5.44-3.18-2.42-1.37-4.85-2.72-7.3-4.03-.96-.51-1.96-.92-3.1-.96-1.78-.06-2.85.83-3.58,2.34-.29.6-.4,1.25-.61,1.87-.49,1.46-1.49,2.17-3.03,2.17" style="fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px"/></svg>
                                            </div>
                                            <div class="option">
                                                <input type="radio" name="feedback-type-choose2">
                                                <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.19" height="22.92" viewBox="0 0 65.74 64.96"><defs><style>.cls-1{fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px}</style></defs><path class="cls-1" d="m29.47,24.46c-.29.69-.78,1.23-1.3,1.75-1.97,1.98-2.11,5.46-.19,7.58,1.11,1.22,2.26,2.4,3.5,3.5,1.65,1.47,3.56,1.75,5.63,1.1,1.1-.34,1.91-1.11,2.73-1.87,1.28-1.18,3.64-1.19,4.91,0,1.51,1.42,3,2.88,4.4,4.41,1.25,1.36,1.3,3.16.33,4.58-.56.83-1.33,1.47-2.06,2.15-1.34,1.24-2.91,1.9-4.73,2.02-1.02.06-2.03,0-3.05,0-1.76-.01-3.49-.3-5.18-.74-4.01-1.04-7.57-2.95-10.63-5.76-3.21-2.95-5.54-6.48-6.94-10.62-1.04-3.07-1.36-6.24-1.29-9.46.03-1.41.39-2.74,1.11-3.95.7-1.17,1.71-2.08,2.71-2.98,1.35-1.22,3.6-1.24,4.92,0,1.28,1.2,2.5,2.47,3.77,3.68.92.88,1.61,1.85,1.61,3.18,0,0-.15,1.14-.26,1.42Z"/><path class="cls-1" d="m1.48,63.58c1.42-.04,2.73-.29,3.76-.5,3.54-.71,7.08-1.43,10.63-2.14.17-.04.35-.07.52-.13,1.5-.55,2.85-.16,4.22.51,2.39,1.16,4.96,1.79,7.58,2.2,2.31.37,4.66.46,6.99.26,6.44-.55,12.24-2.77,17.3-6.85,3.87-3.11,6.83-6.92,8.93-11.41,1.2-2.56,2.02-5.25,2.45-8.04.37-2.4.5-4.81.31-7.26-.26-3.27-.95-6.42-2.17-9.45-1.29-3.21-3.1-6.12-5.36-8.76-2.91-3.39-6.38-6.02-10.38-7.94-2.5-1.2-5.14-2.03-7.89-2.49-2-.33-4.01-.55-6.03-.5-4.61.12-9,1.14-13.16,3.16-3.88,1.89-7.21,4.48-10.03,7.72-3.61,4.14-5.93,8.95-7.05,14.32-.47,2.25-.65,4.56-.6,6.86.08,3.19.61,6.3,1.62,9.33.4,1.19.8,2.41,1.44,3.49.51.87.26,1.71.09,2.54-.87,4.31-1.81,8.6-2.69,12.9-.12.58-.48,2.18-.48,2.18Z"/></svg>
                                            </div>
                                            <div class="option">
                                                <input type="radio" name="feedback-type-choose2">
                                                <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.7548 0.921519C23.653 0.83363 23.5292 0.775196 23.3967 0.75252C23.2641 0.729844 23.1279 0.743787 23.0028 0.792846L1.62846 9.15757C1.36848 9.2593 1.14853 9.44263 1.00162 9.68002C0.854718 9.91742 0.788798 10.1961 0.813763 10.4741C0.838727 10.7522 0.953227 11.0146 1.14007 11.2221C1.32691 11.4295 1.57601 11.5707 1.84995 11.6245L7.55792 12.7456V19.0938C7.55803 19.3881 7.64609 19.6756 7.8108 19.9195C7.9755 20.1634 8.20933 20.3525 8.48227 20.4626C8.75522 20.5727 9.05483 20.5987 9.34265 20.5372C9.63047 20.4758 9.89337 20.3298 10.0976 20.1179L12.9073 17.2038L17.2927 21.0481C17.5604 21.285 17.9055 21.4159 18.263 21.4162C18.4191 21.4158 18.5742 21.3913 18.7228 21.3434C18.9665 21.2663 19.1856 21.1267 19.3585 20.9385C19.5313 20.7503 19.6518 20.5201 19.7079 20.2708L23.9921 1.64609C24.0222 1.51515 24.016 1.37848 23.9742 1.2508C23.9324 1.12312 23.8565 1.00927 23.7548 0.921519ZM2.07881 10.3789C2.07477 10.368 2.07477 10.356 2.07881 10.3452C2.08358 10.3415 2.08893 10.3386 2.09463 10.3367L18.939 3.74281L8.04413 11.5475L2.09463 10.3831L2.07881 10.3789ZM9.18635 19.2383C9.15728 19.2684 9.11989 19.2893 9.07894 19.2981C9.03799 19.3069 8.99534 19.3034 8.95642 19.2879C8.91751 19.2724 8.88408 19.2456 8.86042 19.2111C8.83675 19.1765 8.82391 19.1357 8.82354 19.0938V13.621L11.9549 16.3632L9.18635 19.2383ZM18.475 19.985C18.4672 20.0207 18.45 20.0536 18.4251 20.0803C18.4003 20.107 18.3687 20.1266 18.3337 20.1369C18.2979 20.1494 18.2595 20.1521 18.2224 20.1447C18.1853 20.1373 18.1509 20.12 18.1227 20.0947L9.20745 12.2742L22.429 2.79886L18.475 19.985Z" fill="#383838"/></svg>
                                            </div>
                                        </div>
                                        <button>Оставить заявку</button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>

                    <div>
                        <section class="reviews-section">
                            <div class="container">
                                <h2 class="h1 title-with-margin">Отзывы</h2>
                                <?= do_shortcode('[feedbacks_shortcode]') ?>
                            </div>
                        </section>
                    </div>

                    <div>
                        <section class="faq-section">
                            <div class="container">
                                <h2 class="h1 title-with-margin">Часто задаваемые вопросы</h2>
                                <div class="faq-wrapper">
                                    <div class="spoiler-block">
                                        <div class="spoiler-title">Что такое выездные мастер-классы?</div>
                                        <div class="spoiler-content">
                                            <p>Выездные мастер-классы - это формат обучения, при котором наша студия приезжает к вам на место и проводит мастер-классы по выбранной теме.</p>
                                        </div>
                                    </div>
                                    <div class="spoiler-block">
                                        <div class="spoiler-title">Что такое выездные мастер-классы? Далеко-далеко за словесными, горами в стране гласных и согласных живут рыбные тексты.</div>
                                        <div class="spoiler-content">
                                            <p>Выездные мастер-классы - это формат обучения, при котором наша студия приезжает к вам на место и проводит мастер-классы по выбранной теме.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div>
                        <section class="seo-section">
                            <div class="container">
                                <h2 class="h1 title-with-margin">Заголовок текста</h2>

                                <div class="add-padding-border">
                                    <div class="text" title="Показать больше текста">
                                        <p>Организовать корпоратив на природе, тимбилдинг или массовый праздник не сложно. Главное, чтобы гостям не было скучно. Заполнить досуг поможет аттракцион в аренду. Это хороший способ провести соревнования среди взрослых, занять веселыми играми детей. В компании Art-Active для праздника есть надувные батуты, интерактивные спартакиады, скалодром, выездные фотозоны. Доставка по Москве, безопасный монтаж и качество обслуживания.</p>
                                        <p>Далеко-далеко за словесными горами, в стране гласных и согласных, живут рыбные тексты. Наш ее она вскоре, безорфографичный имеет возвращайся путь своего домах приставка но напоивший всемогущая предупредила мир которое, вопрос оксмокс пор точках рыбными там языком. Знаках первую моей дорогу, даль которое жаренные домах последний себя встретил использовало вершину свою рукописи за.</p>
                                        <p>Далеко-далеко за словесными горами, в стране гласных и согласных, живут рыбные тексты. Наш ее она вскоре, безорфографичный имеет возвращайся путь своего домах приставка но напоивший всемогущая предупредила мир которое, вопрос оксмокс пор точках рыбными там языком. Знаках первую моей дорогу, даль которое жаренные домах последний себя встретил использовало вершину свою рукописи за.</p>
                                        <p>Далеко-далеко за словесными горами, в стране гласных и согласных, живут рыбные тексты. Наш ее она вскоре, безорфографичный имеет возвращайся путь своего домах приставка но напоивший всемогущая предупредила мир которое, вопрос оксмокс пор точках рыбными там языком. Знаках первую моей дорогу, даль которое жаренные домах последний себя встретил использовало вершину свою рукописи за.</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

            <?php } ?>
		<?php
		get_footer('new');
		?>