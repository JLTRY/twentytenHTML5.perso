<?php
// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');


/////////////////////////////////////////////////////////////////////////////////
// Add viewport meta tag to head
//
function viewport_meta() {
    ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php
}
add_filter('wp_head', 'viewport_meta');
	

function wpt_register_js() {
		wp_register_script('jquery.bootstrap.min',  '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', 'jquery');
		wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );
function wpt_register_css() {
	wp_register_style( 'bootstrap.min',  '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap.min.css' );		
	wp_register_style( 'twentyten', get_stylesheet_uri(), array( 'bootstrap.min' ));
	wp_enqueue_style( 'bootstrap.min' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

register_default_headers( array(
		'montagne' => array(
			'url' => '%s/images/headers/montagne3.jpg',
			'thumbnail_url' => '%s/images/headers/montagne3-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Montagne', 'twentyten' )
		)	
	)	
);		
?>
