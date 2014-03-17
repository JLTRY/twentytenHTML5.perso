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

//http://aaronrussell.co.uk/legacy/improving-wordpress-the_excerpt/
function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);				
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p><b>');
                $excerpt_length = 25;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words,
						'<br/>');
                        $text = implode(' ', $words);												
                }
        }				
        return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');



function mytwentyten_custom_excerpt_more( $output ) {
	return $output . ' <a href="'. get_permalink() . '">' .'<img src="/images/LOGO-Cercle-Fleche2.png">' . 
					 '</a>';
}
remove_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );
add_filter( 'get_the_excerpt', 'mytwentyten_custom_excerpt_more' );


function wpt_register_js() {
		wp_register_script('jquery.bootstrap.min',  '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', 'jquery');
		wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );
function wpt_register_css() {
	wp_register_style( 'bootstrap.min',  '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap.min.css' );		
	wp_register_style( 'twentyten', get_stylesheet_uri(), array( 'bootstrap.min' ));
	wp_register_style( 'typography', 'http://www.jltryoen.fr/joomla_3.0/plugins/editors/jckeditor/typography/typography.min.css');
	wp_enqueue_style( 'bootstrap.min' );
	wp_enqueue_style( 'typography' );
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
