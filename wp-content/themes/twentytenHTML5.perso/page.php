<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
require_once('horzsidebar.php');  
?>

<?php get_header(); ?>
	<div class="row">
		<?php
		if ( is_active_sidebar( 'primary-widget-area' ) || is_active_sidebar( 'secondary-widget-area' ) ) : ?>
			<div class="col-lg-8">
		<?php else: ?>
			<div class="col-lg-11">
		<?php endif; ?>
		
			<section id="content" role="main" >

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<page-header>
						<?php if ( is_front_page() ) { ?>
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                        <?php } else { ?>	
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                        <?php } ?>
                    </page-header>			

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->								
				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

			</section><!-- #section -->
		</div><!-- #span9 -->

<?php get_sidebar(); ?>
</div> 
<?php get_horzsidebar();?>
<?php get_footer(); ?>

