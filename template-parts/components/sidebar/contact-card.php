<?php
	/**
	 * Contact Card Component
	 *
	 * This component is used for the contact card sidebar componenet as well as
	 * the faculty details page header.
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	// Define Advanced Custom Fields.
	$theme = isset($callout['theme']) ? $callout['theme'] : false;
	$title = $callout['title'];
	$name = $callout['name'];
	$description = $callout['description'];
	$phone = $callout['phone'];
	$fax = $callout['fax'];
	$email = $callout['email'];
	$links = $callout['links'];
?>
<div class="contact_card<?php if ($theme) echo " theme_$theme"; ?>">
	<header class="contact_card_header">
		<h2 class="contact_card_title"><?=esc_html($title)?></h2>
	</header>
	<div class="contact_card_body">
		<h3 class="contact_card_name"><?=esc_html($name)?></h3>
		<div class="contact_card_info">
			<div class="contact_card_description"><?=esc_html($description)?></div>
		</div>
		<div class="contact_card_types">
			<?php if ($phone) { ?>
			<span class="contact_card_type contact_card_phone"><?=esc_html($phone)?></span>
			<?php } if ($fax) { ?>
			<span class="contact_card_type contact_card_phone"><?=esc_html($fax)?></span>
			<?php } if ($email && is_email($email)) { ?>
			<a class="contact_card_type contact_card_email" href="<?=esc_url("mailto:$email", ['mailto'])?>"><?=esc_html($email)?></a>
			<?php
				}
				if ($links) {
					foreach ($links as $link) {
						$link_url = $link['link_url'];
						$link_label = $link['link_label'] ?: $link_url;
			?>
			<a class="contact_card_type contact_card_external_link" <?php Boilerplate::drawHref($link_url); ?>><?=$link_label?></a>
			<?php
					}
				}
			?>
		</div>
	</div>
</div>
