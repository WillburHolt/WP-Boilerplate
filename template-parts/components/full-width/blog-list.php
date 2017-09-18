<?php
	/**
	 * Blog Loop
	 *
	 * Typically used for the blog index, this is also the default template if no
	 * other templates are provided.
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
	$theme = get_field('post_listing_theme', 'option');
	$title = get_field('post_listing_title', 'option');
?>
<div class="blog<?php if ($theme) echo " theme_$theme"; ?>">
	<div class="fs-row">
		<div class="fs-cell">
			<?php if ($title) { ?>
			<header class="blog_header">
				<h2 class="blog_heading"><?=esc_html($title)?></h2>
			</header>
			<?php } ?>
			<div class="blog_items" role="list" itemscope itemtype="http://schema.org/ItemList"<?php if ($title) { ?> aria-label="<?=esc_attr($title)?>"<?php } ?>>
				<?php
					$loop_index = 0;
					foreach ($posts as $post) {
						setup_postdata($post);
						$loop_index++;
				?>
				<article class="blog_item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
					<meta itemprop="position" content="<?=$loop_index?>">
					<div class="blog_item_inner">
						<?php if ('' !== get_the_post_thumbnail()) { ?>
						<figure class="blog_item_figure">
							<?php Boilerplate::drawImage(get_post_thumbnail_id(), 'blog_item', 'classic-xxsml', false, 'itemprop="image"'); ?>
						</figure>
						<?php } ?>
						<div class="blog_item_wrapper">
							<header class="blog_item_header">
								<h3 class="blog_item_title"><?php the_title(); ?></h3>
								<time class="blog_item_date" datetime="<?=get_the_date(DATE_W3C)?>"><?=get_the_date(get_option('date_format'))?></time>
								<?php the_tags('<span class="news_item_tag">', ', ', '</span>'); ?>
							</header>
							<?php if (has_excerpt()) { ?>
							<div class="blog_item_body">
								<div class="blog_item_description">
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
							<?php } ?>
							<footer class="blog_item_links">
								<?php Boilerplate::drawLink(get_permalink(), 'Read More', 'blog_item_link', '', '', ['itemprop' => 'url']); ?>
							</footer>
						</div>
					</div>
				</article>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
