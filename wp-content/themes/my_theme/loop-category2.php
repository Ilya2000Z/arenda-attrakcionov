<?
	
	echo "<div class=\"item\">";
		if(has_post_thumbnail())
		{
			//echo "<div class=\"pic\">";
				//echo get_the_post_thumbnail(null, 'full');
			//echo "</div>";
		}
		echo "<div class=\"cpt\">";
			echo "<a href=\"".get_permalink()."\">".get_the_title()."</a>";
		echo "</div>";
		the_content('', true);
	echo "</div>";
	
?>