<div x-data="{ loading: true, minimumTimePassed: false }"
	 x-init="
        setTimeout(() => minimumTimePassed = true, <?= get_field('preloader_time' , 'option') ?? '1000'; ?>);
        window.onload = () => {
            if (minimumTimePassed) {
                loading = false;
            } else {
                const checkInterval = setInterval(() => {
                    if (minimumTimePassed) {
                        loading = false;
                        clearInterval(checkInterval);
                    }
                }, 50);
            }
        }"
	 x-show="loading"
	 class="fixed inset-0 bg-white z-[100] flex items-center justify-center transition-all">
	<div class="w-full h-full inset-0 flex transition duration-500 items-center justify-center">
		<img width="200" height="70" class="w-[200px] h-auto object-contain animate-bounce" src="<?= get_field('preloader', 'option')['url']; ?>" alt="Armani">
	</div>
</div>
