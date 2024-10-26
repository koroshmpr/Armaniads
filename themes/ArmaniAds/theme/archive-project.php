<?php
/* Template Name: Archive project */

get_header();
?>

<?php get_template_part('template-parts/global/banner-parallax'); ?>

<section class="container mx-auto my-8 lg:my-16 px-5">
		<?php get_template_part('template-parts/global/title-content'); ?>
</section>

<?php
$args = array(
	'post_type' => 'project',
	'post_status' => 'publish',
	'posts_per_page' => -1 // Corrected parameter to display all posts
);
$loop = new WP_Query($args);

if ($loop->have_posts()) : ?>
	<section class="px-6 grid lg:grid-cols-3 gap-4 py-6 lg:py-12">
		<?php while ($loop->have_posts()) : $loop->the_post(); ?>
			<article
				class="relative h-full w-full overflow-hidden group rounded-2xl shadow-md"
				x-data="{ direction: '' }"
				@mouseenter="$el.setAttribute('data-direction', getMouseEnterDirection($event, $el))"
				@mouseleave="direction = ''"
				@mousemove="$el.setAttribute('data-direction', getMouseEnterDirection($event, $el))"
				x-init="
				// Function to detect mouse enter direction
				function getMouseEnterDirection(event, element) {
					const { left, right, top, bottom } = element.getBoundingClientRect();
					const x = event.clientX;
					const y = event.clientY;

					const isEnteringFromLeft = x - left < (right - left) / 4;
					const isEnteringFromRight = right - x < (right - left) / 4;
					const isEnteringFromTop = y - top < (bottom - top) / 4;
					const isEnteringFromBottom = bottom - y < (bottom - top) / 4;

					if (isEnteringFromLeft) return 'left';
					if (isEnteringFromRight) return 'right';
					if (isEnteringFromTop) return 'top';
					if (isEnteringFromBottom) return 'bottom';
					return 'hover-in';
				}
    "
			>

				<!-- Mousemove direction detection -->
				<div
					class="absolute inset-0"
				>
					<img class="lg:object-cover object-contain bg-white w-full h-full"
						 src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>"
						 alt="<?php echo esc_attr(get_the_title()); ?>">
				</div>


				<!-- Image -->
				<div class="w-full lg:h-64 h-32 overflow-hidden">

					<!-- Title -->
					<div
						class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 transition-all duration-300 opacity-0"
						:class="{
                        'group-hover:opacity-100': true, // Ensure title appears when hovered
                        '-translate-x-full group-hover:translate-x-0': direction === 'left',
                        'translate-x-full group-hover:translate-x-0': direction === 'right',
                        '-translate-y-full group-hover:translate-y-0': direction === 'top',
                        'translate-y-full group-hover:translate-y-0': direction === 'bottom'
                    }">
						<a href="<?php echo get_permalink(); ?>" class="text-white flex items-center justify-center size-full z-[2] text-lg">
							<?php the_title(); ?>
						</a>
					</div>
			</article>

		<?php endwhile; ?>
	</section>
<?php
endif;

// Reset post data
wp_reset_postdata();
?>

<?php get_footer(); ?>
