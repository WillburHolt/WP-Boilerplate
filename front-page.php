<?php
	/**
	 * Front Page Template
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
		$feature_callouts = get_field('feature');
		$full_width_callouts = get_field('full_width');
		echo get_site_url();
?>
<!-- Page -->
<div class="page">
	<?php if (is_array($feature_callouts) && count($feature_callouts)) { ?>
	<!-- Page Feature -->
	<div class="page_feature">
		<?php Boilerplate::drawCallouts($feature_callouts, 'feature', $post->ID); ?>
	</div>
	<!-- END: Page Feature -->
	<?php } ?>
	<!-- Page Content -->
	<div class="page_content">
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
	}
	get_footer();
?>
