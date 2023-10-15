<?php

	get_header('new');


	$cat = get_category(get_query_var('cat'), false);

	

	$quer_object = get_queried_object();
	
	$taxonomy = $quer_object->taxonomy;
	$term_id = $quer_object->term_id;

	//  $crosslinkIsOn = get_field('field_56b87dfb2b5dd', $taxonomy . '_' . $term_id);
	//  $crosslinkSwitch = get_field('field_56b887c59c835', $taxonomy . '_' . $term_id);

	// // Сквозной баннер в категории между позициями

	//  $catBannerInlineImg = get_field('field_5fe35e57aa6c8', $taxonomy . '_' . $term_id);
	//  $catBannerInlineTarget = get_field('field_5fe35eb2aa6c9', $taxonomy . '_' . $term_id);

	// $crosslinkIsOn = $crosslinkIsOn ? 'class="crosslink"' : '';

	//var_dump($crosslinkSwitch);

	// if ($crosslinkIsOn && $crosslinkSwitch == 'link') {
	// 	$crosslinkText = get_field('field_56b8b57f5714d', $taxonomy . '_' . $term_id);
	// 	$crosslinkUrl = get_field('field_56b8b7d330478', $taxonomy . '_' . $term_id);
	// 	$crossLinkSimp = "<div class=\"cross-link\">
    //             <span style=\"color:#ff7902;\">$crosslinkText</span>
    //             <div class=\"cover-bg\"><a class=\"shadowtext\" target=\"_blank\" href=\"$crosslinkUrl\">перейти на страницу</a></div>
    //         </div>";
	// } else {
	// 	$crossLinkSimp = '';
	// }
	// if ($crosslinkIsOn && $crosslinkSwitch == 'link_pres') {
	// 	$crosslinkTextPres = get_field('field_56b8bb485a48b', $taxonomy . '_' . $term_id);

	// 	$crossLinkPres =  "<div class=\"cross-link2\">
    //             <a class=\"getpres_form_pop\" title=\"Заявка на получение презентации\" href=\"#\">$crosslinkTextPres</a>
    //             <!--<div class=\"cover-bg\">создать запрос</div>-->
    //         </div>";
	// } else {
	// 	$crossLinkPres = '';
	// }

	/*
        if(!empty($catBannerInlineImg)&&$catBannerInlineImg=='cat_banner_inline')
        {
            $catBannerInlineHtml =  "<div class=\"banner-cat-inline clear\">
                <a href=\"$catBannerInlineTarget\" target=\"_blank\"></a><img src=\"$catBannerInlineImg\" alt=\"\" /></a>
            </div>";
        }
        */
	if (isset($_GET['order']) && ($_GET['order'] == 'desc' || $_GET['order'] == 'asc')) {
		$order = strtolower($_GET['order']);
		$order = ($order == 'asc') ? 'desc' : 'asc';
	} else {
		$order = 'asc';
	}
	/*
        if(isset($_GET['sort'])) {
            switch($_GET['sort']) {
                case 'price':
                        $order_price = $order;
                    break;
                case 'name':
                        $order_name = $order;
                    break;

            }
        }
        */

	$putHtml = "<div class=\"caption\" style=\"min-height: 30px;\">
            <h1 $crosslinkIsOn>$cat->name</h1>$crossLinkSimp" . "$crossLinkPres</div>";

	/*
            <ul class=\"sorting\">
                <li class=\"merge\">Сортировка:</li><li class=\"".(($_GET['sort']) ? 'sort-order' : 'active')."\"><a href=\"".get_queried_object()->slug."\">Рейтинг <i class=\"sort-asc\"></i></a></li>
                <li class=\"".(($_GET['sort']=='price')?'active':'sort-order')."\"><a href=\"".get_queried_object()->slug."?sort=price&order=".($order?$order:'asc')."\">Цена <i class=\"sort-".(($order == 'asc') ? 'desc' : 'asc')."\"></i></a></li>
                <li class=\"".(($_GET['sort']=='name')?'active':'sort-order')."\"><a href=\"".get_queried_object()->slug."?sort=name&order=".($order?$order:'asc')."\">Название <i class=\"sort-".(($order == 'asc') ? 'desc' : 'asc')."\"></i></a></li>
            </ul>
            */

	/*
            $putHtml = "<div class=\"caption\" style=\"min-height: 30px;\">
                <h1 $crosslinkIsOn>$cat->name</h1>
                   $crossLinkSimp"."$crossLinkPres
                <ul class=\"sorting\">
                    <li class=\"merge\">Сортировка:</li><li class=\"".(($_GET['sort']) ? 'sort-order' : 'active')."\"><a href=\"/".get_queried_object()->slug."\">Рейтинг <i class=\"sort-asc\"></i></a></li>
                    <li class=\"".(($_GET['sort']=='price')?'active':'sort-order')."\"><a href=\"?sort=price&order=".($order?$order:'asc')."\">Цена <i class=\"sort-".(($order == 'asc') ? 'desc' : 'asc')."\"></i></a></li>
                    <li class=\"".(($_GET['sort']=='name')?'active':'sort-order')."\"><a href=\"?sort=name&order=".($order?$order:'asc')."\">Название <i class=\"sort-".(($order == 'asc') ? 'desc' : 'asc')."\"></i></a></li>
                </ul>
            </div>";
            */

	//echo $putHtml;

	//$test = types_render_field( "videoforcats2", array("output" => "raw") );
	

	echo "<div class=\"loadmore row row-cols-2 row-cols-md-2 row-cols-lg-3 g-4\">";
	//dynamic_sidebar( 'cat-items-promo' );
	if (isset($_GET['sort'])) {

		go_filter($cat->cat_ID);

		while (have_posts()) {
			the_post();
			get_template_part('loop', 'category_new');
		}

		wp_reset_postdata();

		//echo "<pre>";
		//var_dump($query->query_vars);
		//echo "</pre>";

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

		/*
                $args = array (
                    'category__in' => $cat->cat_ID,
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'meta_key'=> 'wpcf-mypostpos',
                    'orderby' => 'meta_value_num',
                    'posts_per_page' => 32,
                    'paged' => $paged,
                    'meta_value' => '1',
                    'meta_compare' => '>=',
                    'order' => 'ASC'
                );
                $query = new WP_Query( $args );
                $ids_exc = wp_list_pluck( $query->posts, 'ID' );
                //$ids_exc = implode( ',', $ids );
                //var_dump($ids_exc);
                while($query->have_posts())
                {
                    $query->the_post();
                    get_template_part( 'loop', 'category' );
                }
				
                wp_reset_postdata();
				*/
		$args = array(
			'cat' => $cat->cat_ID,
			'post_type' => 'post',
			'post_status' => 'publish',
			//'post__not_in' => $ids_exc,
			'posts_per_page' => 36,
			'paged' => $paged,
			//'orderby' => 'title',
			'order' => 'ASC'
		);
		$query2 = new WP_Query($args);

		//$increment_pr = 1;
		//global $increment_pr;

		while ($query2->have_posts()) {

			$query2->the_post();
			get_template_part('loop', 'category_new');

			//if($increment_pr == 6 && !empty($catBannerInlineHtml)) {
			//echo "<div class=\"banner-cat-inline clear\">".$catBannerInlineHtml."</div>";
			//}

			//$increment_pr++;

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


	?>

	<?php
	if (function_exists('emm_paginate')) {
		emm_paginate();
	}

	/*
	    var_dump(get_term_by('id', get_queried_object()->parent,get_queried_object()->taxonomy)->name);
        var_dump(get_queried_object());
        var_dump(get_the_category());

        var_dump(get_queried_object());

        $terms = get_terms( 'post_tag', [
        	'hide_empty' => false,
            'slug' => get_queried_object()->slug."t"
        ] );

        $url_query = parse_url($_SERVER["REQUEST_URI"]);
        var_dump(explode('/', $url_query['path']));


        if() {
            echo "Метка";
        }
        */


	get_footer('new');

?>