<?
/**
 * Template Name: Одна Колонка
*/
get_header('new');
		
?>
<article class="container">
	<div class="row py-4">
	<?php
		while(have_posts())
		{
			the_post();
			get_template_part('loop', 'page');
		}
		
	?>
	</div>

</article>
<?php
get_footer('new');
?>