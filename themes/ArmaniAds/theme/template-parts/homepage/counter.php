<?php
$counterSection = get_field('counter');
$bgCounter = $counterSection['background_type'];
?>
<section
	class="lg:py-28 py-16 bg-cover bg-primary grid justify-center items-center relative overflow-hidden">
	<?= ($bgCounter == 'image' && isset($counterSection['image']['url'])) ? 'style="background-image: url(' . $counterSection['image']['url'] . ')"' : ''; ?>
	<?php if ($bgCounter == 'video'): ?>
		<video class="size-full object-cover absolute inset-0 -z-1" autoplay muted loop playsinline>
			<source src="<?= $counterSection['video']['url'] ?? ''; ?>" type="video/mp4"/>
			<track kind="captions" srclang="en" label="English" default>
		</video>
	<?php endif ?>
	<div class="container w-screen mx-auto text-white z-[1]">
		<h5 class="text-5xl fw-bold text-center">
			<?= $counterSection['title'] ?? ''; ?>
		</h5>
		<?php
		$counters = $counterSection['counters'];
		if ($counters):
			?>
			<div class="grid gap-y-8 md:grid-cols-3 justify-center text-center pt-16 lg:pt-24">
				<?php foreach ($counters as $counter): ?>
					<div>
						<h6 class="text-5xl"><?= $counter['number'] ?? ''; ?>+</h6>
						<p><?= $counter['title'] ?? ''; ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
