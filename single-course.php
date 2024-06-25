<?php get_header(); ?>

<main>
	<section>
		<?php while ( have_posts() ) :
			the_post(); ?>
			<article>
				<h1 class="page-title"> Welcome to the <?php the_title() ?></h1>
				<?php
				$photo = get_field( 'course_image' );
				?>
				<img src="<?php echo $photo['sizes']['thumbnail']; ?>" alt="<?php echo $photo['alt']; ?>">
			</article>

			<h2>Course instructor</h2>
			<?php $instructors = get_posts( array(
				'post_type' => 'instructor',
				'meta_query' => array(
					array(
						'key' => 'instructor_course', // name of custom field
						'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
						'compare' => 'LIKE'
					)
				)
			) );
			?>
			<?php if ( $instructors ) : ?>
				<ul>
					<?php foreach ( $instructors as $instructor ) : ?>
						<li>
							<a href="<?php echo get_permalink( $instructor->ID ); ?>">
								<?php echo get_the_title( $instructor->ID ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
	</section>
</main>



<?php get_footer(); ?>