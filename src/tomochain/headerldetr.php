<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tomochain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="https://lab.alexcican.com/set_cookies/cookie.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (!is_404()): ?>
<div class="site-mobile-menu-wrapper">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'header-menu-enterprise',
		'menu_id'        => 'site-mobile-menu',
	) );
	tomochain_social_links();
	?>
</div>
<?php endif; ?>
<div id="page" class="site enterprise">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tomochain' ); ?></a>
	<?php if (!is_404()): ?>
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="site-branding enter-logo">
					<a href="/" title="Logo">
						<img src="https://tomochain.com/tomochain/assets/images/logo-tomochain.png" alt="">
					</a>
				</div><!-- .site-branding -->

				<?php
					wp_nav_menu( array( 'theme_location' => 'header-menu-enterprise', 'container_class' => 'main-menu menu-enterprise hidden-md-down' ));
				?>

				<div class="header-tools">
					<?php
						if ( function_exists('get_field') && ! get_field('hide_language_switcher') ) {
							tomochain_lang_switcher();
						}
						tomochain_mobile_menu_btn();
					?>
				</div><!-- .header-tools-->
			</div>
		</div>
	</header><!-- #masthead -->
	<?php endif; ?>

	<div id="content" class="site-content">
