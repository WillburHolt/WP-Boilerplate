<?php
	/**
	 * Logo
	 *
	 * Logo markup as defined by Google structured data.
	 *
	 * @link https://developers.google.com/structured-data/customize/logos
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	$template_directory = get_template_directory();
	$classes = [];
	$classes[] = 'logo';
	if ($modifier) {
		$classes[] = "logo_$modifier";
	}
	if ($symbol) {
		$classes[] = 'logo_symbol';
	}
?>
<h1 class="logo<?php implode(' ', $classes) ?>" itemscope itemtype="http://schema.org/Organization">
	<a class="logo_link" itemprop="url" href="<?=get_site_url()?>">
		<span class="logo_link_label"><?php bloginfo('name'); ?></span>
		<?php if ($symbol) { ?>
		<span class="logo_link_symbol"><?php Boilerplate::drawSymbol('logo'); ?></span>
		<?php } ?>
	</a>
	<meta content="<?=$template_directory?>/images/logo-schema.png" itemprop="logo">
	<img class="logo_print" src="<?=$template_directory?>/images/logo-print.png" alt="<?php bloginfo('name'); ?>">
</h1>
