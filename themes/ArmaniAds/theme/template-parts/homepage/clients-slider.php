<?php
$front_page_id = get_option('page_on_front');
$clientsSection = get_field('clients', $front_page_id);
$clients = $clientsSection['client']; ?>
<section class="bg-auto bg-left-top bg-no-repeat"
		 style="background-image: url('<?php echo esc_url($clientsSection['pattern']['url'] ?? ''); ?>')">
	<div class="container mx-auto text-center pt-16 px-4 bg-bottom bg-contain lg:bg-auto lg:bg-[right_center] bg-no-repeat"
		 style="background-image: url('<?php echo esc_url($clientsSection['background']['url'] ?? ''); ?>')">
		<h4 class="font-bold text-title text-3xl"><?= $clientsSection['title']; ?></h4>
		<article class="p-4 break-words"><?= $clientsSection['content'] ?></article>
		<div class="swiper clients-slider py-6">
			<?php if ($clients): ?>
				<div class="swiper-wrapper">
					<?php foreach ($clients as $index => $client) :
						if (has_post_thumbnail($client->ID)) : ?>
							<div class="swiper-slide">
							<img width="120" height="120" src="<?= get_the_post_thumbnail_url($client->ID, 'full'); ?>"
								 alt="<?= get_the_title($client->ID); ?>"
								 class="h-auto select-none transition-all grayscale hover:grayscale-0 duration-500">
						<?php
						endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="costumer-pagination my-4 text-center"></div>
				<div
					class="swiper-button-next -translate-x-1/2 transform -translate-y-1/2 text-primary bg-slate-50/50 p-6 rounded-full"></div>
				<div
					class="swiper-button-prev translate-x-1/2 transform -translate-y-1/2 text-primary bg-slate-50/50 p-6 rounded-full"></div>
			<?php endif;
			?>
		</div>
	</div>
</section>
