<?php
/* Template Name: Gutenberg Page Template
 * The template for displaying special pages.
 *
 * This is the template that displays special pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ForeFront_Starter
 */
get_header(); ?>
<div class="section-wrap">
	<div class="inner">
		<?php while(have_posts()) : the_post(); ?>
			<?php global $template; ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php if(comments_open() || get_comments_number()) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer();