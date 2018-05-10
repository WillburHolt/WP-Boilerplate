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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" itemscope="" itemtype="http://schema.org/WebPage">
	<head>
		<meta charset="<?php bloginfo("charset"); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<?php wp_head(); ?>
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