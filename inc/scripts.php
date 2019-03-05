<?php
/**
 * Enqueue scripts and styles.
 */
function stylewp_scripts() {
	wp_enqueue_style( 'stylewp-style', get_stylesheet_directory_uri() . '/style.min.css', array(), '4.2.1' );

	wp_enqueue_script( 'stylewp-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), ' ', true );

	wp_enqueue_script( 'stylewp-fa', '//use.fontawesome.com/releases/v5.6.3/js/all.js', array(), '5.6.3' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stylewp_scripts' );


/**
 * Filter the HTML script tag of `leadgenwp-fa` script to add `defer` attribute.
 *
*/
function stylewp_defer_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'stylewp-fa'
	);
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'stylewp_defer_scripts', 10, 3 );