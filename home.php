<?php get_header() ?>

<main>
	<!-- Page Banner -->
	<?php
	pageBanner( array(
		'title' => 'Welcome to our blog!',
	) );
	?>

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
					<!-- Blog End -->
				</div>

				<div class="col-lg-4 mt-3 mt-lg-0">
					<?php
					get_template_part( 'template-parts/components/author' );

					get_sidebar() ?>

				</div>
			</div>
		</div>
	</div>
	<!-- Blog End -->
</main>

<?php get_footer() ?>