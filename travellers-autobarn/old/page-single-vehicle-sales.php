<?php
	/*
	Template Name: Single Vehicle - Sales
	*/
	get_header();
	get_sidebar('left');

	$car_image = get_field('car_image');
	$spec_sheet = get_field('spec_sheet');
?>

<?php if (have_posts()): while(have_posts()): the_post(); ?>
<div class="col-xs-7 general">

	<?php tab_breadcrumbs(); ?>

	<div class="vehicle">
		<div class="details">
			<h1><?php the_title(); ?></h1>
			<h2><?php the_field('subtitle') ?></h2>
			<img src="<?php echo $car_image['url'] ?>" alt="<?php echo $car_image['alt'] ?>">
		</div> <!-- details -->

		<div class="info-panel">
			<!--div class="price">
				<div class="label" id="from">From</div>
				<div class="number">$35</div>
				<div class="label">A Day!</div>
			</div-->
			<!--div class="conditions">*Conditions Apply - Prices may vary in Peak Seasons</div-->
			<!--a class="btn-medium" href="">Quick Quote</a-->
			<a class="btn-medium" href="/campervan-car-sales/sales-order-and-enquiry-form/">Email Us</a>
			<a class="btn-medium fancybox" href="<?php echo get_template_directory_uri() ?>/call-us.html" data-fancybox-type="iframe">Call Us</a>
		</div> <!-- info-panel -->
	</div> <!-- vehicle -->

	<?php the_content(); ?>

	<?php
		$gallery_images = get_field('gallery');
		if (sizeof($gallery_images) > 0): ?>
			<div class="vehicle-gallery"><?php
				foreach ($gallery_images as $img):
					?><a href="<?php echo $img['sizes']['large'] ?>" class="fancybox" rel="vehicle-gallery"><img src="<?php echo $img['sizes']['car-gallery-thumbnail'] ?>" alt="<?php echo $img['alt'] ?>" title="<?php echo $img['title'] ?>" width="<?php echo $img['sizes']['car-gallery-thumbnail-width'] ?>" height="<?php echo $img['sizes']['car-gallery-thumbnail-height'] ?>" /></a><?
				endforeach;
			?></div><?
		endif;
	?>

	<p><?php the_field('content_2'); ?></p>

	<div class="row vehicle-details">

		<div class="col-xs-4 panel1">
			<ul class="info-table">
				<li>
					<h3>BACKPACKERS<br />CAR INSURANCE</h3>
					<a href="<?php echo get_permalink(256) ?>" class="download">Click here for more info</a></li>
				</li>
			</ul>
		</div>

		<div class="col-xs-5 panel2">
			<a data-toggle="modal" data-target="#myModal" href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/vehicles/rentals/budgie-van/video.png"></a>

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

					<div class="modal-body">
					<iframe src="http://www.youtube.com/embed/94jb6pvfWxA?html5=1" width="620" height="430" frameborder="0" allowfullscreen></iframe>
					<!-- HTML5 is being used to display the video to fix bug in IE10 - all other browsers were working fine  -->
					</div> <!-- modal-body -->

					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div> <!-- modal-footer -->

					</div><!-- modal-content -->
				</div><!-- modal-dialog -->
			</div><!-- modal -->

		</div>

		<div class="col-xs-3 panel3">
<?php if ($spec_sheet['url']) { ?>
			<ul class="info-table">
				<li><h3>Spec<BR><span class="orange">Sheet</span></h3>
				<a href="<?php echo $spec_sheet['url'] ?>" class="download">Download here</a></li>
			</ul>
<?php } ?>
		</div>
	</div>

	<p><?php the_field('content_3'); ?></p>


	<?php if (get_field('display_spec_sheet_table')): ?>
	<ul class="info-table specs">
		<li><h3>Specification sheet</h3>
		<div class="row">
			<div class="col-xs-6">
				<h4>Vehicle specification</h4>
				<ul>
					<?php while (have_rows('vehicle_specifications')): the_row(); ?>
					<li><b><?php echo the_sub_field('name') ?>:</b> <?php echo the_sub_field('value') ?></li>
					<?php endwhile; ?>
				</ul>
			</div>

			<div class="col-xs-6">
				<h4>Beds</h4>
				<ul>
					<?php while (have_rows('beds')): the_row(); ?>
					<li><b><?php echo the_sub_field('name') ?>:</b> <?php echo the_sub_field('value') ?></li>
					<?php endwhile; ?>
				</ul>

				<h4>Dimensions</h4>
				<ul>
					<?php while (have_rows('dimensions')): the_row(); ?>
					<li><b><?php echo the_sub_field('name') ?>:</b> <?php echo the_sub_field('value') ?></li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6">
				<h4>Vehicle features</h4>
				<ul>
					<?php while (have_rows('vehicle_features')): the_row(); ?>
					<li><?php echo the_sub_field('vehicle_feature') ?></li>
					<?php endwhile; ?>
				</ul>
			</div>

			<div class="col-xs-6">
				<h4>Living Equipment</h4>
				<ul>
					<?php while (have_rows('living_equipment')): the_row(); ?>
					<li><?php echo the_sub_field('living_equipment') ?></li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12"><h4>Baby seat / Booster seat options:</h4></div>
			<div class="col-xs-6">
				<ul><?php
					$i = 0;
					while (have_rows('baby_seat_options')):
						$i++;
						the_row();

						// only show odds
						if ($i % 2 == 0) continue; ?>
					<li><B><?php echo the_sub_field('name') ?>:</B> <?php echo the_sub_field('value') ?></li>
					<?php endwhile; ?>
				</ul>
			</div>

			<div class="col-xs-6">
				<ul>
					<?php
					$i = 0;
					while (have_rows('baby_seat_options')):
						$i++;
						the_row();

						// only show evens
						if ($i % 2 != 0) continue; ?>
					<li><B><?php echo the_sub_field('name') ?>:</B> <?php echo the_sub_field('value') ?></li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</li>
	</ul>
	<?php endif; ?>

	<h3>Travellers Autobarn Car Sales Benefits</h3>

	<p><?php the_field('content_4'); ?></p>

	<div style="text-align:center;width:100%">
		<a class="btn-large" href="/campervan-car-sales/sales-order-and-enquiry-form/">Email Us</a>
		<a class="btn-large btn-large-last fancybox" href="<?php echo get_template_directory_uri() ?>/call-us.html" data-fancybox-type="iframe">Call Us</a>
	</div>
</div>

<?php endwhile; else: ?><p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<?php
	get_sidebar('right');
	get_footer();
