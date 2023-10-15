<?php
    get_header('inside');
    $cat = get_category(get_query_var('cat'), false);
    $putHtml = "<div class=\"caption caption-selection\"><h1>".get_queried_object()->name."</h1></div>";
    echo $putHtml;
    $args = array (
        'cat' => $cat->cat_ID,
        'post_type' => 'post',
        'post_status' => 'publish'
    );
    $queryPost = new WP_Query( $args );
    echo "<div id=\"items_selection_list\">";
        while($queryPost->have_posts())
        {
            $queryPost->the_post();
            get_template_part( 'loop', 'category-selection' );
        }
        wp_reset_postdata();
    echo "</div>";
    get_footer('inside_category');
?>