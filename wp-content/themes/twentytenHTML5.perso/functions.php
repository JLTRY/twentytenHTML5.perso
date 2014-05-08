<?php



/////////////////////////////////////////////////////////////////////////////////
// Add viewport meta tag to head
//
function viewport_meta() {
    ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php
}
add_filter('wp_head', 'viewport_meta');


function improved_trim_excerpt($text) {
	if ( '' == $text ) {					
			$text = get_the_content('');									
			$text = apply_filters('the_content', $text);
			$text = str_replace('\]\]\>', ']]&gt;', $text);			
	}	
	return  $text;
}


function my_has_excerpt()
{
	global $page, $more, $preview, $pages, $multipage;
	if ( $page > count( $pages ) ) // if the requested page doesn't exist
		$page = count( $pages ); // give them the highest numbered page that DOES exist

	$content = $pages[$page - 1];
	if ( preg_match( '/<!--more-->/', $content ) )
		return true;
	else
		return false;
}


function excerpt_read_more_link($output) {
	if ( my_has_excerpt())
		return improved_trim_excerpt('') . '<a class="suite-link" href="'.  get_permalink() . '">'  . 
					  "Lire la suite" .'</a>';
	else
		return improved_trim_excerpt('');
}


function my_child_theme_setup() {
     // excerpt
	remove_filter( 'excerpt_length', 'twentyten_excerpt_length' );
	remove_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );
	add_filter('get_the_excerpt', 'improved_trim_excerpt');
	remove_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );	
	add_filter('get_the_excerpt', 'excerpt_read_more_link');
	add_filter( 'the_content', 'shortcode_unautop' );	
 }


add_action( 'after_setup_theme', 'my_child_theme_setup' );

function wpt_register_js() {
	wp_register_script('jquery',  '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
	wp_enqueue_script('jquery');	
	wp_register_script('bootstrap', '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js', 'jquery');		
	wp_enqueue_script('bootstrap');			
}
add_action( 'init', 'wpt_register_js' );




function wpt_register_css() {

	$parent = get_template();
	$parent = wp_get_theme( $parent );
	 
	// Enqueue the parent stylesheet
	wp_enqueue_style( 'theme-name-parent-style', get_template_directory_uri() . '/style.css', array(), $parent['Version'], 'all' );
	wp_register_style( 'typography', 'http://www.jltryoen.fr/min/?g=typography'); //'http://www.jltryoen.fr/joomla_3.0/plugins/editors/jckeditor/typography/typography.min.css');
	wp_enqueue_style( 'typography' );
	wp_register_style( 'css3treeview', 'http://www.jltryoen.fr/weave/favorites/css/css3treeview.css');
	wp_enqueue_style( 'css3treeview' );
	wp_register_style( 'joomla', 'http://www.jltryoen.fr/min/?g=joomla');
	wp_enqueue_style( 'joomla' );
	
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );
	

register_default_headers( array(
		'montagne' => array(
			'url' => 'http://jean-luc.tryoen.pagesperso-orange.fr/Mes%%20Images/montagne3.jpg',
			'thumbnail_url' => '%s/images/headers/montagne3-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Montagne', 'twentyten' )
		)	
	)	
);	

/* Create shortcode to list subpages. */
function list_subpages() {
    return '<ul class="nav nav-tabs nav-stacked">'.wp_list_pages('echo=0&depth=0&title_li=&child_of='.get_the_id()).'</ul>';
}
add_shortcode('subpages', 'list_subpages');	







?>
