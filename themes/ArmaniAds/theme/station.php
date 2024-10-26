<?php
/* Template Name: station */
get_header();
?>
<?php $video = get_field('video');
if ($video):?>
	<video class="object-cover w-full h-full" autoplay muted loop playsinline
		   poster="<?= get_field('video-cover')['url'] ?? ''; ?>">
		<source src="<?= get_field('video')['url'] ?? ''; ?>" type="video/mp4"/>
	</video>
<?php endif; ?>
<section class="container px-6 lg:px-0">
	<?php get_template_part('template-parts/global/title-content'); ?>
</section>
	<?php get_template_part('template-parts/global/gallery'); ?>
<section class="container py-8 mb-6" x-data="{ activeStation: 1 }">
	<h3 class="text-2xl text-center font-bold text-primary pb-8 px-6 lg:px-0">
		<?= get_field('map_title'); ?>
	</h3>
	<div class="flex flex-col lg:flex-row gap-6 items-start justify-center">
		<!-- Map Section -->
		<div class="w-full lg:w-9/12 relative p-0">
			<img class="w-full h-auto border border-black/10 rounded-xl" src="<?= get_field('station_image')['url']; ?>"
				 alt="<?= get_field('station_image')['title']; ?>">
			<div class="absolute inset-0">
				<?php
				$station_counter = 1; // Initialize a counter for stations
				if (have_rows('station_list')) {
					while (have_rows('station_list')) {
						the_row();
						$station = get_sub_field('station');
						$coordinates = explode(',', $station);
						$left = trim($coordinates[0]);
						$top = trim($coordinates[1]);

						if (have_rows('stations')) {
							while (have_rows('stations')) {
								the_row();
								?>
								<button type="button" style="top: <?= $top; ?>; left:<?= $left; ?>"
										:class="activeStation == <?= $station_counter; ?> ? '!text-secondary' : ''"
										class="absolute rounded-full bg-transparent text-white hover:text-secondary hover:-translate-y-1 transition-all flex justify-center items-center shadow-none"
										@click="activeStation = <?= $station_counter; ?>">
									<svg width="25" height="25" fill="currentColor"

										 class="bi bi-geo-alt-fill transition-all size-4 lg:size-8 hover:scale-150"
										 viewBox="0 0 16 16">
										<path
											d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
									</svg>
								</button>
								<?php
								$station_counter++; // Increment the counter after each station
							}
						}
					}
				}
				?>
			</div>
		</div>
		<div class="w-11/12 mx-auto lg:w-3/12 mt-6 lg:mt-0 relative min-h-[250px]">
			<?php
			$station_counter = 1; // Reinitialize the counter for the tab contents
			if (have_rows('station_list')) {
				while (have_rows('station_list')) {
					the_row();

					if (have_rows('stations')) {
						while (have_rows('stations')) {
							the_row();
							?>
							<table x-show="activeStation === <?= $station_counter; ?>" x-transition
								   id="station-map-<?= $station_counter; ?>"
								   class="p-8 absolute top-0 inset-x-0 bg-gray-800 text-white transition-all border-0 rounded-xl w-full overflow-hidden text-sm">
								<thead>
								<tr class="border border-slate-500">
									<th class="px-4 py-2 text-center font-semibold" colspan="2">
										<?php
										$area = get_sub_field_object('area');
										if (is_array($area)) {
											echo $area['label'] . ' : ' . $area['value'];
										}
										?>
									</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$trClass = 'border-b border-slate-500 hover:bg-white/10';
								$thClass = 'px-4 py-2 text-right font-medium';
								$tdClass = 'px-4 py-2 text-left';
								?>
								<tr class="<?= $trClass; ?>">
									<?php $population = get_sub_field_object('population'); ?>
									<th class="<?= $thClass; ?>"><?= $population['label'] ?? ''; ?></th>
									<td class="<?= $tdClass; ?>"><?= $population['value'] ?? ''; ?></td>
								</tr>
								<tr class="<?= $trClass; ?>">
									<?php $man = get_sub_field_object('man'); ?>
									<th class="<?= $thClass; ?>"><?= $man['label'] ?? ''; ?></th>
									<td class="<?= $tdClass; ?>"><?= $man['value'] ?? ''; ?></td>
								</tr>
								<tr class="<?= $trClass; ?>">
									<?php $woman = get_sub_field_object('woman'); ?>
									<th class="<?= $thClass; ?>"><?= $woman['label'] ?? ''; ?></th>
									<td class="<?= $tdClass; ?>"><?= $woman['value'] ?? ''; ?></td>
								</tr>
								<tr class="<?= $trClass; ?>">
									<?php $family = get_sub_field_object('family'); ?>
									<th class="<?= $thClass; ?>"><?= $family['label'] ?? ''; ?></th>
									<td class="<?= $tdClass; ?>"><?= $family['value'] ?? ''; ?></td>
								</tr>
								<tr class="<?= $trClass; ?>">
									<?php $board_number = get_sub_field_object('station-board-number'); ?>
									<th class="<?= $thClass; ?>"><?= $board_number['label'] ?? ''; ?></th>
									<td class="<?= $tdClass; ?>"><?= $board_number['value'] ?? ''; ?></td>
								</tr>
								<tr class="<?= $trClass; ?>">
									<?php $social_class = get_sub_field_object('social-class'); ?>
									<th class="<?= $thClass; ?>"><?= $social_class['label'] ?? ''; ?></th>
									<td class="<?= $tdClass; ?>"><?= $social_class['value'] ?? ''; ?></td>
								</tr>
								</tbody>
							</table>
							<?php
							$station_counter++; // Increment the counter after each station tab
						}
					}
				}
			}
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
