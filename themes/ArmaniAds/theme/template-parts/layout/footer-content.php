<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Armani
 */

?>

<footer class="bg-primary py-16" id="footer">
	<div class="container text-white mx-auto grid lg:grid-cols-4 gap-8 lg:gap-4 item-center justify-center lg:justify-between">
		<div class="flex justify-center lg:justify-start item-center">
			<?php
			$args = array(
				'size' => '200',
				'class' => 'justify-center mb-5',
				'height' => '50'
			);
			get_template_part('template-parts/global/logo', null, $args); ?>
		</div>
		<div>
			<address class="grid gap-1 not-italic mb-3 justify-center lg:justify-start">
				<span class="text-center lg:text-start">نشانی :</span>
				<?= get_field('address' , 'option'); ?>
			</address>
			<?php
			$phone = get_field('phone', 'option');
			?>
			<a aria-label="call us" class="flex gap-1 justify-center lg:justify-start" href="tel:<?= $phone; ?>">
				<span>تلفن :</span>
				<?= $phone; ?>
			</a>
		</div>
		<div>
			<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
				<nav aria-label="<?php esc_attr_e( 'Footer Menu', 'armani' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_class'     => 'footer-menu lg:grid flex gap-2 justify-center lg:justify-start',
							'depth'          => 1,
						)
					);
					?>
				</nav>
			<?php endif; ?>
		</div>
		<div class="grid gap-1 justify-center lg:justify-start items-start">
			<span>ما را در شبکه‌های اجتماعی دنبال کنید</span>
			<div class="flex gap-3 items-center lg:pt-0 pt-5 justify-center lg:justify-start ">
				<?php
				$socials = get_field('social' , 'option');
				if($socials):
					foreach ($socials as $social):?>
						<a aria-label="<?= $social['name']; ?>" class="hover:text-secondary" target="_blank" href="<?= $social['link']['url']; ?>">
							<?php
							$args = array(
								'size' => 30
							);
							get_template_part('template-parts/svg/socials/' . $social['name'], null , $args); ?>
						</a>
					<?php endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
</footer>
