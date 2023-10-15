<?php
    $title = get_the_title();
	echo "<div class='attraction'>";
    echo "<a title=\"$title\" href=\"".get_permalink()."\">";
		if(has_post_thumbnail())
		{
            echo "<div class='attraction-thumb'>".get_the_post_thumbnail(null, 'medium');
			echo "</div>";
		}

        $isot = get_post_meta($post->ID, 'wpcf-is_myot', true);
        $price = get_post_meta($post->ID, 'wpcf-price_stuff', true);
        $price = number_format((int)$price, 0, '', ' ');
        $short_description = get_post_meta($post->ID, 'wpcf-short_description', true);
        if($isot) $price = "от $price";
        echo "<div class=\"attraction-title\"><span>$title</span><div class='attraction-price'>$price р.</div></div>";
	echo "</a><p style=\"font-size:10px;\">$short_description</p></div>";

?>