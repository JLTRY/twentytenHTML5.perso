<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php'); 
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title>
	<?php // Returns the title based on what is being viewed
		if ( is_single() ) { // single posts
			single_post_title(); echo ' | '; bloginfo( 'name' );
		// The home page or, if using a static front page, the blog posts page.
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' );
			if( get_bloginfo( 'description' ) )
				echo ' | ' ; bloginfo( 'description' );
			twentyten_the_page_number();
		} elseif ( is_page() ) { // WordPress Pages
			single_post_title( '' ); echo ' | '; bloginfo( 'name' );
		} elseif ( is_search() ) { // Search results
			printf( __( 'Search results for %s', 'twentyten' ), '"'.get_search_query().'"' ); twentyten_the_page_number(); echo ' | '; bloginfo( 'name' );
		} elseif ( is_404() ) {  // 404 (Not Found)
			_e( 'Not Found', 'twentyten' ); echo ' | '; bloginfo( 'name' );
		} else { // Otherwise:
			wp_title( '' ); echo ' | '; bloginfo( 'name' ); twentyten_the_page_number();
		}
		
	?>
	
	</title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri()  . "/favicon.ico" ;?> ">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
    <!--[if lte IE 9]>
    	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */

	wp_head();

?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>

<body <?php body_class(); ?>>
<div class="body">
<div class="container">
	<header class="header" role="banner">
		<div id="masthead">
			<div id="branding" role="banner">
				<div class="header-inner clearfix">
				<?php
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : 						?>
						<!--<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />-->
						<a class="brand pull-left" href="">
							<img src="<?php header_image(); ?>" alt="perso" />
						</a>
					<?php endif; ?>
					
					<div class="header-search pull-right">
						<ul class="nav menu btn">
						<li class="item-695">
						<?php
							if ( is_user_logged_in() ) {
									echo '<a href="'.wp_logout_url(home_url()).'" title="Logout">Deconnexion</a>';
								} else {
									echo '<a href="/wordpress/login">Connexion</a>';
							}
						?>
						
						</li>
						</ul>
					</div>
				</div>	
			</div><!-- #branding -->

			<nav class="navigation" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<div class="navbar pull-left">
						<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
							<span class="element-invisible">"togle"</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
					</div>
					<div class="nav-collapse nav-collapse">					
				<?php /*wp_nav_menu( array( 'container' => 'nav', 'sort_column' => 'menu_order', 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); */?>
                                 <?php /* Primary navigation */
					wp_nav_menu( array(
					  'menu' => 'top_menu',
					  'depth' => 2,
					  'container' => false,
					  'menu_class' => 'nav nav-bar nav-pills',
					  //Process nav menu using our custom nav walker
					  'walker' => new wp_bootstrap_navwalker())
					);
				?>	
				</div>
			</nav><!-- #nav -->
		</div><!-- #masthead -->
	</header>

	<div id="main" class="row-fluid">
