<?php
	/**
	 * Topics Component
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
	$topics = $callout['topics'];
?>
<div class="topic_block<?php if ($theme) echo " theme_$theme"; ?>">
	<?php if ($title) { ?>
	<header class="topic_block_header">
		<h2 class="topic_block_title"><?=esc_html($title)?></h2>
	</header>
	<?php } ?>
	<div class="topic_items">
		<?php
			foreach ($topics as $topic) {
				$topic_image = $topic['image']['id'];
				$topic_title = $topic['title'];
				$topic_description = $topic['description'];
				$topic_links = $topic['links'];
		?>
		<article class="topic_row">
			<div class="topic_row_inner">
				<?php if ($topic_image) { ?>
				<figure class="topic_figure">
					<?php Boilerplate::drawPicture($topic_image, 'topic', ['500px' => 'classic-xxsml'], 'square-xxsml')?>
				</figure>
				<?php } ?>
				<div class="topic_wrapper">
					<header class="topic_header">
						<h3 class="topic_title"><?=esc_html($topic_title)?></h3>
					</header>
					<div class="topic_body">
						<div class="topic_description">
							<p><?=esc_html($topic_description)?></p>
						</div>
					</div>
					<?php if ($topic_links) { ?>
					<footer class="topic_links">
						<?php
							foreach ($topic_links as $topic_link) {
								$link_url = $topic_link['link_url'];
								$link_label = $topic_link['link_label'] ?: $link_url;
						?>
						<a class="topic_link" <?php Boilerplate::drawHref($link_url); ?>>
							<span><?=$link_label?></span>
						</a>
						<?php
							}
						?>
					</footer>
					<?php } ?>
				</div>
			</div>
		</article>
		<?php } ?>
	</div>
</div>
