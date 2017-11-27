<?php
	/**
	 * Sidebar Template
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	$sidebar_callouts = get_field('sidebar');

	if (is_array($sidebar_callouts) && count($sidebar_callouts)) {
?>
<!-- Sidebar Callouts -->
<div class="sidebar_cell">
	<div class="sidebar" itemscope itemtype="http://schema.org/WPSideBar">
		<?php Boilerplate::drawCallouts($sidebar_callouts, 'sidebar', $post->ID); ?>
	</div>
</div>
<!-- END: Sidebar Callouts -->
<?php } ?>
