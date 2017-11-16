<?php
function get_horzsidebar()
{
?>
	
	<div class="row-fluid">
		<?php if ( is_active_sidebar( 'horizontal-1' ) ): ?>
		<div class="widget-area horizontal-1 span4 offset1_4 well">
			<?php dynamic_sidebar( 'horizontal-1' ); ?>
		</div>		  
		<?php endif;?>
		<?php if ( is_active_sidebar( 'horizontal-2' ) ): ?>
		<div class="widget-area horizontal-2 span4 offset1_4 well">		  
			<?php dynamic_sidebar( 'horizontal-2' ); ?>	  
		</div>
		<?php endif;?>
		<?php if ( is_active_sidebar( 'horizontal-3' ) ): ?>
		<div class="widget-area horizontal-3 span3 offset1_4 well">		  
			<?php dynamic_sidebar( 'horizontal-3' ); ?>				  
		</div>
		<?php endif;?>
   </div>
<?php 
}
?>