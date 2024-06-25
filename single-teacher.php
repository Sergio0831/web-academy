<?php get_header(); ?>

<main>
	<section>
		<?php while ( have_posts() ) :
			the_post(); ?>
			<article>
				<h1 class="page-title"><?php the_title() ?></h1>
				<?php
				$photo = get_field( 'instructor_image' );
				print_r( $photo );
				?>
				<img src="<?php echo $photo['sizes']['thumbnail']; ?>" alt="<?php echo $photo['alt']; ?>">
			</article>

			<h2>Related courses</h2>
			<?php $courses = get_field( 'instructor_course' ); ?>
			<?php if ( $courses ) : ?>
				<ul>
					<?php foreach ( $courses as $course ) : ?>
						<li>
							<a href="<?php echo get_permalink( $course->ID ); ?>">
								<?php echo get_the_title( $course->ID ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
	</section>
</main>



<?php get_footer(); ?>