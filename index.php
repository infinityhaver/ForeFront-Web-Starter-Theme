<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForeFront_Starter
 */
$i = 1;
get_header();?>
<?php if(is_home()) { ?>
	<div class="section-wrap">
		<div class="inner">
			<div class="blog-wrap">
				<div class="blog-facets">
					<?php echo facetwp_display('facet', 'search'); ?>
					<div class="blog-facet">
						<h6>
							Categories
						</h6>
						<?php echo facetwp_display('facet', 'categories'); ?>
					</div>
					<div class="blog-facet">
						<h6>
							Tags
						</h6>
						<?php echo facetwp_display('facet', 'tags'); ?>
					</div>
				</div>
				<div class="blogs-container">
					<?php if(have_posts()) : ?>
						<div class="blogs">
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
								<div id="blog-<?php echo $id; ?>" class="blog" data-aos="zoom-in-up">
									<div class="image-wrap" style="background: url('<?php echo $image; ?>');">
										<div class="overlay">
											<a href="<?php the_permalink(); ?>">
												<div class="excerpt">
													<?php the_excerpt(); ?>
												</div>
											</a>
										</div>
									</div>
									<div class="blog-bottom">
										<h4>
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h4>
										<div class="author">
											By <?php echo $author_first_name; ?> <?php echo $author_last_name; ?>
										</div>
										<div class="blog-date">
											Posted on <?php echo $date; ?> at <?php echo $time; ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php else : ?>
						<?php get_template_part('template-parts/content', 'none'); ?>
					<?php endif; ?>
					<?php echo facetwp_display('facet', 'load_more'); ?>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="section-wrap">
		<div class="inner">
			<main id="primary" class="site-main">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<?php get_template_part('template-parts/content', get_post_type()); ?>
					<?php endwhile; ?>
					<?php the_posts_navigation(); ?>
				<?php else : ?>
					<?php get_template_part('template-parts/content', 'none'); ?>
				<?php endif; ?>
			</main>
		</div>
	</div>
<?php } ?>
<?php get_footer();
