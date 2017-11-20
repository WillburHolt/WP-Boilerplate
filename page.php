<?php
	/**
	 * Page Template / Master Sub
	 *
	 * This is the default template for all pages.
	 *
	 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	get_header();

	while (have_posts()) {
		the_post();
		$in_content_callouts = get_field('in_content');
		$full_width_callouts = get_field('full_width');

		if (!post_password_required()) {
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
		<div class="fs-row">
			<!-- Sub Nav -->
			<div class="fs-cell-right fs-lg-4 aside_cell subnav_cell">
				<?php Boilerplate::drawSubNav(); ?>
			</div>
			<!-- END: Sub Nav -->
			<!-- Main Content -->
			<div class="fs-cell fs-lg-8 content_cell">
				<main class="main_content" id="main_content" itemprop="mainContentOfPage">
					<div class="page_header">
						<?php
							Boilerplate::drawBreadcrumb(false, $post);
							if (get_the_title() && '' !== get_the_title()) {
						?>
						<div class="typography">
							<h1 class="page_title" id="page_title"><?php the_title(); ?></h1>
						</div>
						<?php
							}
						?>
					</div>
					<!-- WYSIWYG - wrap all WYSIWYG text areas in `.typography` -->
					<div class="typography">
						<?php the_content(); ?>
					</div>
					<!-- END: WYSIWYG -->
					<?php if (is_array($in_content_callouts) && count($in_content_callouts)) { ?>
					<!-- In Content Callouts -->
					<div class="in_content_callouts">
						<?php Boilerplate::drawCallouts($in_content_callouts, 'in-content', $post->ID); ?>
					</div>
					<!-- END: In Content Callouts -->
					<?php } ?>
				</main>
			</div>
			<!-- END: Main Content -->
			<?php get_sidebar(); ?>
		</div>
		<?php if (is_array($full_width_callouts) && count($full_width_callouts)) { ?>
		<!-- Full Width Callouts -->
		<div class="full_width_callouts">
			<?php Boilerplate::drawCallouts($full_width_callouts, 'full-width', $post->ID); ?>
		</div>
		<!-- END: Full Width Callouts -->
		<?php } ?>
	</div>
	<!-- END: Page Content -->
</div>
<?php
		} else {
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
		<div class="fs-row">
			<!-- Sub Nav -->
			<div class="fs-cell-right fs-lg-4 aside_cell subnav_cell">
				<?php Boilerplate::drawSubNav(); ?>
			</div>
			<!-- END: Sub Nav -->
			<!-- Main Content -->
			<div class="fs-cell fs-lg-8 content_cell">
				<main class="main_content" id="main_content" itemprop="mainContentOfPage">
					<div class="page_header">
						<?php
							Boilerplate::drawBreadcrumb(false, $post);
							if (get_the_title() && '' !== get_the_title()) {
						?>
						<div class="typography">
							<h1 class="page_title" id="page_title"><?php the_title(); ?></h1>
						</div>
						<?php
							}
						?>
					</div>
					<!-- WYSIWYG - wrap all WYSIWYG text areas in `.typography` -->
					<div class="typography">
						<?php the_content(); ?>
					</div>
				</main>
			</div>
			<!-- END: Main Content -->
		</div>
	</div>
	<!-- END: Page Content -->
</div>
<?php
		}
	}
	get_footer();
?>
