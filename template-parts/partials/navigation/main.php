<?php
	/**
	 * Main Navigation
	 *
	 * This displays the main navigation for the website.
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	$navigation = Boilerplate::getParsedMenuArray(wp_get_nav_menu_items($menu_name), 2);
	$post_id = get_the_ID();

	if (!empty($navigation)) {
?>
<nav class="js-main-nav main_nav<?php if (!empty($modifier)) echo " main_nav_$modifier"; ?>" aria-label="<?=$title?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<?php if (!empty($title)) { ?>
	<div class="main_nav_header">
		<h2 class="main_nav_title"><?=esc_html($title)?></h2>
	</div>
	<?php } ?>
	<div class="main_nav_list" role="navigation">
		<?php
			$navigation_index = 0;
			foreach ($navigation as $item) {
				$navigation_index++;
				$active = $post_id == $item->object_id;
		?>
		<div class="js-main-nav-item-<?=$navigation_index?> main_nav_item<?php if ($active) echo " active"; if ($modifier) echo " $modifier"; ?>" itemprop="url">
			<div class="main_nav_item_wrapper">
				<a class="main_nav_link" <?php Boilerplate::drawHref($item->url); ?> itemprop="name"><?=$item->title?></a>
				<button class="js-swap main_nav_toggle" data-swap-target=".js-main-nav-item-<?=$navigation_index?>" data-swap-group="main_nav">
					<span class="main_nav_toggle_label">Expand Navigation</span>
					<span class="main_nav_toggle_icon"><?php Boilerplate::drawSymbol('caret_down'); ?></span>
				</button>
			</div>
			<?php if (is_array($item->children) && count($item->children)) { ?>
			<div class="main_nav_children">
				<?php
					foreach ($item->children as $child) {
						$child_active = $post_id == $child->object_id;
				?>
				<div class="main_nav_child_item<?php if ($child_active) echo ' sub_nav_child_item_active'; ?>" itemprop="url">
					<a class="main_nav_child_link" <?php Boilerplate::drawHref($child->url); ?> itemprop="name"><?=$child->title?></a>
				</div>
				<?php
					}
				?>
			</div>
			<?php } ?>
		</div>
		<?php
			}
		?>
	</div>
</nav>
<?php
	}