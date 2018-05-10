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

	// Define ACF fields from Footer options page.
	$name = get_field('footer_name', 'option');
	$street = get_field('footer_street', 'option');
	$city = get_field('footer_city', 'option');
	$state = get_field('footer_state', 'option');
	$zip = get_field('footer_zip', 'option');
	$phone = get_field('footer_phone', 'option');
?>
<div class="footer_address" itemscope itemtype="http://schema.org/PostalAddress">
	<?php
		if (!empty($name)) {
	?>
	<span class="footer_address_name" itemprop="name"><?=esc_html($name)?></span>
	<?php
		}
		if (!empty($street)) {
	?>
	<span class="footer_address_street" itemprop="streetAddress"><?=esc_html($street)?></span>
	<?php
		}
		if (!empty($city)) {
	?>
	<span class="footer_address_city" itemprop="addressLocality"><?=esc_html($city)?></span>
	<?php
		}
		if (!empty($state)) {
	?>
	<span class="footer_address_state" itemprop="addressRegion"><?=esc_html($state)?></span>
	<?php
		}
		if (!empty($zip)) {
	?>
	<span class="footer_address_zip" itemprop="postalCode"><?=esc_html($zip)?></span>
	<?php
		}
		if (!empty($phone)) {
	?>
	<a class="footer_address_phone" itemprop="telephone" href="<?=esc_url("tel:$phone", ['tel'])?>"><?=esc_html($phone)?></a>
	<?php
		}
	?>
</div>