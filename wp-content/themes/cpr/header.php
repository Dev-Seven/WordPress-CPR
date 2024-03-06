<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cpr
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/slick.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/slider-responsive.css" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<div class="top-head">
  <div class="container">
	 <!-- start time line section -->
          <?php
            include('time_line.php');
          ?>
   <!-- end time line section -->
    <div class="top-highlight">Highlight<span>&gt;</span></div>
    <div class="social-icon">
      <ul>
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" width="23" height="23" alt=""/></a></li>
        <?php /*?><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" width="23" height="23" alt=""/></a></li><?php */?>
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" width="23" height="23" alt=""/></a></li>
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-in.png" width="23" height="23" alt=""/></a></li>
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" width="23" height="23" alt=""/></a></li>
      </ul>
    </div>
  </div>
</div>
<header class="header clearfix" id="header">
  <div class="container">
    <div class="main-nav">
      <div class="mobile-nav">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id' => 'primary-menu',
          )
        );
        ?>
      </div>
      <div id="logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" class="logo_normal"> </a> </div>
      <nav class="main-menu">
        <div class="desktop-nav">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id' => 'primary-menu',
            )
          );
          ?>
        </div>
      </nav>
	<div id="top_menu" class="search-toggle">
        <button class="search-icon icon-search"><i class="fa-search"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-search.png" alt=""/></i></button>
        <button class="search-icon icon-close"><i class="fa-close"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-close.png" alt=""/></i></button>
      </div>
    </div>
	  <div class="top-search">
	  <div class="search-container">
      <div class="search-box">
	<form role="search" method="get" class="search-form top-search searchform" action="<?php echo get_permalink( 33534 ); ?>" id="buscador-blog">
		<input type="search" class="search-field" placeholder="Search …" value="" name="swpquery" title="Search for:">
		<button type="submit" name="submit" value="Search" class="search-btn" id="searchsubmit"><i class="fa-search"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-search.png" alt=""/></i></button>
	</form>
</div>
  </div>
  </div>
  </div>
</header>
<!--33534-->
