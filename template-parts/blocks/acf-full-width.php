<?php 
	$width 				= get_sub_field('width');
	$text_color 		= get_sub_field('text_color');
	$text_align 		= get_sub_field('text_align');
	$background 		= get_sub_field('background');
	$heading_tag 		= get_sub_field('heading_tag');
	$heading 			= get_sub_field('heading');
	$content 			= get_sub_field('content');
	$padding_top 		= get_sub_field('padding_top');
	$padding_bottom 	= get_sub_field('padding_bottom');
?>
<div class="section-wrap" style="background: <?php echo $background; ?>;<?php if($padding_top) { ?> padding-top: <?php echo $padding_top; ?>px;<?php } ?><?php if($padding_bottom) { ?> padding-bottom: <?php echo $padding_bottom; ?>px;<?php }?>">
	<div class="inner">
		<div class="acf-<?php echo $width; ?>">
			<?php if($heading) { ?>
				<<?php echo $heading_tag; ?> class="acf-<?php echo $text_color; ?> acf-<?php echo $text_align; ?> acf-full-width-heading" data-aos="zoom-in-up">
					<?php echo $heading; ?>
				</<?php echo $heading_tag; ?>>
			<?php } ?>
			<?php if($content) { ?>
				<div class="acf-<?php echo $text_color; ?> acf-<?php echo $text_align; ?> acf-full-width-contet" data-aos="zoom-in-up" data-aos-delay="200">
					<?php echo $content; ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>