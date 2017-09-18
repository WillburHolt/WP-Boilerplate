<?php
	/**
	 * Archive Loop
	 *
	 * The loop used for the archives. This is also the loop for the category,
	 * tags, and author archives.
	 *
	 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	// Load the posts in an array.
	$posts = get_posts();

	// Define Advanced Custom Fields.
	$theme = get_field('archive_listing_theme', 'option');
	$title = get_field('archive_listing_title', 'option') ?: get_the_archive_title();
?>
<div class="archive<?php if ($theme) echo " theme_$theme"; ?>">
	<div class="fs-row">
		<div class="fs-cell">
			<?php if ($title) { ?>
			<header class="archive_header">
				<h2 class="archive_heading"><?=esc_html($title)?></h2>
			</header>
			<?php } ?>
			<div class="archive_items" role="list" itemscope itemtype="http://schema.org/ItemList"<?php if ($title) { ?> aria-label="<?=esc_attr($title)?>"<?php } ?>>
				<?php
					$loop_index = 0;
					foreach ($posts as $post) {
						setup_postdata($post);
						$loop_index++;
				?>
				<article class="archive_item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
					<meta itemprop="position" content="<?=$loop_index?>">
					<div class="archive_item_inner">
						<?php if ('' !== get_the_post_thumbnail()) { ?>
						<figure class="archive_item_figure">
							<?php Boilerplate::drawImage(get_post_thumbnail_id(), 'archive_item', 'classic-xxsml', false, 'itemprop="image"'); ?>
						</figure>
						<?php } ?>
						<div class="archive_item_wrapper">
							<header class="archive_item_header">
								<h3 class="archive_item_title"><?php the_title(); ?></h3>
								<time class="archive_item_date" datetime="<?=get_the_date(DATE_W3C)?>"><?=get_the_date(get_option('date_format'))?></time>
								<?php the_tags('<span class="news_item_tag">', ', ', '</span>'); ?>
							</header>
							<?php if (has_excerpt()) { ?>
							<div class="archive_item_body">
								<div class="archive_item_description">
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
							<?php } ?>
							<footer class="archive_item_links">
								<?php Boilerplate::drawLink(get_permalink(), 'Read More', 'archive_item_link', '', '', ['itemprop' => 'url']); ?>
							</footer>
						</div>
					</div>
				</article>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>
