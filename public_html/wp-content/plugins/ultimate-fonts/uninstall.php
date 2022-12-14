<?php
/**
 * Uninstall the plugin.
 * Remove plugin options.
 *
 * @package Ultimate Fonts
 */

// If uninstall is not called from WordPress, exit.
defined( 'WP_UNINSTALL_PLUGIN' ) || die;

delete_option( 'ultimate_fonts' );
delete_option( 'ultimate_fonts_customize' );
