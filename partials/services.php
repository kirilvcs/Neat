<div id="fh5co-services">
	<div class="row">
		<?php
		if(have_rows('hs_services_repeater')):
			while(have_rows('hs_services_repeater')): the_row();
				?>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<?php the_sub_field('icon'); ?>
						</span>
						<div class="desc">
							<h3><a href="#"><?php the_sub_field('heading'); ?></a></h3>
							<p><?php echo nl2br(get_sub_field('description')); ?></p>
						</div>
					</div>
				</div>
				<?php
			endwhile;
		endif;
		?>
	</div>
</div>