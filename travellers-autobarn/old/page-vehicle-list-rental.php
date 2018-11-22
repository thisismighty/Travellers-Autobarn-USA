<?php
	/*
	Template Name: Vehicle List - Rental
	*/
	get_header();
	get_sidebar('left');
?>

<?php if (have_posts()): while(have_posts()): the_post(); ?>
<div class="col-xs-7 general">

	<?php tab_breadcrumbs() ?>

	<h1><?php the_title() ?> - budget van rental</h1>
	<?php the_content() ?>

	<?php
		if (have_rows('cars')):
			$i = 0;
			while (have_rows('cars')):
				$i++;
				the_row();
				$car_image = get_sub_field('image');

				?><div class="vehicle">
					<div class="details">
						<h1><a href="<?php the_sub_field('read_more_link') ?>"><?php the_sub_field('title') ?></a></h1>
						<h2><?php the_sub_field('subtitle') ?></h2>
						<a href="<?php the_sub_field('read_more_link') ?>"><img src="<?php echo $car_image['url'] ?>" alt="<?php echo $car_image['alt'] ?>"></a>
					</div> <!-- details -->

					<div class="info-panel">
						<div class="price">
							<div class="label" id="from">From</div>
							<div class="number">$<?php the_sub_field('price') ?></div>
							<div class="label">A Day!</div>
						</div>
						<div class="conditions">*Conditions Apply - Prices may vary in Peak Seasons</div>
						<a class="btn-medium" href="/quick-quote">Quick Quote</a>
						<a class="btn-medium" href="/campervan-and-car-rental/rental-booking-and-enquiry-form/">Email Us</a>
						<a class="btn-medium fancybox" href="<?php echo get_template_directory_uri() ?>/call-us.html" data-fancybox-type="iframe">Call Us</a>
					</div> <!-- info-panel -->
				</div> <!-- vehicle -->
				<div class="vehicle">
					<?php the_sub_field('content') ?><br /><br />
					<a href="<?php the_sub_field('read_more_link') ?>">Read more...</a>
				</div> <!-- vehicle --><?php
			endwhile;
		endif;
	?>

	<?php the_field('secondary_content') ?>
</div>

<?php endwhile; else: ?><p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<?php
	get_sidebar('right'); 
	get_footer();
