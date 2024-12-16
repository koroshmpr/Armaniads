<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Armani
 */

?><!doctype html>
<html class="overflow-x-hidden" <?php language_attributes(); ?>>
<head>
	<?php
	$focus_keyword = get_post_meta(get_the_ID(), 'rank_math_focus_keyword', true);
	?>
	<meta name="keywords" content="<?= $focus_keyword ??  get_bloginfo('name'); ?>">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<?php
	$scripts = get_field('header-scripts', 'option');
	echo $scripts ?? '';
	?>
</head>

<body <?php body_class(); ?>>
<?php
$scripts = get_field('body-scripts', 'option');
echo $scripts ?? '';
wp_body_open();
if (!is_page_template('festival.php')):
	get_template_part('template-parts/layout/header', 'content');
endif;
if (is_page_template('about-us.php')) {
	$background = get_field('bg-pattern-page', 'option')['url'] ?? '';
}

if (is_singular('project') || is_page_template('station.php') || is_page_template('billboard.php') || is_page_template('archive-project.php')) {
	$background = get_field('bg-pattern-project', 'option')['url'] ?? '';
}
?>

<main class="min-h-[70vh] <?= is_page_template('festival.php') ? 'bg-blue-950' : ''; ?> bg-no-repeat bg-fixed bg-cover"
	  style="background-image: url('<?php echo esc_url($background ?? ''); ?>')"
	  id="<?= get_post_type() ?? ''; ?>-<?= the_ID(); ?>">
