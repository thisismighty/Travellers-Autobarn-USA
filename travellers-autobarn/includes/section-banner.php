<?php
$banner_type = get_field('banner_type');
$banner_type = empty($banner_type)?'type_clean':$banner_type;
$banner_text = get_field('banner_text');
$banner_image = get_field('banner_image');

$banner_bg = $banner_image ? 'style="background: url('. $banner_image .') center bottom / cover no-repeat;"' : '';
$with_image = $banner_image ? 'with-image' : 'no-image';
?>
<div class="container_slider">
	<div class="section-banner <?php echo $banner_type ?> <?php echo $with_image ?>" <?php echo $banner_bg; ?>>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php
					
					$banner_type = !$banner_image && $banner_type=='type-box' ? 'type-clean':$banner_type;
					switch($banner_type){
						case 'type-box':
							?>
								<div class="banner-box">
									<h1><?php the_title(); ?></h1>
									<?php if($banner_text): ?><span class="banner-text"><?php echo $banner_text; ?></span><?php endif; ?>
								</div>
							<?php
							break;
						case 'type-clean':
						default:
							?>
							<h1><?php the_title(); ?></h1>
							<?php
							break;
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="tear_slider">
		<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/roadtrips_tear1.png">
	</div>
</div>