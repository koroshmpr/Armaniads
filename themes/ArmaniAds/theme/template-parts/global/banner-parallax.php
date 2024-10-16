<?php
$pageBanner = get_field('page-banner', 'option');

// Define different top, left, and size positions for each cloud
$clouds = [
	['t' => 'top-[75%] lg:top-[40%]', 'l' => 'lg:left-[2%] left-[0%]', 'h' => 'h-1/4' , 'm' => '12'],
	['t' => 'top-[65%] lg:top-[2%]', 'l' => 'lg:left-[20%] left-[0%]', 'h' => 'h-1/2' , 'm' => '9'],
	['t' => 'top-[45%] lg:top-[75%]', 'l' => 'left-[30%]', 'h' => 'h-2/5' , 'm' => '16'],
	['t' => 'top-[75%] lg:top-[35%]', 'l' => 'left-[48%]', 'h' => 'h-1/2' , 'm' => '20'],
	['t' => 'top-[40%] lg:top-[0%]', 'l' => 'left-[65%]', 'h' => 'h-2/5' , 'm' => '16'],
	['t' => 'top-[45%] lg:top-[55%]', 'l' => 'left-[90%]', 'h' => 'h-1/3' , 'm' => '15']
];
?>

<section x-data="parallaxEffect()" @mousemove="handleMouseMove($event)" @mouseleave="resetPosition()"
		 class="relative h-[500px] w-full overflow-hidden">
	<div class="absolute top-[18%] lg:top-1/2 start-[10%] z-[1] text-white">
		<div class="text-4xl"><?= $pageBanner['title'] ?? ''; ?></div>
		<div class="text-md"><?= $pageBanner['subtitle'] ?? ''; ?></div>
	</div>
	<img src="<?= $pageBanner['background']['url'] ?>" class="absolute top-0 left-0 w-full h-full object-cover">
	<img src="<?= $pageBanner['billboard']['url'] ?>"
		 class="absolute duration-400 bottom-0 object-cover inset-x-1/2 translate-x-1/2 w-auto h-4/6 lg:h-5/6 z-[2]">
	<img src="<?= $pageBanner['logo']['url'] ?>"
		 class="absolute duration-400 transition-all ease-linear drop-shadow-[20px_8px_0px_rgba(0,0,0,0.15)] top-[30%] lg:top-[17%] object-cover left-[15%] lg:left-[40%] w-auto h-4/6 lg:h-5/6 z-[2]"
		 :style="`transform: translate(${-x / 15}px, ${-y / 15}px);`">

	<!-- Repeat the cloud image 6 times with different positions and sizes -->
	<?php foreach ($clouds as $index => $cloud): ?>
		<img src="<?= $pageBanner['cloud']['url'] ?>"
			 class="absolute object-cover duration-400 transition-all ease-linear w-auto <?= $cloud['h'] ?> <?= $cloud['t'] ?> <?= $cloud['l'] ?>"
			 :style="`transform: translate(${-x / <?= $cloud['m'] ?>}px, ${-y / <?= $cloud['m'] ?>}px);`">
	<?php endforeach; ?>
</section>
<script>function parallaxEffect(){return{x:0,y:0,handleMouseMove(e){this.x=e.clientX-window.innerWidth/2,this.y=e.clientY-window.innerHeight/2},resetPosition(){this.x=0,this.y=0}}}</script>
