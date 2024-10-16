<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Armani
 */

get_header();
if (is_singular('service')) {
	$background = get_field('bg-pattern-service', 'option')['url'] ?? '';
	$bgClass = 'bg-auto bg-right-top';
}
?>
<?php get_template_part('template-parts/global/banner-parallax'); ?>

	<section class="bg-no-repeat lg:py-16 py-8 <?= $bgClass ?? ''; ?>"
			 style="background-image: url('<?php echo esc_url($background ?? ''); ?>')">
		<article class="container px-3 lg:px-0 mx-auto grid items-center lg:border-e-2 lg:border-title/75">
			<?php
			$mobile = get_field('mobile-image');

			if (has_post_thumbnail()) : ?>
				<img width="1140" height="270" src="<?= get_the_post_thumbnail_url(); ?>"
					 alt="<?= get_the_title(); ?>"
					 class="h-auto <?= $mobile ? 'hidden lg:inline' : ''; ?> w-full object-cover">
			<?php endif;
			if ($mobile):?>
				<img width="375" height="87" src="<?= $mobile['url']; ?>"
					 alt="<?= get_the_title(); ?>"
					 class="h-auto lg:hidden object-cover">
			<?php endif;
			?>
			<h1 class="text-2xl text-title pb-4 pt-8 text-center lg:text-start"><?php the_title(); ?></h1>
			<div class="prose px-3 text-justify">
				<?php the_content(); ?>
			</div>
		</article>

	</section>
<?php
get_footer();
