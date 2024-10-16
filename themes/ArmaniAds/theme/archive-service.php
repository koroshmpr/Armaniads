<?php
/** Template Name: Archive services */
get_header();

get_template_part('template-parts/global/banner-parallax');
if (have_posts()) { ?>
	<section class="container grid gap-4 py-16 mx-auto px-6">
	<?php while (have_posts()) :
		the_post();?>
			<article class="bg-gray-200 p-8 grid grid-cols-4 justify-center lg:justify-start">
				<div class="grid gap-3 items-start col-span-full lg:col-span-2">
					<h5 class="text-primary text-xl"><?php the_title(); ?></h5>
					<p><?= wp_trim_words(get_the_content() , 30)?></p>
					<a href="<?php echo get_permalink(); ?>" class="btn-hover-white rounded-sm px-6 py-2 w-fit">بیشتر</a>
				</div>
				<img class="object-contain col-span-full lg:col-span-2" alt="<?= get_the_title(); ?>"
					src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>" >
			</article>
	<?php endwhile;

}
get_footer();
