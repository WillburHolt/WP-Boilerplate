<?php
	/**
	 * Theme Functions
	 *
	 * This is where all of the functions, hooks, and filters are defined.
	 *
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	 /**
	 * Everything is stored in our namespace.
	 *
	 * To access things at the global scope you can use a backslash.
	 * e.g. $wp_query = new \WP_Query($args);
	 *
	 * @link http://php.net/manual/en/language.namespaces.global.php
	 * @link http://php.net/manual/en/language.namespaces.faq.php
	 */
	namespace Boilerplate;

	// Deny direct access to this file.
	if (false === defined('ABSPATH')) {
		exit;
	}

	// Include our macros.
	require_once get_parent_theme_file_path('template-parts/partials/macros.php');

	if (function_exists('acf_add_options_sub_page')) {
		acf_add_options_sub_page([
			'page_title' 	=> 'Edit Post Listing',
			'menu_title'	=> 'Edit Post Listing',
			'menu_slug' 	=> 'post-archive-options',
			'capability'	=> 'edit_pages',
			'parent_slug' => 'edit.php'
		]);
/*
		acf_add_options_sub_page([
			'page_title' 	=> 'Global Settings',
			'menu_title'	=> 'Global Settings',
			'menu_slug' 	=> 'global-settings',
			'capability'	=> 'edit_theme_options',
			'parent_slug' => 'themes.php'
		]);
*/
		acf_add_options_sub_page([
			'page_title' 	=> 'Site Alert',
			'menu_title'	=> 'Site Alert',
			'menu_slug' 	=> 'site-wide-alert-options',
			'capability'	=> 'edit_theme_options',
			'parent_slug' => 'themes.php'
		]);
		acf_add_options_sub_page([
			'page_title' 	=> 'Footer',
			'menu_title'	=> 'Footer',
			'menu_slug' 	=> 'footer-options',
			'capability'	=> 'edit_theme_options',
			'parent_slug' => 'themes.php'
		]);
		acf_add_options_sub_page([
			'page_title' 	=> 'Search Page',
			'menu_title'	=> 'Search Page',
			'menu_slug' 	=> 'search-page-options',
			'capability'	=> 'edit_theme_options',
			'parent_slug' => 'themes.php'
		]);
		acf_add_options_sub_page([
			'page_title' 	=> '404 Page',
			'menu_title'	=> '404 Page',
			'menu_slug' 	=> '404-page-options',
			'capability'	=> 'edit_theme_options',
			'parent_slug' => 'themes.php'
		]);
	}

	function init() {
		add_theme_support('post-thumbnails');
		add_theme_support('html5', [
			'search-form',
			'gallery',
			'caption'
		]);
		add_theme_support('custom-logo');
		add_theme_support('title-tag');

		// Remove comments support.
		remove_post_type_support('post', 'comments');
		remove_post_type_support('page', 'comments');

		/**
		 * Add our image sizes.
		 *
		 * We have Ultrawide, Wide, Full, Square, Classic and Portrait sizes
		 * respectively. All images are loaded using hard-crop mode.
		 */

		// Ultrawide (21:9)
		add_image_size('ultrawide-xxsml', 300, 129, true);
		add_image_size('ultrawide-xsml',  500, 214, true);
		add_image_size('ultrawide-sml',   740, 317, true);
		add_image_size('ultrawide-med',   980, 420, true);
		add_image_size('ultrawide-lrg',  1220, 523, true);
		add_image_size('ultrawide-xlrg', 1440, 617, true);

		// Wide (16:9)
		add_image_size('wide-xxsml', 300, 169, true);
		add_image_size('wide-xsml',  500, 282, true);
		add_image_size('wide-sml',   740, 416, true);
		add_image_size('wide-med',   980, 552, true);
		add_image_size('wide-lrg',  1220, 686, true);
		add_image_size('wide-xlrg', 1440, 810, true);

		// Full (4:3)
		add_image_size('full-xxsml', 300,  225, true);
		add_image_size('full-xsml',  500,  375, true);
		add_image_size('full-sml',   740,  555, true);
		add_image_size('full-med',   980,  735, true);
		add_image_size('full-lrg',  1220,  915, true);
		add_image_size('full-xlrg', 1440, 1080, true);

		// Square (1:1)
		add_image_size('square-thumb', 100,  100, true);
		add_image_size('square-xxsml', 300,  300, true);
		add_image_size('square-xsml',  500,  500, true);
		add_image_size('square-sml',   740,  740, true);
		add_image_size('square-med',   980,  980, true);

		// Classic (3:2)
		add_image_size('classic-xxsml', 300, 200, true);
		add_image_size('classic-xsml',  500, 334, true);
		add_image_size('classic-sml',   740, 494, true);
		add_image_size('classic-med',   980, 654, true);
		add_image_size('classic-lrg',  1220, 814, true);
		add_image_size('classic-xlrg', 1440, 960, true);

		// Portrait (3:4)
		add_image_size('portrait-xxsml', 225,  300, true);
		add_image_size('portrait-xsml',  375,  500, true);
		add_image_size('portrait-sml',   555,  740, true);
		add_image_size('portrait-med',   735,  980, true);
		add_image_size('portrait-lrg',   915, 1220, true);
		add_image_size('portrait-xlrg', 1080, 1440, true);

		// Portrait (2:3)
		add_image_size('portrait-classic-xxsml', 200,  300, true);
		add_image_size('portrait-classic-xsml',  334,  500, true);
		add_image_size('portrait-classic-sml',   494,  740, true);
		add_image_size('portrait-classic-med',   654,  980, true);
		add_image_size('portrait-classic-lrg',   814, 1220, true);
		add_image_size('portrait-classic-xlrg',  960, 1440, true);

		// Register navigation menus.
		register_nav_menus([
			'main-navigation'      => 'Main Navigation',
			'secondary-navigation' => 'Secondary Navigation',
			'social-navigation'    => 'Social Navigation',
			'footer-navigation'    => 'Footer Navigation'
		]);

		function body_classes($classes) {
			$header_background = get_field('header_background', get_the_ID());

			// Our standard template classes.
				$classes[] = 'fs-grid';
			if (is_front_page()) {
				$classes[] = 'theme_home';
				if ($header_background) {
					$classes[] = 'theme_featured';
				}
			} elseif ($header_background) {
					$classes[] = 'theme_featured';
			} elseif (is_page_template('search.php')) {
				$classes[] = 'theme_search';
			} else {
				$classes[] = 'theme_default';
			}
			return $classes;
		}
		add_filter('body_class', 'Boilerplate\body_classes');

		function tiny_mce_formats($settings) {
			// Add .typography class to TinyMCE body.
			$settings['body_class'] = 'typography';

			// Remove H1 from WYSIWYG editors.
			$block_formats = [
				'Paragraph' => 'p',
				'Heading 2' => 'h2',
				'Heading 3' => 'h3',
				'Heading 4' => 'h4',
				'Heading 5' => 'h5',
				'Heading 6' => 'h6',
				'Preformatted' => 'pre'
			];
			$block_formats_settings = '';
			foreach ($block_formats as $k => $v) {
				$block_formats_settings .= "$k=$v;";
			}
			$settings['block_formats'] = trim($block_formats_settings, '; ');

			return $settings;
		}
		add_filter('tiny_mce_before_init', 'Boilerplate\tiny_mce_formats');

		// Remove WP version from styles and scripts.
		function remove_ver_css_js($src) {
			if (strpos($src, 'ver=')) {
				$src = remove_query_arg('ver', $src);
			}
			return $src;
		}
		add_filter('style_loader_src', 'Boilerplate\remove_ver_css_js', 9999);
		add_filter('script_loader_src', 'Boilerplate\remove_ver_css_js', 9999);

		// Remove WP version from the head and RSS feeds.
		add_filter('the_generator', function() { return ''; });

		// Disable XML-RPC by default.
		add_filter('xmlrpc_enabled', '__return_false');

		// Rename Featured Image to Social Sharing Image.
		function replace_featured_image_box() {
			// Remove post excerpt since we use an ACF field.
			remove_meta_box('postexcerpt' , 'post' , 'normal');

			// Re-register Featured Image as Social Sharing Image.
			remove_meta_box('postimagediv', 'page', 'side');
			add_meta_box('postimagediv', 'Social Sharing Image', 'post_thumbnail_meta_box', 'page', 'side', 'low');
			add_meta_box('postimagediv', 'Social Sharing Image', 'post_thumbnail_meta_box', 'post', 'side', 'low');
		}
		add_action('do_meta_boxes', 'Boilerplate\replace_featured_image_box');
	}
	add_action('init', 'Boilerplate\init', 0);

	function admin_init() {
		// Add front-end styles for the WYSIWYG areas from editor-style.css.
		add_editor_style('css/editor-style.css');

		// Hide drafts from relationship tagging
		function acf_relationship_filter($options, $field, $the_post) {
			$options['post_status'] = ['publish'];
			return $options;
		}
		add_filter('acf/fields/relationship/query', 'Boilerplate\acf_relationship_filter', 10, 3);

		// Only allow admins and super admins to access the Custom Fields interface.
		function acf_set_permissions($show) {
			return current_user_can('manage_options');
		}
		add_filter('acf/settings/show_admin', 'Boilerplate\acf_set_permissions');
	}
	add_action('admin_init', 'Boilerplate\admin_init');

	// Enqueue styles and scripts.
	function enqueue_scripts() {
		$template_directory_uri = get_template_directory_uri();
		wp_enqueue_style('site', $template_directory_uri.'/css/site.css');
		wp_enqueue_script('modernizr', $template_directory_uri.'/js/modernizr.js');
		wp_enqueue_script('site', $template_directory_uri.'/js/site.js', [], false, true);
	}
	add_action('wp_enqueue_scripts', 'Boilerplate\enqueue_scripts');

	function admin_menu() {
		// Remove comments support.
		remove_menu_page('edit-comments.php');

		/**
		 *  Remove Customizer support.
		 *
		 * @link https://stackoverflow.com/a/26873392
		 */
		$customize_url_arr = [];
		$customize_url = add_query_arg('return', urlencode(wp_unslash($_SERVER['REQUEST_URI'])), 'customize.php');
		$customize_url_arr[] = $customize_url;
		foreach ($customize_url_arr as $customize_url) {
			remove_submenu_page('themes.php', $customize_url);
		}
	}
	add_action('admin_menu', 'Boilerplate\admin_menu');

	// Removes from admin bar
	function before_admin_bar_render() {
		global $wp_admin_bar;

		// Remove comments and customizer support.
		$wp_admin_bar->remove_menu('comments');
		$wp_admin_bar->remove_menu('customize');
	}
	add_action('wp_before_admin_bar_render', 'Boilerplate\before_admin_bar_render');

	function remove_customizer_options($wp_customize) {
		$wp_customize->remove_section('themes');
	}
	add_action('customize_register', 'Boilerplate\remove_customizer_options', 30);

	/**
	 * Remove sizes/srcset from WP-generated images.
	 *
	 * @link https://wordpress.stackexchange.com/questions/211375
	 */
	add_filter('wp_get_attachment_image_attributes', function($attr) {
		if (isset($attr['sizes'])) {
			unset($attr['sizes']);
		}
		if (isset($attr['srcset'])) {
			unset($attr['srcset']);
		}
		return $attr;
	}, PHP_INT_MAX);
	add_filter('wp_calculate_image_sizes', '__return_empty_array',  PHP_INT_MAX);
	add_filter('wp_calculate_image_srcset', '__return_empty_array', PHP_INT_MAX);
	remove_filter('the_content', 'wp_make_content_images_responsive');
?>
