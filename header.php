<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="<?php bloginfo("charset"); ?>">
		<title><?php wp_title(); ?></title>



	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

		<?php
		wp_head();
		?>
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container-wrap">
			<div class="top-menu">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.html">Neat</a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="work.html">Work</a></li>
							<li class="has-dropdown">
								<a href="blog.html">Blog</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
	<div class="container-wrap">