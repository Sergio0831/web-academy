<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Web_Academy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#primary"><?php esc_html_e( 'Skip to content', 'web-academy' ); ?></a>

		<header>
			<!-- Topbar Start -->
			<div class="container-fluid d-none d-lg-block">
				<div class="row align-items-center py-4 px-xl-5">
					<div class="col-lg-3">
						<?php
						display_site_logo_or_name();
						?>
					</div>
					<div class="col-lg-3 text-right">
						<div class="d-inline-flex align-items-center">
							<i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
							<div class="text-left">
								<h6 class="font-weight-semi-bold mb-1">Our Office</h6>
								<small><?php echo esc_html( get_theme_mod( 'office_address', '123 Street, Dublin, Ireland' ) ) ?></small>
							</div>
						</div>
					</div>
					<div class="col-lg-3 text-right">
						<div class="d-inline-flex align-items-center">
							<i class="fa fa-2x fa-envelope text-primary mr-3"></i>
							<div class="text-left">
								<h6 class="font-weight-semi-bold mb-1">Email Us</h6>
								<small><?php echo esc_html( get_theme_mod( 'contact_email', 'webacademy@mail.com' ) ) ?></small>
							</div>
						</div>
					</div>
					<div class="col-lg-3 text-right">
						<div class="d-inline-flex align-items-center">
							<i class="fa fa-2x fa-phone text-primary mr-3"></i>
							<div class="text-left">
								<h6 class="font-weight-semi-bold mb-1">Call Us</h6>
								<small><?php echo esc_html( get_theme_mod( 'contact_phone', '01 816 7444 ' ) ) ?></small>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Topbar End -->
			<!-- Navbar Start -->
			<div class="container-fluid">
				<div class="row border-top px-xl-5">
					<!-- Navbar Vertical Start -->
					<div class="col-lg-3 d-none d-lg-block">
						<a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none"
							data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;">
							<h2 class="h5 text-primary m-0"><i class="fa fa-book-open mr-2"></i>Subjects</h2>
							<i class="fa fa-angle-down text-primary"></i>
						</a>
						<nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
							id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
							<div class="navbar-nav w-100">
								<div class="nav-item dropdown">
									<a href="#" class="nav-link" data-toggle="dropdown">Web Design <i
											class="fa fa-angle-down float-right mt-1"></i></a>
									<div
										class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
										<a href="" class="dropdown-item">HTML</a>
										<a href="" class="dropdown-item">CSS</a>
										<a href="" class="dropdown-item">jQuery</a>
									</div>
								</div>
								<a href="" class="nav-item nav-link">Apps Design</a>
								<a href="" class="nav-item nav-link">Marketing</a>
								<a href="" class="nav-item nav-link">Research</a>
								<a href="" class="nav-item nav-link">SEO</a>
							</div>
						</nav>
					</div>
					<!-- Navbar Vertical End -->
					<!-- Navbar Main Start -->
					<div class="col-lg-9">
						<div class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
							<?php display_site_logo_or_name( true ) ?>
							<button type="button" class="navbar-toggler" data-toggle="collapse"
								data-target="#navbarCollapse">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'primary_menu',
										'container' => false,
										'menu_class' => 'navbar-nav py-0',
										'menu_id' => false,
										'echo' => true,
										'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									)
								);
								?>
								<a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="">Join Now</a>
							</div>
						</div>
						<!-- Navbar Main End -->
					</div>
				</div>
				<!-- Navbar End -->

		</header>