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
		 class="relative overflow-hidden bg-cover bg-center transition-all my-16 duration-500">
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
					class="h-full w-full md:w-1/3 lg:w-1/6 bg-white lg:bg-transparent grid lg:flex justify-center items-end text-center lg:border-r-2 lg:border-white border-b-2 border-black/10 transition-all">
					<div class="inner p-4">
						<div :class="hover ? 'lg:text-white' : 'lg:text-primary'"
							 class="flex justify-center transition-all text-xl duration-500 font-bold lg:justify-start items-center gap-2">
							<span>0<?= $i; ?></span>
							<h4><?= $title; ?></h4>
						</div>
						<p :class="hover ? 'lg:translate-y-0 lg:h-auto' : 'lg:translate-y-full lg:opacity-0 lg:h-0'"
						   class="lg:text-white text-black delay-75 text-justify px-4 pt-4 transition-all duration-500"><?= $text; ?></p>
					</div>
					<img class="object-cover w-screen h-auto lg:hidden pb-4" src="<?= $image['url'] ?? ''; ?>"
						 alt="<?= $image['title'] ?? ''; ?>">
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</section>
<?php get_footer(); ?>
