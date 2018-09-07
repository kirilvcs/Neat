<div id="fh5co-work" class="fh5co-light-grey">
	<div class="row animate-box">
		<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
			<h2><?php the_field('hp_section_heading'); ?></h2>
			<?php echo do_shortcode(get_field('hp_section_description')); ?>
		</div>
	</div>
	<div class="row">
		<?php 
		//dump(get_field('hp_projects'));
		$projects = get_field('hp_projects');

		if($projects):
			foreach($projects as $post):
				setup_postdata($post);
				//dump($post->ID);
				//dump(wp_get_object_terms($post->ID, 'project-category'));
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
				wp_reset_postdata();
			endforeach;
		endif;
		?>
	</div>
</div>