<?php
	/**
	 * Footer
	 *
	 * @author Fastspot
	 * @package WordPress
	 * @subpackage Boilerplate
	 * @since 1.0.0
	 * @version 1.0.0
	 */

	// Everything is stored in our namespace.
	namespace Boilerplate;
?>
			<footer class="footer" id="footer" itemscope itemtype="http://schema.org/WPFooter">
				<div class="footer_ribbon">
					<div class="fs-row">
						<div class="fs-cell">
							<?php
								Boilerplate::drawAddress();
								Boilerplate::drawBasicNav('Footer Navigation', 'footer_nav', 'Footer Navigation');
								Boilerplate::drawSocialNav();
							?>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- END: page_wrapper -->
		<div class="js-navigation mobile_sidebar" id="mobile_sidebar" hidden data-navigation-handle=".js-nav_handle" data-navigation-content=".js-navigation_push" data-navigation-options='{"type": "overlay", "gravity": "right"}'>
			<?php
				Boilerplate::drawMainNav('Main Navigation', 'Main Navigation', 'sm');
				Boilerplate::drawBasicNav('Secondary Navigation', 'secondary_nav', 'Secondary Navigation', 'sm');
			?>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
