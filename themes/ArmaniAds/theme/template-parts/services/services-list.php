<section class="lg:pt-20 pt-8 bg-white overflow-hidden" x-data="{ activeTab: 0 }">
	<?php
	$front_page_id = get_option('page_on_front');
	$servicesSection = get_field('services', $front_page_id);
	$services = $servicesSection['services'];
	?>

	<h2 class="text-title text-center px-3 lg:px-0 lg:text-3xl text-2xl mb-8"><?= $servicesSection['title'] ?? ''; ?></h2>

	<!-- Tabs -->
	<div
		class="flex flex-wrap lg:gap-5 gap-3 w-fit mx-auto justify-center mb-8 pb-3 lg:pb-0 border-b-4 border-secondary">
		<?php foreach ($services as $index => $service) :
			?>
			<button
				@click="activeTab = <?= $index ?>"
				:class="{'lg:text-primary lg:bg-white bg-primary text-secondary': activeTab === <?= $index ?>, 'text-secondary': activeTab !== <?= $index ?>}"
				class="px-4 py-2 transition-colors duration-200 font-bold rounded-xl relative">
				<?= $service->post_title; ?>
				<span
					x-transition
					:class="activeTab === <?= $index ?> ? 'lg:block' : 'lg:hidden'"
					class="absolute -bottom-2 bg-white size-3 right-1/2 rotate-45 hidden border-[3px] border-b-0 border-r-0 border-secondary"></span>
			</button>
		<?php endforeach; ?>
	</div>

	<!-- Tab Content -->
	<div class="content overflow-hidden relative">
		<?php foreach ($services as $index => $service) : ?>
			<div
				:class="activeTab === <?= $index ?> ? 'translate-y-0 ' : 'translate-y-full hidden'"
				class="space-y-1 grid lg:grid-cols-10 transition-all h-full lg:gap-3 items-stretch justify-between">
				<div class="lg:px-16 px-6 lg:col-span-4 flex flex-col flex-wrap justify-center items-center">
					<article class="text-justify"><?= $service->post_excerpt; ?></article>
					<a href="<?= get_permalink($service->ID); ?>"
					   class="inline-block btn-hover-white px-6 border border-primary py-2 my-4 my-lg-0 shadow">مشاهده
						بیشتر
					</a>
				</div>
				<?php
				$mobile = get_field('mobile-image', $service->ID);

				if (has_post_thumbnail($service->ID)) : ?>
					<img width="1140" height="270" src="<?= get_the_post_thumbnail_url($service->ID, 'full'); ?>"
						 alt="<?= get_the_title($service->ID); ?>"
						 class="h-auto <?= $mobile ? 'hidden lg:inline' : ''; ?> lg:col-span-6 object-cover">
				<?php endif;
				if ($mobile):?>
					<img width="375" height="87" src="<?= $mobile['url']; ?>"
						 alt="<?= get_the_title($service->ID); ?>"
						 class="h-auto lg:hidden object-cover">
				<?php endif;
				?>
			</div>
		<?php endforeach; ?>
	</div>
</section>
