<?php
$sliderType = get_field('slide-type');
?>
<section id="heroSlide" class="swiper hero_slider w-100 relative">
	<div class="swiper-wrapper">
		<?php
		$slider = get_field('slider');
		if ($slider) :
			foreach ($slider as $index => $slide):
				$headingLevel = $index < 5 ? $index +1 : 6;  ?>
				<div class="swiper-slide relative">
					<h<?= $headingLevel ?>
						class="text-white w-fit lg:text-4xl text-3xl absolute text-center mx-auto lg:mx-0 lg:text-start lg:top-1/2 top-3/4 md:start-10 inset-x-0 font-bold"><?= $slide['title'] ?? ''; ?></h<?= $headingLevel; ?>>
					<?php
					$type = $slide['bg-type'];
					if ($type == 'image'):
						?>
						<img loading="lazy" class="object-cover w-screen lg:h-screen" src="<?= $slide['image']['url'] ?? ''; ?>"
							 alt="<?= $slide['image']['title'] ?? ''; ?>">
					<?php endif;
					if ($type == 'video'):
						?>
						<video loading="lazy" class="object-cover w-screen lg:h-screen" autoplay muted loop playsinline
							   poster="<?= $slide['video-cover']['url'] ?? ''; ?>">
							<source src="<?= $slide['video']['url'] ?? ''; ?>" type="video/mp4"/>
							<track kind="captions" srclang="en" label="English" default>
						</video>
					<?php endif; ?>
				</div>
			<?php
			endforeach;
		endif; ?>
	</div>
	<svg class="absolute z-[5] overflow-visible bottom-0.5 inset-x-1/2 hidden lg:inline" width="30" height="47" viewBox="0 0 247 390"
		 version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
		 style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
		<path class="stroke-white stroke-[15px] fill-none animate-bounce duration-1000"
			  d="M123.359,79.775l0,72.843"></path>
		<path class="stroke-white stroke-[15px] fill-none -translate-y-24"
			  d="M236.717,123.359c0,-62.565 -50.794,-113.359 -113.358,-113.359c-62.565,0 -113.359,50.794 -113.359,113.359l0,143.237c0,62.565 50.794,113.359 113.359,113.359c62.564,0 113.358,-50.794 113.358,-113.359l0,-143.237Z"></path>
	</svg>
</section>

