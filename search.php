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
		$title = get_field('search_page_title', 'option');
?>
<!-- Page -->
<div class="page">
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