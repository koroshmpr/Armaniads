<?php
get_header();
/* Template Name: Agermap */

$agermap = get_field('agermap');
$first_image_url = $agermap[0]['image']['url'] ?? ''; // Get the first image URL
?>
<?php get_template_part('template-parts/global/banner-parallax'); ?>
<section class="container px-6 lg:px-0">
	<?php get_template_part('template-parts/global/title-content'); ?>
	<?php get_template_part('template-parts/global/gallery'); ?>
</section>
<section x-data="{ activeImage: '<?= $first_image_url; ?>' }"
		 x-init="activeImage = '<?= $first_image_url; ?>'"
		 :style="{ backgroundImage: activeImage ? 'url(' + activeImage + ')' : '' }"
		 class="relative overflow-hidden bg-cover bg-center transition-all mt-16 duration-500">
	<div class="w-full lg:h-[600px] bg-black/25 lg:flex grid justify-center flew-wrap items-center">
		<?php if ($agermap) {
			$i = 0;
			foreach ($agermap as $row) {
				$i++;
				$title = $row['title'];
				$image = $row['image'];
				$text = $row['text'];
				?>
				<div
					x-data="{ hover: false }"
					@mouseenter="activeImage = '<?= $image['url'] ?? ''; ?>'; hover = true"
					@mouseleave="hover = false"
					:class="{ 'lg:bg-gradient-to-t lg:from-blue-950 lg:from-20% ': hover }"
					class="h-full w-full md:w-1/3 lg:w-1/6 bg-white lg:bg-transparent grid lg:flex justify-center items-end text-center lg:border-r-2 lg:border-white border-b-2 border-primary/50 transition-all">
					<div class="inner pt-8 lg:pt-4 p-4">
						<div :class="hover ? 'lg:text-white' : 'lg:text-primary'"
							 class="flex justify-center transition-all text-xl duration-500 font-bold lg:justify-start items-center gap-2">
							<span>0<?= $i; ?></span>
							<h4><?= $title; ?></h4>
						</div>
						<p :class="hover ? 'lg:translate-y-0 lg:h-auto' : 'lg:translate-y-full lg:opacity-0 lg:h-0'"
						   class="lg:text-white text-black delay-75 text-justify px-4 pt-4 transition-all duration-500"><?= $text; ?></p>
					</div>
					<article x-data="{ isOpen: false, scale: 1 }">
						<!-- Trigger Image -->
						<img
							class="object-cover w-screen h-auto lg:hidden pb-10 cursor-pointer"	src="<?= $image['url'] ?? ''; ?>" alt="<?= $image['title'] ?? ''; ?>"
							@click="isOpen = true">
						<!-- Modal -->
						<div
							x-show="isOpen"
							class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50"
							@click.away="isOpen = false"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="opacity-0 scale-90"
							x-transition:enter-end="opacity-100 scale-100"
							x-transition:leave="transition ease-in duration-300"
							x-transition:leave-start="opacity-100 scale-100"
							x-transition:leave-end="opacity-0 scale-90"
						>
							<div class="relative w-full h-full max-w-screen max-h-screen overflow-auto">
								<div class="flex items-center justify-center w-full h-full">
									<img
										:style="{ transform: 'scale(' + scale + ')' }"
										class="object-contain origin-right transition-transform duration-300 cursor-pointer"
										src="<?= $image['url'] ?? ''; ?>"
										alt="<?= $image['title'] ?? ''; ?>"
									>
								</div>
								<div class="fixed bottom-4 left-0 right-0 flex justify-center gap-3">
									<button	class="bg-primary text-white px-4 py-2 rounded-full" @click="scale = Math.min(scale + 0.1, 3)">+</button>
									<button	class="bg-primary text-white px-4 py-2 rounded-full" @click="scale = Math.max(scale - 0.1, 1)">-</button>
									<button	class="bg-red-600 text-white px-4 py-2 rounded-full" @click="isOpen = false; scale = 1">x</button>
								</div>
							</div>
						</div>
					</article>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</section>
<?php get_footer(); ?>
