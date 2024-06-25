<?php get_header() ?>

<main>

	<!-- Carousel Start -->
	<div class="container-fluid p-0 pb-5 mb-5">
		<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#header-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#header-carousel" data-slide-to="1"></li>
				<li data-target="#header-carousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active" style="min-height: 300px; max-height: 79vh">
					<img alt="slide-1" class="position-relative w-100"
						src="<?php echo get_theme_file_uri( '/img/carousel-1.jpg' ) ?>"
						style="min-height: 300px; object-fit: cover;">
					<div class="carousel-caption d-flex align-items-center justify-content-center">
						<div class="p-5" style="width: 100%; max-width: 900px;">
							<h2 class="h5 text-white text-uppercase mb-md-3">Best Online Courses</h2>
							<h3 class="display-3 text-white mb-md-4 font-weight-bold">Best Education From Your Home
							</h3>
							<a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
						</div>
					</div>
				</div>
				<div class="carousel-item" style="min-height: 300px; max-height: 79vh">
					<img alt="slide-2" class="position-relative w-100"
						src="<?php echo get_theme_file_uri( '/img/carousel-2.jpg' ) ?>"
						style="min-height: 300px; object-fit: cover;">
					<div class="carousel-caption d-flex align-items-center justify-content-center">
						<div class="p-5" style="width: 100%; max-width: 900px;">
							<h2 class="h5 text-white text-uppercase mb-md-3">Best Online Courses</h2>
							<h3 class="display-3 text-white mb-md-4 font-weight-bold">Best Online Learning Platform</h3>
							<a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
						</div>
					</div>
				</div>
				<div class="carousel-item" style="min-height: 300px; max-height: 79vh">
					<img alt="slide-3" class="position-relative w-100"
						src="<?php echo get_theme_file_uri( '/img/carousel-3.jpg' ) ?>"
						style="min-height: 300px; object-fit: cover;">
					<div class="carousel-caption d-flex align-items-center justify-content-center">
						<div class="p-5" style="width: 100%; max-width: 900px;">
							<h2 class="h5 text-white text-uppercase mb-md-3">Best Online Courses</h2>
							<h3 class="display-3 text-white mb-md-4 font-weight-bold">New Way To Learn From Home</h3>
							<a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Carousel End -->

	<section>
		<h2>Our Courses</h2>
		<?php
		$homepageCourses = new WP_Query( array(
			'posts_per_page' => '3',
			'post_type' => 'course'
		) );

		while ( $homepageCourses->have_posts() ) {
			$homepageCourses->the_post(); ?>
			<ul>
				<li><a href=<?php the_permalink() ?>><?php the_title() ?></a></li>
			</ul>
		<?php }
		?>
	</section>
	<section>
		<h2>Our Instructors</h2>
		<?php
		$homepageInstructors = new WP_Query( array(
			'posts_per_page' => '3',
			'post_type' => 'instructor'
		) );

		while ( $homepageInstructors->have_posts() ) {
			$homepageInstructors->the_post(); ?>
			<ul>
				<li><a href=<?php the_permalink() ?>><?php the_title() ?></a></li>
			</ul>
		<?php }
		?>
	</section>
</main>



<?php get_footer() ?>