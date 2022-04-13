<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ForeFront_Starter
 */

get_header(); ?>
<main id="primary" class="site-main">
	<?php if(have_posts()) : ?>
		<header class="page-header">
			<h1 class="page-title">
				<?php printf(esc_html__('Search Results for: %s', 'forefront-starter'), '<span>' . get_search_query() . '</span>'); ?>
			</h1>
		</header>
		<?php while(have_posts()) : the_post(); ?>
			<?php get_template_part('template-parts/content', 'search'); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<?php get_template_part('template-parts/content', 'none'); ?>
	<?php endif; ?>
</main>
<?php get_footer();