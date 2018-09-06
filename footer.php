	</div>
	<div class="container-wrap">
		<footer id="fh5co-footer" role="contentinfo">
			<div class="row">
				<div class="col-md-3 fh5co-widget">
					<?php dynamic_sidebar('Footer 1'); ?>
				</div>
				<div class="col-md-3 col-md-push-1">
					<?php dynamic_sidebar('Footer 2'); ?>
				</div>

				<div class="col-md-3 col-md-push-1">
					<?php dynamic_sidebar('Footer 3'); ?>
				</div>

				<div class="col-md-3">
					<?php dynamic_sidebar('Footer 4'); ?>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<?php
							if(have_rows('fo_social_menu_repeater', 'option')):
								while(have_rows('fo_social_menu_repeater', 'option')): the_row();
									$link = get_sub_field('link');
									if($link['target']=="_blank"){
										$link['target']='target="_blank"';
									}else{
										$link['target']='';
									}
									?>
									<li>
										<a href="<?php echo $link['url'] ?>" <?php echo $link['target']; ?>>
											<i class="<?php the_sub_field('icon'); ?>"></i>
										</a>
									</li>
									<?php
								endwhile;
							endif;
							?>
						</ul>
					</p>
				</div>
			</div>
		</footer>
	</div><!-- END container-wrap -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<?php
	wp_footer();
	?>
	</body>
</html>

