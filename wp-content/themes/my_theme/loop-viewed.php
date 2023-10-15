<?
	
	echo "<div class=\"item\">";
		echo "<a class=\"pic\" href=\"".get_permalink()."\">";
			echo get_the_post_thumbnail(null, 'full');
		echo "</a>";
		echo "<a class=\"title\" href=\"".get_permalink()."\">";
			echo get_the_title();
		echo "</a>";
	echo "</div>";
	
?>