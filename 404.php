<?php
	/**
	 * 404 Page
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
	$title = get_field('404_title', 'option');

	get_header();
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
		<!-- Main Content -->
		<div class="fs-row">
			<div class="fs-cell fs-lg-10 fs-centered content_cell">
				<main class="main_content" id="main_content" itemprop="mainContentOfPage">
					<div class="page_header">
						<h1 class="page_title" id="page_title"><?=esc_html($title)?></h1>
					</div>
				</main>
			</div>
		</div>
		<!-- END: Main Content -->
		<!-- Full Width Callouts -->
		<div class="full_width_callouts">
			<?php Boilerplate::drawGoogleCSE(); ?>
		</div>
		<!-- END: Full Width Callouts -->
	</div>
	<!-- END: Page Content -->
</div>
<?php get_footer(); ?>
