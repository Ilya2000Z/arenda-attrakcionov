<?php
get_header('new');

?>
<article class="container">
	<div class="row py-4">
		<?php
		while (have_posts()) {
			the_post();
			get_template_part('loop', 'page');
		}
		global $post;
		if(51464 == $post->ID) {
			echo '<div>';
			echo do_shortcode('[ccc_my_favorite_list_custom_template style=""]');
			echo '</div>';
		}
		?>
	</div>

	<script>
		jQuery(document).ready(function() {

			$("#ccc-my_favorite-list").addClass('row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4');

		});
	</script>

</article>
<?php
get_footer('new');
?>