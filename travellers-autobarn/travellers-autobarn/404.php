<?php
	wp_safe_redirect(site_url());

    get_header();
?> 

<?php include("includes/breadcrumbs.php"); ?>

<div class="section general">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding">
                <h1>404</h1>
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post(); 
                            the_content(); 
                        endwhile;
                    endif;
                ?> 
                <p><?= get_field('page_not_found_text', 'option')?></p>
	  </div> <!-- padding -->
                  
                  

	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form.php"); ?>
          
        <?php include("includes/subscribe-form.php"); ?>
              
        <?php include("includes/blog.php"); ?>
            
          
            
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>