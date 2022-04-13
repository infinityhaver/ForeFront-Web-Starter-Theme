<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ForeFront_Starter
 */
	$copyright_text = get_field('copyright_text', 'options');
?>
		<footer class="site-footer">
			<div class="section-wrap">
				<div class="inner">
					<div class="ffw-widgets">
						<div class="ffw-widget" data-aos="zoom-in-up" data-aos-delay="100">
							<?php if(is_active_sidebar('footer-1')) : ?>
								<?php dynamic_sidebar('footer-1'); ?>
							<?php endif; ?>
						</div>
						<div class="ffw-widget" data-aos="zoom-in-up" data-aos-delay="150">
							<?php if(is_active_sidebar('footer-2')) : ?>
								<?php dynamic_sidebar('footer-2'); ?>
							<?php endif; ?>
						</div>
						<div class="ffw-widget" data-aos="zoom-in-up" data-aos-delay="200">
							<?php if(is_active_sidebar('footer-3')) : ?>
								<?php dynamic_sidebar('footer-3'); ?>
							<?php endif; ?>
						</div>
						<div class="ffw-widget" data-aos="zoom-in-up" data-aos-delay="250">
							<?php if(is_active_sidebar('footer-4')) : ?>
								<?php dynamic_sidebar('footer-4'); ?>
							<?php endif; ?>
						</div>
					</div>
					<?php echo do_shortcode('[social_nav]'); ?>
					<?php if($copyright_text) { ?>
						<div class="copyright-wrap" data-aos="zoom-in-up">
							<?php echo $copyright_text; ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</footer>
		<a href="#0" class="cd-top">Top</a>
		<?php wp_footer(); ?>
		<?php 
			include_once(ABSPATH . 'wp-admin/includes/plugin.php'); 
			if(is_plugin_active('advanced-custom-fields-pro/acf.php')) {
		?>
			<?php if(have_rows('footer_scripts', 'options')) : ?>
				<?php while(have_rows('footer_scripts', 'options' )) : the_row(); ?>
					<?php 
						$script = get_sub_field('script');
					?>
					<?php echo $script; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php } ?>
	</body>
</html>
