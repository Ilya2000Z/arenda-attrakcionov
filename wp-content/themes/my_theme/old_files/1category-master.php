<?
	get_header('master');
		
		$cat = get_category(get_query_var('cat'), false);
		
		echo "<div class=\"caption\"><h1>".$cat->name."</h1></div>";
		echo "Раздел в разработке ...";
		echo "<div class=\"items_list\">";
		    query_posts( array ( 'cat' => $cat->cat_ID, 'orderby' => 'title', 'order' => 'ASC' ) );  
			while(have_posts())
			{
				the_post();
				get_template_part( 'loop', 'category' );
			}
			echo "<div class=\"clear\"></div>";
			wp_reset_query();
			//print_r($cat);
		echo "</div>";
	
	get_footer('inside_category');
?>