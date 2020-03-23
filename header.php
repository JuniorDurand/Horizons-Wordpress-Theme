<!DOCTYPE HTML>
<!--
	Horizons by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title><?php bloginfo('name').wp_title('|'); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        <?php wp_head(); ?>
	</head>
	<body class="no-sidebar">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="<?php echo home_url();?>" id="logo"><?php bloginfo('name'); ?></a></h1>
					
					<!-- Nav -->						
					<?php
								$args = array(
								'theme_location'  => 'primary',
								'menu_class'      => 'menu_class',
								'container_class' => 'container_class',
								'menu'            => '',
        						'container'       => 'nav',
        						'container_class' => '',
        						'container_id'    => 'nav',
        						'menu_class'      => '',
        						'menu_id'         => 'nav'
							);?>
							<?php wp_nav_menu( $args ); ?>

				</div>
			</div>