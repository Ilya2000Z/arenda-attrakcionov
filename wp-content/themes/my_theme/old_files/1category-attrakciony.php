<?php
	if($_SERVER['REMOTE_ADDR'] == '82.112.186.139' && $_COOKIE['debug'] == '1') {

		get_header('new');

	} else {
		get_header('inside');
	}

		
		echo "<div id=\"bla\"></div>";
		
		$cat = get_category(get_query_var('cat'), false);
		
		$args = array(  
			'type' => 'post'
			,'child_of' => $cat->cat_ID
			,'parent' => ''
			,'orderby' => 'title'
			,'order' => 'ASC'
			,'hide_empty' => 1
			,'hierarchical' => 1
			,'exclude' => ''
			,'include' => ''
			,'number' => 0
			,'taxonomy' => 'category'
			,'pad_counts' => false
		);
		$categories = get_categories( $args );
		
		if($categories)
		{
			foreach($categories as $cat)
			{
				//echo "<h1>".$cat->name."</h1>";
				echo "<div class=\"items_list\">";
					query_posts( array('cat' => $cat->cat_ID, 'showposts' => '999', 'orderby' => 'title', 'order' => 'ASC') );
					while(have_posts())
					{
						the_post();
						get_template_part( 'loop', 'category' );
					}
					echo "<div class=\"clear\"></div>";
				echo "</div>";
			}  
		}  
		
		//echo "<div id=\"mark\"></div>";
		wp_reset_query();
		
	get_footer('inside_category');
?>