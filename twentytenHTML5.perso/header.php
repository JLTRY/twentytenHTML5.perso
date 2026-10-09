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
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
			<div class="navbar navbar-expand-lg navbar-light bg-faded">
				<button class="navbar-toggler ml-auto collapsed" id="btn-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div id="branding" role="banner">

				<div class="header-inner clearfix row">
				<?php
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
						<div class="col-lg-8">
							<a class="brand pull-left" href="">
								<img src="<?php header_image(); ?>" alt="perso" />
							</a>
						</div>
					<?php endif; ?>
					
					<div class="header-search col-lg-4">
						<ul class="nav menu btn">
						<li class="item-695">
						<?php
							if ( is_user_logged_in() ) {
									echo '<a class="btn btn-light" href="'.wp_logout_url(home_url()).'" title="Logout">Deconnexion</a>';
								} else {
									echo '<a class="btn btn-light" href="' . wp_login_url(home_url()) . '">Connexion</a>';
							}
						?>						
						</li>
						</ul>
					</div>
				</div><!-- header-inner -->	
			</div><!-- #branding -->

			<!-- Mobile offcanvas menu -->
			<div class="navbar navbar-transparent offcanvas offcanvas-start" tabindex="-1" id="navbarSupportedContent" aria-labelledby="mobileMenuLogo">
				<div class="offcanvas-header">
					<button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<div class="mobile-menu-brand">
						<a class="mobile-menu-logo" href="<?php echo home_url(); ?>" aria-label="Home">
							<img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" />
						</a>
					</div>
					<?php /* Primary navigation */
						wp_nav_menu( array(
						  'menu' => 'top_menu',
						  'depth' => 2,
						  'container' => false,
						  'menu_class' => 'menu navbar-nav me-auto',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
				</div>
			</div>

			<!-- Desktop navbar menu -->
			<div class="navbar navbar-expand-lg navbar-light bg-faded navbar-collapse" id="navbarDesktopMenu" style="position:relative">					
				<?php /* Primary navigation */
					wp_nav_menu( array(
					  'menu' => 'top_menu',
					  'depth' => 2,
					  'container' => false,
					  'menu_class' => 'menu navbar-nav me-auto',
					  //Process nav menu using our custom nav walker
					  'walker' => new wp_bootstrap_navwalker())
					);
				?>
			</div>
		</div><!-- #masthead -->
	</header>

	<div id="main" class="row-fluid">
