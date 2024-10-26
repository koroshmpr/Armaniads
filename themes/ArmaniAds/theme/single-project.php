<?php
/**
 * The template for displaying all single projects
 */
get_header();
global $post;
?>
	<img class="object-cover w-full h-auto"
		 src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>" alt="<?= get_the_title(); ?>">
<?php
$brand = get_field('brand');
if ($brand) :
	$brandUrl = get_the_post_thumbnail_url($brand->ID);
	?>
	<div class="relative h-10">
		<img class="size-24 rounded-full bg-white p-2 shadow-md absolute inset-x-1/2 translate-x-1/2 -translate-y-1/2"
			 src="<?= $brandUrl; ?>" alt="<?= $brand->post_title; ?>">
	</div>
<?php endif; ?>
	<h1 class="text-4xl font-bold text-title text-center py-8"><?php the_title(); ?></h1>
	<article class="text-md container px-6 mx-auto">
		<?php
		$infos = get_field('infos');
		if ($infos):?>
			<div class="bg-blue-950 lg:p-8 p-4 w-fit mx-auto mb-4 rounded-2xl">
				<p class="text-white text-2xl px-5 text-center mx-auto border-b-2 pb-5 w-fit border-secondary"><?= get_field('title'); ?></p>
				<table class="border-separate border-spacing-2 mx-auto pt-5 text-center">
					<tbody class="lg:flex lg:gap-3">
					<?php
					foreach ($infos as $info): ?>
						<tr class="text-white lg:grid">
							<th class="bg-secondary text-blue-950 px-3 py-2"><?= $info['label']; ?></th>
							<td class="border bg-white/5 hover:bg-white/15 border-gray-300 px-3 py-2"><?= $info['value']; ?></td>
						</tr>
					<?php endforeach;
					?>
					</tbody>
				</table>
			</div>
		<?php
		endif;
		the_content(); ?>
	</article>
<?php get_template_part('template-parts/global/gallery'); ?>
<?php get_template_part('template-parts/global/next-prev-post'); ?>
<?php get_template_part('template-parts/global/share-post'); ?>
	<a x-data="{ open: false, scrolled: false }"
	   x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
	   x-transition
	   class="size-10 fixed top-24 hidden bg-blue-950 justify-center transition-all items-center hover:bg-blue-950 duration-1000 lg:flex text-secondary rounded-s-full z-[5]"
	   :class="scrolled ? 'left-0' : '-left-full' "
	   href="/project"
	   aria-label="Back to archive">
		<svg width="30" height="30" fill="currentColor" class="bi bg-secondary text-primary transition-all hover:bg-white hover:text-primary rounded-full bi-chevron-left" viewBox="0 0 16 16">
			<path fill-rule="evenodd"
				  d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
		</svg>
	</a>
<?php
get_footer();
