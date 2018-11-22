<?php
$banner_type = 'type_clean';
$banner_image = get_field('banner_image');

$banner_bg = $banner_image ? 'style="background: url('. $banner_image .') center bottom / cover no-repeat;"' : '';
$with_image = $banner_image ? 'with-image' : 'no-image';
?>
<div class="container_slider">
	<div class="section-banner post-banner <?php echo $banner_type ?> <?php echo $with_image ?>" <?php echo $banner_bg; ?>>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					&nbsp;
				</div>
			</div>
		</div>
	</div>
</div>