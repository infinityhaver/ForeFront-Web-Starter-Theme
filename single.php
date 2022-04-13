<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ForeFront_Starter
 */
get_header(); ?>
<div class="section-wrap">
	<div class="inner">
		<div class="acf-narrow">
			<main id="primary" class="site-main">
				<?php while(have_posts()) : the_post(); ?>
					<?php 
						$id 				= get_the_ID();
						$featured_image 	= get_the_post_thumbnail_url($id, 'full');
						$content 			= get_the_content();
						$clean_content 		= strip_tags($content);
						$short_content 		= substr($clean_content, 0, 150);
						$excerpt 			= get_the_excerpt();
						$clean_excerpt 		= strip_tags($excerpt);
						$short_excerpt 		= substr($clean_excerpt, 0, 10);
						$author_first_name 	= get_the_author_meta('first_name');
						$author_last_name 	= get_the_author_meta('last_name');
						$date 				= get_the_date( 'F j, Y' );
						$time 				= get_the_time( 'g:i a' );
						if($featured_image) { 
							$image 			= $featured_image;
						} else {
							$image 			= get_template_directory_uri() . '/img/placeholder.png';
						}
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php if(is_singular()) : ?>
								<h1 class="entry-title">
									<?php the_title(); ?>
								</h1>
							<?php else : ?>
								<h2 class="entry-title">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
							<?php endif; ?>
						</header>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</article>
					<?php if(comments_open() || get_comments_number()) : ?>
						<?php comments_template(); ?>
					<?php endif; ?>
				<?php endwhile; ?> 
			</main>
		</div>
	</div>
</div>
<?php get_footer();
