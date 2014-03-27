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
				<div class="span6" style="float: left;">
					<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/"> 
						<img align="absmiddle" alt="Creative Commons attribution non commercial partage à l'identique" id="cc-by-nc" src="/images/cc-by-nc-sa.png" style="width: 88px; height: 31px; " />
					</a>© 2011-2014 Site de JL TRYOEN
				</div>	
				<div class="span6" style="float: right;">
					<p  style="float: right;">
					Propulsé par WordPress
					<a href="http://www.wordpress.fr/">
						<img align="absmiddle" alt="WordPress" border="0" height="30"  src="/images/wordpress.jpg" width="30" />
					</a>
					</p>
				</div>
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
