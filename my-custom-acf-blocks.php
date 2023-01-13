<?php
/**
 * Plugin Name: My Custom ACF Blocks
 * Description: A plugin to register my custom ACF Blocks
 * Version: 1.0
 * Tested up to: 6.1
 * Requires PHP: 7.4
 */

define( 'MY_CUSTOM_ACF_BLOCKS_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

// Bail early if ACF blocks aren't available
if ( ! function_exists( 'acf_register_block_type' ) ) {
	return false;
}

// Add custom block category(ies) for our custom blocks
add_action( 'block_categories_all', function( $categories ) {
	return array_merge(
			$categories,
			[
				[
					'slug'  => 'my-acf-blocks',
					'title' => __( 'My ACF Blocks', 'my-acf-blocks' ),
				],
			]
		);
}, 10, 2 );

// Load our custom blocks and fields.
add_action( 'acf/init', function() {
	$blockspath = glob( MY_CUSTOM_ACF_BLOCKS_DIR . 'blocks/*' );

	// For each each block in the /blocks folder
	foreach ( $blockspath as $path ) {

		// Load the block
		if ( file_exists( "$path/block.json" ) ) {
			register_block_type( "$path/block.json" );
		}

		// If you are specifying your ACF fields with fields.json instead of via the GUI, we will load the fields here
		if ( file_exists( "$path/fields.json" ) ) {
			$fields = json_decode( file_get_contents( "$path/fields.json" ), 1 );

			// Only load the ACF fields if there aren't fields with the specified keys
			if ( empty( acf_get_fields( $fields[0]['key'] ) ) ) {
				acf_add_local_field_group( $fields[0] );
			}
		}
	}
} );
