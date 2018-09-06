<?php get_header(); 
if(have_posts()):
	while(have_posts()):
		the_post(); 
		?>

		<h1>Esame single.php</h1>
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(<?php the_post_thumbnail_url('slider-image'); ?>);">
						<div class="overlay-gradient"></div>
						<div class="container-fluids">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 slider-text slider-text-bg">
									<div class="slider-text-inner text-center">
										<h1><?php the_title(); ?></h1>
									</div>
								</div>
							</div>
						</div>
					</li>		   	
				</ul>
			</div>
		</aside>		
		<div id="fh5co-about">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center animate-box">
					<div class="about-desc">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>

		<?php 
	endwhile; // end while
endif; // end if
get_footer(); ?>