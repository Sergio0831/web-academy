<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 * @package Web_Academy
 */

get_header();
pageBanner();
?>

<main>
	<h1>This is page.php</h1>

	<?php
	while ( have_posts() ) :
		the_post();

		the_content();
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
