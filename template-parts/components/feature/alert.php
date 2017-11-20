<?php
	/**
	 * Alert Component
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
	$status = (string) get_field('alert_status', 'option');
	$title = get_field('alert_title', 'option');
	$description = get_field('alert_description', 'option');
	$link_url = get_field('alert_link_url', 'option');

	if ($status === '1' && !empty($title) && !empty($description)) {
?>
<section class="js-toggle js-alert alert" role="alert" data-time="<?=date('G:i:s')?>">
	<div class="fs-row">
		<div class="fs-cell">
			<div class="alert_body">
				<button class="js-toggle_handle js-alert-close alert_close">
					<span class="alert_close_label">Close Alert</span>
					<span class="alert_close_icon"><?php Boilerplate::drawSymbol('close'); ?></span>
				</button>
				<div class="alert_content">
					<header class="alert_header">
						<div class="alert_time">
							<time class="alert_time_item" datetime="<?=date('Y-m-d')?>"><?=date('F d')?></time>
						</div>
						<h2 class="alert_title">
							<?php
								if (!empty($link_url)) {
							?>
							<a class="alert_title_link" <?php Boilerplate::drawHref($link_url); ?>><?=$title?></a>
							<?php
								} else {
									esc_html($title);
								}
							?>
						</h2>
					</header>
					<div class="alert_description">
						<p><?=esc_html($description)?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	}
?>
