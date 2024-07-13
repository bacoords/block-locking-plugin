<?php
/**
 * Plugin Name:       Block Locking Plugin
 * Description:       Updated
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       block-locking-plugin
 *
 * @package           wpdev
 */

namespace wpdev\block_locking_plugin;

define( 'BLOCK_LOCKING_PLUGIN_VERSION', '0.1.0' );
define( 'BLOCK_LOCKING_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BLOCK_LOCKING_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require plugin_dir_path( __FILE__ ) . 'inc/editor.php';
