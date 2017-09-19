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

	// Include our macros and customizer setup.
	require_once get_parent_theme_file_path('template-parts/partials/macros.php');

	if (function_exists('acf_add_options_sub_page')) {
		acf_add_options_sub_page([
			'page_title' 	=> 'Edit Post Listing',
			'menu_title'	=> 'Edit Post Listing',
			'menu_slug' 	=> 'post-archive-options',
			'capability'	=> 'edit_pages',
			'parent_slug' => 'edit.php'
		]);

		acf_add_options_sub_page([
			'page_title' 	=> '404 Error Page',
			'menu_title'	=> '404 Error Page',
			'menu_slug' 	=> '404-page-options',
			'capability'	=> 'edit_theme_options',
			'parent_slug' => 'themes.php'
		]);
	}

	function init() {
		add_theme_support('post-thumbnails');
		add_theme_support('html5', [
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		]);
		add_theme_support('custom-logo');
		add_theme_support('title-tag');

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
		$nav_menus = [
			'main-navigation'      => __('Main Navigation'),
			'secondary-navigation' => __('Secondary Navigation'),
			'social-navigation'    => __('Social Navigation'),
			'footer-navigation'    => __('Footer Navigation')
		];
		register_nav_menus($nav_menus);

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
				__('Paragraph') => 'p',
				__('Heading 2') => 'h2',
				__('Heading 3') => 'h3',
				__('Heading 4') => 'h4',
				__('Heading 5') => 'h5',
				__('Heading 6') => 'h6',
				__('Preformatted') => 'pre'
			];
			$block_formats_settings = '';
			foreach ($block_formats as $k => $v) {
				$block_formats_settings .= "$k=$v;";
			}
			$settings['block_formats'] = trim($block_formats_settings, '; ');

			return $settings;
		}
		add_filter('tiny_mce_before_init', 'Boilerplate\tiny_mce_formats');

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function customize_register($wp_customize) {
			$wp_customize->add_section('index_options_section', [
				'title' => __('Index/Archive Settings'),
				'description' => __('This is where the settings are stored for the indexes and archives.'),
				'priority' => 30,
				'capability' => 'edit_theme_options'
			]);
			$wp_customize->add_section('search_options_section', [
				'title' => __('Search Settings'),
				'description' => __('This is where the settings are stored for the search results page.'),
				'priority' => 30,
				'capability' => 'edit_theme_options'
			]);

			$wp_customize->add_setting('logo');
			$wp_customize->add_setting('name');
			$wp_customize->add_setting('street');
			$wp_customize->add_setting('city');
			$wp_customize->add_setting('state');
			$wp_customize->add_setting('zip');
			$wp_customize->add_setting('phone');
			$wp_customize->add_setting('cse_key');

			$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'name', [
				'label'    => __('Name'),
				'section'  => 'title_tagline',
				'settings' => 'name',
				'type'     => 'text',
				'priority' => 60
			]));
			$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'street', [
				'label'    => __('Street'),
				'section'  => 'title_tagline',
				'settings' => 'street',
				'type'     => 'text',
				'priority' => 60
			]));
			$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'city', [
				'label'    => __('City'),
				'section'  => 'title_tagline',
				'settings' => 'city',
				'type'     => 'text',
				'priority' => 60
			]));
			$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'state', [
				'label'    => __('State'),
				'section'  => 'title_tagline',
				'settings' => 'state',
				'type'     => 'text',
				'priority' => 60
			]));
			$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'zip', [
				'label'    => __('Zip'),
				'section'  => 'title_tagline',
				'settings' => 'zip',
				'type'     => 'text',
				'priority' => 60
			]));
			$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'phone', [
				'label'    => __('Phone'),
				'section'  => 'title_tagline',
				'settings' => 'phone',
				'type'     => 'text',
				'priority' => 60
			]));
			$wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'cse_key', [
				'label'    => __('Google CSE Key'),
				'section'  => 'search_options_section',
				'settings' => 'cse_key',
				'type'     => 'text'
			]));
		}
		add_action('customize_register', 'Boilerplate\customize_register');
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
		wp_enqueue_style('site', get_stylesheet_directory_uri().'/css/site.css');
		wp_enqueue_script('modernizr', get_stylesheet_directory_uri().'/js/modernizr.js');
		wp_enqueue_script('site', get_stylesheet_directory_uri().'/js/site.js', [], false, true);
	}
	add_action('wp_enqueue_scripts', 'Boilerplate\enqueue_scripts');

	/**
	 * Display Post Excerpt by default.
	 *
	 * This will update user's meta after successful login by removing
	 * postexcerpt name from the array of unchecked boxes names.
	 *
	 * @link https://wordpress.stackexchange.com/q/275977/83781
	 */
	function show_post_excerpt($user_login, $user) {
		$unchecked = get_user_meta($user->ID, 'metaboxhidden_post', true);
		$key = array_search('postexcerpt', $unchecked);
		if (false !== $key) {
			array_splice($unchecked, $key, 1);
			update_user_meta($user->ID, 'metaboxhidden_post', $unchecked);
		}
	}
	add_action('wp_login', 'Boilerplate\show_post_excerpt', 10, 2);
?>
