<?php
/** "Clear" block 
 * 
 * Clear the floats vertically
 * Optional to use horizontal lines/images
**/
class CT_TileBreak_Block extends CT_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Break',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('ct_tilebreak_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
	}
	
	function block($instance) {
		extract($instance);
		echo '<div style="clear:both;"></div>';
		
	}
	
}