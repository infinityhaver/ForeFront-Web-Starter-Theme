<?php
/**
 * Custom shortcodes.
 *
 * @package Starter
 */

// [button]
function button( $atts, $content ) {
	$a = shortcode_atts( array(
		'href'   => '#!',
		'target' => '_self',
		'style'	 => 'green-solid'
	), $atts );

	return '<a href="' . esc_attr( $a['href'] ) . '" class="btn ' . esc_attr( $a['style'] ) . '" target="' . esc_attr( $a['target'] ) . '">' . $content . '</a>';
}
add_shortcode( 'button', 'button' );

// [youtube]
function youtube( $atts, $content ) {
	$a = shortcode_atts( array(
		'url' => ''
	), $atts );
	$embed_url 	= str_replace("watch?v=","embed/", esc_attr( $a['url'] ));
	return '<div class="ffw-video"><iframe src="' . $embed_url . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
}
add_shortcode( 'youtube', 'youtube' );

// [space]
function space( $atts, $content ) {
	$a = shortcode_atts( array(
		'height' => '15',
		'background' => 'transparent'
	), $atts );

	return '<div class="space" style="height: ' . esc_attr( $a['height'] ) . 'px; background: ' . esc_attr( $a['background'] ) . ';"></div>';
}
add_shortcode( 'space', 'space' );

// [social_nav]
function social_nav( $attr ) {
	ob_start(); ?>
		<?php if(have_rows('social_links', 'options')) : ?>
			<?php $i = 1; ?>
			<div class="social-links">
				<ul>
					<?php while(have_rows('social_links', 'options')) : the_row(); ?>
						<?php 
							$j 			= $i++;
							$icon 		= get_sub_field('icon');
							$link 		= get_sub_field('link');
							$new_tab 	= get_sub_field('new_tab');
						?>
						<li data-aos="zoom-in-up" data-aos-delay="<?php echo $j; ?>00">
							<a href="<?php echo $link; ?>"<?php if($new_tab) { ?> target="_blank"<?php } ?>>
								<?php echo $icon; ?>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; ?>
	<?php return ob_get_clean();
}
add_shortcode( 'social_nav', 'social_nav' );

// [current_year]
function current_year( $attr ) {
	ob_start(); ?><?php echo date('Y'); ?><?php return ob_get_clean();
}
add_shortcode( 'current_year', 'current_year' );

// [site_name]
function site_name( $attr ) {
	ob_start(); ?><?php echo esc_attr(get_bloginfo('name', 'display')); ?><?php return ob_get_clean();
}
add_shortcode( 'site_name', 'site_name' );

// [youtube_modal]
function youtube_modal( $atts, $content ) {
	$a = shortcode_atts( array(
		'color' 		=> '#fff',
		'youtube' 		=> 'https://www.youtube.com/watch?v=rdHkwIMSxOM',
		'text' 			=> 'Play Video',
	), $atts );

	return '
		<a data-fancybox href="' . esc_attr( $a['youtube'] ) . '" class="video-play-wrap" style="color: ' . esc_attr( $a['color'] ) . ' !important;">
			<svg width="75px" height="75px" viewBox="0 0 75 75" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="New-Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<g id="Green-Infrastructure" transform="translate(-1043.000000, -1534.000000)" fill="' . esc_attr( $a['color'] ) . '" fill-rule="nonzero">
						<g id="Project-Pic-1-Copy" transform="translate(720.000000, 1355.000000)">
							<g id="Group-6" transform="translate(144.000000, 179.000000)">
								<g id="icon" transform="translate(179.000000, 0.000000)">
									<path d="M48.3435484,34.9306452 L33.2467742,23.9564516 C32.6927419,23.5548387 31.9572581,23.4943548 31.35,23.8064516 C30.7379032,24.116129 30.3556452,24.7451613 30.3556452,25.425 L30.3556452,47.366129 C30.3556452,48.0532258 30.7379032,48.6798387 31.35,48.9895161 C31.608871,49.1201613 31.8919355,49.1854839 32.1774194,49.1854839 C32.55,49.1854839 32.9274194,49.0669355 33.2467742,48.8322581 L48.3435484,37.8677419 C48.8201613,37.5169355 49.0984024,36.975 49.0984024,36.3991935 C49.1008065,35.8137097 48.8153226,35.2741935 48.3435484,34.9306452 Z" id="Path"></path>
									<path d="M36.3532258,0.00483870968 C16.2725806,0.00483870968 0,16.2774194 0,36.3580645 C0,56.4314516 16.2725806,72.6991935 36.3532258,72.6991935 C56.4290323,72.6991935 72.7040323,56.4290323 72.7040323,36.3580645 C72.7064516,16.2774194 56.4290323,0.00483870968 36.3532258,0.00483870968 Z M36.3532258,66.633871 C19.6306452,66.633871 6.07258065,53.0830645 6.07258065,36.3580645 C6.07258065,19.6403226 19.6306452,6.07258065 36.3532258,6.07258065 C53.0733871,6.07258065 66.6290323,19.6379032 66.6290323,36.3580645 C66.6314516,53.0830645 53.0733871,66.633871 36.3532258,66.633871 Z" id="Shape"></path>
								</g>
							</g>
						</g>
					</g>
				</g>
			</svg>
			<div class="video-play-text video-modal-trigger">
				' . esc_attr( $a['text'] ) . '
			</div>
		</a>
	';
}
add_shortcode( 'youtube_modal', 'youtube_modal' );