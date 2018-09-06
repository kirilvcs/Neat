<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo("charset"); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- 
		//////////////////////////////////////////////////////

		FREE HTML5 TEMPLATE 
		DESIGNED & DEVELOPED by FreeHTML5.co
			
		Website: 		http://freehtml5.co/
		Email: 			info@freehtml5.co
		Twitter: 		http://twitter.com/fh5co
		Facebook: 		https://www.facebook.com/fh5co

		//////////////////////////////////////////////////////
		 -->

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
							<div id="fh5co-logo">
								<a href="<?php echo home_url(); ?>">
									<?php
									// get_field('lauko pavadinimas') - reiksme grazina
									// the_field('lauko pavadinimas') - reiksme spausdina
									// Options page
									// get_field('lauko pavadinimas', 'option') - reiksme grazina
									// the_field('lauko pavadinimas', 'option') - reiksme spausdina
									if(get_field('ho_logo_type', 'option')):
										the_field('ho_logo_text', 'option');
									else:
										$image = get_field('ho_logo_image', 'option');
										if( !empty($image) ): ?>
											<img src="<?php echo $image['sizes']['logo-image']; ?>" alt="<?php echo $image['alt']; ?>" />
											<?php
										endif;
									endif;
									?>
								</a>
							</div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<?php 
							$args = [
								"menu_class" => "surasome reikalingas klases",
								"container" => false,
								"theme_location" => 'primary-navigation'
							];

							wp_nav_menu($args);

							?>
						</div>
					</div>
					
				</div>
			</div>
		</nav>
		<div class="container-wrap">