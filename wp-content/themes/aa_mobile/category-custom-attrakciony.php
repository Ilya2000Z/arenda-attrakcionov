<?php
get_header();

$cat = get_category(get_query_var('cat'), false);

$quer_object = get_queried_object();
$taxonomy = $quer_object->taxonomy;
$term_id = $quer_object->term_id;

$tags = get_tags(array('hide_empty'=>false));

echo "<div id='content'>
            <h1>$cat->name</h1>
            <section class='attractions'>";

            foreach ($tags as $tag){
                $quer_object = get_queried_object();
                $taxonomy = $tag->taxonomy;
                $term_id = $tag->term_id;
                $tag_img = get_term_meta( $term_id, 'wpcf-thumbsfortags', true );
            	$tag_link = get_tag_link($tag->term_id);

                $html .= "<div class='attraction'>
                         <a href=\"{$tag_link}\" data-src=\"{$tag_link}\">
            			    <div class='attraction-thumb'>
            				    <img src=\"{$tag_img}\" />
                            </div>
            		        <div class='attraction-title'>{$tag->name}</div>

                            </a>
                        </div>";
            }

            echo $html;

    echo "</section>
    </div>";

get_footer();