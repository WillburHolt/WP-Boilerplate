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
	$label = get_field('404_error_page_label', 'option');
	$title = get_field('404_error_page_title', 'option');
	$description = get_field('404_error_page_description', 'option');
	$links = get_field('404_error_page_links', 'option');
	$background = get_field('404_error_page_background', 'option');

	get_header();
?>
<!-- Page -->
<div class="page">
	<!-- Page Content -->
	<div class="page_content">
		<!-- Full Width Callouts -->
		<div class="full_width_callouts">
			<?php
				Boilerplate::drawGoogleCSE();
				Boilerplate::draw404Page($label, $title, $description, $links, $background);
			?>
		</div>
		<!-- END: Full Width Callouts -->
	</div>
	<!-- END: Page Content -->
</div>
<?php get_footer(); ?>
