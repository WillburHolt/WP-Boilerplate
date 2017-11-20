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
	$background = isset($callout['background']) ? $callout['background'] : $background;
	$label = isset($callout['label']) ? $callout['label'] : $label;
	$title = isset($callout['title']) ? $callout['title'] : $title;
	$description = isset($callout['description']) ? $callout['description'] : $description;
	$links = isset($callout['links']) ? $callout['links'] : $links;
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
				<?php if (!empty($description)) { ?>
				<div class="flex_callout_body">
					<div class="flex_callout_description">
						<p><?=esc_html($description)?></p>
					</div>
				</div>
			<?php } if (!empty($links)) { ?>
				<footer class="flex_callout_links">
					<?php
						foreach ($links as $link) {
							$link_url = $link['link_url'];
							$link_label = $link['link_label'] ?: $link_url;
					?>
					<a class="flex_callout_link" <?php Boilerplate::drawHref($link_url); ?> itemprop="url">
						<span><?=$link_label?></span>
					</a>
					<?php
						}
					?>
				</footer>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
