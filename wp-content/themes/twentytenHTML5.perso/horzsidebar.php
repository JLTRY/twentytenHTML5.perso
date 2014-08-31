<?php
function get_horzsidebar()
{
?>
	
	<div class="row-fluid">
		<div class="widget-area horizontal-1 span4 offset1_4 well">
			<?php if ( is_active_sidebar( 'horizontal-1' ) ) 
			      {
					dynamic_sidebar( 'horizontal-1' ); 
				  }?>
		</div>		  
		<div class="widget-area horizontal-2 span4 offset1_4 well">		  
			<?php if ( is_active_sidebar( 'horizontal-2' ) ) 
			      {
					dynamic_sidebar( 'horizontal-2' ); 
				  }?>	  
		</div>
		<div class="widget-area horizontal-3 span4 offset1_4 well">		  
			<?php if ( is_active_sidebar( 'horizontal-3' ) ) 
			      {
					dynamic_sidebar( 'horizontal-3' ); 
				  }?>	  
		</div>
   </div>
<?php 
}
?>