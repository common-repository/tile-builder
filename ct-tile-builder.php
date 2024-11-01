<?php
/**
Plugin Name: Ct Tile Builder
Plugin URI: http://crosstec.de
Description: Easily create tile sliders as templates with intuitive drag-and-drop interface. Requires PHP5 and WP3.5
Version: 1.0.3
Author: Crosstec GmbH & Co. KG
Author URI: http://crosstec.de
*/
 
/**
 * Copyright (c) 2013 Crosstec GmbH & Co. KG. All rights reserved.
 *
 * Plugin forked from Aqua Page Builder:
 * Copyright (c) 2013 Syamil MJ. All rights reserved.
 * 
 * Tile engine is metrojs:
 * http://www.drewgreenwell.com/projects/metrojs
 * 
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

//definitions
if(!defined('CTTB_VERSION')) define( 'CTTB_VERSION', '1.0.0' );
if(!defined('CTTB_PATH')) define( 'CTTB_PATH', plugin_dir_path(__FILE__) );
if(!defined('CTTB_DIR')) define( 'CTTB_DIR', plugin_dir_url(__FILE__) );

//required functions & classes
require_once(CTTB_PATH . 'functions/cttb_config.php');
require_once(CTTB_PATH . 'classes/class-ct-tile-builder.php');
require_once(CTTB_PATH . 'classes/class-ct-block.php');
require_once(CTTB_PATH . 'classes/class-ct-plugin-updater.php');
require_once(CTTB_PATH . 'functions/cttb_functions.php');

//some default blocks
require_once(CTTB_PATH . 'blocks/ct-tile-block.php');
require_once(CTTB_PATH . 'blocks/ct-tile-stop-block.php');
require_once(CTTB_PATH . 'blocks/ct-flip-tile-block.php');
require_once(CTTB_PATH . 'blocks/ct-tile-break-block.php');

//register default blocks
ct_register_block('CT_Tile_Block');
ct_register_block('CT_TileStop_Block');
ct_register_block('CT_FlipTile_Block');
ct_register_block('CT_TileBreak_Block');

//fire up page builder
$aqpb_config = ct_tile_builder_config();
$aq_page_builder = new CT_Tile_Builder($aqpb_config);
if(!is_network_admin()) $aq_page_builder->init();

//set up & fire up plugin updater
/*
$cttb_updater_config = array(
	'api_url'	=> 'http://crosstec.de/wpupdates/',
	'slug'		=> 'ct-tile-builder',
	'filename'	=> 'ct-tile-builder.php'
);
$cttb_updater = new CT_Plugin_Updater($cttb_updater_config);*/
