<?php
/*
Template Name: Landing Page (Blog)
*/
    get_header();
	$post_id = get_the_ID();
?>

<?php // include("includes/breadcrumbs.php"); ?>

<?php include("includes/section-banner.php"); ?>

<div class="section general landing-section">
	
  <div class="container">

	<div class="row">
	
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">
				
				<div class="top_content">
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post(); 
                            the_content(); 
                        endwhile;
                    endif;
					?>
				</div>

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
						$max_posts=15;
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