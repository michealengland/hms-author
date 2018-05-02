<?php
defined( 'ABSPATH' ) || exit;

add_action( 'enqueue_block_editor_assets', 'hms_examples_editabe_block_editor_assets' );

function hms_examples_editabe_block_editor_assets() {
	wp_enqueue_script(
		'hms-editabe-block',
		plugins_url( 'block.js', __FILE__ ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
	);

	wp_enqueue_style(
		'hms-editabe-block',
		plugins_url( 'editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
	);
}

add_action( 'enqueue_block_assets', 'hms_examples_editabe_block_assets' );

function hms_examples_editabe_block_assets() {
	wp_enqueue_style(
		'hms-editabe-block',
		plugins_url( 'style.css', __FILE__ ),
		array( 'wp-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
	);
}
