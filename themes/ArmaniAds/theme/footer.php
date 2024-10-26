</main>
<?php
if (!is_page_template('festival.php')):
	get_template_part('template-parts/layout/footer', 'content');
	get_template_part('template-parts/global/call-btn');
	get_template_part('template-parts/global/backToTop');
endif;
get_template_part('template-parts/global/preload');
wp_footer();
?>
</body>
</html>
