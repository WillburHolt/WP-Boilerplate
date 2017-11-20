<?php
	/**
	 * Social Navigation
	 *
	 * Social profile link markup as defined by Google structured data
	 *
	 * TODO: Update Schema.
	 *
	 * @link https://developers.google.com/structured-data/customize/social-profiles
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
<div class="social_nav<?php if (!empty($modifier)) echo " social_nav_$modifier"; ?>" itemscope itemtype="http://schema.org/Organization">
	<link itemprop="url" href="<?=get_site_url()?>">
	<?php if (!empty($title)) { ?>
	<div class="social_nav_header">
		<h2 class="social_nav_title"><?=esc_html($title)?></h2>
	</div>
	<?php } ?>
	<div class="social_nav_list">
		<?php
			foreach ($navigation as $item) {
				$active = $post_id === $item->object_id;
		?>
		<div class="social_nav_item">
			<a class="social_nav_link" <?php Boilerplate::drawHref($item->url); ?> itemprop="sameAs">
				<span class="social_nav_icon"><?=Boilerplate::drawSymbol(sanitize_title($item->title))?></span>
				<span class="social_nav_label"><?=$child->title?></span>
			</a>
		</div>
		<?php
			}
		?>
	</div>
</div>
<?php } ?>
