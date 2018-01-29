<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fond
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Load jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->

<!-- Load fonts -->


<!-- Font Awesome -->


<!-- Load webpack script bundle -->
<?php include 'developmentBundle.html'; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation container" role="navigation">
			<?php
        // wp_nav_menu( array(
        //     'theme_location' => 'primaryright',
        //     'menu_id' => 'primary-menu-right',
        //     'menu_class' => 'main-navigation-right'
        // ));
      ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->


	<div id="barba-wrapper" class="site-content">
			<div class="barba-container">
