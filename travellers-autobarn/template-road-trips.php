<?php
/*
Template Name: Road Trips
*/
    get_header();
?> 

<?php // include("includes/breadcrumbs.php"); ?>

<?php include("includes/section-banner.php"); ?>

<div class="section general roadtrips-section">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">
			
			<div class="col-sm-12 col-xs-12">
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
							the_post();
                            // echo '<h2>'. get_the_title() .'</h2>'; 
                            the_content(); 
                        endwhile;
                    endif;
					?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="roadtrips-section row">
				<?php
				
					$current_page_id = get_the_ID();
					
					query_posts( array(
						'category_name'  => 'roadtrip',
						'post_type' => 'page',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'post_parent' => $current_page_id,
					) );
					
					if (have_posts()): 
						while(have_posts()): 
							the_post(); 
							
							echo '<div class="roadtrip col-lg-4 col-md-4 col-sm-6 col-xs-12">';
							echo 	'<div class="image-holder">';
							echo		'<a href="'. get_the_permalink() .'">';
										the_post_thumbnail( 'video-tips' );
							echo		'<div class="bg"></div>';			
							echo 		'<h3 class="post-title">'. get_the_title() .'</h3>';										
							echo		'</a>';
							echo 	'</div>';
							//echo	'<span class="post-description">'. get_the_excerpt() .'</span>';
							echo '</div>';
						endwhile;
					endif;
					
					wp_reset_query();
				?>				
				</div>
			</div>
			<?/* <div class="roadtrip-share col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
				<h3>SHARE</h3>
				<div class="share-social">
					<?php echo do_shortcode('[Sassy_Social_Share type="standard"]'); ?>
				</div>
				<div class="share-trip">
					<a href="<?php echo get_permalink(QUICK_QUOTE_PAGE_ID); //quick quote page ?>" class="btn btn-default">BOOK YOUR TRIP</a>
				</div>
			</div> */ ?>
			<div class="social-share col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class='share'>Share</p>
				<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
				<a class="btn btn-default" href="<?php echo get_permalink(QUICK_QUOTE_PAGE_ID); //quick quote page ?>">Book Your Trip</a>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
				<div class="itineraries-section row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2>Other Road Trips</h2>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0;">
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<?php
								// $value = rwmb_meta( '_othertrip' );
								// echo $value;
								echo get_field('other_roadtrips');
							?>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							
						</div>
					</div>

				<?php
					query_posts( array(
						'category_name'  => 'itinerary',
						'post_type' => 'page',
						'posts_per_page' => 9,
						'post__not_in' => array( $current_page_id ),
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
				<div class="load-more-wrap">
					<a next-page="2" class="btn btn-default load-more">See More Road Trips</a>
				</div>
				<script>
					jQuery(document).ready(function($){
						$('.load-more-wrap .load-more:not(.disabled)').on('click', function(){
							var next_page = $(this).attr('next-page');
							var page_id = '<?php echo get_the_ID(); ?>';
							
							var data = {
								action: 'load_more_roadtrips',
								'next_page': next_page,                      
								'current_page_id': page_id,                      
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
                  
	  </div>

	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>