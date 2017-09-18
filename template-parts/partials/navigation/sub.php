<?php
	/**
	 * Sub Navigation
	 *
	 * Dynamically generate a menu of the pages on the same level and the current
	 * page's childs.
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	$full_menu = wp_get_nav_menu_items($menu_name);
	$sub_nav = Boilerplate::getParsedMenuArray($full_menu, 8);

	// Get top level page ID
	$post_ancestors = get_ancestors();

	if (count($post_ancestors)) {
		$top_level_id = $post_ancestors[count($post_ancestors) - 1];
	} else {
		$top_level_id = get_the_ID();
	}

	// Determine which branch of the nav to draw
	$branch_to_draw = false;

	foreach ($sub_nav as $level) {
		if ($level->object_id === $top_level_id) {
			$branch_to_draw = $level;
		}
	}

	if ($branch_to_draw && count($branch_to_draw->children)) {
		define('SUBNAV_DRAWN', true);
?>
<nav class="sub_nav" aria-label="Additional Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<button class="js-sub_nav_handle sub_nav_handle"><?php _e('Additional Navigation'); ?></button>
	<div class="js-navigation js-sub_navigation sub_nav_list" data-navigation-handle=".js-sub_nav_handle" data-navigation-options='{"theme": "sub_nav_base", "labels": {"closed": "Additional Navigation", "Open": "Close"}}'>
		<?php
			foreach ($branch_to_draw->children as $item) {
				$active = in_array($item->object_id, $post_ancestors) || $item->object_id === $post->ID;
		?>
		<div class="sub_nav_item<?php if ($active) { ?> sub_nav_item_active<?php } ?>" itemprop="url">
			<a class="sub_nav_link" <?php Boilerplate::drawHref($item->url); ?> itemprop="name"><?=$item->title?></a>
			<?php if ($active && count($item->children)) { ?>
			<div class="sub_nav_children">
				<?php
					foreach ($item->children as $child) {
						$child_active = in_array($child->object_id, $post_ancestors) || $child->object_id === $post->ID;
				?>
				<div class="sub_nav_child_item<?php if ($child_active) { ?> sub_nav_child_item_active<?php } ?>" itemprop="url">
					<a class="sub_nav_child_link" <?php Boilerplate::drawHref($child->url); ?> itemprop="name"><?=$child->title?></a>
					<?php if ($child_active && count($child->children)) { ?>
					<div class="sub_nav_children_underneath">
						<?php foreach ($child->children as $grand_child) { ?>
						<a class="sub_nav_child_link" <?php Boilerplate::drawHref($grand_child->url); ?> itemprop="name"><?=$grand_child->title?></a>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</nav>
<?php } ?>
