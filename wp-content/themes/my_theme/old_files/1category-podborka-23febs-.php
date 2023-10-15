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

    /*

    $categories = get_categories( array(
        'orderby' => 'name',
        'parent'  => get_queried_object()->term_id,
        'hide_empty' => false
    ) );

        $putHtml = "<div class=\"caption\"><h1>".get_queried_object()->name."</h1></div>";
        echo $putHtml;

        echo "<div id=\"items_selection_list\">";

        foreach($categories as $term) {
            $cat_img = get_term_meta($term->term_id, 'wpcf-thumbsforcats', true);
            $catLink = get_category_link( $term->term_id );
            $catName = $term->name;

            $html .= "<div class=\"item_selection\">
                 <a target=\"_blank\" href=\"{$catLink}\">
    			    <div class=\"pic_selection\">
    				    <img alt=\"{$term->name}\" src=\"{$cat_img}\" />
                        <div class=\"block-item-title\"><div class=\"block-item-title__hover\">Подробнее</div></div>
                    </div>
        		    <div class=\"cpt_selection\">
        			    <i>{$term->name}</i><div class=\"clear\"></div>
                	</div>
                </a>
            </div>";

        }

            echo $html;
            echo "<div class=\"clear\"></div>";

        echo "</div>";

    */

    get_footer('inside_category');
?>