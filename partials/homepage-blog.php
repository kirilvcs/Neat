<div id="fh5co-blog" class="blog-flex">
	<?php
	$hpid = $post->ID;
	// dump($hpid);

	$param = [
		'cat' => get_field('hb_category'),
		'posts_per_page' => get_field('hb_limit')
	];

	$result = new WP_Query($param);

	if($result->have_posts()):
		while($result->have_posts()):
			$result->the_post();
			?>
			<div class="featured-blog" style="background-image: url(<?php the_post_thumbnail_url('medium-large'); ?>);">
				<div class="desc-t">
					<div class="desc-tc">
						<span class="featured-head"><?php the_field('hb_featured_title', $hpid); ?></span>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<span><a href="<?php the_permalink(); ?>" class="read-button"><?php _e('Learn More', 'vcs-starter'); ?></a></span>
					</div>
				</div>
			</div>
			<?php
			break; //Nutraukiame cikla po pirmos iteracijos
		endwhile; // end while
	endif; // end if
	?>
	<div class="blog-entry fh5co-light-grey">
		<div class="row animate-box">
			<div class="col-md-12">
				<h2><?php the_field('hb_list_title', $hpid); ?></h2>
			</div>
		</div>
		<div class="row">
			<?php
			if($result->have_posts()):
				while($result->have_posts()):
					$result->the_post();
					?>
					<div class="col-md-12 animate-box">
						<div class="blog-post">
							<a href="<?php the_permalink(); ?>">
								<span class="img" style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>);"></span>
							</a>
							<div class="desc">
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
								</a>
								<span class="cat"><?php echo get_the_category_list(', '); ?></span>
							</div>
						</div>
					</div>
					<?php
				endwhile; // end while
			endif; // end if
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>