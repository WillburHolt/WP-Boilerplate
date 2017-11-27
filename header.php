<?php
	/**
	 * Header
	 *
	 * The header, navigation, and banner image section for the website.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	// Define site variables.
	$site_name = get_bloginfo('name');
	$post_id = get_the_ID();

	// Define Advanced Custom Fields.
	$meta_title = get_field('meta_title');
	$meta_description = get_field('meta_description');
	$featured_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'wide_sml');
	$browser_title = '';

	if ($meta_title) {
		$browser_title = "$meta_title | $site_name";
	} else {
		$browser_title = wp_title('', false);
	}

	$header_background = get_field('header_background');
	$header_background_video = get_field('header_background_video', false);

	// Define theme mods from the theme's customise options.
	$twitter = get_theme_mod('twitter');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" itemscope="" itemtype="http://schema.org/WebPage">
	<head>
		<meta charset="<?php bloginfo("charset"); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<title><?=esc_html($browser_title)?></title>
		<?php if ($meta_description) { ?>
		<meta name="description" content="<?=esc_attr($meta_description)?>">
		<?php } ?>

		<!-- G+ & Facebook -->
		<meta property="og:title" content="<?=esc_attr($meta_title)?>">
		<meta property="og:url" content="<?=get_permalink()?>">
		<meta property="og:type" content="website">
		<?php if (has_post_thumbnail($post_id)) { ?>
		<meta property="og:image" content="<?=Boilerplate::getImageSrc(get_post_thumbnail_id($post_id), 'classic-xxsml')?>">
		<?php } ?>
		<meta property="og:description" content="<?=esc_attr($meta_description)?>">
		<meta property="og:site_name" content="<?=esc_attr($site_name)?>">

		<!-- Twitter -->
		<meta name="twitter:card" content="summary">
		<?php if (false !== $twitter && '' !== $twitter) { ?>
		<meta name="twitter:site" content="@<?=esc_attr($twitter)?>">
		<meta name="twitter:creator" content="@<?=esc_attr($twitter)?>">
		<meta name="twitter:url" content="//twitter.com/<?=esc_attr($twitter)?>">
		<?php } ?>

		<meta name="twitter:title" content="<?=esc_attr($meta_title)?>">
		<meta name="twitter:description" content="<?=esc_attr($meta_description)?>">
		<?php if (has_post_thumbnail($post_id)) { ?>
		<meta name="twitter:image" content="<?=Boilerplate::getImageSrc(get_post_thumbnail_id($post_id), 'classic-xxsml')?>">
		<?php
			}
			wp_head();
		?>
	</head>
	<body <?php body_class(); ?>>
		<?php Boilerplate::drawSymbolSprite(); ?>
		<!-- Skip-to-Content Link -->
		<a class="skip_link" id="skip_to_content" href="#main_content">Skip to Main Content</a>
		<!-- Page Wrapper -->
		<div class="js-navigation_push page_wrapper">
			<!-- Header -->
			<header class="header" id="header" itemscope itemtype="http://schema.org/WPHeader">
				<div class="header_ribbon">
					<div class="fs-row">
						<div class="fs-cell">
							<?php
								Boilerplate::drawLogo('header', true, 'lg');
								Boilerplate::drawMainNav('Main Navigation');
								Boilerplate::drawBasicNav('Secondary Navigation', 'secondary_nav', 'Secondary Navigation', 'lg');
							?>
							<a class="mobile_sidebar_handle_wrapper" href="#mobile_sidebar">
								<span class="js-nav_handle mobile_sidebar_handle">Menu</span>
							</a>
							<a class="site_search_handle" href="#site_search_lg">
								<span class="site_search_handle_label">Search</span>
								<span class="site_search_handle_icon"><?php Boilerplate::drawSymbol('Search'); ?></span>
							</a>
							<?php Boilerplate::drawSearchForm('Search'); ?>
						</div>
					</div>
				</div>
			</header>
