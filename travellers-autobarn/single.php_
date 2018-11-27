
<?php
    get_header();
?> 

<?php include("includes/breadcrumbs.php"); ?>

<style>
  
	.temptable p, .temptable h4{
		margin:9px;
	}
	.guide img{
		max-width:100%;
	}
	
	@media(max-width:770px){
		.temptable p, .temptable h4{
			margin:0px;
		}
	}
  
  /* Google and Facebook Reviews - For Reviews Page Specifically */

  .wp-gr .wp-google-place,
  .wp-fbrev .wp-facebook-place,
   {
    display: none;
  }
  
  .wp-gr .wp-google-url,
  .wp-fbrev .wp-facebook-url {
    /* display: none; */
  }

  .wp-gr .wp-google-review,
  .wp-fbrev .wp-facebook-review {
    border-bottom: 1px solid #eee !important;
    padding: 15px 0 25px 0 !important;
  }
  
  .wp-gr .wp-google-review {
    background-image: url('http://www.travellers-autobarn.co.nz/wp-content/uploads/2017/12/poweredbygoogle.png') !important;
    background-size: 130px 20px !important;
    background-repeat: no-repeat !important;
    background-position: bottom 2px right 2px !important;
  }
  
  .wp-fbrev .wp-facebook-review {
    background-image: url('http://www.travellers-autobarn.co.nz/wp-content/uploads/2017/12/poweredbyfacebook.png ') !important;
    background-size: 147px !important;
    background-repeat: no-repeat !important;
    background-position: bottom 2px right 2px !important;
  }
  
  hr {
    margin: 20px 0 !important;
  }
  
</style>

<div class="section general">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding">
                <h1><?php the_title()?></h1>
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