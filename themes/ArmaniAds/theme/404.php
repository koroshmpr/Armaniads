<?php
/**
 * Template Name: 404
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Armani
 */

get_header();
?>
	<section class="container pt-16">
		<div class="flex h-full flex-col justify-center items-center">
			<img src="<?= get_field('404-image', 'option')['url'] ?? ''; ?>" alt="404">
			<p class="text-primary">صفحه مورد نظر یافت نشد!</p>
			<a class="btn-hover-white px-4 py-2 mt-6" href="<?= home_url(); ?>">بازگشت</a>
		</div>
	</section>
<?php
get_footer();
