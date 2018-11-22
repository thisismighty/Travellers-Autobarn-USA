<?php
/*
Template Name: Travel Tips
*/
    get_header();
	
	$id = get_the_ID();
?> 

<?php // include("includes/breadcrumbs.php"); ?>

<div class="section-banner banner-travel-tips">
	<h1><?php the_title()?></h1>
</div>
<div class="section general travel-tips-section">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">
				
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post(); 
                            the_content(); 
                        endwhile;
                    endif;
					?>

				<div class="articles-section row">
				<?php
					query_posts( array(
						'category_name'  => 'travel-tips',
						'post_type' => 'post',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC',
					) );
					
					if (have_posts()): 
						while(have_posts()): 
							the_post(); 
							
							echo '<div class="travel-tips col-lg-6 col-md-6 col-sm-6 col-xs-12 ">';
							echo 	'<div class="image-holder">';
							echo		'<a href="'. get_the_permalink() .'">';
										the_post_thumbnail( 'travel-tips' );
							echo		'<div class="bg"></div>';
							echo 		'<h3 class="post-title">'. get_the_title() .'</h3>';										
							echo		'</a>';
							echo 	'</div>';
							echo	'<span class="post-description">'. get_the_excerpt() .'</span>';
							echo	'<a class="btn btn-default" href="'. get_the_permalink() .'">Read More</a>';
							echo '</div>';
						endwhile;
					endif;
					
					wp_reset_query();
				?>				
				</div>
				
				<div class="videos-section row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2>How-To-Videos</h2>
					</div>
				<?php
				/*
					query_posts( array(
						'category_name'  => 'video-tips',
						'post_type' => 'post',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC',
					) );
					
					if (have_posts()): 
						while(have_posts()): 
							the_post(); 
							
							echo '<div class="video-tips col-lg-4 col-md-4 col-sm-6 col-xs-12 ">';
							echo		'<a href="'. get_the_permalink() .'">';
										the_post_thumbnail( 'video-tips' );
							echo 		'<h3 class="post-title">'. get_the_title() .'</h3>';										
							echo		'</a>';
							echo '</div>';
						endwhile;
					endif;
					
					
					wp_reset_query(); */
				?>				
				<?php if(have_rows('videos', $id)): ?>
					<?php
									
					$no=1;
					while(have_rows('videos', $id)):   
		
					the_row();	
					$video_title =  get_sub_field('video_title');
					$video_thumb =  get_sub_field('video_thumb');
					$video_url =  get_sub_field('video_url');
					?>
					
					<div class="video-tips col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
						<a data-rel="lightbox-gallery-<?php echo $no; ?>" href="<?php echo $video_url; ?>">
							<?php  echo wp_get_attachment_image($video_thumb, 'video-tips'); ?>
							<h3 class="post-title"><?php echo $video_title; ?></h3>
						</a>
					</div>
					<?php $no++; ?>
					<?php endwhile; ?>
				<?php endif; ?>
				</div>
                  
	  </div>

	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>