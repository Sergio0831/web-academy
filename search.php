<?php
/**
 * The template for displaying search results pages
 *
 * @package Web_Academy
 */

get_header();
?>


<main>
	<?php
	pageBanner( array(
		"title" => 'Search Result&nbsp;for: ' . get_search_query(),
	) )
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
							} ?>
							<div class="col-12">
								<?php custom_pagination() ?>
							</div>
						</div>
						<!-- Blog Posts End -->
					</div>

					<div class="col-lg-4 mt-3 mt-lg-0">
						<?php
						get_template_part( 'template-parts/components/author' );
						get_sidebar()
							?>

					</div>
				<?php } else {
							get_template_part( 'template-parts/content', 'none' );
						} ?>
			</div>
		</div>
	</div>
	<!-- Blog End -->

</main>

<? get_footer() ?>