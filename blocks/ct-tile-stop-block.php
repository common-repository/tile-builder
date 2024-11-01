<?php
/** A simple text block **/
class CT_TileStop_Block extends CT_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Tile Stop',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('ct_tilestop_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'tile_select' => 0,
                        'delay' => 3000,
                        'direction' => 'horizontal',
                        'width' => '150px',
                        'height' => '',
                        'bounce' => 'false',
                        'pause' => 'false',
                        'bgcolor' => '#fa6801',
                        'tbgcolor' => '',
                        'tfcolor' => '',
                        'tfsize' => '',
                        'link' => '',
                        'topacity' => '1.0',
                        'use_permalink' => 'false',
                        'display_content' => 'true',
                        'display_title' => 'true',
                        'use_fade_swap' => 'false',
                        'data_stops' => '25%,50%,100%,0%',
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
			<label for="<?php echo $this->get_field_id('data_stops') ?>">
				Stop Points
				<?php echo ct_field_input('data_stops', $block_id, $data_stops, $size = 'full') ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('use_fade_swap') ?>">
				Fade Swap (will use the root for content and featured images of its childs for swapping)
				<?php echo ct_field_select('use_fade_swap', $block_id, array('true'=>'Yes','false'=>'No'), $use_fade_swap) ?>
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
			<label for="<?php echo $this->get_field_id('pause') ?>">
				Pause on Hover
				<?php echo ct_field_select('pause', $block_id, array('false'=>'No','true'=>'Yes'), $pause) ?>
			</label>
		</p>
                
                <p class="description">
			<label for="<?php echo $this->get_field_id('bounce') ?>">
				Bounce
				<?php echo ct_field_select('bounce', $block_id, array('false'=>'No','true'=>'Yes'), $bounce) ?>
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
                        <div id="tile_select_<?php echo $block_id;?>_tile" style="margin: <?php echo $spacing;?>;<?php echo $bgcolor != '' ? 'background-color: ' . $bgcolor . ';' : ''; ?><?php echo $width != '' ? 'width: ' . $width . ';' : '';?><?php echo $height != '' ? 'height: ' . $height . ';' : '';?>" data-bounce="<?php echo $bounce;?>" data-swap="image" data-stack="true" data-stops="<?php echo $data_stops != '' ? $data_stops : '25%,50%,100%,0%';?>" data-start-now="true" class="live-tile" data-direction="<?php echo $direction;?>" data-delay="<?php echo $delay;?>"<?php echo $link ? ' data-link="'.$link.'"' : ''; ?><?php echo $pause ? ' data-pause-onhover="'.$pause.'"' : ''?>>
                <?php
                    $master_page = get_page($tile_select);
                    $child_pages = get_pages(array( 'child_of' => $tile_select, 'post_type' => 'cttile', 'hierarchical' => 1, 'sort_column' => 'menu_order' ) );
                    if($master_page){
                        $page_image = false;
                        $page_thumb = get_post_thumbnail_id( $master_page->ID );
                        if($page_thumb){
                            $page_image = wp_get_attachment_image_src( get_post_thumbnail_id( $master_page->ID ), 'single-post-thumbnail' );
                        }
                        // fade swap active?
                        if($use_fade_swap == 'true' && isset($child_pages[0])){
                            $page_image_first = false;
                            $page_thumb = get_post_thumbnail_id( $child_pages[0]->ID );
                            if($page_thumb){
                                $page_image_first = wp_get_attachment_image_src( get_post_thumbnail_id( $child_pages[0]->ID ), 'single-post-thumbnail' );
                            }
                            if(isset($page_image_first[0])){
                                $perm_open = '';
                                $perm_close = '';
                                if($use_permalink == 'true'){
                                    $perm_open = '<a class="full" href="'.get_site_url().'/index.php?p='.$child_pages[0]->ID.'&post_type=cttile">';
                                    $perm_close = '</a>';
                                }
               ?>
                     <div>
                        <?php echo $perm_open;?><img class="full" src="<?php echo $page_image_first[0];?>" alt="" /><?php echo $perm_close;?>
                     </div>
                <?php
                            }
                            unset($child_pages[0]);
                        }
                ?>
                     <div>
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
                             $perm_open = '<a class="full" href="'.get_site_url().'/index.php?p='.$master_page->ID.'&post_type=cttile">';
                             $perm_close = '</a>';
                         }
                         if($page_image && isset($page_image[0])){
                         ?>
                         <div style="width: 100%; float: left; position: absolute; top: 0; left: 0; z-index: 0; *zoom: 1;">
                             <?php echo $perm_open;?><img src="<?php echo $page_image[0];?>" class="full"/><?php echo $perm_close;?>
                         </div>
                         <?php
                         }
                         if($display_content == 'true'){
                         ?>
                         <div style="position: absolute; top: 0; left: 0; float:left; z-index: 1000; padding: 5px;">
                             <?php echo $master_page->post_content;?>
                         </div>
                         <?php
                         }
                         ?>
                         <div style="clear:both;"></div>
                     </div>       
                <?php
                    }
                    $img = array();
                    $tiles = 0;
                    foreach($child_pages As $child_page){
                        $tiles++;
                        $page_image = false;
                        $page_thumb = get_post_thumbnail_id( $child_page->ID );
                        if($page_thumb){
                            $page_image = wp_get_attachment_image_src( get_post_thumbnail_id( $child_page->ID ), 'single-post-thumbnail' );
                        }
                        $comp = 2;
                        if($use_fade_swap == 'true'){
                            $comp = 1;
                        }
                        if($tiles < $comp){
                ?>
                         <div>
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
                             $perm_open = '<a class="full" href="'.get_site_url().'/index.php?p='.$child_page->ID.'&post_type=cttile">';
                             $perm_close = '</a>';
                         }
                         if($page_image && isset($page_image[0])){
                         ?>
                         <div style="width: 100%; float: left; position: absolute; top: 0; left: 0; z-index: 0; *zoom: 1;">
                             <?php echo $perm_open;?><img src="<?php echo $page_image[0];?>" class="full"/><?php echo $perm_close;?>
                         </div>
                         <?php
                         }
                         if($display_content == 'true'){
                         ?>
                         <div style="position: absolute; top: 0; left: 0; float:left; z-index: 1000; padding: 5px;">
                             <?php echo $child_page->post_content;?>
                         </div>
                         <?php
                         }
                         ?>
                         <div style="clear:both;"></div>
                     </div> 
                <?php
                        }else{
                            if($page_image !== null && isset($page_image[0])){
                                $img[] = $page_image[0];
                            }
                        }
                    }
                ?>
                        </div>
                </div>
                <script type="text/javascript">
                <?php
                $_img = 'var imgs'.$block_id.' = [];'."\n";
                foreach($img As $i){
                    $_img .= 'imgs'.$block_id.'.push({src:"'.$i.'",alt:""})'."\n";
                }
                echo $_img;
                ?>
                </script>
                <script type="text/javascript">jQuery(document).ready(function(){jQuery("#tile_select_<?php echo $block_id;?>_tile").liveTile({
                    mode:'slide',
                    frontImages: imgs<?php echo $block_id;?>,
                    frontIsRandom: false,
                    fadeSwap: true,
                    alwaysSwapFront:true});})
                </script>
                <?php
                }
                ?>
		
		<?php
        }
	
}