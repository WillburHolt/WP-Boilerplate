<?php
	/**
	 * Search Form
	 *
	 * Used to generate the search box on pages other than the search page.
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	$search_link = isset($_REQUEST) ? add_query_arg($_REQUEST, get_search_link()) : get_search_link();
?>
<div class="site_search<?php if (!empty($modifier)) echo " site_search_$modifier"; ?>" id="site_search<?php if (!empty($modifier)) echo "_$modifier"; ?>" itemscope itemtype="http://schema.org/WebSite" role="search">
	<meta itemprop="url" content="<?php the_permalink(); ?>">
	<form class="site_search_form" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" action="/search/">
		<meta itemprop="target" content="<?=$search_link?>">
		<label class="site_search_label" for="search_term_string<?php if (!empty($modifier)) echo "_$modifier"; ?>">Search</label>
		<input aria-live="polite" class="site_search_input" itemprop="query-input" type="text" id="search_term_string<?php if (!empty($modifier)) echo "_$modifier"; ?>" name="q" placeholder="<?=$placeholder?>">
		<button class="site_search_button" type="submit" title="submit" aria-label="submit">
			<span class="site_search_button_label"><?=$button_label?></span>
			<span class="site_search_button_icon"><?php Boilerplate::drawSymbol('search'); ?></span>
		</button>
	</form>
</div>
