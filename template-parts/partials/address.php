<?php
	/**
	 * Address Partial
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	// Define theme mods from the theme's customise options.
	$name = get_theme_mod('name');
	$street = get_theme_mod('street');
	$city = get_theme_mod('city');
	$state = get_theme_mod('state');
	$zip = get_theme_mod('zip');
	$phone = get_theme_mod('phone');
?>
<div class="footer_address" itemscope itemtype="http://schema.org/PostalAddress">
	<?php if (!empty($name)) { ?>
	<span class="footer_address_name" itemprop="name"><?=esc_html($name)?></span>
	<?php } if (!empty($street)) { ?>
	<span class="footer_address_street" itemprop="streetAddress"><?=esc_html($street)?></span>
	<?php } if (!empty($city)) { ?>
	<span class="footer_address_city" itemprop="addressLocality"><?=esc_html($city)?></span>
	<?php } if (!empty($state)) { ?>
	<span class="footer_address_state" itemprop="addressRegion"><?=esc_html($state)?></span>
	<?php } if (!empty($zip)) { ?>
	<span class="footer_address_zip" itemprop="postalCode"><?=esc_html($zip)?></span>
	<?php } if (!empty($phone)) { ?>
	<a class="footer_address_phone" itemprop="telephone" href="<?=esc_url("tel:$phone", ['tel'])?>"><?=esc_html($phone)?></a>
	<?php } ?>
</div>
