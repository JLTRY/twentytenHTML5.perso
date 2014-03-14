<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<div class="span3">
	<?php 
	define('BASE_DIR', realpath(dirname(__FILE__)));	
	function appendToIncludePath($path)
	{
		ini_set('include_path',  realpath(BASE_DIR . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR) . PATH_SEPARATOR . ini_get('include_path') );
	}
	appendToIncludePath("../twentytenHTML5");		
	include "sidebar.php";
	?>		
</div>
