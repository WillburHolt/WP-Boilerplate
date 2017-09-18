<?php
	/**
	 * Directory Loop
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
	$theme = get_field('theme', 'option');
	$title = get_field('title', 'option') ?: get_the_archive_title();
?>
<div class="directory<?php if ($theme) echo " theme_$theme"; ?>">
	<div class="fs-row">
		<div class="fs-cell">
			<?php if ($title) { ?>
			<header class="directory_header">
				<h2 class="directory_heading"><?=$title?></h2>
			</header>
			<?php } ?>
			<div class="directory_items" role="list" itemscope itemtype="http://schema.org/ItemList"<?php if ($title) {?> aria-label="<?=esc_attr($title)?>"<?php } ?>>
				<?php
					$loop_index = 0;
					foreach ($posts as $post) {
						setup_postdata($post);
						$loop_index++;
						$title = get_field('title');
						$email = get_field('email') ? sanitize_email(get_field('email')) : false;
				?>
				<div class="directory_item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
					<meta itemprop="position" content="<?=$loop_index?>">
					<div class="directory_item_inner" itemscope itemtype="http://schema.org/Person">
						<?php if ('' !== get_the_post_thumbnail()) { ?>
						<figure class="directory_item_figure">
							<?php Boilerplate::drawImage(get_post_thumbnail_id(), 'directory_item', 'classic-xxsml', false, 'itemprop="image"'); ?>
						</figure>
						<?php } ?>
						<div class="directory_item_wrapper">
							<header class="directory_item_header">
								<h3 class="directory_item_name" itemprop="name"><?php the_title(); ?></h3>
								<div class="directory_item_title"><?=$title?></div>
							</header>
							<div class="directory_item_body">
								<?php
									if (false !== $email && is_email($email)) {
								?>
								<a class="directory_item_email" href="<?=esc_url("mailto:$email")?>" itemprop="email"><?=esc_html($email)?></a>
								<?php
									}
									if (has_excerpt()) {
								?>
								<div class="directory_item_description" itemprop="description">
									<p><?php the_excerpt(); ?></p>
								</div>
								<?php
									}
								?>
							</div>
							<footer class="directory_item_links">
								<?php Boilerplate::drawLink(get_permalink(), 'Read More', 'directory_item_link', '', '', ['itemprop' => 'url']); ?>
							</footer>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>
