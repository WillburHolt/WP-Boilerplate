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

	if (null !== $navigation) {
?>
<nav class="<?=$class?><?php if ($modifier) echo " $class\_$modifier"; ?>" aria-label="<?=$title?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<?php if ($title) { ?>
	<div class="<?=$class?>_header">
		<h2 class="<?=$class?>_title"><?=esc_html($title)?></h2>
	</div>
	<?php } ?>
	<div class="<?=$class?>_list" role="navigation">
		<?php
			$navigation_index = 0;
			foreach ($navigation as $item) {
				$navigation_index++;
				$active = $post_id === $item->object_id;
		?>
		<div class="<?=$class?>_item<?php if ($modifier) echo " $modifier"; ?>" itemprop="url">
			<?php
				Boilerplate::drawLink($item->url, $item->title, $class.'_link', '', '', ['itemprop' => 'name']);
				if ($active && count($item->children)) {
			?>
				<div class="<?=$class?>_children">
					<?php
						foreach ($item->children as $child) {
							$active = $post_id === $item->object_id;
					?>
					<div class="<?=$class?>_child_item<?php if ($child_active) echo ' sub_nav_child_item_active'; ?>" itemprop="url">
						<?php Boilerplate::drawLink($child->url, $child->title, $class.'_child_link', '', '', ['itemprop' => 'name']); ?>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<?php
			}
		?>
	</div>
</nav>
<?php } ?>
