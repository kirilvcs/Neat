<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<?php
			if(have_rows('hs_slides_repeater')):
				while(have_rows('hs_slides_repeater')): the_row();
					$align = get_sub_field('slide_alignment');
					if($align){
						$text_align = '';
					}else{
						$align = '';
						$text_align = 'text-center';
					}
					?>
					<li style="background-image: url(<?php echo get_sub_field('slide_background')['sizes']['slider-image']; ?>);">
				   		<div class="overlay-gradient"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 slider-text <?php echo $align; ?>">
					   				<div class="slider-text-inner <?php echo $text_align; ?>">
					   					<?php 
					   					echo do_shortcode(get_sub_field('slide_content'));
					   					?>
										<p>
											<?php
												if(have_rows('slide_buttons_repeater')):
													while(have_rows('slide_buttons_repeater')): the_row();
														$link = get_sub_field('link');
														//dump($link);
														if($link['target']=="_blank"){
															$link['target']='target="_blank"';
														}else{
															$link['target']='';
														}
														$link_class = get_sub_field('link_style');
														if(!$link_class){
															$link_class = '';
														}
														?>
														<a class="btn btn-primary <?php echo $link_class; ?>" href="<?php echo $link['url'] ?>" <?php echo $link['target']; ?>><?php echo $link['title']; ?></a>
														<?php
													endwhile;
												endif;
											?>
										</p>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
					<?php
				endwhile;
			endif;
			?>
	  	</ul>
  	</div>
</aside>