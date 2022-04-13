<?php if(have_rows('page_components')) : ?>
	<?php 
		$global_base_id = 1;
		global $post;
		$slug = $post->post_name;
	?>
	<?php while(have_rows('page_components')) : the_row(); ?>
		<?php
			$block_id 		= $global_base_id++;
			$row_layout 	= preg_replace( '/_/', '-', get_row_layout() );
		?>
		<?php if($row_layout != 'image-container-start' && $row_layout != 'image-container-end') { ?>
		<div id="<?php echo $slug; ?>-block-<?php echo $block_id; ?>" class="<?php echo $row_layout; ?>-wrapper">
		<?php } ?>
			<?php get_template_part('template-parts/blocks/acf', $row_layout); ?>
		<?php if($row_layout != 'image-container-start' && $row_layout != 'image-container-end') { ?>
		</div>
		<?php } ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part('template-parts/content', 'none'); ?>
<?php endif;