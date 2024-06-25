<?php
/**
 * Template part for displaying the page banner
 *
 * @package Web_Academy
 */

// Set default values
$default_banner_bg = get_template_directory_uri() . '/img/page-header.webp';
$default_banner_title = is_home() ? get_the_title( get_option( 'page_for_posts', true ) ) : get_the_title();

// Get custom field values
$banner_bg_field = get_field( 'page_banner_background_image' );
$banner_title_field = get_field( 'page_banner_title' );

// Use custom field values if available, otherwise use default values
$banner_bg = $banner_bg_field ? $banner_bg_field['url'] : $default_banner_bg;
$banner_title = $banner_title_field ? $banner_title_field : $default_banner_title;

?>
<!-- Page Banner Start -->
<section class="container-fluid page-header"
	style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo esc_html( $banner_bg ); ?>');">
	<div class="container">
		<div class="d-flex flex-column justify-content-center" style="min-height: 300px">
			<h2 class="display-4 text-white text-uppercase"><?php echo esc_html( $banner_title ) ?></h2>
			<div class="d-inline-flex text-white">
				<p class="m-0 text-uppercase"><a class="text-white"
						href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></p>
				<i class="fa fa-angle-double-right pt-1 px-3"></i>
				<p class="m-0 text-uppercase"><?php echo get_permalink( get_option( 'page_for_posts' ) ) ?></p>
			</div>
		</div>
	</div>
</section>
<!-- Page Banner End -->