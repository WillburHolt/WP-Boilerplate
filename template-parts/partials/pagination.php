<?php
	/**
	 * Pagination
	 *
	 * @link https://developer.wordpress.org/themes/functionality/pagination/
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	global $post;

	$pages = (int)$post->max_num_pages;
	$current_page = get_query_var('paged') ?: 1;
	$pagination = Boilerplate::getPaginationArray($current_page, $pages, 9);
	$pagination_link = get_permalink(get_option('page_for_posts'));
	$pagination_prev_link = $pagination_link.'page/'.($current_page - 1).'/';
	$pagination_next_link = $pagination_link.'page/'.($current_page + 1).'/';

	if ($pages > 1) {
?>
<div class="pagination">
	<a class="pagination_arrow pagination_arrow_left pagination_arrow_disabled" href="<?=$pagination_prev_link?>">
		<span class="pagination_arrow_label">Previous</span>
		<span class="pagination_arrow_icon"><?php Boilerplate::drawSymbol('chevron_left'); ?></span>
	</a>
	<nav class="pagination_nav">
		<?php
			if ($pagination[0] !== 1) {
		?>
		<a href="<?=$pagination_link?>" class="pagination_link">1</a>
		<span class="pagination_link pagination_more">…</span>
		<?php
			}
			foreach ($pagination as $number) {
				if ($number === $current_page) {
		?>
		<span class="pagination_link active"><?=$number?></span>
		<?php
				} else {
		?>
		<a href="<?=$pagination_link."page/$number/"?>" class="pagination_link"><?=$number?></a>
		<?php
				}
			}
			if (end($pagination) !== $pages) {
		?>
		<span class="pagination_link pagination_more">…</span>
		<a href="<?=$pagination_link."page/$number/"?>" class="pagination_link"><?=$pages?></a>
		<?php } ?>
	</nav>
	<?php if ($current_page !== $pages) { ?>
	<a class="pagination_arrow pagination_arrow_right" href="<?=$pagination_next_link?>">
		<span class="pagination_arrow_label">Next</span>
			<span class="pagination_arrow_icon"><?php Boilerplate::drawSymbol('chevron_right'); ?></span>
	</a>
	<?php } ?>
</div>
<?php } ?>
