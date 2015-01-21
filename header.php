<?php
 /**
 *
 *  THEME HEADER FILE
 *
 *  Contains the head section of the theme till starting of the content.
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="nav-wrapper">
<div class="container">
  <nav class="navbar navbar-default row" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="site-menu col-md-9 col-sm-9">
          <?php
              wp_nav_menu( array(
                  'theme_location'    => 'main-menu',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'bittersweet_navwalker::fallback',
                  'walker'            => new bittersweet_navwalker())
              );
          ?>
      </div> <!-- .site-menu -->
      <div class="site-menu-search col-md-3 col-sm-3">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
        <?php do_action('bittersweet_nav_right'); ?>

      </div> <!-- .col-md-4 -->     
  </nav>
</div> <!-- .container -->
</div> <!-- .nav-wrapper -->

<div class="header-wrapper">
    <div class="header container">
      <div class="row">

        <div class="logo col-md-6 col-sm-6">
              <h1 class="site-title">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                  <?php bloginfo( 'name' ); ?>
                  </a>
              </h1>
              <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </div> <!-- .logo -->

        <?php //do_action( 'bittersweet_header_icons' ); ?>

      </div> <!-- .row -->
    </div> <!-- .header -->
</div> <!-- .header-wrapper -->

<div class="content-wrap">
  <div class="inner container">
    <div class="row">