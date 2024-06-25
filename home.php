<?php get_header() ?>

<main>
	<!-- Page Banner -->
	<?php get_template_part( "template-parts/components/banner" ); ?>

	<!-- Blog Start -->
	<div class="container-fluid py-5">
		<div class="container py-lg-5">
			<div class="row">
				<div class="col-lg-8">
					<!-- Blog Posts Start -->
					<div class="row pb-3">
						<?php if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
								get_template_part( 'template-parts/content', 'post' );
							}
						} else {
							get_template_part( 'template-parts/content', 'none' );
						} ?>
						<div class="col-12">
							<?php custom_pagination() ?>
						</div>
					</div>
					<!-- Blog Posts End -->
				</div>

				<div class="col-lg-4 mt-3 mt-lg-0">
					<!-- Author Bio -->
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

					<?php get_sidebar() ?>

				</div>
			</div>
		</div>
	</div>
	<!-- Blog End -->
</main>

<?php get_footer() ?>