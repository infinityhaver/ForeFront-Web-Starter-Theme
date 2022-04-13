<div class="section-wrap">
	<div class="inner">
		<div class="search-wrap">
			<div class="search-facets">
				<?php echo do_shortcode('[facetwp facet="keywords"]'); ?>
				<?php echo do_shortcode('[facetwp sort="true"][facetwp facet="search_post_type"]'); ?>
				<div class="reset-filters">
					<a href="#!" onclick="FWP.reset()">
						<small><em>Clear Filters</em></small>
					</a>
				</div>
			</div>
			<div class="search-results">
				<?php echo do_shortcode('[facetwp template="site_search"]'); ?>
				<div class="load-more-wrap">
					<?php echo do_shortcode('[facetwp facet="load_more"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>