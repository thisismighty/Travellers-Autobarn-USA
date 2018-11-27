<?php
   get_header();
   $post_id = get_the_ID();
?> 

<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDuQ5zA1N7-IcAJnbMm_QoZLCNmRhFilNw&sensor=false"></script>
<style>
    
    .section-banner.type-clean h1 {
        color: rgba(0,0,0,0);
        text-shadow: none !important;
    }
</style>

<div style="position: relative;">
	<?php include("includes/section-blog-banner.php"); ?>
	<?php /*<div class="bg"></div> */ ?>
</div>

<div class="section general blogpost">

  <div class="container">

	<div class="row print-page-break">
	
	  <div class="post-content col-lg-8 col-md-8 col-sm-12 col-xs-12 padding">
				
		<?php 
		if (have_posts()): 
			while(have_posts()): 
				the_post();
				$subtitle = get_field('blog_sub_title');
				
				if ($subtitle) 
					echo '<span class="blog-sub-title">' . $subtitle . '</span>';
				else
					echo '<span class="blog-sub-title">Blog Feature Article</span>';
				
				echo '<h1>'. get_the_title() .'</h1>'; 
				the_content(); 
				
				?>
				<div class="row no-print">
					<div class="social-share col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<p class='share'>Share</p>
						<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
						<a class="btn btn-default" href="<?php echo get_permalink(QUICK_QUOTE_PAGE_ID); //quick quote page ?>">Book Your Trip</a>
					</div>
				</div>	
				
				<div class="row middle-content">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php $middle_text = get_field('page_middle'); if($middle_text) echo $middle_text; ?>	
					</div>	
				</div>
				<?php
				
				
			endwhile;
		endif;
		?>				
                  
	  </div>
	  
	  <div class="sidebar padding col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<?php include("includes/booking-form-usa.php"); ?>
		<?php include("includes/subscribe-form.php"); ?>
		<?php include("includes/blog.php"); ?>
	  </div>
	
	</div>
	
	<div class="row bottom-content">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php $bottom_text = get_field('page_bottom'); if($bottom_text) echo $bottom_text; ?>	
		</div>	  	
	</div> <!-- row -->
	
	<div class="row padding no-print">
		<div class="social-share col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<p class='share'>Share</p>
			<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
			<a class="btn btn-default" href="<?php echo get_permalink(QUICK_QUOTE_PAGE_ID); //quick quote page ?>">Book Your Trip</a>
		</div>

	</div>
	
	<div class="row">
	
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">
		
			<div class="orange-border"></div>

			<div class="articles-section row">
				<div class="blog-section col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">

				  <?php
					$categories=get_the_category();
					foreach($categories as $category){
						switch($category->slug){
							// case "budget-travellers":
							// case "campervan-travel-tips":
							// case "family-campervan-travel-tips":
							// case "inside-tab":
							// case "customer-experiences":
							// case "winter-campervan-hire-in-new-zealand":
							case "blog":
									$category_slug=$category->slug;
								break;
						}
					}
					
					// $excludes=get_guides_preview_ids();
					$excludes[]=$post_id;
					$excludes[]=5451;
					$max_posts=3;
					if($_GET['test']){
						echo "<pre>"; print_r($excludes); echo "</pre>";
						echo $category_slug;
					}
					
					function new_excerpt_more($more) {
						return '...';
					}
					add_filter('excerpt_more','new_excerpt_more');						
					include "includes/blog-posts.php";
					remove_filter('excerpt_more','new_excerpt_more');	
					?>
				</div>
			</div>
	  </div>

	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>