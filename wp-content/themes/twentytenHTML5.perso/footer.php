<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->
</div><!-- #wrapper -->
</div>
	<footer role="contentinfo">
		<div class="container">
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with four columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>
			<hr>
			<div class="row">
				<p style="float: left;">
					<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/"> 
						<img style="vertical-align:middle;" alt="Creative Commons attribution non commercial partage à l'identique" id="cc-by-nc" src="/images/cc-by-nc-sa.png" style="width: 88px; height: 31px; " />
					</a>© 2011-2015 Site de JL TRYOEN
				</p>	
				<p  style="float: right;">
					<a href="a-propos" target="_self" title="À propos du site de JL TRYOEN">À propos</a> | <a href="plan-du-site" target="_self" title="Plan du site">Plan</a> | <a href="contact" target="_self" title="Me contacter par mail">Contact</a>
					<a href="http://www.wordpress.fr/">
						<img style="vertical-align:middle;" alt="WordPress" border="0" height="30"  src="/images/wordpress.jpg" width="30" />
					</a>
				</p>				
			</div>	
		</div><!-- container -->
	
	</footer><!-- #footer -->



<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
