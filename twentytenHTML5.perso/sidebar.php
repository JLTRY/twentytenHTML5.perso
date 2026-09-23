<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
 ?>
<?php 
if ( is_active_sidebar( 'primary-widget-area' ) || is_active_sidebar( 'secondary-widget-area' ) ) : ?>
<div class="col-lg-3 row">
<?php  endif; ?>
		
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	 
	if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
		<aside id="primary" class="widget-area well" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'primary-widget-area' ); ?>				
			</ul>
		</aside><!-- #primary .widget-area -->
<?php endif; ?>
<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<aside id="secondary" class="widget-area well" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</aside><!-- #secondary .widget-area -->

<?php endif; ?>
<?php 
if ( is_active_sidebar( 'primary-widget-area' ) || is_active_sidebar( 'secondary-widget-area' ) ) : ?>
</div>
<?php endif; ?>
