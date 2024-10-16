<?php
/** Template Name: About Us */
get_header()
?>
<?php get_template_part('template-parts/global/banner-parallax'); ?>
<section class="container mx-auto lg:py-16 p-6 lg:px-0 " x-data="{ activeTab: 0 }">
	<?php $lists = get_field('lists');
	if ($lists):?>
		<div class="flex flex-wrap items-start relative">
			<div class="lg:basis-1/4 basis-full grid gap-2 lg:sticky top-32">
				<?php foreach ($lists as $index => $list): ?>
					<button :class="activeTab === <?= $index ?> ? '!bg-right !text-primary' : ''"
							@click="activeTab = <?= $index ?>"
							class="btn-hover-white !border flex rounded-2xl justify-between !border-primary py-2 px-5"><?= $list['title'] ?? ''; ?>
						<svg width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd"
								  d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
						</svg>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="lg:basis-3/4 basis-full relative about-list pt-8 lg:pt-0 lg:px-16">
				<?php foreach ($lists as $index => $list): ?>
					<div x-transition x-show="activeTab === <?= $index ?>"
						 :class="activeTab === <?= $index ?> ? 'translate-y-0' : 'translate-y-full'"
						 class="top-0"><?= $list['content'] ?? ''; ?></div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="basis-full">
			<?php foreach ($lists as $index => $list):
				if ($list['clients-show']):
					?>
					<div x-transition x-show="activeTab === <?= $index ?>"
						 :class="activeTab === <?= $index ?> ? 'translate-y-0' : 'translate-y-full'"
						 class="grid lg:grid-cols-9 grid-cols-3 gap-2 pt-8">
						<?php
						$clients = new WP_Query(array(
							'post_type' => 'client',
							'post_status' => 'publish',
							'posts_per_page' => -1
						));
						$counter = 1; // Initialize a counter
						while ($clients->have_posts()) : $clients->the_post();
							// Determine the class based on whether the counter is odd or even
							$class = ($counter % 2 == 0) ? 'grayscale-0 hover:grayscale' : 'grayscale hover:grayscale-0';
							?>
							<img class="object-cover border rounded-2xl border-gray-200 w-full h-full <?php echo $class; ?>"
								 src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>"
								 alt="<?php echo esc_attr(get_the_title()); ?>">

							<?php
							$counter++; // Increment the counter
						endwhile;
						?>

					</div>
				<?php
				endif;
			endforeach; ?>
		</div>
	<?php endif;
	?>
</section>

<?php get_footer(); ?>
