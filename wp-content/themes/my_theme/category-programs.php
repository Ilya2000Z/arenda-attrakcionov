<?
	get_header('inside');
		$cat = get_category(get_query_var('cat'), false);
		echo "<div class=\"caption2\"><h1>".$cat->name."</h1></div>";
		echo "<div class=\"items_list\">";
			query_posts( array ( 'cat' => $cat->cat_ID, 'orderby' => 'title', 'order' => 'ASC' ) ); 
			while(have_posts())
			{
				the_post();
				get_template_part( 'loop', 'category' );
			}
			echo "<div class=\"clear\"></div>";
		echo "</div>";
		wp_reset_query();
	get_footer('inside_category');
?>