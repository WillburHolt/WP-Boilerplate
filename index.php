<?php
	/**
	 * Blog Index / Main Template File
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

	get_header();

	if (have_posts()) {
		// Load the posts in an array.
		$posts = get_posts();
		$post_id = get_the_ID();

		// Define Advanced Custom Fields.
		$theme = get_field('post_listing_theme', 'option');
		$title = get_field('post_listing_title', 'option');
		$in_content_callouts = get_field('in_content', $post_id);
		$full_width_callouts = get_field('full_width', $post_id);
?>
<!-- Page -->
<div class="page">
	<!-- Page Feature -->
	<div class="page_feature">
		<?php Boilerplate::drawAlertComponent(); ?>
	</div>
	<!-- END: Page Feature -->
	<!-- Page Content -->
	<div class="page_content">
		<?php if (is_array($in_content_callouts) && count($in_content_callouts)) { ?>
		<div class="row">
			<!-- Sub Nav -->
			<div class="subnav_cell">
				<?php Boilerplate::drawSubNav(); ?>
			</div>
			<!-- END: Sub Nav -->
			<!-- Main Content -->
			<div class="content_cell">
				<main class="main_content" id="main_content" itemprop="mainContentOfPage">
					<!-- In Content Callouts -->
					<div class="in_content_callouts">
						<?php Boilerplate::drawCallouts($in_content_callouts, 'in-content', $post_id); ?>
					</div>
					<!-- END: In Content Callouts -->
				</main>
			</div>
			<!-- END: Main Content -->
			<?php get_sidebar(); ?>
		</div>
		<?php } ?>
		<!-- Full Width Callouts -->
		<div class="full_width_callouts">
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
									$excerpt = get_field('excerpt');
							?>
							<article class="blog_item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
								<meta itemprop="position" content="<?=$loop_index?>">
								<div class="blog_item_inner">
									<?php if (!empty(get_the_post_thumbnail())) { ?>
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
										<?php if (!empty($excerpt)) { ?>
										<div class="blog_item_body">
											<div class="blog_item_description">
												<p><?=esc_html($excerpt)?></p>
											</div>
										</div>
										<?php } ?>
										<footer class="blog_item_links">
											<a class="blog_item_link" <?php Boilerplate::drawHref(get_permalink()); ?> itemprop="url">Read More</a>
										</footer>
									</div>
								</div>
							</article>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php Boilerplate::drawCallouts($full_width_callouts, 'full-width', $post_id); ?>
		</div>
		<!-- END: Full Width Callouts -->
	</div>
	<!-- END: Page Content -->
</div>
<!-- END: Page -->
<?php
	}
	get_footer();
?>
