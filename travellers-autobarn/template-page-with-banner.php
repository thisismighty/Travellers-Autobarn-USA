<?php
	/* 
	Template Name: Page with banner
	*/
	
    get_header();
?> 

<?php include("includes/breadcrumbs.php"); ?>

<?php include("includes/section-banner.php"); ?>

<div class="section general">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding">
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post(); 
                            the_content(); 
                        endwhile;
                    endif;
					?> 
			
				
                  
	  </div>       

	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form-usa.php"); ?>
		
		<?php  
			if (in_category('all-sales-pages-tab-use')){
				include("includes/why-buy.php");
			}
			
			if (in_category('all-rental-page-tab-use')){
				include("includes/why-hire.php");
			}
        ?>
        <?php include("includes/subscribe-form.php"); ?>
              
        <?php include("includes/blog.php"); ?>
            
          <?php include("includes/sidebar-social.php"); ?> 
            
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>