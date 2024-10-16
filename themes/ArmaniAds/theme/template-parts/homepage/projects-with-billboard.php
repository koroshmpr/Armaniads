<section class="text-center">
	<?php
	$front_page_id = get_option('page_on_front');
	$projectsSection = get_field('projects', $front_page_id);
	$projects = $projectsSection['project']; ?>
	<div class="container mx-auto py-16">
		<h4 class="font-bold text-title text-3xl"><?= $projectsSection['title']; ?></h4>
		<article class="p-4"><?= $projectsSection['content'] ?></article>
	</div>
	<?php if ($projects): ?>
		<div class="grid md:grid-cols-2">
			<?php foreach ($projects as $index => $project) :
				if (has_post_thumbnail($project->ID)) : ?>
					<a href="<?= get_permalink($project->ID); ?>" class="relative"
					x-data="{ isHovered: false }"
					@mouseenter="isHovered = true"
					@mouseleave="isHovered = false">
					<img width="900" height="400" src="<?= get_the_post_thumbnail_url($project->ID, 'full'); ?>"
						 alt="<?= get_the_title($project->ID); ?>"
						 :class="isHovered ? 'rotate-y-30' : 'rotate-0'"
						 class="h-auto w-full origin-right transition-all duration-500">
					<?php
					$billboardImage = get_field('billboard-img', $project->ID);
					if ($billboardImage) : ?>
						<img width="340" height="260"
							src="<?= $billboardImage['url']; ?>"
							 alt="<?= $billboardImage['title']; ?>"
							 :class="isHovered ? 'opacity-100' : 'opacity-0'"
							 class="absolute bottom-0 w-fit end-0 lg:h-64 h-36 object-cover transition-all duration-600">
					<?php endif;
				endif; ?>
				</a>
			<?php endforeach; ?>
		</div>
	<?php endif;
	?>
</section>
