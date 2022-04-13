<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForeFront_Starter
 */
	$id 		= get_the_ID();
	$post_type 	= get_post_type( get_the_ID() );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-post' ); ?>>
	<p class="search-post__title"><span><b><?php if($post_type == 'tribe_events') { ?>Event<?php } else { ?><?php echo ucfirst($post_type); ?><?php } ?></b></span><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
</article>
