<?php get_header(); ?>
    <div id="content" class="page-content" role="main">
        <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					// Include the page content template.
					get_template_part( 'content', 'page' );
				endwhile;
			?>
    </div>
<?php get_footer(); ?>