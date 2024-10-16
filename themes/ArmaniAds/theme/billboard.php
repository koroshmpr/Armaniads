<?php
/* Template Name: billboard */
get_header();
?>
<?php get_template_part('template-parts/global/banner-parallax'); ?>
<section class="container">
	<h1 class="text-4xl font-bold my-12 text-center text-primary"><?php the_title(); ?></h1>
	<article class="content"><?php the_content(); ?></article>
	<?php get_template_part('template-parts/global/gallery'); ?>
</section>
<?php get_footer(); ?>
