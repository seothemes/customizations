<?php
/**
 * Plugin Name: Customizations
 * Plugin URI:  https://seothemes.com/plugins/customizations
 * Description: Contains site-specific custom code.
 * Author:      SEO Themes
 * Author URI:  https://seothemes.com/
 * Version:     1.0.0
 * License:     GPL-3.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Customizations
 */

add_action( 'after_setup_theme', 'customizations_add_functions', 15 );
/**
 * Loads custom functions after theme setup.
 *
 * @since 1.0.0
 *
 * @return void
 */
function customizations_add_functions() {
	$files = array(
		'custom-functions',
	);

	foreach ( $files as $file ) {
		$filename = __DIR__ . '/' . $file . '.php';

		if ( file_exists( $filename ) ) {
			include_once $filename;
		}
	}
}

add_action( 'wp_enqueue_scripts', 'customizations_add_styles', 15 );
/**
 * Loads custom styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function customizations_add_styles() {
	wp_register_style( 'custom-style', plugins_url( 'custom-styles.css', __FILE__ ), array(), '1.0.0' );
	wp_enqueue_style( 'custom-style' );

}

add_action( 'wp_enqueue_scripts', 'customizations_add_scripts', 15 );
/**
 * Loads custom scripts.
 *
 * @since 1.0.0
 *
 * @return void
 */
function customizations_add_scripts() {
	wp_register_script( 'custom-script', plugins_url( 'custom-scripts.js', __FILE__ ), array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'custom-script' );
}

add_filter( 'theme_page_templates', 'customizations_add_templates', 15 );
/**
 * Adds custom page templates to admin dropdown.
 *
 * @since 1.0.0
 *
 * @param $templates
 *
 * @return array
 */
function customizations_add_templates( $templates ) {
	$custom_templates = array(
		'custom-template.php' => 'Custom Template',
	);

	return array_merge( $templates, $custom_templates );
}

add_filter( 'template_include', 'customizations_include_template', 15 );
/**
 * Search for templates in plugin 'templates' dir, and load if exists.
 *
 * @since 1.0.0
 *
 * @param  string $template Template check.
 *
 * @return string
 */
function customizations_include_template( $template ) {
	global $post;

	if ( ! $post ) {
		return $template;
	}

	$file = __DIR__ . '/templates/' . get_post_meta( $post->ID, '_wp_page_template', true );

	if ( file_exists( $file ) ) {
		return $file;
	}

	return $template;
}
