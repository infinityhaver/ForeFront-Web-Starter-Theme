<?php if(has_nav_menu('footer')) : ?>
	<div class="footer-nav-wrap">
		<nav class="footer-nav">
			<ul class="footer-menu">
				<?php
					$defaults = array(
						'theme_location'  => 'footer',
						'menu'            => 'footer',
						'container'       => false,
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'depth'           => 10,
						'walker'          => ''
					);
					wp_nav_menu( $defaults );
				?>
			</ul>
		</nav>
	</div>
<?php endif;