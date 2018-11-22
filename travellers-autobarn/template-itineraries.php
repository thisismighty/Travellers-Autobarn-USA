<?php
/*
Template Name: Road Trip Itineraries
*/
    get_header();
	
	$id = get_the_ID();
?> 

<?php // <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDjHi7a1ltzQslYxB8GqsqQBfb07Yu_pkE&sensor=false"></script> ?>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDuQ5zA1N7-IcAJnbMm_QoZLCNmRhFilNw&sensor=false"></script>

<?php // include("includes/breadcrumbs.php"); ?>

<?php include("includes/section-banner.php"); ?>

<div class="section general roadtrips-section">

  <div class="container">

	<div class="row">
	
	  <div class="post-content col-lg-8 col-md-8 col-sm-12 col-xs-12 padding">
				
		<?php 
		if (have_posts()): 
			while(have_posts()):
				// echo "<h1>". get_the_title() ."</h1>";
				the_post();
				the_content(); 		
			endwhile;
		endif;
		?>				
                 
		
		<br />
		<br />
		<div class="social-share">
			<p class='share'>Share</p>
			<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
			<a class="btn btn-default" href="<?php echo get_permalink(QUICK_QUOTE_PAGE_ID); //quick quote page ?>">Book Your Trip</a>
		</div> 
	  </div>
	  <div class="roadtrip-info col-lg-4 col-md-4 col-sm-12 col-xs-12 padding">
	  
		<?php /* <p class="sub-title trending-now"><strong>TRENDING NOW</strong></p> */ ?>
		<p class="sub-title trending-now"><strong>MOST RECENT</strong></p>
		<?php						
		query_posts( array(
			'category_name'  => 'roadtrip',
			'post_type' => 'page',
			'post_status' => 'publish',
			'posts_per_page' => 3,
			// 'meta_key' => '_post_views_count',
			// 'orderby' => 'meta_value_num',
			'orderby' => 'date',
			'order' => 'DESC',
		) );
		?>							
			<div class="">
			<?php
			if (have_posts()): 
				$position=1;
				while(have_posts()): 
					the_post(); 
					
					$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'video-tips');
					$img_url = isset($img[0])?$img[0]:'';
					?>
					<div class="info-box col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:url('<?php echo $img_url?>')">
						<a class="full-link" href="<?php the_permalink(); ?>"></a>
						<?php /*<div class="circle-value"><span class="show-value"><?php echo $position; ?></span></div>*/?>
						<span class="info-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
						<?php /* <span class="info-date"><?php echo get_the_date(); ?></span> */ ?>
					</div>
				<?php 
				$position++;
				endwhile; 
				
				wp_reset_query();
				?>
			<?php endif; ?>
			</div>
	  </div>
	  
	</div>
	
	<div class="row">
	  
	  <div class="itineraries-section col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">
	  
		  <h2>Select by Starting location</h2>
		  
		  <div class="row display-data">
		  <?php
			query_posts( array(
				'category_name'  => 'itinerary',
				'post_type' => 'page',
				'posts_per_page' => 9,
				'paged' => 1,
				'orderby' => 'menu_order',
				'order' => 'ASC',
			) );
			
			if (have_posts()): 
				while(have_posts()): 
					the_post(); 
					
					echo '<div class="itinerary col-lg-4 col-md-4 col-sm-6 col-xs-12 ">';
					echo		'<a href="'. get_the_permalink() .'">';
								the_post_thumbnail( 'video-tips' );
					echo		'<div class="bg"></div>';
					echo 		'<h3 class="post-title">'. str_replace( 'Roadtrips', '', get_the_title() ) .'</h3>';										
					echo		'</a>';
					echo '</div>';
				endwhile;
			endif;
			
			
			wp_reset_query();
		  ?>
		  </div>
		  <?php /*
		  <div class="load-more-wrap">
			<a next-page="2" class="btn btn-default load-more">See More Road Trips</a>
		  </div>
		  */ ?>
		  <script>
			jQuery(document).ready(function($){
				$('.load-more-wrap .load-more:not(.disabled)').on('click', function(){
					var next_page = $(this).attr('next-page');
					
					var data = {
						action: 'load_more_roadtrips',
						'next_page': next_page,                      
					};
					
					$('.load-more-wrap .load-more').html('See More Road Trips...');
					$('.load-more-wrap .load-more').addClass('disabled');
					
					$.ajax({
						type: 'POST',
						dataType : 'json',
						url: '<?php echo admin_url('admin-ajax.php') ?>',
						data: data,
						success: function( response ) {         
							if( response['html'] ){
								$('.itineraries-section .display-data').append(response['html']);
								$('.load-more-wrap .load-more').attr('next-page', response['next_page']);
								
							
								$('.load-more-wrap .load-more').html('See More Road Trips');
								$('.load-more-wrap .load-more').removeClass('disabled');
							}else{
								$('.load-more-wrap .load-more').hide();
							
								$('.load-more-wrap .load-more').html('See More Road Trips');
								$('.load-more-wrap .load-more').removeClass('disabled');
							}							
						},
						error: function(){
							$('.load-more-wrap .load-more').removeClass('disabled');							
							$('.load-more-wrap .load-more').html('See More Road Trips');
						}
					});
				
					return false;
				});
			});
		  </script>
	  </div>
	  
	  <?php 
	  $headline = get_field('headline');
	  
	  if($headline):
	  ?>
	  <div class="headline col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">
		<?php
		echo $headline;
		?>
	  </div>
	  <?php endif; ?>
	  
	  <?php if(have_rows('videos', $id)): ?>
	  <div class="videos col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">	
		<h2>Road Trip Video Diary</h2>
		
		<?php  
		$no=1;
		while(have_rows('videos', $id)):   
		
		the_row();
		?>
		<div class="video row">
			
			<div class="video-image col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<?php
				$video_thumb = get_sub_field('video_thumb');
				$video_url = get_sub_field('video_url');
				$video_title = get_sub_field('video_title');
				$video_title = '<span class="video-title">'. $video_title .'</span>';
				$play_button = '<span class="play-wrap"><img src="'.get_template_directory_uri().'/assets/images/play-orange.png" /></span>';
				echo '<a href="'. $video_url .'" data-rel="lightbox-gallery-'. $no .'">' . wp_get_attachment_image($video_thumb, 'travel-tips') . $video_title . $play_button . '</a>';
				
			?>
			</div>
			<div class="video-text col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<?php
				$video_text = get_sub_field('video_text');
				echo $video_text;
			?>
			</div>
		</div>
		<?php 
		$no++;
		endwhile; ?>
	  </div>
	  <?php endif; ?>
	  
	  <?php 
	  $bottom_text = get_field('bottom_text'); 
	  
	  if($bottom_text):
	  ?>
	  <div class="bottom-text col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">
		<?php
		echo $bottom_text;
		?>
	  </div>
	  <?php endif; ?>

	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>