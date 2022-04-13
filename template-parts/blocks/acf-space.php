<?php 
	$height 	= get_sub_field('height');
	$background = get_sub_field('background');
	$full_width = get_sub_field('full_width');
?>
<?php if(!$full_width) { ?>
	<div class="section-wrap">
		<div class="inner">
<?php } ?>
<div class="space" style="height: <?php echo $height; ?>px; background: <?php echo $background; ?>;"></div>
<?php if(!$full_width) { ?>
		</div>
	</div>
<?php } ?>