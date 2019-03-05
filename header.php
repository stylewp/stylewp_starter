<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stylewp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content=""/>
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<div id="page" class="site"> 
  
<header id="masthead" role="banner">
      
      <nav role="navigation" id="navbar-main" class="navbar" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

      <div class="container">

	        <div class="navbar-header">

	            <div class="navbar-logo"> 
	              <?php stylewp_the_custom_logo(); ?> 
	            </div><!-- .navbar-logo -->    

	            <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-right">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>

	          </div><!-- .navbar-header -->

          <div class="menu-container">

	          <div class="navbar-inverse side-collapse in"> 

	              <ul class="nav navbar-nav">

	                <li class="menu-links">
	                  <?php
	                     $args = array(
	                  'theme_location' => 'primary',
	                  'depth'      => 2,
	                  'container'  => false,
	                  'menu_class'     => 'nav navbar-nav custmenu',
	                  'walker'     => new Bootstrap_Walker_Nav_Menu()
	                  );
	                  if (has_nav_menu('primary')) {
	                    wp_nav_menu($args);
	                  }
	                ?>
	                </li>

	              </ul>

	        </div><!--/.nav-navbar-inverse -->

       </div><!-- .menu-container -->

      </div><!-- .container -->

      </nav>

</header>


<div id="content" class="site-content container">
