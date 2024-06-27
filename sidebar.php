<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Web_Academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<aside>
	<!-- Search Form -->
	<div class="mb-5">
		<?php
		get_search_form();
		?>
	</div>
	<!-- List of categories start -->
	<div class="mb-5">
		<h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h3>
		<?php
		$categories = get_categories( array( 'orderby' => 'count',
			'order' => 'DESC',
			'show_count' => true, ) );

		if ( $categories ) {
			?>
			<ul class="list-group list-group-flush">
				<?php foreach ( $categories as $category ) { ?>
					<li class="list-group-item d-flex justify-content-between align-items-center px-0">
						<a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"
							class="text-decoration-none h6 m-0"><?php echo esc_html( $category->name ) ?></a>
						<span class="badge badge-primary badge-pill"><?php echo esc_html( $category->count ) ?></span>
					</li>

				<?php } ?>
			</ul>
		<?php }
		?>
	</div>
	<!-- List of categories end -->

	<!-- Recent post start -->
	<div class="mb-5">
		<h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h3>

		<?php
		$recent_post = new WP_Query( array(
			'posts_per_page' => 3,
			'order_by' => '',
		) );

		if ( $recent_post->have_posts() ) {
			while ( $recent_post->have_posts() ) {
				$recent_post->the_post(); ?>
				<a class="d-flex align-items-center text-decoration-none mb-3" href="<?php esc_url( the_permalink() ) ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'blogPostThumbnail', array(
							'class' => 'img-fluid rounded',
						) );
					} else {
						echo '<img class="img-fluid rounded" src="' . get_template_directory_uri() . '/img/blog-80-80.wjpg" />';
					} ?>
					<div class="pl-3">
						<h4 class="h6"><?php the_title(); ?></h4>
						<small><?php the_time( 'M d, Y' ); ?></small>
					</div>
				</a>
			<?php }
			wp_reset_postdata();
		}

		?>
	</div>
	<!-- Recent post end -->

	<!-- Tag cloud start -->
	<div>
		<h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h3>
		<?php
		$tags = get_tags( array(
			'orderby' => 'count',
			'order' => 'DESC',
			'show_count' => true,
			'hide_empty' => true,
		) );

		if ( $tags ) {
			$html = '<div class="d-flex flex-wrap m-n1">';
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );

				$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='btn btn-outline-primary m-1'>";
				$html .= "{$tag->name}</a>";
			}
			$html .= '</div>';
			echo $html;
		}
		?>

	</div>
	<!-- Tag cloud end -->
</aside>