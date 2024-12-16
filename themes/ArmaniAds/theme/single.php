<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Armani
 */

get_header();
global $post;
?>
	<img class="object-cover w-full lg:h-screen"
		 src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>" alt="<?= get_the_title(); ?>">
	<section x-data="{activeTOC : false}"
			 class="container relative mx-auto grid grid-cols-4 gap-4 items-start justify-center p-6 lg:pt-8 lg:px-0">
		<div class="post-container lg:col-span-3 col-span-4 mb-5 lg:pe-8">
			<div class="flex justify-between items-start">
				<h1 class="text-title lg:text-3xl text-lg font-bold"><?php the_title(); ?></h1>
				<div class="py-2">
					<?php
					$category_detail = get_the_category($post->ID);//$post->ID
					foreach ($category_detail as $category) { ?>
						<span class="bg-primary text-white shadow-sm rounded-md p-2"><?= $category->name ?></span>
					<?php } ?>
				</div>
			</div>
			<div class="flex flex-wrap w-full my-5 border-b border-gray-200 pb-5 divide-x divide-x-reverse divide-primary/50">
				<div class="flex gap-2 px-3  items-center">
					<svg width="15" height="15" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
						<path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z"/>
						<path
							d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3"/>
					</svg>
					<span class="hidden lg:inline">زمان مطالعه</span>
					<span class="font-bold text-primary"><?= do_shortcode('[reading_time]') ?></span>
					<span>دقیقه</span>
				</div>
				<div class="text-semi-light small fw-lighter px-3 flex gap-2 justify-center items-center">
					<svg width="15" height="15" fill="currentColor"
						 class="bi bi-calendar3" viewBox="0 0 16 16">
						<path
							d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
						<path
							d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
					</svg>
					<?= shamsi_date('d F, Y', get_the_time('U')); ?>
				</div>
			</div>
			<article class="text-justify prose" id="blog_content"><?php the_content(); ?></article>
		</div>
		<aside class="h-full lg:col-span-1 col-span-4">
			<div class="rounded-md bg-primary p-6 shadow mb-5">
				<p class="font-bold text-2xl mb-3 text-white">مقالات پیشنهادی ما</p>
				<div class="grid">
					<?php
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => '3',
						'ignore_sticky_posts' => TRUE
					);
					$loop = new WP_Query($args);
					if ($loop->have_posts()) : $i = 0;
						/* Start the Loop */
						while ($loop->have_posts()) :
							$loop->the_post(); ?>
							<a href="<?php echo get_the_permalink(); ?>" class="grid grid-cols-3 my-2 items-center">
								<img height="auto" class="col-span-1 rounded object-cover size-20"
									 src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
								<div class="ps-2 col-span-2 grid gap-2">
									<div class="items-center flex gap-2 text-dark">
										<?php
										$category_detail = get_the_category($post->ID);//$post->ID
										foreach ($category_detail as $category) { ?>
											<span class="text-sm p-2 small fw-lighter bg-white rounded-md">
                                            <?php echo $category->name ?>
                                        </span>
										<?php } ?>
									</div>
									<p class="fw-bolder text-white"><?php echo get_the_title(); ?></p>
								</div>
							</a>
						<?php endwhile;
					endif;
					wp_reset_postdata(); ?>
				</div>
			</div>
			<div class="rounded-md hidden lg:block sticky bg-primary p-8 top-24 shadow"><?= do_shortcode('[TOC]') ?></div>
		</aside>
		<button
			x-data="{ scrolled: false }"
			x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 250 })"
			@click="activeTOC = !activeTOC"
			:class="scrolled ? 'right-4' : '-right-full' "
			x-transition
			aria-labelledby="toc"
			class="size-12 lg:hidden fixed top-1/2 bg-secondary justify-center transition-all items-center flex duration-700 text-primary text-bold rounded-full z-[5]">
			<svg width="20" height="20" fill="currentColor" class="bi bi-list-ul"
				 viewBox="0 0 16 16">
				<path fill-rule="evenodd"
					  d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
			</svg>
		</button>
		<div @click="activeTOC = false" :class="activeTOC ? 'translate-y-0 opacity-100' : 'translate-y-full'" id="toc"
			 class="fixed inset-0 opacity-0 transition-all bottom-0 backdrop-blur-sm duration-500 flex z-[5] justify-center items-end">
			<div :class="activeTOC ? 'translate-y-0' : 'translate-y-full'"
				 class="bg-primary/90 h-1/2 overflow-y-scroll w-full pt-16 transition-all">
				<?= do_shortcode('[TOC]') ?>
			</div>
		</div>
	</section>
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			document.querySelectorAll('.table-of-contents a').forEach(link => {
				link.addEventListener('click', (e) => {
					e.preventDefault();
					const targetId = link.getAttribute('href').replace('#', '');
					const targetElement = document.getElementById(targetId);
					if (targetElement) {
						targetElement.scrollIntoView({ behavior: 'smooth' });
					}
				});
			});
		});

	</script>
<?php get_template_part('template-parts/global/next-prev-post'); ?>
<?php get_template_part('template-parts/global/share-post'); ?>
<?php
get_footer();
