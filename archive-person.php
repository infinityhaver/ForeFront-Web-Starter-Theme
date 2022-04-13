<?php 
	$i = 1;
?>
<?php get_header(); ?>
<div class="section-wrap">
	<div class="inner">
		<?php if(have_posts()) : ?>
			<div class="people">
				<?php while(have_posts()) : the_post(); ?>
					<?php 
						$j 				= $i++;
						$id 			= get_the_ID();
						$featured_image = get_the_post_thumbnail_url($id, 'full');
						$position 		= get_field('position');
						$email 			= get_field('email');
						$phone 			= get_field('phone');
						$person_cats 	= get_the_terms($id, 'person_cat');
						$person_tags 	= get_the_terms($id, 'person_tag');
						$content 		= get_the_content();
						$clean_content 	= strip_tags($content);
						$short_content 	= substr($clean_content, 0, 150);
						$excerpt 		= get_the_excerpt();
						$clean_excerpt 	= strip_tags($excerpt);
						$short_excerpt 	= substr($clean_excerpt, 0, 10);
						if($featured_image) { 
							$image 		= $featured_image;
						} else {
							$image 		= get_template_directory_uri() . '/img/placeholder.png';
						}
					?>
					<div id="person-<?php echo $id; ?>" class="person" data-aos="zoom-in-up" data-aos-delay="<?php echo $j; ?>00">
						<div class="image-wrap" style="background: url('<?php echo $image; ?>');">
							<div class="overlay">
								<a data-fancybox data-src="#person-<?php echo $id; ?>-modal" href="javascript:;">
									<div class="excerpt">
										<?php the_excerpt(); ?>
									</div>
								</a>
							</div>
						</div>
						<div class="person-bottom">
							<h4>
								<a data-fancybox data-src="#person-<?php echo $id; ?>-modal" href="javascript:;">
									<?php the_title(); ?>
								</a>
							</h4>
						</div>
						<div id="person-<?php echo $id; ?>-modal" class="person-modal-wrap" style="display: none;">
							<div class="person-modal">
								<div class="modal-left">
									<div class="image-wrap" style="background: url('<?php echo $image; ?>');"></div>
								</div>
								<div class="modal-right">
									<h1>
										<?php the_title(); ?>
									</h1>
									<?php if($position) { ?>
										<div class="person-position">
											<?php echo $position; ?>
										</div>
									<?php } ?>
									<?php if($email) { ?>
										<div class="person-email">
											<a href="mailto:<?php echo $email; ?>" target="_blank">
												<?php echo $email; ?>
											</a>
										</div>
									<?php } ?>
									<?php if($phone) { ?>
										<div class="person-phone">
											<a href="tel:<?php echo $phone; ?>" target="_blank">
												<?php echo $phone; ?>
											</a>
										</div>
									<?php } ?>
									<div class="content-wrap">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php get_footer();