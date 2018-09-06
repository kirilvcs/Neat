<?php get_header(); ?>
<h1>Esame archive.php</h1>
<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<?php
			$term = get_queried_object();
			//dump($term);
			?>
			<li style="background-image: url(<?php echo get_field('ci_image', $term)['sizes']['slider-image']; ?>);">
				<div class="overlay-gradient"></div>
				<div class="container-fluids">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 slider-text slider-text-bg">
							<div class="slider-text-inner text-center">
								<h1><?php echo $term->name; ?></h1>
								<h2><?php echo $term->description; ?></h2>
							</div>
						</div>
					</div>
				</div>
			</li>		   	
		</ul>
	</div>
</aside>		
<div id="fh5co-blog">
	<div class="row">
		<?php
		if(have_posts()):
			while(have_posts()):
				the_post(); 
				?>
				<div class="col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="<?php the_permalink(); ?>" class="blog-bg" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);"></a>
						<div class="blog-text">
							<span class="posted_on"><?php echo get_the_date('M. jS Y'); ?></span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php the_excerpt(); ?></p>
							<ul class="stuff">
								<li><i class="icon-heart3"></i>249</li>
								<li><i class="icon-eye2"></i>1,308</li>
								<li><a href="<?php the_permalink(); ?>"><?php _e('Read More', 'vcs-starter'); ?><i class="icon-arrow-right22"></i></a></li>
							</ul>
						</div> 
					</div>
				</div>
				<?php 
			endwhile; // end while

			$args = array(
				'prev_text'          => __('« Previous'),
				'next_text'          => __('Next »')
			);

			echo '<div class="col-xs-12">'.paginate_links($args).'</div>';

		endif; // end if
		?>
	</div>
</div>
<?php
get_footer(); ?>