<?php
/** Template Name: Contact Us */
get_header()
?>
<section style="background-image: url('<?= get_field('background')['url']; ?>')" class="bg-cover bg-no-repeat">
	<div class="bg-black bg-opacity-50 backdrop-blur-sm">
		<div class="container lg:py-52 py-16 px-6 lg:px-0 mx-auto flex flex-wrap gap-8 lg:gap-16 justify-center lg:justify-between items-stretch">
			<div class="basis-full lg:basis-2/5 grid gap-3">
				<div class="text-white border-2 rounded-2xl text-center border-white p-4 bg-primaryMask leading-loose mb-4">
					<?= get_field('form-title'); ?>
				</div>
				<?= do_shortcode('[gravityform id="' . get_field('id-form') . '" title="false" description="false" ajax="true"]') ?>
			</div>
			<div class="basis-full order-first lg:order-last lg:basis-2/5 flex flex-col mx-auto justify-end items-end text-white">
				<h1 class="text-bolder mb-3 lg:text-4xl text-xl text-center lg:text-end"><?= get_field('contact-title');?></h1>
				<?php
				$phone = get_field('phone', 'option');
				?>
				<a class="flex gap-1 justify-center hover:text-secondary lg:justify-end" href="tel:<?= $phone; ?>">
					<?= $phone; ?>
					<svg  width="28" height="28" fill="currentColor" class="bi bi-telephone-fill border rounded-md border-white p-1" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
					</svg>
				</a>
				<?php $email = get_field('email', 'option'); ?>
				<a class="flex gap-1 justify-center hover:text-secondary lg:justify-end" href="mailto:<?= $email; ?>">
					<?= $email; ?>
					<svg width="28" height="28" fill="currentColor" class="bi bi-envelope-fill border rounded-md border-white p-1" viewBox="0 0 16 16">
						<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
					</svg>
				</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
