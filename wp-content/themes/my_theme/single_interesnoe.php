<?php
/*
	Single Post Template: Interesnoe
*/
?>
<?	
	get_header('inside');
		
		while(have_posts())
		{
			the_post();
			get_template_part('loop', 'page');
		}
		
		echo "<div id=\"mark\"></div>";
		
	get_footer('inside');
?>