<?php
	/**
	 * Breadcrumb Navigation
	 *
	 * This component is used to render the breadcrumbs throughout the entire
	 * website.
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	global $post;

	$post_ancestors = get_ancestors();
?>
<div class="breadcrumb_nav<?php if (!empty($modifier)) echo " breadcrumb_nav_$modifier"; ?>">
	<div class="breadcrumb_list" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="breadcrumb_item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
			<a class="breadcrumb_link" href="<?=get_site_url()?>" itemprop="item">
				<span class="breadcrumb_name" itemprop="name">Home</span>
			</a>
			<meta itemprop="position" content="1">
		</div>
		<?php
			// Technique courtesy of Really Simple Breadcrumb by Christoph Weil
			if (!is_front_page()) {
				if (is_page() && $post->post_parent) {
					$home = get_page(get_option('page_on_front'));
					$x = 1;

					for ($i = count($post_ancestors) - 1; $i >= 0; $i--) {
						$x++;

						if (($home->ID) != ($post_ancestors[$i])) {
		?>
		<div class="breadcrumb_item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
			<a class="breadcrumb_link" href="<?=get_permalink($post_ancestors[$i])?>" itemprop="item">
				<span class="breadcrumb_name" itemprop="name"><?=get_the_title($post_ancestors[$i])?></span>
			</a>
			<meta itemprop="position" content="<?=$x?>">
		</div>
		<?php
						}
					}
		?>
		<div class="breadcrumb_item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
			<span class="breadcrumb_label" itemprop="item">
				<span class="breadcrumb_name" itemprop="name"><?php the_title(); ?></span>
			</span>
			<meta itemprop="position" content="<?=($x + 1)?>">
		</div>
		<?php
				} elseif (is_page()) {
		?>
		<div class="breadcrumb_item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
			<span class="breadcrumb_label" itemprop="item">
				<span class="breadcrumb_name" itemprop="name"><?php the_title(); ?></span>
			</span>
			<meta itemprop="position" content="2">
		</div>
		<?php
				} elseif (is_archive()) {
		?>
		<div class="breadcrumb_item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
			<span class="breadcrumb_label" itemprop="item">
				<span class="breadcrumb_name" itemprop="name"><?php echo $page_title ? $page_title : the_title(); ?></span>
			</span>
			<meta itemprop="position" content="2">
		</div>
		<?php
				} elseif (is_singular()) {
					$post_type = get_post_type();
					$post_type_object = get_post_type_object($post_type);
		?>
		<!-- <?php print_r($post_type); ?> -->
		<div class="breadcrumb_item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
			<span class="breadcrumb_label" itemprop="item">
				<span class="breadcrumb_name" itemprop="name"><a class="breadcrumb_link" href="<?php echo get_post_type_archive_link($post_type); ?>"><?php echo $post_type_object->labels->name; ?></a></span>
			</span>
			<meta itemprop="position" content="2">
		</div>
		<div class="breadcrumb_item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
			<span class="breadcrumb_label" itemprop="item">
				<span class="breadcrumb_name" itemprop="name"><?php echo !empty($page_title) ? $page_title : the_title(); ?></span>
			</span>
			<meta itemprop="position" content="2">
		</div>
		<?php
				} elseif (is_404()) {
		?>
		<div class="breadcrumb_item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
			<span class="breadcrumb_label" itemprop="item">
				<span class="breadcrumb_name" itemprop="name">Page Not Found</span>
			</span>
			<meta itemprop="position" content="2">
		</div>
		<?php
				}
			}
		?>
	</div>
</div>
