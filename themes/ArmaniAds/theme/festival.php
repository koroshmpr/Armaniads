<?php
get_header();
/* Template Name: festival */
?>
<header x-data="{scrolled: false }"
		x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
		:class="scrolled ? 'bg-primary py-2' : 'py-4'"
		class="fixed inset-x-0 top-0 text-secondary lg:px-8 lg:py-6 px-6 z-10 flex justify-between items-center transition-all duration-300"
		id="masthead">
	<?php
	$args = array(
		'size' => '160',
		'height' => '40'
	);
	get_template_part('template-parts/global/logo', null, $args);
	?>
	<?php $phone = get_field('phone', 'option'); ?>
	<a class="text-white rounded-full transition-all border px-4 shadow-2xl py-1 border-white bg-primary hover:bg-white hover:text-primary font-bold"
	   aria-label="call us" href="tel:<?= $phone; ?>">
		تماس با ما
	</a>
</header>
<?php
$hero = get_field('hero');
if ($hero):
	?>
	<section class="bg-primary">
		<div class="container flex flex-col py-20 gap-10 px-3 lg:px-0">
			<?php
			$heroImage = $hero['image'];
			$heroImageMobile = $hero['image_mobile'];
			?>
			<picture>
				<source media="(min-width: 576px)" srcset="<?= $heroImage['url'] ?? ''; ?>">
				<source media="(max-width: 575px)" srcset="<?= $heroImageMobile['url'] ?? ''; ?>">
				<img class="w-full object-cover h-auto" src="<?= $heroImage['url'] ?? ''; ?>" alt="">
			</picture>
			<a class="text-white rounded-full border px-4 mx-auto shadow-2xl py-1 border-white bg-secondary hover:bg-white hover:text-primary font-bold"
			   aria-label="call us" href="tel:<?= $phone; ?>">
				تماس با ما
			</a>
			<?php $benefits = $hero['benefits'];
			if ($benefits):
				?>
				<div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
					<?php foreach ($benefits as $benefit): ?>
						<div class="rounded-2xl bg-white flex flex-col gap-3 p-5 justify-center items-center">
							<img class="size-20 object-cover" src="<?= $benefit['icon']['url'] ?? ''; ?>"
								 alt="<?= $benefit['icon']['title'] ?? ''; ?>">
							<h2><?= $benefit['title'] ?></h2>
						</div>

					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif;
$aboutUs = get_field('about-us');
if ($aboutUs):
	?>
	<section class="bg-blue-950 py-16">
		<div class="container text-white">
			<h3 class="text-4xl font-bold text-center pb-5"><?= $aboutUs['title']; ?></h3>
			<article class="text-justify"><?= $aboutUs['content']; ?></article>
		</div>
	</section>
<?php endif;
$contactUs = get_field('contact-us');
if ($contactUs) : ?>
	<section class="bg-primary py-20 text-white top-curve">
		<div class="container flex flex-col gap-8 items-center justify-center px-3 lg:px-0">
			<img style="filter:drop-shadow(0 0 26px #ffffff9c);" class="size-52 object-contain"
				 src="<?= $contactUs['image']['url'] ?? ''; ?>" alt="<?= $contactUs['image']['title'] ?? ''; ?>">
			<h5><?= $contactUs['title'] ?></h5>
			<a class="text-6xl px-4 mx-auto font-bold transition-all"
			   aria-label="call us" href="tel:<?= $phone; ?>">
				021-74036
			</a>
			<article class="text-center w-full border-t-2 border-secondary pt-5">
				<?= $contactUs['content'] ?? ''; ?>
			</article>
		</div>
	</section>
	<section class="bg-blue-950 py-16">
		<div class="container flex justify-center border-t-2 border-secondary pt-5">
			<div class="lg:basis-1/3"><?= do_shortcode('[gravityform id="' . get_field('form-id') . '" title="false" description="false" ajax="true"]') ?></div>
		</div>
	</section>
	<footer class="fixed bottom-0 inset-x-0 bg-primary py-4 top-curve flex justify-center items-center z-10">
		<a class="text-xl px-4 mx-auto text-white font-bold flex gap-3 transition-all"
		   aria-label="call us" href="tel:<?= $phone; ?>">
			021-74036
			<svg width='25' height='25' viewBox='0 0 30 30' version='1.1' class="animate-bounce duration-1000">
				<g id='surface1'>
					<path style=' stroke:none;fill-rule:nonzero;fill:#fff ;fill-opacity:1;'
						  d='M 23.710938 18.582031 C 23.09375 17.945312 22.355469 17.601562 21.570312 17.601562 C 20.789062 17.601562 20.042969 17.9375 19.402344 18.578125 L 17.402344 20.570312 C 17.238281 20.484375 17.074219 20.402344 16.914062 20.320312 C 16.6875 20.203125 16.472656 20.097656 16.289062 19.984375 C 14.414062 18.792969 12.710938 17.242188 11.078125 15.234375 C 10.285156 14.234375 9.753906 13.390625 9.367188 12.539062 C 9.886719 12.0625 10.367188 11.570312 10.835938 11.09375 C 11.015625 10.917969 11.191406 10.734375 11.367188 10.554688 C 12.699219 9.226562 12.699219 7.503906 11.367188 6.171875 L 9.640625 4.445312 C 9.445312 4.25 9.242188 4.046875 9.050781 3.84375 C 8.671875 3.449219 8.273438 3.046875 7.859375 2.667969 C 7.246094 2.058594 6.511719 1.734375 5.738281 1.734375 C 4.96875 1.734375 4.21875 2.058594 3.585938 2.667969 C 3.582031 2.671875 3.582031 2.671875 3.574219 2.679688 L 1.421875 4.851562 C 0.613281 5.660156 0.148438 6.648438 0.046875 7.792969 C -0.105469 9.644531 0.441406 11.367188 0.859375 12.492188 C 1.882812 15.261719 3.417969 17.824219 5.703125 20.570312 C 8.476562 23.882812 11.8125 26.5 15.625 28.339844 C 17.082031 29.03125 19.023438 29.847656 21.195312 29.988281 C 21.328125 29.992188 21.46875 30 21.59375 30 C 23.058594 30 24.285156 29.472656 25.25 28.429688 C 25.253906 28.417969 25.265625 28.410156 25.273438 28.398438 C 25.601562 28 25.984375 27.636719 26.382812 27.253906 C 26.652344 26.992188 26.933594 26.71875 27.203125 26.433594 C 27.832031 25.78125 28.160156 25.023438 28.160156 24.246094 C 28.160156 23.460938 27.824219 22.707031 27.1875 22.074219 Z M 25.976562 25.25 C 25.96875 25.25 25.96875 25.257812 25.976562 25.25 C 25.730469 25.515625 25.476562 25.757812 25.203125 26.023438 C 24.792969 26.417969 24.375 26.828125 23.980469 27.289062 C 23.34375 27.972656 22.589844 28.296875 21.601562 28.296875 C 21.507812 28.296875 21.40625 28.296875 21.308594 28.289062 C 19.429688 28.171875 17.683594 27.4375 16.371094 26.808594 C 12.789062 25.074219 9.640625 22.609375 7.027344 19.488281 C 4.867188 16.886719 3.421875 14.480469 2.464844 11.898438 C 1.878906 10.320312 1.664062 9.09375 1.757812 7.933594 C 1.820312 7.191406 2.105469 6.578125 2.632812 6.054688 L 4.789062 3.894531 C 5.101562 3.601562 5.429688 3.445312 5.753906 3.445312 C 6.152344 3.445312 6.472656 3.683594 6.675781 3.886719 C 6.683594 3.894531 6.691406 3.902344 6.695312 3.90625 C 7.082031 4.269531 7.449219 4.640625 7.835938 5.039062 C 8.03125 5.242188 8.234375 5.445312 8.4375 5.65625 L 10.164062 7.382812 C 10.835938 8.054688 10.835938 8.675781 10.164062 9.347656 C 9.980469 9.53125 9.804688 9.714844 9.621094 9.890625 C 9.089844 10.433594 8.582031 10.941406 8.03125 11.433594 C 8.019531 11.449219 8.007812 11.453125 8 11.46875 C 7.457031 12.011719 7.558594 12.542969 7.671875 12.90625 C 7.675781 12.921875 7.683594 12.941406 7.691406 12.960938 C 8.140625 14.050781 8.773438 15.074219 9.734375 16.296875 L 9.742188 16.304688 C 11.488281 18.457031 13.332031 20.136719 15.363281 21.421875 C 15.625 21.585938 15.890625 21.71875 16.144531 21.84375 C 16.371094 21.957031 16.585938 22.066406 16.769531 22.179688 C 16.796875 22.191406 16.820312 22.210938 16.847656 22.226562 C 17.0625 22.332031 17.265625 22.382812 17.472656 22.382812 C 18 22.382812 18.328125 22.054688 18.433594 21.945312 L 20.601562 19.78125 C 20.816406 19.566406 21.15625 19.304688 21.558594 19.304688 C 21.949219 19.304688 22.273438 19.550781 22.46875 19.769531 C 22.476562 19.773438 22.476562 19.773438 22.480469 19.78125 L 25.96875 23.269531 C 26.621094 23.914062 26.621094 24.578125 25.976562 25.25 Z M 25.976562 25.25 '/>
					<path style=' stroke:none;fill-rule:nonzero;fill:#fff ;fill-opacity:1;'
						  d='M 16.210938 7.136719 C 17.871094 7.414062 19.378906 8.199219 20.582031 9.402344 C 21.785156 10.605469 22.5625 12.113281 22.847656 13.773438 C 22.917969 14.191406 23.277344 14.480469 23.691406 14.480469 C 23.742188 14.480469 23.785156 14.476562 23.835938 14.46875 C 24.304688 14.390625 24.613281 13.949219 24.539062 13.480469 C 24.195312 11.472656 23.246094 9.644531 21.796875 8.195312 C 20.347656 6.742188 18.515625 5.792969 16.511719 5.453125 C 16.042969 5.375 15.605469 5.6875 15.523438 6.148438 C 15.441406 6.609375 15.746094 7.058594 16.210938 7.136719 Z M 16.210938 7.136719 '/>
					<path style=' stroke:none;fill-rule:nonzero;fill:#fff ;fill-opacity:1;'
						  d='M 29.964844 13.234375 C 29.402344 9.929688 27.84375 6.921875 25.449219 4.527344 C 23.058594 2.132812 20.050781 0.578125 16.746094 0.0117188 C 16.28125 -0.0703125 15.84375 0.246094 15.761719 0.710938 C 15.6875 1.179688 15.996094 1.613281 16.464844 1.699219 C 19.417969 2.199219 22.109375 3.597656 24.246094 5.730469 C 26.386719 7.871094 27.78125 10.5625 28.28125 13.511719 C 28.351562 13.929688 28.710938 14.222656 29.125 14.222656 C 29.171875 14.222656 29.21875 14.214844 29.269531 14.207031 C 29.730469 14.140625 30.046875 13.695312 29.964844 13.234375 Z M 29.964844 13.234375 '/>
				</g>
			</svg>
		</a>
	</footer>
	<style>
		.gform_body input {
			border-width: 0 0 1px 0!important;
			border-color:#ffffffa1!important;
			border-radius: 0!important;
			padding:5px!important;
			background-color: transparent !important;
			outline:unset!important;
		}
		.gform_body input::placeholder {
			color: #ffffffa1
		}
		.gform_button {
			background-color: transparent!important;
			border: 1px solid white!important;
			border-radius: 30px!important;
			color: white!important;
		}
		.gform_button:hover {
			border: 1px solid rgb(210 175 116)!important;
			color: rgb(210 175 116)!important;
		}
		.top-curve {
			border-top-left-radius: 100% 80px !important;
			border-top-right-radius: 100% 80px !important;
		}
	</style>
<?php endif;
get_footer(); ?>
