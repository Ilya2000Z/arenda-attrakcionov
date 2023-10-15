<?php
		get_header('new');
        $cat = get_category(get_query_var('cat'), false);
        $quer_object = get_queried_object();
        $taxonomy = $quer_object->taxonomy;
        $term_id = $quer_object->term_id;
        $categories = get_categories( [
            'taxonomy'     => 'category',
            'type'         => 'post',
            'child_of'     => $quer_object->term_id,
            'parent'       => '',
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 1,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => 0,
            'pad_counts'   => false,
        ] );
        echo "<div class=\"row row-cols-2 row-cols-md-2 row-cols-lg-3 g-2\">";
            //$tags = get_tags(array('hide_empty'=>false)); //'orderby' => 'term_order'
            foreach ($categories as $category) {
                //$quer_object = get_queried_object();
                //$taxonomy = $tag->taxonomy;
                //$term_id = $tag->term_id;
                $category_img = get_term_meta( $category->term_id, 'wpcf-thumbsforcats', true );
            	//$tag_link = get_tag_link($tag->term_id);
                $category_link = get_category_link($category->term_id);
                //$tag_link = str_replace('tag/', '', $tag_link);
               $html .= "<div class=\"col\">
                            <div class=\"product card h-100\">
                                <img class=\"img-fluid\" alt=\"{$category->name}\" src=\"{$category_img}\" />
                                <div class=\"card-body text-center\">
                                    <!-- <div class=\"pic\">
                                         <div class=\"block-item-title\"><div class=\"block-item-title__hover\">Подробнее</div></div>
                                    </div> -->
                                    <span>{$category->name}</span>
                                    <a class=\"stretched-link\" href=\"{$category_link}\" data-src=\"{$category_link}\"></a>
                                </div>
                            </div>
                        </div>";
            }
            echo $html;
            echo "<div class=\"clearfix\"></div>";
        echo "</div>";
        get_footer('new');