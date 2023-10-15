<?php

get_header();

$cat = get_category(get_query_var('cat'), false);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

echo "<div id='content'>
            <h1>$cat->name</h1>";
//dynamic_sidebar( 'cat-items-promo-mobile' );
echo "<section class='attractions'>";
//$args = array ( 'cat' => $cat->cat_ID, 'post_type' => 'post', 'post_status' => 'publish', 'meta_key'=> 'wpcf-mypostpos', 'orderby' => 'meta_value_num', 'meta_value' => '1', 'meta_compare' => '>=', 'order' => 'ASC' );

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

$query = new WP_Query($args);
$ids_exc = wp_list_pluck($query->posts, 'ID');
//$ids_exc = implode( ',', $ids );
//var_dump($ids_exc);
while ($query->have_posts()) {
	$query->the_post();
	get_template_part('loop', 'category');
}
wp_reset_postdata();
/*
$args = array('cat' => $cat->cat_ID, 'post_type' => 'post', 'post_status' => 'publish', 'post__not_in' => $ids_exc, 'orderby' => 'title', 'order' => 'ASC', 'paged' => $paged, 'posts_per_page' => 36);
$query = new WP_Query($args);
while ($query->have_posts()) {
	$query->the_post();
	get_template_part('loop', 'category');
}

wp_reset_postdata();
*/

if (function_exists('emm_paginate')) {
	emm_paginate();
}

echo "</section>
            <div style=\"padding: 0.5rem;\">
            {$cat->category_description}
            </div>
        </div>";
get_footer();
