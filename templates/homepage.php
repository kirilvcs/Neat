<?php

/* Template Name: Homepage Template */

get_header();

?>
<h1>Esame homepage.php</h1>
<?php 
	get_template_part('partials/hero'); // uzkrauname hero.php is partials katalogo
	get_template_part('partials/services');
	get_template_part('partials/counter');
	get_template_part('partials/homepage-blog');
?>

<?php get_footer(); ?>