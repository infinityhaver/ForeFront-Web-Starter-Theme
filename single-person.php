<?php get_header(); ?>
<?php 
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
<div class="section-wrap">
	<div class="inner">
		<div class="image">
			<img src="<?php echo $image; ?>" />
		</div>
		<div class="person-name">
			<?php the_title(); ?>
		</div>
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
		<?php
			$taxonomy 	= 'person_cat';
			$terms 		= wp_get_post_terms($post->ID, $taxonomy, array( "fields" => "ids" ));
		?>
		<?php if($terms) { ?>
			<h6>
				Category Hierarchy
			</h6>
			<ul>
				<?php 
					$terms = trim(implode( ',', (array) $terms ), ' ,');
				?>
				<?php wp_list_categories('title_li=&taxonomy=' . $taxonomy . '&include=' . $terms); ?>
			</ul>
		<?php } ?>
		<?php if($person_cats != null) { ?>
			<div class="person-cats">
				<h6>
					Categories
				</h6>
				<?php foreach($person_cats as $person_cat) { ?>
			 		<?php 
			 			$person_cat_id 				= $person_cat->term_id;
			 			$person_cat_slug 			= $person_cat->slug;
			 			$person_cat_name 			= $person_cat->name;
			 			$person_cat_description 	= $person_cat->description;
			 			$person_cat_link 			= get_term_link($person_cat_slug, 'person_cat');
			 			$person_cat_image 			= get_field('image', 'person_cat_' . $person_cat_id);
			 		?>
			 		<a href="<?php echo $person_cat_link; ?>"><?php echo $person_cat_name; ?></a><?php if(next($person_cats)) { ?> | <?php } ?>
			 		<?php unset($person_cat); ?>
				<?php } ?>
			</div>
		<?php } ?>
		<?php if($person_tags != null) { ?>
			<div class="person-tags">
				<h6>
					Tags
				</h6>
				<?php foreach($person_tags as $person_tag) { ?>
			 		<?php 
			 			$person_tag_id 				= $person_tag->term_id;
			 			$person_tag_slug 			= $person_tag->slug;
			 			$person_tag_name 			= $person_tag->name;
			 			$person_tag_description 	= $person_tag->description;
			 			$person_tag_link 			= get_term_link($person_tag_slug, 'person_tag');
			 		?>
			 		<a href="<?php echo $person_tag_link; ?>"><?php echo $person_tag_name; ?></a><?php if(next($person_tags)) { ?>, <?php } ?>
			 		<?php unset($person_tag); ?>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="person-content">
			<?php echo $content; ?>
		</div>
		<div class="person-excerpt">
			<?php echo $excerpt; ?>
		</div>
	</div>
</div>
<?php get_footer(); 