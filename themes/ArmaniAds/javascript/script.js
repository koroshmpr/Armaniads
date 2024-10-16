/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
import Alpine from 'alpinejs';
import Swiper from 'swiper/bundle';

document.addEventListener('DOMContentLoaded', function () {
	// Initialize Alpine.js
	window.Alpine = Alpine;
	Alpine.start();
	// Initialize other Swiper sliders
	const heroSlider = new Swiper('.hero_slider', {
		direction: 'horizontal',
		grabCursor: true,
		speed: 1500,
		effect: 'slide',
	});
	const clients = new Swiper('.clients-slider', {
		direction: 'horizontal',
		grabCursor: true,
		speed: 1500,
		spaceBetween: 10,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		pagination: {
			el: '.costumer-pagination',
			bulletActiveClass: 'active',
			clickable: true,
		},
		effect: 'slide',
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		slidesPerView: 3,
		slidesPerGroup: 3,
		breakpoints: {
			768: {
				slidesPerView: 10,
				slidesPerGroup: 10,
			}
		}
	});
	const swiper = new Swiper('.swiper-project', {
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
			renderBullet: function (index, className) {
				const images = window.galleryImages;
				return `<img src="${images[index]}" class="size-16 rounded-md object-cover ${className}">`;
			},
		},
		slidesPerView: 1, // Adjust this according to your needs
		spaceBetween: 10, // Space between slides
		centeredSlides: true, // Center the active slide
		on: {
			init: function () {
				// Save the instance to the global variable
				window.swiperInstance = this;
			},
			slideChange: function () {
				const activeIndex = this.activeIndex; // Get the active index
				// Center the active bullet
				const bullets = this.pagination.bullets;
				bullets.forEach((bullet, index) => {
					if (index === activeIndex) {
						bullet.scrollIntoView({ behavior: 'smooth', inline: 'center' });
					}
				});
			}
		}
	});
});
