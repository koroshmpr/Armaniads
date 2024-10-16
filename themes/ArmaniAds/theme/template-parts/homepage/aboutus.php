<?php
$aboutus = get_field('aboutus');

?>
<section class="min-h-52 py-16 px-6 lg:px-0 bg-fixed" style="background-image: url('<?= $aboutus['background']['url'] ?? ''; ?>')">
	<div class="container mx-auto text-center">
		<h3 class="font-bold text-title text-3xl"><?= $aboutus['title']; ?></h3>
		<article class="py-4"><?= $aboutus['content'] ?? ''; ?></article>
		<?php $cards = $aboutus['cards'];
		if ($cards):
			?>
			<div class="grid md:grid-cols-3 py-5 gap-6 items-center justify-center">
				<?php foreach ($cards as $card): ?>
					<div x-data="{ isHovered: false }"
						 @mouseenter="isHovered = true"
						 @mouseleave="isHovered = false"
						 class="rounded-2xl relative transition-all overflow-hidden flex flex-col p-5 items-start justify-end h-[500px] bg-cover"
						 style="background-image: url('<?= $card['image']['url'] ?? ''; ?>')">
						<div x-transition:enter.duration.500ms
							 x-transition:leave.duration.400ms class="absolute inset-0 transition-all duration-500 bg-gradient-to-t from-black ease-linear bg-opacity-25"
							 :class="isHovered ? 'lg:from-white' : 'lg:from-black '"></div>
						<h4 class="font-bold text-secondary z-[1] text-xl"><?= $card['title'] ?? ''; ?></h4>
						<article x-transition class="transition-all z-[1] pt-5 duration-300 text-white justify-center lg:text-black ease-linear"
								 :class="isHovered ? 'lg:h-fit lg:translate-y-0' : 'lg:translate-y-1/2 lg:h-0 lg:opacity-0'">
							<?= $card['content'] ?? ''; ?>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
