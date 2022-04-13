<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ForeFront_Starter
 */

get_header(); ?>
<div class="section-wrap">
	<div class="inner">
		<div class="space"></div>
		<div class="ag-page-404" data-aos="fade-up">
			<div class="ag-toaster-wrap">
				<div class="ag-toaster">
					<div class="ag-toaster_back"></div>
					<div class="ag-toaster_front">
						<div class="js-toaster_lever ag-toaster_lever"></div>
					</div>
					<div class="ag-toaster_toast-handler">
						<div class="ag-toaster_shadow"></div>
						<div class="js-toaster_toast ag-toaster_toast js-ag-hide"></div>
					</div>
				</div>
				<canvas id="canvas-404" class="ag-canvas-404"></canvas>
			</div>
		</div>
		<div class="space"></div>
		<center>
			<main id="primary" class="site-main">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title">
							Oops! That page can't be found
						</h1>
					</header>
					<div class="page-content">
						<p>
							It looks like nothing was found at this location. Maybe try a search?
						</p>
						<?php get_search_form(); ?>
					</div>
				</section>
			</main>
		</center>
		<div class="space"></div>
	</div>
</div>
<?php get_footer();