<?php
/*
Template Name: Single Road Trip
*/
    get_header();
	
	$id = get_the_ID();
	wpb_set_post_views($id); //post counter
?> 

<?php // <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDjHi7a1ltzQslYxB8GqsqQBfb07Yu_pkE&sensor=false"></script> ?>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDuQ5zA1N7-IcAJnbMm_QoZLCNmRhFilNw&sensor=false"></script>
<style>
    
    .section-banner.type-clean h1 {
        color: rgba(0,0,0,0);
        text-shadow: none !important;
    }
</style>
<?php // include("includes/breadcrumbs.php"); ?>

<?php include("includes/section-banner.php"); ?>

<div class="section general roadtrips-section">

  <div class="container">

	<div class="row print-page-break">
	
	  <div class="post-content col-lg-8 col-md-8 col-sm-12 col-xs-12 padding">
				
		<?php 
		if (have_posts()): 
			while(have_posts()): 
				the_post();
				echo '<h2><span class="text-orange">Road trip: </span>'. get_the_title() .'</h2>'; 
				the_content(); 
				
				?>
				<div class="row no-print">
					<div class="social-share col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<p class='share'>Share</p>
						<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
						<a class="btn btn-default" href="<?php echo get_permalink(QUICK_QUOTE_PAGE_ID); //quick quote page ?>">Book Your Trip</a>
					</div>
					<div class="print-page col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<span class="print-text">Print this page</span>
						<a onClick="window.print();"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ico-file.png" /></a>
					</div>
				</div>	
				<?php
				
				
			endwhile;
		endif;
		?>				
                  
	  </div>
	  <div class="roadtrip-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<div class="roadtrip-stats">
	  
		<p class="sub-title quick-stats"><strong>QUICK STATS</strong></p>
		  <?php
		  $distance = get_field('distance');
		  $time_in_days = get_field('time_in_days');
		  $best_vehicle = get_field('best_vehicle');
		  ?>			
			<div class="row">
			<?php if($distance): ?>
					<div class="trip-info distance col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="circle-value no-print"></div><span class="info-title">TRIP DISTANCE</span><span class="info-value"><?php echo $distance; ?> mile</span>
					</div>
			<?php endif; ?>
			<?php if($time_in_days): ?>
					<div class="trip-info days col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="circle-value no-print"></div><span class="info-title">TRIP DURATION</span><span class="info-value"><?php echo $time_in_days > 1 ? $time_in_days . ' days' : $time_in_days . ' day'; ?></span>
					</div>
			<?php endif; ?>
			<?php if($best_vehicle): ?>
					<div class="trip-info best-vehicle col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="circle-value no-print"></div><span class="info-title">BEST VEHICLE</span><span class="info-value"><?php echo $best_vehicle; ?></span>
					</div>
			<?php endif; ?>
			</div>
		</div>
	  </div>
	</div>
	
	<div class="row">
	  <?php
	  // echo "<pre>"; get_post_meta(get_the_ID()); echo "</pre>";
	  
	  $map = get_field('point_of_interest');
	  $google_map_embed = get_field('google_map_embed');
	  $route_id = get_field('cm_maps_route');
	  // print_r($map);
	  if( !empty($map) || $route_id):
	  ?>
	  <div class="point-of-interest col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">	
		<h2 style="margin-top: 30px;">Points of Interest</h2>
		
		<?php
			$map_html="<script>
				function initialize()
				{
					var mycenter = new google.maps.LatLng(".$map['lat'].",".$map['lng'].");
					var mapProp = {
						center: mycenter,
						zoom:15,
						mapTypeId:google.maps.MapTypeId.ROADMAP
					};
					var map=new google.maps.Map(document.getElementById('googleMap')
					  ,mapProp);

					var marker=new google.maps.Marker({
						position:mycenter,
					});

					marker.setMap(map);
				}";
			
			
			   $map_html.="google.maps.event.addDomListener(window, 'load', initialize);";
			
			$map_html.="</script>";

			$map_html.="<div class='map_wrapper'  id='googleMap'></div> <!-- map -->";	
			
			if($google_map_embed){
				$map_html = '<iframe src="'. $google_map_embed .'" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
			}else if($route_id){
				$map_html = do_shortcode('[map_route id="'. $route_id .'"]');
			}
			
			echo $map_html;
		?>
		
	  </div>
	  <?php endif; ?>
	  	  
	  <?php if(have_rows('highlight', $id)): ?>
	  <div class="highlights col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">	
		<!-- <h2>Highlight</h2> -->
		
		<?php  
		while(have_rows('highlight', $id)):   
		
		the_row();
		?>
		<div class="highlight row">
			
			<div class="highlight-image col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<?php
				$highlight_image = get_sub_field('highlight_image');
				// echo $highlight_image ? "<img src='$highlight_image' />" : '';
				echo wp_get_attachment_image($highlight_image, 'travel-tips');
			?>
			</div>
			<div class="highlight-text col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php
				$sub_title = get_sub_field('sub_title');
				$title = get_sub_field('title');
				?>
				<?php if($sub_title): ?><span class="sub-title"><?php echo $sub_title; ?></span><?php endif; ?>
				<?php if($title): ?><span class="main-title"><?php echo $title; ?></span><?php endif; ?>
				<?php
				$highlight_text = get_sub_field('highlight_text');
				echo $highlight_text;
				?>
			</div>
		</div>
		<?php endwhile; ?>
	  </div>
	  <?php endif; ?>
	  
	  <div class="more col-lg-12 col-md-12 col-sm-12 col-xs-12 padding no-print">
		<?php
		$parent_id = wp_get_post_parent_id($id);
		?>
		<div class="social-share">
			<p class='share'>Share</p>
			<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
			<a href="<?php echo get_permalink($parent_id); ?>" class="btn btn-default">See More Road Trips</a>
		</div>
		
	  </div>

	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>