<?php
	/**
	 * Macros
	 *
	 * This is where all of the macro functions are defined for the theme.
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;

	class Boilerplate {

		public static function drawCallouts($callouts, $slug, $post_id) {
			if (is_array($callouts) && count($callouts)) {
				$base = get_stylesheet_directory();
				foreach ($callouts as $callout) {
					include "$base/template-parts/components/$slug/".str_replace('_', '-', $callout['acf_fc_layout']).'.php';
				}
			}
		}

		public static function drawLogo($modifier, $symbol) {
			include get_stylesheet_directory().'/template-parts/partials/logo.php';
		}

		public static function drawBasicNav($menu_name, $class, $title = false, $modifier = false) {
			include get_stylesheet_directory().'/template-parts/partials/navigation/basic.php';
		}

		public static function drawMainNav($menu_name = 'Main Navigation', $title = 'Main Navigation', $modifier = false) {
			include get_stylesheet_directory().'/template-parts/partials/navigation/main.php';
		}

		public static function drawSubNav($menu_name = 'Main Navigation') {
			include get_stylesheet_directory().'/template-parts/partials/navigation/sub.php';
		}

		public static function drawSocialNav($menu_name = 'Social Navigation', $title = 'Social Navigation', $modifier = false) {
			include get_stylesheet_directory().'/template-parts/partials/navigation/social.php';
		}

		public static function drawSearch($placeholder = 'Submit', $button_label = 'Submit', $modifier = false, $theme = false) {
			static::drawGoogleCSE($placeholder, $button_label, $modifier);
			static::drawPagination($theme);
		}

		public static function drawSearchForm($placeholder = 'Search', $button_label = 'Submit', $modifier = false) {
			include get_stylesheet_directory().'/template-parts/partials/search.php';
		}

		public static function drawGoogleCSE($theme = false) {
			include get_stylesheet_directory().'/template-parts/partials/google-cse.php';
		}

		public static function drawPagination() {
			include get_stylesheet_directory().'/template-parts/partials/pagination.php';
		}

		public static function drawBreadcrumb($modifier = false) {
			include get_stylesheet_directory().'/template-parts/partials/navigation/breadcrumb.php';
		}

		public static function drawAddress() {
			include get_stylesheet_directory().'/template-parts/partials/address.php';
		}

		public static function drawBlogListing() {
			global $post;
			include get_stylesheet_directory().'/template-parts/components/full-width/blog-list.php';
			static::drawPagination();
		}

		public static function drawArchiveListing() {
			global $post;
			include get_stylesheet_directory().'/template-parts/components/full-width/archive-list.php';
			static::drawPagination();
		}

		public static function draw404Page($label, $title, $description = false, $links = false, $background = false, $theme = false) {
			include get_stylesheet_directory().'/template-parts/components/full-width/flexible-callout.php';
		}

		/**
		 * WYSIWYG Content.
		 *
		 * Wrap the WYSIWYG content in the standard typography wrapper.
		 *
		 * @param string $content The WYSIWYG content.
		 */
		public static function getWYSIWYG($content) {
			$html = '
			<div class="wysiwyg_block">
				<div class="typography">
					'.$content.'
				</div>
			</div>
			';
			return $html;
		}

		public static function drawWYSIWYG($content) {
			echo static::getWYSIWYG($content);
		}

		/**
		 * Draw an HTML table.
		 *
		 * @param string $class   Table class.
		 * @param array  $headers Table headers.
		 * @param array  $rows    Table rows. Nested like:
		 *                        [["Row1", "Row2"], ["Row1", "Row2"]]
		 */
		public static function getTable($class, $headers, $rows) {
				$html = '
				<table class="'.$class.'">
					<thead>
						<tr>';
						foreach ($headers as $header) {
							$html .= '<th>'.$header.'</td>';
						}
						$html .= '
						</tr>
					</thead>
					<tbody>
				';
				for ($i = 0; $i < count($rows); $i++) {
					$html .= '<tr>';
					foreach ($row[$i] as $item) {
						$html .= '<td>'.$item.'</td>';
					}
					$html .= '</tr>';
				}
				$html .= '
					</tbody>
				</table>
			';
			return $html;
		}

		public static function drawTable($class, $headers, $rows) {
			echo static::getTable($class, $headers, $rows);
		}

		/**
		 * Draw a button link.
		 *
		 * @param string $class  HTML class prefix.
		 * @param string $link   Valid URL address.
		 * @param string $label  Button label.
		 * @param string $symbol Optional. Button symbol ID.
		 */
		public static function getButton($class, $link, $label, $symbol = "") {
			$html = '
			<a class="'.$class.'_link" href="'.$link ? static::getHref($link) : '#'.'">
				<span class="'.$class.'_link_label">'.$label.'</span>
			';
			if ('' !== $symbol) {
				$html .= '<span class="'.$class.'_link_icon">';
				$html .= static::getSymbol($symbol);
				$html .= '</span>';
			}
			$html .= '</a>';
			return $html;
		}

		public static function drawButton($class, $link, $label, $symbol) {
			echo static::getButton($class, $link, $label, $symbol);
		}

		public static function getDropdown($class, $id, $label, $choices, $modifier) {
			$html = '<div class="fs-dropdown-wrapper '.$class.'_dropdown_wrapper'.$modifier ? "$class\_dropdown_wrapper_$modifier".'">' : '';
			if ($label) {
				$html .= '<label class="'.$class.'_label" for="'.$id.'_dropdown">'.$label.'</label>';
			}
			$html .= '<select class="js-dropdown '.$class.'_dropdown" id="'.$id.'_dropdown" name="'.$id.'_dropdown">';
			foreach ($choices as $key => $value) {
				$html .= '<option value="'.$key.'">'.$value.'</option>';
			}
			$html .= '
					</select>
					<span class="fs-dropdown-icon '.$class.'_dropdown_icon">
						<svg class="symbol symbol_caret_down">
							<use xlink:href="#caret_down"></use>
						</svg>
					</span>
				</div>
			';
			return $html;
		}

		public static function drawDropdown($class, $id, $label, $choices, $modifier) {
			echo static::getDropdown($class, $id, $label, $choices, $modifier);
		}

		public static function getInput($type, $id, $label, $class = null) {
			$html = '
				<div class="'.$class ? sanitize_html_class($class)."_form_element " : ''.'form_element">
					<input type="'.esc_attr($type).'" id="'.esc_attr($id).'" />
					<label for="'.esc_attr($id).'">'.$label.'</label>
				</div>
			';
			return $html;
		}

		public static function drawInput($type, $id, $label, $class) {
			echo static::getInput($type, $id, $label, $class);
		}

		public static function getTextarea($type, $id, $label) {
			$id = esc_attr($id);
			$html = '
				<div class="form_element">
					<textarea id="'.$id.'"></textarea>
					<label for="'.$id.'">'.$label.'</label>
				</div>
			';
			return $html;
		}

		public static function drawTextarea($type, $id, $label) {
			echo static::getTextarea($type, $id, $label);
		}

		public static function getChoices($type, $items) {
			$html = '<div class="form_element">';
			foreach ($items as $id => $value) {
				$id = esc_attr($id);
				$html .= '
					<label for="'.$name.'">
						<input type="'.esc_attr($type).'" name="'.$id.'" id="'.$id.'" value="'.esc_attr($value).'">
						<span class="'.sanitize_html_class($type).'_label">'.$value.'</span>
					</label>
				';
			}
			$html .= '</div>';
			return $html;
		}

		public static function drawChoices($type, $items) {
			echo static::getChoices($type, $items);
		}

		/**
		 * Detects if this is an external link and adds target="_blank" accordingly
		 */
		public static function getHref($url) {
			$html = 'href="'.esc_url($url).'"';
			if (false === strpos($url, get_site_url())) {
				$html .= ' target="_blank"';
			}
			return $html;
		}

		public static function drawHref($url) {
			echo static::getHref($url);
		}

		public static function getDomain() {
			return esc_url($_SERVER['HTTP_HOST']);
		}

		public static function drawDomain() {
			static::getDomain();
		}

		public static function getRelatedPostsArray($type, $taxonomy, $tags, $to_return) {
			$posts = get_posts([
				'posts_per_page' => -1,
				'post_type' => $type,
				'post_status' => 'publish',
				'tax_query' => [
					[
						'taxonomy' => $taxonomy,
						'field' => 'term_id',
						'terms' => $tags
					]
				]
			]);
			$relevance_array = [];
			foreach ($posts as $post) {
				$post_tags = wp_get_post_terms($post->ID, $taxonomy);
				$relevance = 0;
				foreach ($post_tags as $tag) {
					if (in_array($tag->term_id, $tags)) {
						$relevance++;
					}
				}
				$relevance_array[] = $relevance;
			}
			array_multisort($relevance_array, SORT_DESC, $posts);
			return array_slice($posts, 0, $to_return);
		}

		public static function getParsedMenuArray($menu, $levels = 1, $parent = 0) {
			if (is_array($menu)) {
				$parsed_menu = [];
				foreach ($menu as $post) {
					if ($post->menu_item_parent == $parent) {
						if ($levels - 1) {
							$post->children = static::getParsedMenuArray($menu, $levels - 1, $post->ID);
						}
						$parsed_menu[] = $post;
					}
				}
				return $parsed_menu;
			}
		}

		public static function getPaginationArray($current_page, $pages, $max_to_show = 10) {
			if (0 == $pages) {
				$pages = 1;
			}

			if (10 != $max_to_show && 0 == $max_to_show % 2) {
				$max_to_show++;
			}

			// Figure out what previous and next buttons should do.
			if (1 == $current_page) {
				$prev_page = 1;
			} else {
				$prev_page = $current_page - 1;
			}

			if ($current_page == $pages) {
				$next_page = $pages;
			} else {
				$next_page = $current_page + 1;
			}

			// If we have less than the max pages, just draw them all.
			if ($pages <= $max_to_show) {
				$start_page = 1;
				$end_page = $pages;
			// Otherwise we need to figure out where we are...
			} else {
				$ceil_point = ceil($max_to_show / 2);
				$floor_point = floor($max_to_show / 2);

				if ($current_page <= $ceil_point) {
					$start_page = 1;
					$end_page = $max_to_show;
				} else if ($current_page >= ($pages - $floor_point)) {
					$start_page = $pages - $max_to_show - 1 + $floor_point;
					$end_page = $pages;
				} else {
					$start_page = $current_page - $floor_point;
					$end_page = $current_page + $floor_point;
				}
			}
			return range($start_page, $end_page);
		}

		public static function getImage($attachment_id, $class, $size = 'square_thumb', $icon = false, $attr = '') {
			$image = wp_get_attachment_image_src($attachment_id, $size, $icon);
			if ($image) {
				list($src, $width, $height) = $image;
				$hwstring = image_hwstring($width, $height);
				$size_class = $size;
				if (is_array($size_class)) {
					$size_class = join('x', $size_class);
				}
				$attachment = get_post($attachment_id);
				$default_attr = [
					'src'   => $src,
					'class' => $class.'_image attachment_'.sanitize_html_class($size_class)." size_$size_class",
					'alt'   => static::getImageAlt($attachment_id),
				];
				$attr = wp_parse_args($attr, $default_attr);
				$attr = apply_filters('wp_get_attachment_image_attributes', $attr, $attachment, $size);
				$attr = array_map('esc_attr', $attr);
				$html = rtrim("<img $hwstring");
				foreach ($attr as $name => $value) {
					$html .= " $name=\"$value\"";
				}
				$html .= ' />';
				return $html;
			}
		}

		public static function drawImage($attachment_id, $class, $size = 'square_thumb', $icon = false, $attr = '') {
			echo static::getImage($attachment_id, $class, $size, $icon, $attr);
		}

		public static function getPicture($image, $class = 'media', $sources = ['1220px' => 'wide-med', '500px' => 'wide-sml'], $fallback = null) {
			$html = '';
			if (!$fallback) {
				$fallback = array_pop($sources);
			}

			$html .= '
			<picture class="'.$class.'_picture">
				<!--[if IE 9]><video style="display: none;"><![endif]-->
			';
			foreach ($sources as $key => $value) {
				$html .= '<source media="(min-width: '.$key.')" srcset="'.static::getImageSrc($image, $value).'">';
			}

			$html .= static::getImage($image, $class, $fallback);
			$html .= '</picture>';
			return $html;
		}

		public static function drawPicture($image, $class = 'media', $sources = ['1220px' => 'wide-med', '500px' => 'wide-sml'], $fallback = null) {
			echo static::getPicture($image, $class, $sources, $fallback);
		}

		public static function getImageSrc($image, $name) {
			if (is_array($image) && isset($image['sizes']) && isset($image['sizes'][$name])) {
				$img = [$image['sizes'][$name]];
			} else {
				$img = wp_get_attachment_image_src($image, $name);
			}
			$url = $img ? $img[0] : "";
			return $url;
		}

		public static function getImageAlt($attachment_id) {
			$alt_text = trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)));
			return $alt_text;
		}

		public static function getImageBackground($class, $attachment_id, $sources, $include_js_class = true, $lazy = true, $lazyEdge = 100) {
			$source_array = [];

			foreach ($sources as $breakpoint => $prefix) {
				$source_array[$breakpoint] = static::getImageSrc($attachment_id, $prefix);
			}

			$options = json_encode([
				'source' => $source_array,
				'lazy' => $lazy ? 'true' : 'false',
				'lazyEdge' => (string) $lazyEdge
			]);

			$classes = [];
			$classes[] = "$class\_background";
			if ($include_js_class) {
				$classes[] = 'js-background';
			}
			$html = '<div class="'.implode($classes, " ").'" data-background-options="'.$options.'"></div>';

		}

		public static function drawImageBackground($class, $attachment_id, $sources, $include_js_class = true, $lazy = true, $lazyEdge = 100) {
			static::getImageBackground($class, $attachment_id, $sources, $include_js_class, $lazy, $lazyEdge);
		}

		public static function getVideoBackground($class, $source, $poster, $include_js_class = true, $autoplay = false, $loop = false, $mute = false, $embedRatio = 1.777777, $lazy = false, $lazyEdge = 100) {

			$options = json_encode([
				'source' => ['poster' => $poster, 'video' => esc_attr($source)],
				'autoPlay' => $autoplay ? 'true' : 'false',
				'embedRatio' => (string) $embedRatio,
				'lazy' => $lazy ? 'true' : 'false',
				'lazyEdge' => (string) $lazyEdge,
				'loop' => $loop ? 'true' : 'false',
				'mute' => $mute ? 'true' : 'false'
			]);

			$classes = [];
			$classes[] = "$class\_background";
			if ($include_js_class) {
				$classes[] = 'js-background';
			}
			$html = '<div class="'.implode($classes, " ").'" data-background-options="'.$options.'"></div>';
			return $html;
		}

		public static function drawVideoBackground($class, $source, $poster, $include_js_class = true, $autoplay = false, $loop = false, $mute = false, $embedRatio = 1.777777, $lazy = false, $lazyEdge = 100) {
			echo static::getVideoBackground($class, $source, $poster, $include_js_class, $autoplay, $loop, $mute, $embedRatio, $lazy, $lazyEdge);
		}

		// Define macro function for using our SVG symbols.
		public static function getSymbol($id, $modifier = '') {
			$classes = [];
			$classes[] = "symbol symbol_$id";
			if ('' !== $modifier) {
				$classes[] = "symbol_$modifier";
			}
			$html = '
				<svg class="'.implode($classes, ' ').'">
					<use xlink:href="#'.$id.'"></use>
				</svg>
			';
			return $html;
		}
		public static function drawSymbol($id, $modifier = '') {
			echo static::getSymbol($id, $modifier);
		}

		public static function getLink($url, $label, $class, $inner_wrapper_before = '', $inner_wrapper_after = '', $attr = []) {
			$html = "<a";
			$class = $class;
			if (is_array($class)) {
				$attr['class'] = implode(' ', array_map('sanitize_html_class', $class));
			} else {
				$attr['class'] = sanitize_html_class($class);
			}
			$attr['href'] = esc_url($url);
			if (false === strpos($url, get_site_url())) {
				$attr['target'] = '_blank';
			}
			foreach ($attr as $key => $value) {
				$html .= " $key='$value'";
			}
			$html .= ">$inner_wrapper_before".esc_html__($label)."$inner_wrapper_after</a>";
			return $html;
		}

		public static function drawLink($url, $label, $class, $inner_wrapper_before = '', $inner_wrapper_after = '', $attr = []) {
			echo static::getLink($url, $label, $class, $inner_wrapper_before, $inner_wrapper_after, $attr);
		}
	}
