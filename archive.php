<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForeFront_Starter
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
	<header class="page-header">
		<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
		<?php the_archive_description('<div class="archive-description">', '</div>'); ?>
	</header>
	<?php while(have_posts()) : the_post(); ?>
		<?php get_template_part('template-parts/content', get_post_type()); ?>
	<?php endwhile; ?>
	<?php the_posts_navigation(); ?>
<?php else : ?>
	<?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>
<?php get_footer();
