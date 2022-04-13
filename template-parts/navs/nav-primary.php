<?php if(has_nav_menu('primary')) : ?>
	<?php 
		// acf nav item fields
		add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
		function my_wp_nav_menu_objects( $items, $args ) {
			foreach($items as &$item) {
				$icon = get_field('icon', $item);
				if($icon) {
					$item->title .= $icon;	
				}
			}
			return $items;
		}
	?>
	<div class="primary-nav-wrap" data-aos="fade-down" data-aos-delay="200">
		<div class="mobile-header-search">
			<?php get_search_form(); ?>
		</div>
		<nav class="primary-nav">
			<ul class="primary-menu sm sm-simple">
				<?php
					$defaults = array(
						'theme_location'  => 'primary',
						'menu'            => 'primary',
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
				<li class="dt-search">
					<a href="#!">
						<i class="fas fa-search"></i>
					</a>
					<div class="dt-search-wrap closed">
						<?php get_search_form(); ?>
					</div>
				</li>
			</ul>
		</nav>
	</div>
<?php endif;