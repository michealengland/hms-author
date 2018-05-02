<?php
/*
Plugin Name: HMS Team CPT
Plugin URI:  https://thinkholmes.com
Description: This plugin is used to generate email signatures for GMAIL.
Version:     0.0.1
Author:      Micheal England
Author URI:  http://michealengland.com
Text Domain: hms-team-cpt
Domain Path: /languages
License:     GPL2

HMS Email Signature is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

HMS Email Signature is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with HMS Team CPT. If not, see https://www.gnu.org/licenses/licenses.html.
*/

defined( 'ABSPATH' ) || exit;

// Register Custom Post Type
require_once( plugin_dir_path( __FILE__ ) . 'inc/register-cpt.php' );

// Author Post Bio
require_once( plugin_dir_path( __FILE__ ) . 'inc/author-bio.php' );

// Gutenberg Blocks
//require_once( plugin_dir_path( __FILE__ ) . 'blocks/index.php' );

// Author List Widget
require_once( plugin_dir_path( __FILE__ ) . 'widget.php' );
