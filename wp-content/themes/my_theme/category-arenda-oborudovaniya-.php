<?php
	if($_COOKIE['debug'] != '1') {
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
    } else {
        get_header('inside');
        $cat = get_category(get_query_var('cat'), false);
        $quer_object = get_queried_object();
        $taxonomy = $quer_object->taxonomy;
        $term_id = $quer_object->term_id;
        $crosslinkIsOn = get_field('field_56b87dfb2b5dd', $taxonomy . '_' . $term_id);
        $crosslinkSwitch = get_field('field_56b887c59c835', $taxonomy . '_' . $term_id);
        $crosslinkIsOn = $crosslinkIsOn?'class="crosslink"':'';
        //var_dump($crosslinkSwitch);
        if($crosslinkIsOn&&$crosslinkSwitch=='link')
        {
            $crosslinkText = get_field('field_56b8b57f5714d', $taxonomy . '_' . $term_id);
            $crosslinkUrl = get_field('field_56b8b7d330478', $taxonomy . '_' . $term_id);
            $crossLinkSimp = "<div class=\"cross-link\">
                <span style=\"color:#ff7902;\">$crosslinkText</span>
                <div class=\"cover-bg\"><a class=\"shadowtext\" target=\"_blank\" href=\"$crosslinkUrl\">перейти на страницу</a></div>
            </div>";
        }
        else { $crossLinkSimp = ''; }
        if($crosslinkIsOn&&$crosslinkSwitch=='link_pres')
        {
            $crosslinkTextPres = get_field('field_56b8bb485a48b', $taxonomy . '_' . $term_id);
            $crossLinkPres =  "<div class=\"cross-link2\">
                <a class=\"fancybox\" title=\"Заявка на получение презентации\" href=\"#getpres_form_pop\">$crosslinkTextPres</a>
                <!--<div class=\"cover-bg\">создать запрос</div>-->
            </div>";
        }
        else { $crossLinkPres = ''; }
        $putHtml = "<div class=\"caption\" style=\"height: 30px;\"><h1 $crosslinkIsOn>$cat->name</h1>
               $crossLinkSimp"."$crossLinkPres
        </div>";
        echo $putHtml;
        echo "<div class=\"items_list\">";
            $tags = get_tags(array('hide_empty'=>false)); //'orderby' => 'term_order'
            foreach ($tags as $tag){
                $quer_object = get_queried_object();
                $taxonomy = $tag->taxonomy;
                $term_id = $tag->term_id;
                $tag_img = get_term_meta( $term_id, 'wpcf-thumbsfortags', true );
            	$tag_link = get_tag_link($tag->term_id);
                $tag_link = str_replace('tag/', '', $tag_link);
               $html .= "<div class=\"item\">
                         <a href=\"{$tag_link}\" data-src=\"{$tag_link}\">
            			    <div class=\"pic\">
            				    <img alt=\"{$tag->name}\" src=\"{$tag_img}\" />
                                <div class=\"block-item-title\"><div class=\"block-item-title__hover\">Подробнее</div></div>
                            </div>
            		    <div class=\"cpt\">
            			    <i>{$tag->name}</i><div class=\"clear\"></div>
                    	</div>
                        </a>
                    </div>";
            }
            echo $html;
            echo "<div class=\"clear\"></div>";
        echo "</div>";
    get_footer('inside_category');
}