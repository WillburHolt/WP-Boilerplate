<?php
	/**
	 * Flexible Callout Component
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
	$background = $callout['background'];
	$label = $callout['label'];
	$title = $callout['title'];
	$description = $callout['description'];
	$links = $callout['links'];
?>
<section class="flex_callout<?php if ($theme) echo " theme_$theme"; ?>">
	<?php
		if ($background) {
			Boilerplate::drawImageBackground('flex_callout', $background, [
				'0px' => 'wide-med',
				'980px' => 'wide-lrg'
			]);
		}
	?>
	<div class="fs-row">
		<div class="fs-cell">
			<div class="flex_callout_wrapper">
				<header class="flex_callout_header">
					<h2 class="flex_callout_label"><?=esc_html($label)?></h2>
					<h3 class="flex_callout_title"><?=esc_html($title)?></h3>
				</header>
				<?php if ($description) { ?>
				<div class="flex_callout_body">
					<div class="flex_callout_description">
						<p><?=esc_html($description)?></p>
					</div>
				</div>
				<?php } if ($links) { ?>
				<footer class="flex_callout_links">
					<?php
						foreach ($links as $link) {
							$link_url = $link['link_url'];
							$link_label = $link['link_label'] ?: $link_url;
							Boilerplate::drawLink($link_url, $link_label, 'flex_callout_link', '<span>', '</span>');
						}
					?>
				</footer>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
