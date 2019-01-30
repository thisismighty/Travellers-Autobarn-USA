<?php
    /*
    Template Name: Contact
    */
    get_header();
?> 
<?php include("includes/breadcrumbs.php"); ?>


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
        <div class="row add-bottom">
        
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <h2>Call Us</h2>  
              <?php the_field('call_us');?>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <h2>Opening Hours Reservations</h2> 
              <?php the_field('opening_hours_reservations');?>
            </div>
          
        </div> <!-- row -->
          
        <h3>
            <?php 
                if(get_field('visit_our_branches_title') !=""):
                    echo get_field('visit_our_branches_title');
                else:
                    echo "Visit our Travellers Autobarn Branches";
                endif;
            ?>
            
        </h3>
        
        <?php          
            $cat_id = get_cat_ID( 'Locations' );
            $args = array(
                'posts_per_page'   => 100,
                'offset'           => 0,
                'category'  => $cat_id,

                'orderby'          => 'title',
                'order'            => 'ASC',
                'include'          => '',
                'exclude'          => '',
                'post_type'        => 'page',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true );



                $myposts = get_posts( $args );


                foreach ( $myposts as $post ) : 
                    setup_postdata( $post ); 
                    $id = $post->ID;
                    $subtitle = get_field('subtitle');
                    $img = get_field('car_image');
                    $price = str_replace('$','',get_field('price'));
        ?>
        
            <a href="<?php the_permalink();?>" class="btn btn-default btn-sm"><?php the_title();?></a>
        
    
        <?php 
            endforeach; 
            wp_reset_postdata(); 
        ?>  
            <br/><br/>
        <h3>
            <?php 
                if(get_field('live_availability_title') !=""):
                    echo get_field('live_availability_title');
                else:
                    echo "Live Availability Quotes/Bookings";
                endif;
            ?>
            
        </h3>
        <?php the_field('live_availability_quotes');?>
        
        <h3>
            <?php 
                if(get_field('email_us_hire_title') !=""):
                    echo get_field('email_us_hire_title');
                else:
                    // echo "Email Us for Campervan & Car Hire";
                endif;
            ?>
            
        </h3>
        <?php the_field('email_us_for_campervan_car_hire');?>

          
	  </div> <!-- padding -->
                  
                  

	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form-usa-v2.php"); ?>
          
        <?php include("includes/subscribe-form.php"); ?>
              
        <?php include("includes/blog.php"); ?>  
            
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>