<div class="col-lg-6 mb-4">
	<article class="blog-item position-relative overflow-hidden rounded mb-2">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'blogPost', array(
				'class' => 'img-fluid w-100',
			) );
		} else {
			echo '<img class="img-fluid w-100" src="' . get_template_directory_uri() . '/img/blog-default.webp" />';
		} ?>
		<a class="blog-overlay text-decoration-none" href="<?php the_permalink() ?>">
			<h3 class="h5 text-white mb-3"><?php the_title() ?></h3>
			<p class="text-primary m-0"><?php the_time( 'M d, Y' ); ?></p>
		</a>
	</article>
</div>