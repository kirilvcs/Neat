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
					<div class="col-xs-10 text-right menu-1">
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