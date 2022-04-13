<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForeFront_Starter
 */

?>
<div class="section-wrap">
	<div class="inner">
		<section class="no-results not-found">
			<header class="page-header">
				<h1 class="page-title" data-aos="zoom-in-up">
					Nothing Found
				</h1>
			</header>
			<div class="page-content" data-aos="zoom-in-up" data-aos-delay="200">
				<?php if(is_home() && current_user_can('publish_posts')) : ?>
					<?php 
						printf(
							'<p>' . wp_kses(
								__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'forefront-starter'),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							) . '</p>',
							esc_url(admin_url('post-new.php'))
						);
					?>
				<?php elseif(is_search()) : ?>
					<p>
						<?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'forefront-starter'); ?>
					</p>
					<?php get_search_form(); ?>
				<?php else : ?>
					<p>
						<?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'forefront-starter'); ?>
					</p>
					<?php get_search_form(); ?>
				<?php endif; ?>
			</div>
		</section>
	</div>
</div>
