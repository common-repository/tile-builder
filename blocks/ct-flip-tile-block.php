<?php
/** A simple text block **/
class CT_FlipTile_Block extends CT_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Flip Tile',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('ct_fliptile_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'tile_select' => 0,
                        'delay' => 1000,
                        'direction' => 'horizontal',
                        'width' => '150px',
                        'height' => '',
                        'bgcolor' => '#fa6801',
                        'ftbgcolor' => '#1ba1e2',
                        'tbgcolor' => '',
                        'tfcolor' => '',
                        'tfsize' => '',
                        'link' => '',
                        'topacity' => '1.0',
                        'tile_count' => 'fourTiles',
                        'use_permalink' => 'false',
                        'display_content' => 'true',
                        'display_title' => 'true',
                        'spacing' => '0px'
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
                
                $this->renderTile($instance);
                ?>
                <div style="clear:both;"></div>
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<?php echo ct_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('tile_select') ?>">
				Select Root Slide
				<?php echo ct_field_tile_select('tile_select', $block_id, $tile_select) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('tile_count') ?>">
				Direction
				<?php echo ct_field_select('tile_count', $block_id, array('fourTiles'=>'4 Tiles','nineTiles'=>'9 Tiles'), $tile_count) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('direction') ?>">
				Direction
				<?php echo ct_field_select('direction', $block_id, array('horizontal'=>'Horizontal','vertical'=>'Vertical'), $direction) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('width') ?>">
				Width (use % or px)
				<?php echo ct_field_input('width', $block_id, $width, $size = 'full') ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('height') ?>">
				Height (use % or px)
				<?php echo ct_field_input('height', $block_id, $height, $size = 'full') ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('bgcolor') ?>">
				Background Color
				<?php echo ct_field_color_picker('bgcolor', $block_id, $bgcolor) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('ftbgcolor') ?>">
				Flip Tile Background Color
				<?php echo ct_field_color_picker('ftbgcolor', $block_id, $ftbgcolor) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('tbgcolor') ?>">
				Title Background Color
				<?php echo ct_field_color_picker('tbgcolor', $block_id, $tbgcolor) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('tfcolor') ?>">
				Title Font Color
				<?php echo ct_field_color_picker('tfcolor', $block_id, $tfcolor) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('tfsize') ?>">
				Title Font Size (use pt or px)
				<?php echo ct_field_input('tfsize', $block_id, $tfsize, $size = 'full') ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('topacity') ?>">
				Title Background Color Opacity
				<?php echo ct_field_input('topacity', $block_id, $topacity, $size = 'full') ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('delay') ?>">
				Delay (milliseconds)
				<?php echo ct_field_input('delay', $block_id, $delay, $size = 'full') ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('use_permalink') ?>">
				Use Permalinks
				<?php echo ct_field_select('use_permalink', $block_id, array('true'=>'Yes','false'=>'No'), $use_permalink) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('link') ?>">
				Link (where to go if clicked, might override permalinks)
				<?php echo ct_field_input('link', $block_id, $link, $size = 'full') ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('display_content') ?>">
				Display Content
				<?php echo ct_field_select('display_content', $block_id, array('true'=>'Yes','false'=>'No'), $display_content) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('display_title') ?>">
				Display Title
				<?php echo ct_field_select('display_title', $block_id, array('true'=>'Yes','false'=>'No'), $display_title) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('spacing') ?>">
				Spacing (spacing for neighbor tiles)
				<?php echo ct_field_input('spacing', $block_id, $spacing, $size = 'full') ?>
			</label>
		</p>
                
                <?php
	}
        
        function block($instance) {
		extract($instance);
		
		//if($title) echo '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
		//echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
                $this->renderTile($instance);
	}
        
        function renderTile($instance){
                extract($instance);
                
                if(isset($tile_select) && $tile_select){
                ?>
                <div>
                        <div class="list-tile" style="margin: <?php echo $spacing;?>;<?php echo $bgcolor != '' ? 'background-color: ' . $bgcolor . ';' : ''; ?><?php echo $width != '' ? 'width: ' . $width . ';' : '';?><?php echo $height != '' ? 'height: ' . $height . ';' : '';?>">
                            <ul class="flip-list <?php echo $tile_count;?>" id="tile_select_<?php echo $block_id;?>_tile" data-initdelay="500" data-mode="flip-list" data-start-now="true" data-direction="<?php echo $direction;?>" data-delay="<?php echo $delay;?>"<?php echo $link ? ' data-link="'.$link.'"' : ''; ?>>
                <?php
                    $tiles = 0;
                    $master_page = get_page($tile_select);
                    $child_pages = get_pages(array( 'child_of' => $tile_select, 'post_type' => 'cttile', 'hierarchical' => 1, 'sort_column' => 'menu_order' ) );
                    if($master_page){
                        $tiles++;
                        $page_image = false;
                        $page_thumb = get_post_thumbnail_id( $master_page->ID );
                        if($page_thumb){
                            $page_image = wp_get_attachment_image_src( get_post_thumbnail_id( $master_page->ID ), 'single-post-thumbnail' );
                        }
               ?>
                     <li>
                         <?php
                         if($master_page->post_title && $display_title == 'true'){
                         ?>
                         <span class="tile-title" style="opacity: <?php echo $topacity;?>; -ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo $topacity*100;?>)'; filter: alpha(opacity=<?php echo $topacity*100;?>); padding-top: 5px; <?php echo $tbgcolor != '' ? 'background-color: ' . $tbgcolor . ';' : ''; ?>">&nbsp;</span>
                         <span class="tile-title" style="<?php echo $tfsize ? 'font-size: ' . $tfsize . ';' : ''?><?php echo $tfcolor ? 'color: ' . $tfcolor . ';' : ''?>"><?php echo $master_page->post_title;?></span>
                         <?php
                         }
                         ?>
                         <?php
                         $perm_open = '';
                         $perm_close = '';
                         if($use_permalink == 'true'){
                             $perm_open = '<a href="'.get_site_url().'/index.php?p='.$master_page->ID.'&post_type=cttile">';
                             $perm_close = '</a>';
                         }
                         if($page_image && isset($page_image[0])){
                         ?>
                         <div style="<?php echo $ftbgcolor ? 'background-color: ' . $ftbgcolor . ';' : '';?>">
                             <?php echo $perm_open;?><img src="<?php echo $page_image[0];?>" style="max-width: 100% !important;" class="full"/><?php echo $perm_close;?>
                         </div>
                         <?php
                         }else{
                         ?>
                         <div style="<?php echo $ftbgcolor ? 'background-color: ' . $ftbgcolor . ';' : '';?>"></div>
                         <?php
                         }
                         if($display_content == 'true'){
                         ?>
                         <div style="<?php echo $ftbgcolor ? 'background-color: ' . $ftbgcolor . ';' : '';?>">
                             <?php echo $master_page->post_content;?>
                         </div>
                         <?php
                         }else{
                         ?>
                         <div style="<?php echo $ftbgcolor ? 'background-color: ' . $ftbgcolor . ';' : '';?>"></div>
                         <?php
                         }
                         ?>
                     </li>       
                <?php
                    }
                    foreach($child_pages As $child_page){
                        $tiles++;
                        $page_image = false;
                        $page_thumb = get_post_thumbnail_id( $child_page->ID );
                        if($page_thumb){
                            $page_image = wp_get_attachment_image_src( get_post_thumbnail_id( $child_page->ID ), 'single-post-thumbnail' );
                        }
                        if($tile_count == 'nineTiles' && $tiles > 9){
                            break;
                        }else if($tile_count == 'fourTiles' && $tiles > 4){
                            break;
                        }
                ?>
                         <li>
                         <?php
                         if($child_page->post_title && $display_title == 'true'){
                         ?>
                         <span class="tile-title" style="opacity: <?php echo $topacity;?>; -ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo $topacity*100;?>)'; filter: alpha(opacity=<?php echo $topacity*100;?>); padding-top: 5px; <?php echo $tbgcolor != '' ? 'background-color: ' . $tbgcolor . ';' : ''; ?>">&nbsp;</span>
                         <span class="tile-title" style="<?php echo $tfsize ? 'font-size: ' . $tfsize . ';' : ''?><?php echo $tfcolor ? 'color: ' . $tfcolor . ';' : ''?>"><?php echo $child_page->post_title;?></span>
                         <?php
                         }
                         ?>
                         <?php
                         $perm_open = '';
                         $perm_close = '';
                         if($use_permalink == 'true'){
                             $perm_open = '<a href="'.get_site_url().'/index.php?p='.$child_page->ID.'&post_type=cttile">';
                             $perm_close = '</a>';
                         }
                         if($page_image && isset($page_image[0])){
                         ?>
                         <div style="<?php echo $ftbgcolor ? 'background-color: ' . $ftbgcolor . ';' : '';?>">
                             <?php echo $perm_open;?><img src="<?php echo $page_image[0];?>" style="max-width: 100% !important;" class="full"/><?php echo $perm_close;?>
                         </div>
                         <?php
                         }else{
                         ?>
                         <div style="<?php echo $ftbgcolor ? 'background-color: ' . $ftbgcolor . ';' : '';?>"></div>
                         <?php
                         }
                         if($display_content == 'true'){
                         ?>
                         <div style="<?php echo $ftbgcolor ? 'background-color: ' . $ftbgcolor . ';' : '';?>">
                             <?php echo $child_page->post_content;?>
                         </div>
                         <?php
                         }else{
                         ?>
                         <div style="<?php echo $ftbgcolor ? 'background-color: ' . $ftbgcolor . ';' : '';?>"></div>
                         <?php
                         }
                         ?>
                     </li> 
                <?php
                    }
                ?>
                            </ul>
                        </div>
                </div>
                
                <script type="text/javascript">jQuery(document).ready(function(){jQuery("#tile_select_<?php echo $block_id;?>_tile").liveTile();})</script>
                <?php
                }
                ?>
		
		<?php
        }
	
}