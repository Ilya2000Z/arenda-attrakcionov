<?
	get_header('inside');
		
		$cat = get_category(get_query_var('cat'), false);
		
		echo "<div class=\"caption2\"><h1>".$cat->name."</h1></div>";
		
		echo "<div class=\"articles_list\">";
			while(have_posts())
			{
				the_post();
				get_template_part( 'loop', 'category2' );
			}
			echo "<div class=\"clear\"></div>";
		echo "</div>";
		
		echo "<div id=\"mark\"></div>";
		
	get_footer('inside');
?>