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
		/**
		 * Draw the flexible content modules/callouts.
		 *
		 * @param array  $callouts Modules get_field() returns.
		 * @param string $slug     Valid URL address.
		 * @param int    $post_id  ID from $post->ID.
		 * @since 1.0.0
		 */
		public static function drawCallouts($callouts, $slug, $post_id) {
			if (is_array($callouts) && count($callouts)) {
				$base = get_template_directory();
				foreach ($callouts as $callout) {
					include "$base/template-parts/components/$slug/".str_replace('_', '-', $callout['acf_fc_layout']).'.php';
				}
			}
		}

		/**
		 * Draw the logo.
		 *
		 * @param string $modifier CSS class suffix.
		 * @param string $symbol   Symbol slug.
		 * @since 1.0.0
		 */
		public static function drawLogo($modifier, $symbol) {
			include get_template_directory().'/template-parts/partials/logo.php';
		}

		/**
		 * Draw the basic navigation.
		 *
		 * @param string $menu_name Menu name in admin.
		 * @param string $class     CSS class.
		 * @param string $title     Optional. Screen reader title.
		 * @param string $modifier  Optional. CSS class suffix.
		 * @since 1.0.0
		 */
		public static function drawBasicNav($menu_name, $class, $title = false, $modifier = false) {
			include get_template_directory().'/template-parts/partials/navigation/basic.php';
		}

		/**
		 * Draw the main navigation.
		 *
		 * @param string $menu_name Optional. Menu name in admin.
		 * @param string $title     Optional. Screen reader title.
		 * @param string $modifier  Optional. CSS class suffix.
		 * @since 1.0.0
		 */
		public static function drawMainNav($menu_name = 'Main Navigation', $title = 'Main Navigation', $modifier = false) {
			include get_template_directory().'/template-parts/partials/navigation/main.php';
		}

		/**
		 * Draw the sub navigation.
		 *
		 * This dynamically displays all children and grandchildren of the current
		 * page.
		 *
		 * @param string $menu_name Optional. Menu name in admin.
		 * @since 1.0.0
		 */
		public static function drawSubNav($menu_name = 'Main Navigation') {
			include get_template_directory().'/template-parts/partials/navigation/sub.php';
		}

		/**
		 * Draw the social navigation.
		 *
		 * Draws the social icons by turning the menu item title into the symbol's
		 * slug.
		 *
		 * @param string $menu_name Optional. Menu name in admin.
		 * @param string $title     Optional. Screen reader title.
		 * @param string $modifier  Optional. CSS class suffix.
		 * @since 1.0.0
		 */
		public static function drawSocialNav($menu_name = 'Social Navigation', $title = 'Social Navigation', $modifier = false) {
			include get_template_directory().'/template-parts/partials/navigation/social.php';
		}

		/**
		 * Draw the search page.
		 *
		 * @since 1.0.0
		 */
		public static function drawSearch() {
			static::drawGoogleCSE();
			static::drawPagination();
		}

		/**
		 * Draw the search form.
		 *
		 * @param string $placeholder  Optional. Placeholder text.
		 * @param string $button_label Optional. Button label text.
		 * @param string $modifier     Optional. CSS class suffix.
		 * @since 1.0.0
		 */
		public static function drawSearchForm($placeholder = 'Search', $button_label = 'Submit', $modifier = false) {
			include get_template_directory().'/template-parts/partials/search.php';
		}

		/**
		 * Draw the Google CSE form.
		 *
		 * @since 1.0.0
		 */
		public static function drawGoogleCSE() {
			include get_template_directory().'/template-parts/partials/google-cse.php';
		}

		/**
		 * Draw the pagination.
		 *
		 * @since 1.0.0
		 */
		public static function drawPagination() {
			include get_template_directory().'/template-parts/partials/pagination.php';
		}

		/**
		 * Draw the breadcrumbs.
		 *
		 * @since 1.0.0
		 */
		public static function drawBreadcrumb($modifier = false) {
			include get_template_directory().'/template-parts/partials/navigation/breadcrumb.php';
		}

		/**
		 * Draw the address from the theme customizer.
		 *
		 * @since 1.0.0
		 */
		public static function drawAddress() {
			include get_template_directory().'/template-parts/partials/address.php';
		}

		/**
		 * Draw the blog listing.
		 *
		 * @global array $post
		 * @since 1.0.0
		 */
		public static function drawBlogListing() {
			global $post;
			include get_template_directory().'/template-parts/components/full-width/blog-list.php';
			static::drawPagination();
		}

		/**
		 * Draw the archive listing.
		 *
		 * @global array $post
		 * @since 1.0.0
		 */
		public static function drawArchiveListing() {
			global $post;
			include get_template_directory().'/template-parts/components/full-width/archive-list.php';
			static::drawPagination();
		}

		/**
		 * Draw the 404 Not Found page.
		 *
		 * @since 1.0.0
		 */
		public static function draw404Page($label, $title, $description = false, $links = false, $background = false, $theme = false) {
			include get_template_directory().'/template-parts/components/full-width/flexible-callout.php';
		}

		/**
		 * Draw the SVG sprite of the symbols.
		 *
		 * @since 1.0.0
		 */
		public static function drawSymbolSprite() {
			echo '<figure style="display: none;">';
			include get_template_directory().'/images/icons.svg';
			echo '</figure>';
		}

		/**
		 * Return WYSIWYG content.
		 *
		 * Wrap the WYSIWYG content in the standard typography wrapper.
		 *
		 * @param string $content WYSIWYG content.
		 * @return string WYSIWYG markup.
		 * @since 1.0.0
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

		/**
		 * Draw WYSIWYG content.
		 *
		 * Wrap the WYSIWYG content in the standard typography wrapper.
		 *
		 * @see getWYSIWYG()
		 * @since 1.0.0
		 */
		public static function drawWYSIWYG($content) {
			echo static::getWYSIWYG($content);
		}

		/**
		 * Return an HTML table.
		 *
		 * @param string $class   Table class.
		 * @param array  $headers Table headers.
		 * @param array  $rows    Table rows. Nested like:
		 *                        [["Row1", "Row2"], ["Row1", "Row2"]]
		 * @return string Table markup.
		 * @since 1.0.0
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

		/**
		 * Draw an HTML table.
		 *
		 * @see getTable()
		 * @since 1.0.0
		 */
		public static function drawTable($class, $headers, $rows) {
			echo static::getTable($class, $headers, $rows);
		}

		/**
		 * Return a button link.
		 *
		 * @param string $class  HTML class prefix.
		 * @param string $link   Valid URL address.
		 * @param string $label  Button label.
		 * @param string $symbol Optional. Button symbol ID.
		 * @return string Button markup.
		 * @since 1.0.0
		 */
		public static function getButton($class, $link, $label, $symbol = '') {
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

		/**
		 * Draw a button link.
		 *
		 * @see getButton()
		 * @since 1.0.0
		 */
		public static function drawButton($class, $link, $label, $symbol = '') {
			echo static::getButton($class, $link, $label, $symbol);
		}

		/**
		 * Return a dropdown.
		 *
		 * @param string $class    HTML class prefix.
		 * @param string $id       ID prefix.
		 * @param string $label    Form label.
		 * @param array  $choices {
		 *     An array of inputs.
		 *
		 *     @type string $dropdown_value
		 *     @type string $dropdown_label
		 * }
		 * @param string $modifier Optional. CSS class suffix.
		 * @return string Dropdown markup.
		 * @since 1.0.0
		 */
		public static function getDropdown($class, $id, $label, $choices, $modifier = false) {
			$html = '<div class="fs-dropdown-wrapper '.$class.'_dropdown_wrapper'.(false !== $modifier) ? "$class\_dropdown_wrapper_$modifier".'">' : '';
			if ($label) {
				$html .= '<label class="'.$class.'_label" for="'.$id.'_dropdown">'.$label.'</label>';
			}
			$html .= '<select class="js-dropdown '.$class.'_dropdown" id="'.$id.'_dropdown" name="'.$id.'_dropdown">';
			foreach ($choices as $dropdown_value => $dropdown_label) {
				$html .= '<option value="'.$dropdown_value.'">'.$dropdown_label.'</option>';
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

		/**
		 * Draw a dropdown.
		 *
		 * @see getDropdown()
		 * @since 1.0.0
		 */
		public static function drawDropdown($class, $id, $label, $choices, $modifier = false) {
			echo static::getDropdown($class, $id, $label, $choices, $modifier);
		}

		/**
		 * Return a input.
		 *
		 * @param string $type  HTML class prefix.
		 * @param string $id    HTML ID.
		 * @param string $label Form label.
		 * @param string $class Optional. HTML class prefix.
		 * @return string Input markup.
		 * @since 1.0.0
		 */
		public static function getInput($type, $id, $label, $class = false) {
			$html = '
				<div class="'.(false !== $class) ? sanitize_html_class($class)."_form_element " : ''.'form_element">
					<input type="'.esc_attr($type).'" id="'.esc_attr($id).'" />
					<label for="'.esc_attr($id).'">'.$label.'</label>
				</div>
			';
			return $html;
		}

		/**
		 * Draw a input.
		 *
		 * @see getInput()
		 * @since 1.0.0
		 */
		public static function drawInput($type, $id, $label, $class = false) {
			echo static::getInput($type, $id, $label, $class);
		}

		/**
		 * Return a textarea.
		 *
		 * @param  string $type  HTML class prefix.
		 * @param  string $id    HTML ID.
		 * @param  string $label Form label.
		 * @return string Textarea markup.
		 * @since 1.0.0
		 */
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

		/**
		 * Draw a textarea.
		 *
		 * @see getTextarea()
		 * @since 1.0.0
		 */
		public static function drawTextarea($type, $id, $label) {
			echo static::getTextarea($type, $id, $label);
		}

		/**
		 * Return multiple inputs.
		 *
		 * @param string $type  Input type.
		 * @param array  $items {
		 *     An array of inputs.
		 *
		 *     @type string $input_id
		 *     @type string $input_value
		 * }
		 * @return string Input markup.
		 * @since 1.0.0
		 */
		public static function getChoices($type, $items) {
			$html = '<div class="form_element">';
			foreach ($items as $id => $value) {
				$id = esc_attr($id);
				$html .= '
					<label for="'.$id.'">
						<input type="'.esc_attr($type).'" name="'.$id.'" id="'.$id.'" value="'.esc_attr($value).'">
						<span class="'.sanitize_html_class($type).'_label">'.$value.'</span>
					</label>
				';
			}
			$html .= '</div>';
			return $html;
		}

		/**
		 * Draw multiple inputs.
		 *
		 * @see getChoices()
		 * @since 1.0.0
		 */
		public static function drawChoices($type, $items) {
			echo static::getChoices($type, $items);
		}

		/**
		 * Detects if this is an external link & add target="_blank" accordingly.
		 *
		 * @param string $url Hyperlink.
		 * @return string HTML href markup.
		 * @since 1.0.0
		 */
		public static function getHref($url) {
			$html = 'href="'.esc_url($url).'"';
			if (false === strpos($url, get_site_url())) {
				$html .= ' target="_blank"';
			}
			return $html;
		}

		/**
		 * Detects if this is an external link & echo target="_blank" accordingly.
		 *
		 * @see getHref()
		 * @since 1.0.0
		 */
		public static function drawHref($url) {
			echo static::getHref($url);
		}

		/**
		 * Return related posts.
		 *
		 * Get posts based on other posts of the same type with taxonomies and
		 * tags that are like the current one.
		 *
		 * @param string       $type      Post type.
		 * @param string|array $taxonomy  Accepts the ID of a taxonomy or an array
		 *                                of multiple taxonomies.
		 * @param string|array $tags      Accepts the ID of a tags or an array of
		 *                                multiple tags.
		 * @param int          $to_return Number of related posts to return.
		 * @return array Input markup.
		 * @since 1.0.0
		 */
		public static function getRelatedPostsArray($type, $taxonomies, $tags, $to_return) {
			$posts = get_posts([
				'posts_per_page' => -1,
				'post_type' => $type,
				'post_status' => 'publish',
				'tax_query' => [
					[
						'taxonomy' => $taxonomies,
						'field' => 'term_id',
						'terms' => $tags
					]
				]
			]);
			$relevance_array = [];
			foreach ($posts as $post) {
				$post_tags = wp_get_post_terms($post->ID, $taxonomies);
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

		/**
		 * Return a parsed menu.
		 *
		 * @param bool|array $menu   Array of menu items, otherwise false.
		 * @param int        $levels Menu depth.
		 * @param int        $parent Parent page ID to use as a base for the menu.
		 * @return array Menu array.
		 * @since 1.0.0
		 */
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

		/**
		 * Return a parsed menu.
		 *
		 * @param int $current_page    Array of menu items, otherwise false.
		 * @param int $total_num_pages Total number of pages.
		 * @param int $max_to_show     Maximum number of page numbers to paginate
		 *                             at one time.
		 * @return array Pagination array.
		 * @since 1.0.0
		 */
		public static function getPaginationArray($current_page, $total_num_pages, $max_to_show = 9) {
			if (0 === $total_num_pages) {
				$total_num_pages = 1;
			}

			if (10 !== $max_to_show && 0 === $max_to_show % 2) {
				$max_to_show++;
			}

			// Figure out what previous and next buttons should do.
			if (1 === $current_page) {
				$prev_page = 1;
			} else {
				$prev_page = $current_page - 1;
			}

			if ($total_num_pages === $current_page) {
				$next_page = $total_num_pages;
			} else {
				$next_page = $current_page + 1;
			}

			// If we have less than the max pages, just draw them all.
			if ($total_num_pages <= $max_to_show) {
				$start_page = 1;
				$end_page = $total_num_pages;
			// Otherwise we need to figure out where we are...
			} else {
				$ceil_point = ceil($max_to_show / 2);
				$floor_point = floor($max_to_show / 2);

				if ($current_page <= $ceil_point) {
					$start_page = 1;
					$end_page = $max_to_show;
				} elseif ($current_page >= ($total_num_pages - $floor_point)) {
					$start_page = $total_num_pages - $max_to_show - 1 + $floor_point;
					$end_page = $total_num_pages;
				} else {
					$start_page = $current_page - $floor_point;
					$end_page = $current_page + $floor_point;
				}
			}
			return range($start_page, $end_page);
		}

		/**
		 * Return image markup.
		 *
		 * @param int          $attachment_id The attachment ID of the image.
		 * @param string       $class         Class prefix.
		 * @param string|array $size          Image size identifier(s).
		 * @param bool         $icon          Whether the image should be treated
		 *                                    as an icon.
		 * @param string       $attr          HTML attributes.
		 * @return string Image markup.
		 * @since 1.0.0
		 */
		public static function getImage($attachment_id, $class, $size = 'square_thumb', $icon = false, $attr = []) {
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

		/**
		 * Draw image markup.
		 *
		 * @see getImage()
		 * @since 1.0.0
		 */
		public static function drawImage($attachment_id, $class, $size = 'square_thumb', $icon = false, $attr = '') {
			echo static::getImage($attachment_id, $class, $size, $icon, $attr);
		}

		/**
		 * Return picture markup.
		 *
		 * @param int          $attachment_id The attachment ID of the image.
		 * @param string       $class         Optional. Class prefix.
		 * @param array        $sources {
		 *     Optional. Accepts ID of a taxonomy or array of multiple taxonomies.
		 *
		 *     @type string $image_size Image size (e.g. 1220px).
		 *     @type string $image_size_id Image size identifier.
		 * }
		 * @param string|array $fallback      Optional. Image size identifier(s).
		 * @return string Picture markup.
		 * @since 1.0.0
		 */
		public static function getPicture($image, $class = 'media', $sources = ['1220px' => 'wide-med', '500px' => 'wide-sml'], $fallback = null) {
			if (!$fallback) {
				$fallback = array_pop($sources);
			}

			$html = '
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

		/**
		 * Draw picture markup.
		 *
		 * @see getPicture()
		 * @since 1.0.0
		 */
		public static function drawPicture($image, $class = 'media', $sources = ['1220px' => 'wide-med', '500px' => 'wide-sml'], $fallback = null) {
			echo static::getPicture($image, $class, $sources, $fallback);
		}

		/**
		 * Return image URL.
		 *
		 * @param array|int $image The attachment ID of the image or image array
		 *                         object.
		 * @param string    $name  Image size identifier.
		 * @return string Image URL.
		 * @since 1.0.0
		 */
		public static function getImageSrc($image, $name) {
			if (is_array($image) && isset($image['sizes']) && isset($image['sizes'][$name])) {
				$img = [$image['sizes'][$name]];
			} else {
				$img = wp_get_attachment_image_src($image, $name);
			}
			$url = $img ? $img[0] : '';
			return $url;
		}

		/**
		 * Return alternate image text.
		 *
		 * @param int $attachment_id The attachment ID of the image.
		 * @return string Alternate image text.
		 * @since 1.0.0
		 */
		public static function getImageAlt($attachment_id) {
			return trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)));
		}

		/**
		 * Return background image markup.
		 *
		 * @param string       $class         Class prefix.
		 * @param int          $attachment_id The attachment ID of the image.
		 * @param array        $sources {
		 *     Accepts the ID of a taxonomy or an array of multiple taxonomies.
		 *
		 *     @type string $image_size Image size (e.g. 1220px).
		 *     @type string $image_size_id Image size identifier.
		 * }
		 * @param bool $include_js_class      Optional. Add js-background class.
		 * @param bool $lazy                  Optional. Lazy load with scroll.
		 * @param int  $lazy_edge             Optional. Lazy edge.
		 * @return string Image background markup.
		 * @since 1.0.0
		 */
		public static function getImageBackground($class, $attachment_id, $sources, $include_js_class = true, $lazy = true, $lazy_edge = 100) {
			$source_array = [];

			foreach ($sources as $breakpoint => $prefix) {
				$source_array[$breakpoint] = static::getImageSrc($attachment_id, $prefix);
			}

			$options = json_encode([
				'source' => $source_array,
				'lazy' => $lazy ? 'true' : 'false',
				'lazyEdge' => (string) $lazy_edge
			]);

			$classes = [];
			$classes[] = $class.'_background';
			if ($include_js_class) {
				$classes[] = 'js-background';
			}
			$html = '<div class="'.implode($classes, " ").'" data-background-options=\''.$options."'></div>";

			return $html;
		}

		/**
		 * Draw background image markup.
		 *
		 * @see getImageBackground()
		 * @since 1.0.0
		 */
		public static function drawImageBackground($class, $attachment_id, $sources, $include_js_class = true, $lazy = true, $lazy_edge = 100) {
			echo static::getImageBackground($class, $attachment_id, $sources, $include_js_class, $lazy, $lazy_edge);
		}

		/**
		 * Return background image markup.
		 *
		 * @param string       $class         Class prefix.
		 * @param int          $attachment_id The attachment ID of the image.
		 * @param array        $sources {
		 *     Accepts the ID of a taxonomy or an array of multiple taxonomies.
		 *
		 *     @type string $image_size Image size (e.g. 1220px).
		 *     @type string $image_size_id Image size identifier.
		 * }
		 * @param bool $include_js_class      Optional. Add js-background class.
		 * @param bool $lazy                  Optional. Lazy load with scroll.
		 * @param int  $lazy_edge             Optional. Lazy edge.
		 * @return string Image background markup.
		 * @since 1.0.0
		 */
		public static function getVideoBackground($class, $source, $poster, $include_js_class = true, $autoplay = false, $loop = false, $mute = false, $embedRatio = 1.777777, $lazy = false, $lazy_edge = 100) {

			$options = json_encode([
				'source' => ['poster' => $poster, 'video' => esc_attr($source)],
				'autoPlay' => $autoplay ? 'true' : 'false',
				'embedRatio' => (string) $embedRatio,
				'lazy' => $lazy ? 'true' : 'false',
				'lazyEdge' => (string) $lazy_edge,
				'loop' => $loop ? 'true' : 'false',
				'mute' => $mute ? 'true' : 'false'
			]);

			$classes = [];
			$classes[] = $class.'_background';
			if ($include_js_class) {
				$classes[] = 'js-background';
			}
			$html = '<div class="'.implode($classes, " ").'" data-background-options=\''.$options."'></div>";
			return $html;
		}

		/**
		 * Draw background image markup.
		 *
		 * @see getImageBackground()
		 * @since 1.0.0
		 */
		public static function drawVideoBackground($class, $source, $poster, $include_js_class = true, $autoplay = false, $loop = false, $mute = false, $embedRatio = 1.777777, $lazy = false, $lazy_edge = 100) {
			echo static::getVideoBackground($class, $source, $poster, $include_js_class, $autoplay, $loop, $mute, $embedRatio, $lazy, $lazy_edge);
		}

		/**
		 * Return SVG symbol markup.
		 *
		 * @param string $id       Symbol identifier.
		 * @param string $modifier Optional. Class suffix.
		 * @return string SVG symbol markup.
		 * @since 1.0.0
		 */
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

		/**
		 * Draw SVG symbol markup.
		 *
		 * @see getSymbol()
		 * @since 1.0.0
		 */
		public static function drawSymbol($id, $modifier = '') {
			echo static::getSymbol($id, $modifier);
		}

		/**
		 * Return a hyperlink.
		 *
		 * @param string $url                  Hyperlink URL.
		 * @param string $label                Hyperlink text.
		 * @param string $class                Class suffix.
		 * @param string $inner_wrapper_before Optional. Inside wrapper beginning.
		 * @param string $inner_wrapper_after  Optional. Inside wrapper end.
		 * @param array  $attr                 Optional. HTML attributes.
		 * @return string Hyperlink markup.
		 * @since 1.0.0
		 */
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

		/**
		 * Draw a hyperlink.
		 *
		 * @see getLink()
		 * @since 1.0.0
		 */
		public static function drawLink($url, $label, $class, $inner_wrapper_before = '', $inner_wrapper_after = '', $attr = []) {
			echo static::getLink($url, $label, $class, $inner_wrapper_before, $inner_wrapper_after, $attr);
		}
	}
