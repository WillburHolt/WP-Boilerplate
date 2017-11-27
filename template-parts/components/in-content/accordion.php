<?php
	/**
	 * Accordion Component
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
	$collapse = isset($callout['collapse']) ? $callout['collapse'] : true;
	$grouped = isset($callout['grouped']) ? $callout['grouped'] : true;
	$title = $callout['title'];
	$items = $callout['items'];
?>
<div class="accordion<?php if ($theme) echo " theme_$theme"; ?>">
	<?php if (false !== $title) { ?>
	<header class="accordion_header">
		<h2 class="accordion_title"><?=esc_html($title)?></h2>
	</header>
	<?php } ?>
	<div class="accordion_body">
		<?php
			$item_index = 0;
			foreach ($items as $item) {
				$item_index++;
				$item_label = $item['label'];
				$item_description = $item['description'];
		?>
		<div class="js-accordion-item-<?=$item_index?> accordion_item">
			<h3 class="js-swap accordion_item_title" data-swap-target=".js-accordion-item-<?=$item_index?>"<?php if ($grouped) { ?> data-swap-group="accordion_group"<?php } if (false === $collapse) { ?> data-swap-options='{"collapse": false}'<?php } ?>>
				<?=esc_html($item_label)?>
				<span class="accordion_item_icon"><?php Boilerplate::drawSymbol('caret_down'); ?></span>
			</h3>
			<div class="accordion_item_description">
				<?=$item_description?>
			</div>
		</div>
		<?php
			}
		?>
	</div>
</div>
