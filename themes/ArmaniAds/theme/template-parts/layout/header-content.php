<?php
$bg_class = '';
if (is_404() || !is_front_page() && is_home() && !in_array(get_post_type(), ['project', 'page', 'service'])) {
	$bg_class = 'bg-primary';
} elseif (get_post_type() == 'project') {
	$bg_class = 'bg-black bg-opacity-50';
}
?>
<header x-data="{ open: false, scrolled: false }"
		x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
		:class="scrolled ? 'bg-black bg-opacity-35 py-2' : '<?= $bg_class; ?> py-4'"
		class="fixed inset-x-0 top-0 text-secondary lg:px-8 lg:py-6 px-6 z-10 flex justify-between items-center transition-all duration-300"
		id="masthead">
	<div class="flex gap-4 items-center">
		<?php
		$args = array(
			'size' => '160',
			'height' => '40'
		);
		get_template_part('template-parts/global/logo', null, $args);
		?>
		<?php $phone = get_field('phone', 'option'); ?>
		<a class="text-white font-bold" aria-label="call us" href="tel:<?= $phone; ?>">
			<?= $phone; ?>
		</a>
	</div>
	<div class="flex gap-5 align-middle">
		<?php
		$contactBtn = get_field('contact-button', 'option');
		?>
		<a aria-label="go to contact page"
		   class="px-3 py-1 md:block hidden btn-hover-primary border"
		   href="<?= $contactBtn['link']['url'] ?? ''; ?>">
			<?= $contactBtn['text']; ?>
		</a>
		<button aria-labelledby="menuModal" @click="open = !open" class="text-white focus:outline-none">
			<svg width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
				<path fill-rule="evenodd"
					  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
			</svg>
		</button>
	</div>
	<div id="menuModal" x-show="open" x-cloak
		 :class="open ? 'flex' : 'hidden'"
		 class="fixed inset-0 bg-primary z-50 items-center justify-center">
		<button aria-controls="primary-menu" aria-expanded="false" @click="open = false"
				class="text-xl absolute top-10 left-10 focus:outline-none hover:text-white">
			<svg width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
				<path
					d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
			</svg>
		</button>
		<!-- Modal Content -->
		<div
			class="w-full transform transition-transform text-center text-secondary duration-300 ease-in-out p-6">
			<nav id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'armani'); ?>">
				<?php
				$args = array(
					'size' => '200',
					'class' => 'justify-center mb-5'
				);
				get_template_part('template-parts/global/logo', null, $args);
				?>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id' => 'primary-menu',
						'items_wrap' => '<ul id="%1$s" class="%2$s mt-8 lg:w-1/2 mx-auto text-white space-y-4 text-lg font-bold" aria-label="submenu">%3$s</ul>',
						'walker' => new Custom_Walker_Nav_Menu_With_Alpine() // Use a custom walker with Alpine
					)
				);
				?>

			</nav>
		</div>
	</div>
</header>
