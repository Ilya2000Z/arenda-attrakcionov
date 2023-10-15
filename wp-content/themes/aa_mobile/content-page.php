<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	echo "<h1>";
		the_title();
	echo "</h1>";
	the_content();

?>
</article><!-- #post-## -->