<div id="fh5co-counter" class="fh5co-counters">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center animate-box">
					<p>We have a fun facts far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<div class="row">
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="3452" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Cups of Coffee</span>
						</div>
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="234" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Client</span>
						</div>
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="6542" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Projects</span>
						</div>
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="8687" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Done Projects</span>
						</div>
					</div>
				</div>
			</div>
		</div><div id="fh5co-counter" class="fh5co-counters">
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