<?php
	/**
	 * Linked List Component
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
	$links = $callout['links'];
?>
<div class="linked_list<?php if ($theme) echo " theme_$theme"; ?>">
	<?php if ($title) { ?>
	<header class="linked_list_header">
		<h2 class="linked_list_title"><span><?=esc_html($title)?></span></h2>
	</header>
	<?php } ?>
	<div class="linked_list_body">
		<ul class="linked_list_group">
			<?php
				foreach ($links as $link) {
					$link_url = $link['link_url'];
					$link_label = $link['link_label'] ?: $link_url;
			?>
			<li class="linked_list_item">
				<a class="linked_list_link" <?php Boilerplate::drawHref($link_url); ?>><?=$link_label?></a>
			</li>
			<?php
				}
			?>
		</ul>
	</div>
</div>
