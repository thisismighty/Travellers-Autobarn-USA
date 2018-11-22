<?php if (have_rows('sliders')): ?>
<div class="container_slider">
	<div id="owl-demo" class="banner homepage owl-carousel">
		<?php
		while (have_rows('sliders')):
			the_row();
			$slide_image = get_sub_field('slider_image');
			$header_text = get_sub_field('slider_title');
			$subtext = get_sub_field('slider_subtitle');
			$link = get_sub_field('slider_link');
			$textposition = get_sub_field('horizontal_position')
				. " " . get_sub_field('vertical_position')
				. " " . get_sub_field('text_align');

			$title_color = "color:" . get_sub_field('title_color');
			$subtitle_color = "color:" . get_sub_field('subtitle_color');
			$newtab="";
			if (get_sub_field('open_in_new_tab') == 'Yes'){
				$newtab = "target='_blank'";
			}
			
			?>
			<div class="item">
				<a href="<?= $link ?>" <?=$newtab?>><img src="<?= $slide_image['url']; ?>" alt="<?= $header_text ?>"></a>
				<div class="text <?= $textposition ?>">
					<div class="main-heading">
						<a href="<?= $link ?>" <?=$newtab?>>
							<span class="orange" style="<?= $title_color; ?>">
								<?= $header_text ?>
							</span><br/>
							<span class="slider-subheading" style="<?= $subtitle_color; ?>">
								<?= $subtext ?>
							</span>
						</a>
					</div>
				</div> <!-- text -->
			</div> <!-- item -->
		<?php endwhile; ?>
	</div>
	<div class="tear_slider">
		<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/homepage_tear1.png">
	</div>
</div>
<?php endif; ?>
<script>
	jQuery(document).ready(function ($) {
		setTimeout(function(){
			jQuery("#owl-demo").owlCarousel({
				navigation: false,
				slideSpeed: 300,
				paginationSpeed: 400,
				singleItem: true,
				autoPlay: 5000,
				transitionStyle: "fade"
			});
		}, 500);
	});
</script>
