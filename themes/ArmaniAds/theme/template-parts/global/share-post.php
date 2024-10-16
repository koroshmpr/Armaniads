<div x-data="{ hover: false, scrolled: false }"
	 x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 400 })"
	 x-transition
	 @mouseenter="hover = true" @click="hover = !hover" @mouseleave="hover = false"
	 :class="scrolled ? 'start-11' : '-start-full' "
	 class="pt-1 cursor-pointer lg:fixed mb-6 lg:mb-0 top-1/2 transition-all duration-700">
	<div x-transition x-show="hover"
		 class="justify-center bg-white lg:absolute bottom-full transition-all mb-4 lg:mb-0 inset-x-0 lg:grid flex w-fit mx-auto border rounded-full overflow-hidden">
		<?php
		$post_url = urlencode(get_permalink());
		$post_title = urlencode(get_the_title());
		$sizeSvg = '20';
		?>
		<a title="twitter" class="twitter text-black hover:text-white hover:bg-blue-500 p-2"
		   href="https://twitter.com/share?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>"
		   target="_blank">
			<svg width="<?= $sizeSvg; ?>" height="<?= $sizeSvg; ?>" fill="currentColor" class="bi bi-twitter"
				 viewBox="0 0 16 16">
				<path
					d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
			</svg>
		</a>
		<a title="Pinterest" class="pinterest text-black hover:text-white hover:bg-red-600 p-2"
		   href="https://pinterest.com/pin/create/button/?url=<?php echo $post_url; ?>&description=<?php echo $post_title; ?>"
		   target="_blank">
			<svg width="<?= $sizeSvg; ?>" height="<?= $sizeSvg; ?>" fill="currentColor" class="bi bi-pinterest"
				 viewBox="0 0 16 16">
				<path
					d="M8 0a8 8 0 1 0 4.48 14.926c-.16-.14-.31-.29-.43-.47-.3-.46-.37-1.09-.37-1.67 0-.61.16-1.12.43-1.59.47-.78.91-1.59 1.23-2.42.41-1.12.62-2.26.62-3.44 0-3.18-2.5-5.65-5.6-5.65C4.57.67 2 3.4 2 6.59c0 2.1.98 3.77 2.74 3.77.53 0 1.04-.12 1.47-.33.07-.03.13-.08.19-.12a1.55 1.55 0 0 1-.23-.34c-.09-.13-.16-.27-.21-.42-.1-.28-.15-.58-.15-.88 0-.35.07-.68.21-.99a2.1 2.1 0 0 1 .58-.8c.26-.22.6-.33.97-.33.44 0 .85.16 1.13.45.29.29.44.7.44 1.13 0 .17-.02.34-.07.5-.05.16-.12.3-.2.42-.21.31-.45.58-.73.82-.4.37-.85.7-1.34.97-.51.29-1.02.51-1.55.64-.49.13-.99.2-1.5.2-1.11 0-2.16-.35-3.12-1-1.15-.79-1.8-1.95-1.8-3.39C.8 2.67 4.2 0 8 0z"/>
			</svg>
		</a>
		<a title="LinkedIn" class="linkedin text-black hover:text-white hover:bg-blue-700 p-2"
		   href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>"
		   target="_blank">
			<svg width="<?= $sizeSvg; ?>" height="<?= $sizeSvg; ?>" fill="currentColor" class="bi bi-linkedin"
				 viewBox="0 0 16 16">
				<path
					d="M0 1.146C0 .513.324 0 .725 0h14.55c.4 0 .725.513.725 1.146v13.708c0 .633-.324 1.146-.725 1.146H.725A.723.723 0 0 1 0 14.854V1.146zm4.943 12.248V5.847H2.542v7.547h2.401zm-1.2-8.629c-.837 0-1.356-.554-1.356-1.248C2.387 2.56 2.922 2 3.785 2c.863 0 1.356.56 1.356 1.247 0 .694-.494 1.248-1.356 1.248zm4.908 8.629V9.359c0-.226.016-.451.085-.614.185-.452.608-.922 1.317-.922.929 0 1.301.694 1.301 1.71v5.012h2.401v-5.396c0-2.89-1.54-4.23-3.593-4.23-1.653 0-2.388.92-2.801 1.563v.034h-.016a5.98 5.98 0 0 1 .016-.034V5.847H6.542c.03.61 0 7.547 0 7.547h2.401z"/>
			</svg>
		</a>
		<a title="facebook" class="facebook text-black hover:text-white hover:bg-blue-600 p-2"
		   href="https://www.facebook.com/sharer.php?u=<?php echo $post_url; ?>" target="_blank">
			<svg width="<?= $sizeSvg; ?>" height="<?= $sizeSvg; ?>" fill="currentColor" class="bi bi-facebook"
				 viewBox="0 0 16 16">
				<path
					d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
			</svg>
		</a>
	</div>
	<div class="flex lg:flex-col gap-3 items-center justify-center">
        <span class="border w-fit p-2 text-primary rounded-full">
           <svg width="15" height="15" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16"
				style="enable-background:new 0 0 16 16;" xml:space="preserve"><path
				   d="M11,2.5C11,1.1,12.1,0,13.5,0S16,1.1,16,2.5C16,3.9,14.9,5,13.5,5c-0.7,0-1.4-0.3-1.9-0.9L4.9,7.2c0.2,0.5,0.2,1,0,1.5l6.7,3.1c0.9-1,2.5-1.2,3.5-0.3s1.2,2.5,0.3,3.5s-2.5,1.2-3.5,0.3c-0.8-0.7-1.1-1.7-0.8-2.6L4.4,9.6c-0.9,1-2.5,1.2-3.5,0.3s-1.2-2.5-0.3-3.5s2.5-1.2,3.5-0.3c0.1,0.1,0.2,0.2,0.3,0.3l6.7-3.1C11,3,11,2.8,11,2.5z"></path></svg>
        </span>
		<span class="text-primary">اشتراک</span>
	</div>
</div>
