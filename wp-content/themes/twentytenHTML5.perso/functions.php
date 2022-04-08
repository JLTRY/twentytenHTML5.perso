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
	// 
}
add_action( 'widgets_init', 'my_child_theme_widgets_init' );

function my_child_theme_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Horizontal Widget Area 1', 'twentyten' ),
		'id' => 'horizontal-1',
		'description' => __( 'The 1st horz widget area', 'twentyten' ),
		'before_widget' => '<!-- horz -->',
		'after_widget' => '<!-- -->',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
		)
	);
	register_sidebar( array(
		'name' => __( 'Horizontal Widget Area 2', 'twentyten' ),
		'id' => 'horizontal-2',
		'description' => __( 'The 2nd horizontal widget area', 'twentyten' ),
		'before_widget' => '<!-- horz -->',
		'after_widget' => '<!-- -->',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
		)
	);
	register_sidebar( array(
		'name' => __( 'Horizontal Widget Area 3', 'twentyten' ),
		'id' => 'horizontal-3',
		'description' => __( 'The 3nd horizontal widget area', 'twentyten' ),
		'before_widget' => '<!-- horz -->',
		'after_widget' => '<!-- -->',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
		)
	);
 }


add_action( 'after_setup_theme', 'my_child_theme_setup' );

function wpt_register_js() {
	wp_deregister_script('jquery');
	wp_register_script('jquery',  'http://www.jltryoen.fr/joomla_4.0/media/vendor/jquery/js/jquery.min.js');
	wp_enqueue_script('jquery');
	wp_register_script('bootstrap', 'http://www.jltryoen.fr/drupal/themes/bootstrap5/dist/bootstrap/5.1.3/dist/js/bootstrap.bundle.min.js', 'jquery');
	wp_enqueue_script('bootstrap');
	wp_register_script('joomla', '//www.jltryoen.fr/MediaWiki/skins/mediawikibootstrap/js/mediawiki.js', 'jquery');
	wp_enqueue_script('joomla');
	
	
}
add_action( 'wp_enqueue_scripts', 'wpt_register_js' );




function wpt_register_css() {

	$parent = get_template();
	$parent = wp_get_theme( $parent );
	 
	// Enqueue the parent stylesheet
	//wp_register_style( 'bootstrap', "http://www.jltryoen.fr/media/vendor/bootstrap/css/bootstrap.css", array());
	//wp_register_style( 'twentytenHTML5', get_template_directory_uri() . '/style.css', array('bootstrap'), $parent['Version'], 'all' );
	wp_register_style( 'joomla4', 'http://minify.jltryoen.fr/joomla4', array());
	wp_register_style( 'twentytenHTML5.perso', get_stylesheet_uri() ,array('joomla4'));

}


add_action( 'init', 'wpt_register_css' );

function enqueue_twentytenHTML5perso_styles() {
	wp_enqueue_style('twentytenHTML5');
	wp_enqueue_style('joomla4');
	wp_enqueue_style( 'bootstrap' );
}
add_action( 'wp_enqueue_styles', 'enqueue_twentytenHTML5perso_styles' );


register_default_headers( array(
		'montagne' => array(
			'url' => 'http://images.jltryoen.fr/Images/montagne3_grey.jpg',
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
