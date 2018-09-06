<div id="fh5co-counter" class="fh5co-counters">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center animate-box fh5co-heading">
			<?php 
			$title = get_field('hc_section_heading');
			if($title!=''){
				echo "<h2>".$title."</h2>";
			}

			echo do_shortcode(get_field('hc_section_description'));
			?>
		</div>
	</div>
	<div class="row animate-box">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<?php 
				if(have_rows('hc_stats_repeater')):
					while(have_rows('hc_stats_repeater')): the_row();
						?>
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" 
							data-from="<?php the_sub_field('start_value'); ?>" 
							data-to="<?php the_sub_field('end_value'); ?>" 
							data-speed="<?php the_sub_field('animation_duration'); ?>" data-refresh-interval="<?php the_sub_field('animation_update'); ?>"></span>
							<span class="fh5co-counter-label"><?php the_sub_field('stat_title'); ?></span>
						</div>
						<?php
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
</div>