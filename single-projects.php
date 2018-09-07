<?php get_header(); 
if(have_posts()):
	while(have_posts()):
		the_post(); ?>
		<h1>esame single-projects.php</h1>
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
										<h2><?php echo do_shortcode(strip_tags(get_field('ps_short_description'), '<a><span><i><strong><b><br>')); ?></h2>
									</div>
								</div>
							</div>
						</div>
					</li>		   	
				</ul>
			</div>
		</aside>
		<div id="fh5co-work">
			<div class="row">
				<div class="col-md-8">
					<?php 
					$gallery = get_field('ps_gallery');
					//dump($gallery);
					if($gallery):
						foreach($gallery as $image):
							?>
							<a href="<?php echo $image['sizes']['large']; ?>" class="image-popup img-portfolio-detail">
								<img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt'];?>" class="img-responsive">
							</a>
							<?php
						endforeach;
					endif;
					?>
				</div>
				<div class="col-md-4 fh5co-project-detail">
					<h2 class="fh5co-project-title"><?php the_title(); ?></h2>
					<?php the_content(); ?>

					<div class="fh5co-project-service">
						<h3><?php _e('Categories:'); ?></h3>
						<?php
						echo get_the_term_list( $post->ID, 'project-category', '<ul><li>', '</li><li>', '</li></ul>' );
						?>
					</div>
				</div>
			</div>
		</div>
		<?php 
	endwhile;
endif;
get_footer(); ?>