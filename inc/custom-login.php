<?php 
// change logo link on login page
function  custom_login_title() {
	return get_option('blogname');
}
add_filter('login_headertext', 'custom_login_title');

add_filter('login_headerurl', 'custom_loginlogo_url');
function custom_loginlogo_url($url) {
	return '/';
}

// customize wp-login
function my_login_logo() { ?>
	<?php 
		$login_logo 			= get_field('login_logo', 'options');
		$login_button_color 	= get_field('login_button_color', 'options');
		if($login_logo) {
			$url 				= $login_logo['url'];
			$width 				= $login_logo['width'];
			$height 			= $login_logo['height'];
		}
		if($login_button_color) { 
			$button_color 		= $login_button_color;
		} else {
			$button_color  		= '#2271b1';
		}
	?>
	<style type="text/css">
		body {
			background: #FFFFFF !important;
			background-position: center center;
			background-size: cover;
			background-repeat: no-repeat;
		}
		#login {
			width: <?php echo $width; ?>px !important;
		}
		#login h1 a,
		.login h1 a {
			background-image: url('<?php echo $url; ?>');
			height: <?php echo $height; ?>px !important;
			width: <?php echo $width; ?>px !important;
			background-size: cover !important;
			background-repeat: no-repeat !important;
			padding-bottom: 0 !important;
		}
		form#loginform {
			box-shadow: 5px 5px 20px rgba(0, 0, 0, .5);
			width: 320px !important;
			margin: 0 auto !important;
		}
		.wp-core-ui .button-primary {
			transition: all 0.2s linear !important;
			background: <?php echo $button_color; ?> !important;
			border-color: <?php echo $button_color; ?> !important;
		}
		.wp-core-ui .button-primary:hover {
			background: #fff !important;
			color: <?php echo $button_color; ?> !important;
		}
		#nav {
			color: #fff !important;
			text-align: center !important;
		}
		#backtoblog {
			text-align: center !important;
		}
		#nav a {
			padding: 0 10px;
		}
		#nav a,
		#backtoblog a,
		a.privacy-policy-link {
			transition: color 0.2s linear !important;
			text-decoration: none !important;
			color: <?php echo $button_color; ?> !important;
		}
		#nav a:hover,
		#backtoblog a:hover,
		a.privacy-policy-link:hover {
			color: <?php echo $button_color; ?> !important;
		}
		.message {
			border-left: 4px solid <?php echo $button_color; ?> !important;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );