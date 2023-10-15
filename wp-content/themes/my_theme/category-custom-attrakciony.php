<?php get_header('new'); 
$cat = get_category(get_query_var('cat'), false);
$parentCatID = $cat->parent;
$cnt_list = get_field('cnt_list', $cat);
?>
<div class="container">
		<?php
					$videoCatMp4 = types_render_termmeta( "videoforcats2", array("output" => "raw") );
					$videoCatWebm = types_render_termmeta( "videoforcats3", array("output" => "raw") );
				?>
			<div class="row">
				<div class="col-12 caption text-center">
					<? 
					//$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( '' ) );
					$parent = $cat->parent;
					while ( $parent ):
						$parents[] = $parent;
						$new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ) );
						$parent = $new_parent->parent;
					endwhile;
					if ( !empty( $parents ) ): 
						$parents = array_reverse( $parents );
						$url = '';
						foreach ( $parents as $parent ):
							$item = get_term( $parent );
							$url = $url.'/'.$item->slug.'/';
							$output .= '<a class="breadcrumbs-catalog__item" href="'.$url.'">'.$item->name.'</a>'.'<span class="breadcrumbs-catalog__item-dmtr">-</span>';
						endforeach;
					endif;
					?>
					<div class="breadcrumbs-catalog">
						<a class="breadcrumbs-catalog__item" href="/">Главная</a>
						<span class="breadcrumbs-catalog__item-dmtr">-</span>
						<?= $output ?>
						<span class="breadcrumbs-catalog__item"><?=$cat->name?></span>
					</div>
					<h1 class="text-center"><?=$cat->name?></h1>
				</div>
				<? if(function_exists('types_render_termmeta') && (@$videoCatMp4 || @$videoCatWebm)) { ?>
				<div class="col mb-4">
					<div class="ratio ratio-16x9 video-container">
						<?php	
							echo "<video poster=\"".get_template_directory_uri()."/images/videocatposter.jpg\" loop muted autoplay playsinline>";
							if($videoCatMp4) echo "<source src=\"{$videoCatMp4}\" type=\"video/mp4\">";
							if($videoCatWebm) echo "<source src=\"{$videoCatWebm}\" type=\"video/webm\">";
							echo "</video>";
						?>
						<!-- <div id="player"></div> -->
					</div>
				</div>
				<? } ?>
			</div>
	</div>
<? 
	$args = array('parent' => $cat->term_id);
		$menu_name = 'custom_accordion_menu';
		$locations = get_nav_menu_locations();
		$menu_accordion_items = wp_get_nav_menu_items( $locations[ $menu_name ] );
		foreach ( $menu_accordion_items as $menu_item ) {
		   	if( $_SERVER['REQUEST_URI'] == parse_url( $menu_item->url, PHP_URL_PATH ) ) {
				$sub_categories = get_nav_menu_item_children($menu_item->menu_item_parent, $menu_accordion_items);
				if(count($sub_categories)) { ?>
				<div class="subcategories-list-wrp">
					<div class="container">
						<? if(wp_is_mobile()) { ?>
								<div class="subcategories-list">
										<span class="subcategories-list__item subcategories-list__item-mob">
											<? $icon = get_field('иконка', $sub_categories[0]->ID); ?>
											<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png ?>" alt="<?= $sub_categories[0]->title ?>" title="<?= $sub_categories[0]->title ?>">
											<? $ttl = get_field('название_для_блока_над_аккордионом', $sub_categories[0]->ID); ?>
											<a href="<?= $sub_categories[0]->url ?>" class="subcategories-list__item-txt"><?= $ttl ? $ttl : $sub_categories[0]->title; ?></a>
										</span>
										<div class="subcategories-list__dropdown">
											<? $i = 1; foreach($sub_categories as $category) { ?>
												<? if($i == 1 || get_field('скрыть_в_блоке_над_аккордионом', $category->ID)) {$i++; continue;} ?>
												<div class="subcategories-list__item-wrp">
													<? if($menu_item->ID == $category->ID) { ?>
														<span class="subcategories-list__item subcategories-list__item--active">
															<? 
																$icon = get_field('иконка', $category->ID);
																$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
															?>
															<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png ?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
															<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
														</span>
													<? } else { ?>
														<a href="<?= $category->url ?>" class="subcategories-list__item">
															<? 
																$icon = get_field('иконка', $category->ID); 
															   $ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
															?>
															<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png ?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
															<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
														</a>
													<? } ?>
												</div>
											<? } ?>
										</div>
								</div>
						<? } else { ?>
						<div class="categories-cards-list row subcategories-list">
							<? $i = 1; foreach($sub_categories as $category) { ?>
								<? if($i > 10) { break; } ?>
								<? if(get_field('скрыть_в_блоке_над_аккордионом', $category->ID)) { continue; } ?>
								<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
									<? if($menu_item->ID == $category->ID) { ?>
										<span class="subcategories-list__item subcategories-list__item--active">
											<? 
												$icon = get_field('иконка', $category->ID); 
					 $ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
											?>
											<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png ?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
											<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
										</span>
									<? } else { ?>
										<a href="<?= $category->url ?>" class="subcategories-list__item">
											<? 
												$icon = get_field('иконка', $category->ID); 
											   $ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
											?>
											<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png ?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
											<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
										</a>
									<? } ?>
								</div>
							<? $i++; } ?>
						</div>
						<div class="categories-cards-list row categories-cards-list--loadmore subcategories-list" style="display:none">
							<? $i = 1; $ii = 0; foreach($sub_categories as $category) { ?>
								<? if($i <= 10 || get_field('скрыть_в_блоке_над_аккордионом', $category->ID)) { $i++; continue; } ?>
									<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
										<? if($menu_item->ID == $category->ID) { ?>
											<span class="subcategories-list__item subcategories-list__item--active">
												<? 
													$icon = get_field('иконка', $category->ID); 
					$ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
												?>
												<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png ?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
												<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
											</span>
										<? } else { ?>
											<a href="<?= $category->url ?>" class="subcategories-list__item">
												<? 
													$icon = get_field('иконка', $category->ID); 
												   $ttl = get_field('название_для_блока_над_аккордионом', $category->ID);
												?>
												<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/123.png'; ///wp-content/uploads/water_icon_36x36-3.png ?>" alt="<?= $category->title ?>" title="<?= $category->title ?>">
												<span class="subcategories-list__item-txt"><?= $ttl ? $ttl : $category->title; ?></span>
											</a>
										<? } ?>
									</div>
							<? $ii++; } ?>
						</div>
						<? if($ii > 0) { ?>
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
<?// } ?>
<div class="container catalog-products">
	<div class="row">
		<!-- stuff  -->
		<div class="d-none d-lg-block col col-lg-3 left sticky-accordion">
			<div class="gap-3">
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
				<?php if ( function_exists('dynamic_sidebar') )
					dynamic_sidebar('sidebar-navcat_bottom'); ?>
					<!-- <div class="loftForEvent d-flex"><a class="btn w-100 bg-orange" href="/ploshchadka-v-stile-atrium-pro-platforma/">Площадка Pro-Platforma</a></div> -->
			</div>
		</div>
		<div class="col-lg-9 right">
			<? 
			$quer_object = get_queried_object();
			$taxonomy = $quer_object->taxonomy;
			$term_id = $quer_object->term_id;
			echo "<div class=\"row row-cols-2 row-cols-md-2 row-cols-lg-3 g-2\">";
			$tags = get_tags(array('hide_empty' => false)); //'orderby' => 'term_order'
			foreach ($tags as $tag) {
				$quer_object = get_queried_object();
				$taxonomy = $tag->taxonomy;
				$term_id = $tag->term_id;
				$tag_img = get_term_meta($term_id, 'wpcf-thumbsfortags', true);
				$tag_link = get_tag_link($tag->term_id);
				$tag_link = str_replace('tag/', '', $tag_link);
				$html .= "<div class=\"col\">
									<div class=\"product card\">
										<img class=\"img-fluid\" alt=\"{$tag->name}\" src=\"{$tag_img}\" />
										<div class=\"card-body text-center\">
											<span>{$tag->name}</span>
											<a class=\"stretched-link\" href=\"{$tag_link}\" data-src=\"{$tag_link}\"></a>
										</div>
									</div>
								</div>";
			}
			echo $html;
			echo "<div class=\"clearfix\"></div>";
			//print_r($cat);
			echo "</div>";
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
	$putHtml = "<div class=\"caption\" style=\"min-height: 30px;\"><h1 $crosslinkIsOn>$cat->name</h1>$crossLinkSimp" . "$crossLinkPres</div>";
	echo "<div class=\"loadmore row row-cols-2 row-cols-md-2 row-cols-lg-3 g-4\">";
	if (isset($_GET['sort'])) {
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
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
			<div class="text-center more pt-4"><button class="btn" id="loadmore">Показать ещё</button></div>
		<?php }
	} else {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'cat' => $cat->cat_ID,
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 36,
			'paged' => $paged,
			'order' => 'ASC'
		);
		$query2 = new WP_Query($args);
		while ($query2->have_posts()) {
			$query2->the_post(); 
			get_template_part('loop', 'category_new');
		}
		wp_reset_postdata();
		echo "</div>";
		if ($query2->max_num_pages > 1 && (int) get_query_var('paged') !== (int) $query2->max_num_pages) { ?>
			<script>
				var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
				var posts_vars = '<?php echo serialize($query2->query_vars) ?>';
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				var max_pages = '<?php echo $query2->max_num_pages; ?>';
			</script>
			<div class="text-center more pt-4"><button class="btn" id="loadmore">Показать ещё</button></div>
	<?php
		}
	}
	if (function_exists('emm_paginate')) {
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
<? if($cnt_list) { ?>
<div class="content-blocks-wrapper">
	<div class="container">	
		<div class="content-blocks row">
			<? $i = 1; $count_cnt = count($cnt_list); foreach($cnt_list as $item) { ?>
				<div class="content-blocks__item row col-lg-12 <?= $i == $count_cnt && ($count_cnt % 2) != 0 ? 'col-sm-12' : 'col-sm-6' ?>">
					<div class="content-blocks__item-col col-lg-6 col-12">
						<?= $item['ttl'] ? '<h3>'.$item['ttl'].'</h3>' : '' ?>
						<?= $item['txt'] ?>
					</div>
					<div class="content-blocks__item-col col-lg-6 col-12">
						<div class="content-blocks__slider">
							<? foreach($item['imgs'] as $itm) { ?>
								<img class="grunge content-blocks__slider-img" src="<?= $itm['картинка'] ?>" title="" alt="">
							<? } ?>
						</div>
					</div>
				</div>
			<? $i++; } ?>
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