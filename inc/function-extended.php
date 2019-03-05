<?php
/**
 * Stylewp functions and definitions extended snippets
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @package Stylewp
 */

if ( !function_exists( 'stylewp_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function stylewp_the_custom_logo() {
    // Try to retrieve the Custom Logo
    $output = '';
    if (function_exists('get_custom_logo'))
        $output = get_custom_logo();

    // Nothing in the output: Custom Logo is not supported, or there is no selected logo
    // In both cases we display the site's name
    if (empty($output))
        $output = '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';

    echo $output;
}
endif;


// Shorten the title //
//////////////////////

function the_title_limit($length, $replacer = '...') {
 $string = the_title('','',FALSE);
 if(strlen($string) > $length)
 $string = (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
 echo $string;
}

// Replaces the excerpt "Read More" text by a link
function modify_read_more_link() {
    return '<a class="more-link read-more-btn" href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

// Support for Post Excerpt      //
//////////////////////////////////

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }


/**
 * Enqueue Google Fonts
 */

function sg_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'sg-google-fonts', "$protocol://fonts.googleapis.com/css?family=Nunito:400,700|Open+Sans&amp;subset=latin-ext" );}
add_action( 'wp_enqueue_scripts', 'sg_fonts' );


/**
 * Disable Gutenberg via Code
 */

add_filter('use_block_editor_for_post', '__return_false');


function digwp_disable_gutenberg($is_enabled, $post_type) {
	
	if ($post_type === 'book') return false; // change book to your post type
	
	return $is_enabled;
	
}
add_filter('use_block_editor_for_post_type', 'digwp_disable_gutenberg', 10, 2);


/* ACF SUPPORT */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Homepage Settings',
		'menu_title'	=> 'Homepage',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
  
}
 