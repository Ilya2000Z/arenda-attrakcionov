<?php

get_header('tags');

$term = get_queried_object();
$tagID = $term->term_id;

echo "<div class=\"caption\"><h1 style=\"float: right; font-size: 32px;\">$term->name</h1></div>";

echo "<div class=\"items_list\">";
    $args = array ( 'tag_id' => $tagID, 'post_type' => 'post', 'post_status' => 'publish', 'meta_key'=> 'wpcf-mypostpos', 'orderby' => 'meta_value_num', 'meta_value' => '1', 'meta_compare' => '>=', 'order' => 'ASC' );
    $query = new WP_Query( $args );
    $ids_exc = wp_list_pluck( $query->posts, 'ID' );
    //$ids_exc = implode( ',', $ids );
    //var_dump($ids_exc);
    while($query->have_posts())
    {
        $query->the_post();
        get_template_part( 'loop', 'category', 'tagid' );
    }
    wp_reset_postdata();
    $args = array ( 'tag_id' => $tagID, 'post_type' => 'post', 'post_status' => 'publish', 'post__not_in' => $ids_exc, 'orderby' => 'title', 'order' => 'ASC' );
    $query = new WP_Query( $args );
    while($query->have_posts())
    {
        $query->the_post();
        get_template_part( 'loop', 'category' );
    }
    wp_reset_postdata();
    echo "<div class=\"clear\"></div>";

    //print_r($cat);
echo "</div>";

get_footer('inside_category');