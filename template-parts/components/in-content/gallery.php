<?php
	/**
	 * Gallery Component
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
	$items = $callout['items'];
?>
<div class="media_gallery<?php if ($theme) echo " theme_$theme"; ?>">
	<?php if ($title) { ?>
	<header class="media_gallery_header">
		<h2 class="media_gallery_title"><?=esc_html($title)?></h2>
	</header>
	<?php } ?>
	<div class="media_gallery_body">
		<div class="js-carousel media_gallery_items" data-carousel-options='{"theme": "base_pagination", "contained": false, "matchHeight": true}'>
			<?php
				foreach ($items as $item) {
					$image = $item['image']['id'];
					$video = $item['video'];
					$caption = $item['caption'];
					$classes = [];
					if (isset($item['class'])) {
						$classes = [$item['class']];
					}
					if (!$caption) {
						$classes[] = 'no_caption';
					}
					if ($video) {
						$classes[] = 'video';
					}
			?>
			<div class="media_gallery_item<?=implode(' ', $classes)?>">
				<figure class="media_gallery_figure" role="group"<?php if ($caption) { ?> aria-label="<?=esc_attr($caption)?>"<?php } ?>>
					<?php
						if ($video) {
					?>
					<a class="js-lightbox media_item_link" href="<?=esc_url($video)?>" title="<?=esc_attr($caption)?>">
					<?php
						}
						Boilerplate::drawPicture($image, 'media_gallery', ['1220px' => 'wide-med'], 'wide-med');
					?>
					<span class="media_gallery_symbol"><?php Boilerplate::drawSymbol('symbol'); ?></span>
					<?php if ($video) { ?>
					</a>
					<?php } if ($caption) { ?>
					<figcaption class="media_gallery_figcaption">
						<p><?=esc_html($caption)?></p>
					</figcaption>
					<?php } ?>
				</figure>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
