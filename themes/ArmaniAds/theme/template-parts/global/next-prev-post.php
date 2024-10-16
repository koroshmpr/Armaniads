<?php
$prev_post = get_adjacent_post(FALSE, '', TRUE);
$next_post = get_adjacent_post(FALSE, '', FALSE);
$imgClass = 'rounded-lg mb-2 object-cover size-24 grayscale hover:grayscale-0 transition-all ease-linear';
?>

<nav class="navigation container mx-auto post-navigation px-5 lg:px-0 my-5 pt-5 border-t border-gray-200" role="navigation">
	<div class="nav-links flex <?= empty($prev_post) ? 'justify-end' : 'justify-between'; ?>">
		<?php if (!empty($prev_post)) { ?>
			<a class="nav-previous basis-1/3 lg:basis-1/6 flex flex-col items-center text-center"
			   title="<?= esc_attr($prev_post->post_title); ?>"
			   href="<?= esc_url(get_permalink($prev_post->ID)); ?>"
			   rel="prev">
				<img class="<?= $imgClass; ?>"
					 title="<?= esc_attr($prev_post->post_title); ?>"
					 src="<?= esc_url(get_the_post_thumbnail_url($prev_post->ID)); ?>"
					 alt="<?= esc_attr($prev_post->post_title); ?>">
				<span class="meta-nav text-gray-500" aria-hidden="true">قبلی</span>
				<span class="sr-only">آیتم قبل:</span>
				<span class="text-primary font-bold hover:text-cyan-700 text-base"><?= esc_html($prev_post->post_title); ?></span>
			</a>
		<?php } ?>

		<?php if (!empty($next_post)) { ?>
			<a class="nav-next basis-1/3 lg:basis-1/6 flex flex-col items-center text-center"
			   title="<?= esc_attr($next_post->post_title); ?>"
			   href="<?= esc_url(get_permalink($next_post->ID)); ?>"
			   rel="next">
				<img class="<?= $imgClass; ?>"
					 title="<?= esc_attr($next_post->post_title); ?>"
					 src="<?= esc_url(get_the_post_thumbnail_url($next_post->ID)); ?>"
					 alt="<?= esc_attr($next_post->post_title); ?>">
				<span class="meta-nav text-gray-500" aria-hidden="true">بعدی</span>
				<span class="sr-only">آیتم بعد:</span>
				<span class="text-primary font-bold hover:text-cyan-700 text-base"><?= esc_html($next_post->post_title); ?></span>
			</a>
		<?php } ?>
	</div>
</nav>
