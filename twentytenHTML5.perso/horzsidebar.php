<?php
function get_horzsidebar()
{
?>
	
	<div class="row">
		<?php if ( is_active_sidebar( 'horizontal-1' ) ): ?>
		<div class="widget-area horizontal-1 col-lg-4 offset1_4 well">
			<?php dynamic_sidebar( 'horizontal-1' ); ?>
		</div>		  
		<?php endif;?>
		<?php if ( is_active_sidebar( 'horizontal-2' ) ): ?>
		<div class="widget-area horizontal-2 col-lg-4 offset1_4 well">		  
			<?php dynamic_sidebar( 'horizontal-2' ); ?>	  
		</div>
		<?php endif;?>
		<?php if ( is_active_sidebar( 'horizontal-3' ) ): ?>
		<div class="widget-area horizontal-3 col-lg-3 offset1_4 well">		  
			<?php dynamic_sidebar( 'horizontal-3' ); ?>				  
		</div>
		<?php endif;?>
   </div>
<?php 
}
?>