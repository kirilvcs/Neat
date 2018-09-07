<?php get_header(); ?>
<h1>Esame taxonomy-project-category.php</h1>
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
				$categories = wp_get_object_terms($post->ID, 'project-category');
				$category_list = [];
				foreach($categories as $category){
					$category_list[] = $category->name; //sukursime masyva su kategoriju sarasu
				}
				$category_list = implode(', ', $category_list); //padarome is masyvo tekstine eilute
				?>
				<div class="col-md-4 text-center animate-box">
					<a href="<?php the_permalink(); ?>" class="work"  style="background-image: url(<?php the_post_thumbnail_url('medium-large');?>);">
						<div class="desc">
							<h3><?php the_title(); ?></h3>
							<span><?php echo $category_list; ?></span>
						</div>
					</a>
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