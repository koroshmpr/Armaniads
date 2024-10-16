<a class="navbar-brand <?= $args['class'] ?? ''; ?> flex items-center" href="<?= home_url() ?>">
	<?php
	$logoType = get_field('logo_type', 'option');
	$logoSvg = get_field('site_logo_svg', 'option');
	$logoImg = get_field('site_logo_image', 'option');
	if ($logoType == 'svg') {
		echo $logoSvg;
	}
	if ($logoType == 'img') { ?>
		<img width="<?= $args['size'] ?? '160'; ?>" height="<?= $args['height'] ?? '40'; ?>" class="img-fluid object-cover" src="<?= esc_url($logoImg['url']) ?>"
			 alt="<?= esc_attr($logoImg['title']) ?>">
	<?php } ?>
</a>
<?php
//instruction
//$args = array(
//	'size' => '200'
//);
//get_template_part('template-parts/global/logo', null, $args);
//?>
