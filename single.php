<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Web_Academy
 */

get_header();
?>

<h1>Hello from single.php</h1>

<?php
while ( have_posts() ) {
	the_post();
}
?>


<?php
get_sidebar();
get_footer();
