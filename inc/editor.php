<?php
/**
 * Editor functions.
 *
 * @package block-locking-plugin
 */

namespace wpdev\block_locking_plugin\editor;

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function wpdev_block_locking_plugin_block_init() {
	register_block_type( BLOCK_LOCKING_PLUGIN_DIR . '/build/test-locking' );
}
// add_action( 'init', __NAMESPACE__ . '\wpdev_block_locking_plugin_block_init' );



/**
 * Enqueue block editor assets.
 *
 * @return void
 */
function enqueue_custom_block_editor_modifications() {

	$asset_file = include BLOCK_LOCKING_PLUGIN_DIR . 'build/editor/index.asset.php';
	wp_enqueue_script(
		'block-pattern-plugin-editor',
		BLOCK_LOCKING_PLUGIN_URL . '/build/editor/index.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_custom_block_editor_modifications' );



/**
 * Register custom block templates.
 *
 * @return void
 */
function register_block_templates() {
	$post_type_object           = get_post_type_object( 'wp_block' );
	$post_type_object->template = array(
		array(
			'core/group',
			array(
				'tagName'  => 'section',
				'metadata' => array(
					'name' => 'Pattern',
				),
				'align'    => 'full',
				'style'    => array(
					'spacing' => array(
						'padding' => array(
							'top'    => 'var:preset|spacing|xl',
							'bottom' => 'var:preset|spacing|xl',
							'left'   => 'var:preset|spacing|sm',
							'right'  => 'var:preset|spacing|sm',
						),
					),
				),
				'layout'   => array(
					'type' => 'default',
				),
			),
			array(
				array(
					'core/group',
					array(
						'templateLock'    => '',
						'metadata'        => array(
							'name' => 'Inner Container',
						),
						'layout'          => array(
							'type' => 'constrained',
						),
						'showContentLock' => true,
					),
					array(
						array(
							'core/paragraph',
							array(
								'placeholder' => 'Content locked',
							),
							array(),
						),

					),
				),
			),
		),
	);
}
// add_action( 'init', __NAMESPACE__ . '\register_block_templates' );
