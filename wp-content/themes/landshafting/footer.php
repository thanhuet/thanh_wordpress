<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 * @subpackage Landshafting
 * @author ayatemplates
 * @since Landshafting 1.0.0
 *
 */
?>
			<a href="#" class="scrollup"></a>

			<footer id="footer-main">

				<div id="footer-content-wrapper">

					<?php get_sidebar('footer'); ?>

					<div class="clear">
					</div>

					<div id="copyright">

						<p>
						 <?php landshafting_show_copyright_text(); ?> <a href="<?php echo esc_url( 'https://ayatemplates.com/product/landshafting' ); ?>" title="<?php esc_attr_e( 'landshafting Theme', 'landshafting' ); ?>">
							<?php _e('Landshafting Theme', 'landshafting'); ?></a> <?php esc_attr_e( 'powered by', 'landshafting' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'WordPress', 'landshafting' ); ?>">
							<?php _e('WordPress', 'landshafting'); ?></a>
						</p>
						
					</div><!-- #copyright -->

				</div><!-- #footer-content-wrapper -->

			</footer><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>