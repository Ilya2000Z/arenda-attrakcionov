<?php

    $title = get_the_title();



    echo "<div class=\"item_selection\" data-src=\"".get_permalink()."\">";
    echo "<a title=\"$title\" href=\"".get_permalink()."\">";


        //$isot = get_post_meta($post->ID, 'wpcf-is_myot', true);
        $price = get_post_meta($post->ID, 'wpcf-price_stuff', true);
        $thumbs = get_post_meta($post->ID, 'wpcf-thumbsforselection', true);
        $short_description = get_post_meta($post->ID, 'wpcf-short_description', true);
        //if($isot) $price = "от $price";

        echo "<div class=\"thumb_selection\" style=\"background-image:url($thumbs);\">
            <div class=\"title_selection\">
                <span class=\"title_selection__value\">$title</span>
                <span class=\"title_selection__price\">от&nbsp;$price&nbsp;р.</span>
            </div>
        </div>";

        //if(!empty($short_description)) { $short_class = 'short_desc'; $short_desc = "<div class=\"min__price\"><span>$price&nbsp;р.</span></div><p>$short_description</p>"; } else {$short_class='short_none'; echo "<div class=\"min__price $short_class\"><span>$price&nbsp;р.</span></div>";}
        //$price = number_format((int)$price, 0, '', ' ');
        //if($isot) $price = "от $price";
        //if(!empty($short_description)) echo "<div class='block__price $short_class'>$short_desc</div>";

    echo "</a></div>";


?>