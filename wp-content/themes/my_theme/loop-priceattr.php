<?
	echo "<tr>";
        echo "<td class=\"width54 theader\">";
		if(has_post_thumbnail())
	   	{

                echo '<div class="ramka">';
				echo "<a target=\"_blank\" href=\"".get_permalink()."\">".get_the_post_thumbnail(null, array(300, 300), array( 'style' => 'width: 54px; height: auto;' ))."</a>";    echo '</div>';


	   	}
        echo "</td>";
		echo "<td class=\"left-tt\"><a target=\"_blank\" href=\"".get_permalink()."\">".get_the_title()."</a></td>";
		echo "<td class=\"theader\">".get_post_meta($post->ID,'wpcf-size_stuff', true)."</td>";
		echo "<td class=\"theader size1em\">".get_post_meta($post->ID,'wpcf-energy_stuff', true)."</td>";

        if((int)get_post_meta($post->ID,'wpcf-is_myot', true)>0) $ot = 'От '; else $ot = '';
		echo "<td class=\"right-tt theader size1em\"><span style=\"font-weight: bold; color: #777777;\">$ot".number_format(get_post_meta($post->ID,'wpcf-price_stuff', true), 0, '', ' ')."</span></td>";
	echo "</tr>";
?>