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
	$title = $callout['title'];
	$description = $callout['description'];
	$link_url = $callout['link_url'];
	$datetime = $callout['datetime'];
?>
<section class="js-toggle js-alert alert" role="alert" data-time="<?=$datetime?>">
	<div class="fs-row">
		<div class="fs-cell">
			<div class="alert_body">
				<button class="js-toggle_handle js-alert-close alert_close">
					<span class="alert_close_label"><?php _e('Close Alert'); ?></span>
					<span class="alert_close_icon"><?php Boilerplate::drawSymbol('close'); ?></span>
				</button>
				<div class="alert_content">
					<header class="alert_header">
						<div class="alert_time">
							<time class="alert_time_item" datetime="<?=$datetime?>"><?=$datetime?></time>
						</div>
						<h2 class="alert_title">
							<?php
								if ($link_url) {
									Boilerplate::drawLink($link_url, $title, 'alert_title_link');
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
