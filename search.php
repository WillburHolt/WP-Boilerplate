<?php
	/**
	 * Search Result Page
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
?>
<!-- Page -->
<div class="page">
	<!-- Page Content -->
	<div class="page_content">
		<!-- Full Width Callouts -->
		<div class="full_width_callouts">
			<?php
				Boilerplate::drawGoogleCSE();
				Boilerplate::drawPagination();
			?>
		</div>
		<!-- END: Full Width Callouts -->
	</div>
	<!-- END: Page Content -->
</div>
<?php
	}
	get_footer();
?>
