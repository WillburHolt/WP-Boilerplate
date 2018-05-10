<?php
	/**
	 * Basic Navigation
	 *
	 * This displays the basic and utility navigation for the website.
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	$navigation = wp_get_nav_menu_items($menu_name);
	$post_id = get_the_ID();

	if (!empty($navigation)) {
?>
<nav class="<?=$class?><?php if (!empty($modifier)) echo " $class"."_$modifier"; ?>" aria-label="<?=$title?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<?php if (!empty($title)) { ?>
	<div class="<?=$class?>_header">
		<h2 class="<?=$class?>_title"><?=esc_html($title)?></h2>
	</div>
	<?php } ?>
	<div class="<?=$class?>_list" role="navigation">
		<?php
			$navigation_index = 0;
			foreach ($navigation as $item) {
				$navigation_index++;
				$active = $post_id == $item->object_id;
		?>
		<div class="<?=$class?>_item<?php if (!empty($modifier)) echo " $modifier"; ?>" itemprop="url">
			<a class="<?=$class?>_link" <?php Boilerplate::drawHref($item->url); ?> itemprop="name"><?=$item->title?></a>
			<?php if ($active && count($item->children)) { ?>
				<div class="<?=$class?>_children">
					<?php
						foreach ($item->children as $child) {
							$child_active = $post_id == $child->object_id;
					?>
					<div class="<?=$class?>_child_item<?php if ($child_active) echo ' sub_nav_child_item_active'; ?>" itemprop="url">
						<a class="<?=$class?>_child_link" <?php Boilerplate::drawHref($child->url); ?> itemprop="name"><?=$child->title?></a>
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