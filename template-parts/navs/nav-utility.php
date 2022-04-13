<?php if(has_nav_menu('utility')) : ?>
	<div class="utility-nav-wrap">
		<nav class="utility-nav">
			<ul class="utility-menu sm sm-simple">
				<?php
					$defaults = array(
						'theme_location'  => 'utility',
						'menu'            => 'utility',
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