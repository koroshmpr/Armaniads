<?php /* Template Name: Home */
get_header(); ?>

<?php if (have_posts()) {
	the_post(); ?>

	<?php
	get_template_part('template-parts/homepage/hero');
	get_template_part('template-parts/services/services-list');
	get_template_part('template-parts/homepage/aboutus');
	get_template_part('template-parts/homepage/projects-with-billboard');
	get_template_part('template-parts/homepage/counter');
	get_template_part('template-parts/homepage/clients-slider');
}
get_footer();
