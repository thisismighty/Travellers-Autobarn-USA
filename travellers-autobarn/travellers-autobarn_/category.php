<?php
    get_header();
?> 

<?php include("includes/breadcrumbs.php"); ?>

<div class="section general">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 padding">
                <h1><?php the_title()?></h1>
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post(); 
                            the_content(); 
                        endwhile;
                    endif;
                ?> 
     
	  </div> <!-- padding -->
                  
                  

	  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form.php"); ?>
          
        <?php include("includes/subscribe-form.php"); ?>
              
        <?php include("includes/blog.php"); ?>
            
          
            
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>