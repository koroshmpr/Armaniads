<?php
/** Template Name: Blog Page */
get_header();

// Get the current page number
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

// Define the number of posts per page (using WordPress settings)
$posts_per_page = get_option('posts_per_page');

// Create a custom query for pagination
$args = [
	'post_type' => 'post',
	'paged' => $paged,
	'posts_per_page' => $posts_per_page,
];
$query = new WP_Query($args);

if ($query->have_posts()) { ?>
	<section class="container grid gap-4 py-24 mx-auto px-6">
		<?php while ($query->have_posts()) :
			$query->the_post(); ?>
			<article class="bg-gray-200 p-8 flex lg:gap-16 gap-4 flex-wrap justify-center lg:justify-start items-start">
				<div class="grid gap-3 items-start flex-1">
					<h5 class="text-black/75 text-xl"><?php the_title(); ?></h5>
					<div class="details text-sm text-gray-600">
						<span class="category"><?php the_category(', '); ?></span> |
						<span class="author">توسط <?php the_author(); ?></span> |
						<span class="date"><?php echo get_the_date(); ?></span> |
						<span><?= do_shortcode('[reading_time]') ?> دقیقه</span>
					</div>
					<p><?= wp_trim_words(get_the_content(), 30) ?></p>
					<a href="<?= get_permalink(); ?>" class="btn-hover-primary items-end transition-colors px-6 py-2 w-fit">بیشتر</a>
				</div>
				<img class="object-cover size-80 order-first lg:order-last lg:size-56 aspect-[16/9]" alt="<?= get_the_title(); ?>"
					 src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>">
			</article>
		<?php endwhile; ?>

		<!-- Pagination Links -->
		<ul class="pagination-controls flex justify-center mt-8 gap-2 flex-wrap">
			<?php
			$pagination_links = paginate_links([
				'total' => $query->max_num_pages,
				'current' => $paged,
				'prev_text' => __('&laquo; Previous'),
				'next_text' => __('Next &raquo;'),
				'type' => 'array', // Return the links as an array
			]);

			if ($pagination_links) {
				foreach ($pagination_links as $link) {
					// Check if the item is a link or not
					if (strpos($link, '<a') !== false) {
						// Add Tailwind classes to the <a> elements
						$link = preg_replace('/<a /', '<a class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary" ', $link);
					} else {
						// If it's not a link, wrap it in a styled <span>
						$link = '<span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-secondary/90">' . $link . '</span>';
					}
					echo '<li>' . $link . '</li>';
				}
			}
			?>
		</ul>


	</section>
	<?php
} else {
	echo '<p>No posts found.</p>';
}

// Reset the main query loop
wp_reset_postdata();

get_footer();
?>
