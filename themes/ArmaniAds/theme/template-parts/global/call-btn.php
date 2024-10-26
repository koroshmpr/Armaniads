<a href="tel:<?= get_field('phone' , 'option') ?? ''; ?>" x-data="{ open: false, scrolled: false }"
		x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
		x-transition
		class="size-12 lg:hidden fixed bottom-4 bg-secondary justify-center transition-all items-center hover:bg-green-500 hover:text-white duration-500 flex text-primary rounded-full z-[5]"
		:class="scrolled ? 'left-4' : '-left-full' "
		aria-label="call us button">
	<svg width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
		<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
	</svg>
</a>
