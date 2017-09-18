<?php
	/**
	 * Archive Template
	 *
	 * Default template for metadata archives such as sorting by category, tags,
	 * author, date, or other taxonomies of a post.
	 *
	 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/#archive-php
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
		$post_id = get_the_ID();
		$feature_callouts = get_field('feature', $post_id);
		$in_content_callouts = get_field('in_content', $post_id);
		$full_width_callouts = get_field('full_width', $post_id);
?>
<!-- Page -->
<div class="page">
	<?php if (is_array($feature_callouts) && count($feature_callouts)) { ?>
	<!-- Page Feature -->
	<div class="page_feature">
		<?php Boilerplate::drawCallouts($feature_callouts, 'feature', $post_id); ?>
	</div>
	<!-- END: Page Feature -->
	<?php } ?>
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
			<?php
				Boilerplate::drawArchiveListing($full_width_callouts, $post_id);
				Boilerplate::drawCallouts($full_width_callouts, 'full-width', $post_id);
			?>
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
