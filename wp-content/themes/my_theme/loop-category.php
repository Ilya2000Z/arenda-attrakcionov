
<?php

    $title = get_the_title();

	echo "<div class=\"item\" data-src=\"".get_permalink()."\">";
    echo "<a title=\"$title\" href=\"".get_permalink()."\">";
        echo "<div class=\"cpt\">";
        echo "<i>".$title."</i><div class=\"clear\"></div>";
		echo "</div>";
		if(has_post_thumbnail())
		{
            echo "<div class=\"pic\">".get_the_post_thumbnail(null, 'medium');
			echo "<div class=\"block-item-title\"><div class=\"block-item-title__hover\">Подробнее</div></div></div>";
		}
        $isot = get_post_meta($post->ID, 'wpcf-is_myot', true);
        $price = get_post_meta($post->ID, 'wpcf-price_stuff', true);
        $short_description = get_post_meta($post->ID, 'wpcf-short_description', true);
        if(!empty($short_description)) { $short_class = 'short_desc'; $short_desc = "<div class=\"min__price\"><span>$price&nbsp;р.</span></div><p>$short_description</p>"; } else {$short_class='short_none'; echo "<div class=\"min__price $short_class\"><span>$price&nbsp;р.</span></div>";}
        $price = number_format((int)$price, 0, '', ' ');
        if($isot) $price = "от $price";
        if(!empty($short_description)) echo "<div class='block__price $short_class'>$short_desc</div>";
	echo "</a></div>";

?>