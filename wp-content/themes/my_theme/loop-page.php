<?php
	
	echo "<h1>";
		the_title();
	echo "</h1>";

	// $the_content = apply_filters( 'the_content', get_the_content() );
	// if ( ! empty( $the_content ) ) {
	// 	echo wp_staticize_emoji($the_content);
	// }

	the_content();
	
?>
