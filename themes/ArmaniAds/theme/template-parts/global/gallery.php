<?php
$gallery = get_field('gallery');
if ($gallery): ?>
	<div x-data="{
        open: false,
        currentIndex: 0,
        openModal(index) {
            this.currentIndex = index;
            this.open = true;
            this.$nextTick(() => {
                window.swiperInstance.slideTo(this.currentIndex, 0); // Go to the clicked slide instantly
            });
        }
    }">
		<!-- Gallery Grid -->
		<section class="container mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-4 py-12 px-6 lg:px-0">
			<?php foreach ($gallery as $index => $image) { ?>
				<img
					class="object-cover w-full rounded-2xl aspect-[16/9] grayscale transition-colors hover:grayscale-0 cursor-pointer"
					src="<?= $image['url'] ?? ''; ?>" alt="<?= $image['title'] ?? ''; ?>"
					@click="openModal(<?= $index; ?>)">
			<?php } ?>
		</section>

		<!-- Modal Slider -->
		<div x-show="open" @click="open = false"
			 class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[10]" x-cloak>
			<div @click.stop class="relative w-full max-w-5xl px-6 lg:px-0">
				<button @click="open = false"
						class="absolute top-0 bg-primary transition-colors bg-opacity-75 hover:bg-white hover:text-primary right-0 p-4 rounded-full text-white text-3xl z-[11]">
					<svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
						<path
							d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
					</svg>
				</button>

				<div class="swiper swiper-project h-[90vh] rounded-xl">
					<div class="swiper-wrapper">
						<?php foreach ($gallery as $index => $image) { ?>
							<div class="swiper-slide flex items-center cursor-grab" data-index="<?= $index; ?>">
								<img class="w-full h-auto mx-auto rounded-2xl object-cover" src="<?= $image['url'] ?? ''; ?>"
									 alt="<?= $image['title'] ?? ''; ?>">
							</div>
						<?php } ?>
					</div>
					<div class="swiper-pagination fixed bg-black overflow-x-scroll lg:overflow-x-hidden bg-opacity-75 py-3 flex justify-center gap-2"></div>
				</div>
			</div>
		</div>
	</div>
	<script>
		window.galleryImages = <?= json_encode(array_column($gallery, 'url')); ?>;
		window.swiperInstance = null; // Store swiper instance globally
	</script>
<?php endif; ?>
