<?php
/**
 * Template part for displaying the author
 *
 * @package Web_Academy
 */
?>

<div class="d-flex flex-column text-center bg-dark rounded mb-5 py-5 px-4">
	<?php
	$author_name = get_the_author_meta( 'display_name' );
	$author_description = get_the_author_meta( 'description' );
	$author_avatar = get_avatar( get_the_author_meta( 'user_email' ), 100, '', $author_name, array( 'class' => 'img-fluid rounded-circle mx-auto mb-3' ) );
	?>
	<?php echo $author_avatar ?>
	<h3 class="text-primary mb-3"><?php echo $author_name ?></h3>
	<p class="text-white m-0"><?php echo $author_description ?></p>
</div>