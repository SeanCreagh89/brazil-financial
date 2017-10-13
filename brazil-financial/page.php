<?php

/**
	* Theme Page Template
	*
	* @package Brazil Financial
	* @author Sean Creagh
*/



?>

<?php get_header(); ?>

<div id="Content">

	<?php

	if ( is_front_page() ) {

		echo '<div id="Front-page" class="container remove-spacing">';

	} else {

		echo '<div id="Page" class="container remove-spacing">';

	}

	if ( have_posts() ) : 

		while ( have_posts() ) : the_post();

			the_content();

		endwhile;

	else :

		echo "<h1>Ooops...</h1>";
		echo "<p>It looks like the page you were looking for doesn't exist.</p>";

	endif;

	echo '</div>';

	?>

</div>

<?php get_footer(); ?>