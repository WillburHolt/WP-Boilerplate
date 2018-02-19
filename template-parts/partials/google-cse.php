<?php
	/**
	 * Google Search Engine
	 *
	 * @link https://cse.google.com
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	// Define ACF fields from Search Page options page.
	$key = get_field('search_page_cse_key', 'option');
?>
<div class="site_search_results<?php if (false !== $theme) echo " theme_$theme"; ?>">
	<div class="fs-row">
		<div class="fs-cell">
			<script>
				(function() {
					var cx = <?=wp_json_encode($key)?>;
					var gcse = document.createElement('script');
					gcse.type = 'text/javascript';
					gcse.async = true;
					gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(gcse, s);
				})();
			</script>
			<div class="gcse-search"></div>
			<noscript>
				<div class="typography">
					<p>The site search requires a JavaScript enabled browser. You can also search the site using <a href="//www.google.com/#q=site:<?=esc_html($_SERVER['HTTP_HOST'])?>">Google</a></p>
				</div>
			</noscript>
		</div>
	</div>
</div>
