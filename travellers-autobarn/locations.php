<?php
    /*
    Template Name: Locations
    */
    get_header();
?>
<?php // <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDjHi7a1ltzQslYxB8GqsqQBfb07Yu_pkE&sensor=false"></script> ?>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDuQ5zA1N7-IcAJnbMm_QoZLCNmRhFilNw&sensor=false"></script>

<style>
	.panel{
		border:0;
		
	}
	.panel-heading {
		background-color: #f9ad55 !important;
	}
	
	.panel-heading h4{
		margin:0;
	}
	
	.panel-heading h4 a{
		display:block;
		width:100%;
		color:#000;
		text-decoration: none;
		font-size:17px;
		padding:10px;
		background-image:url('<?php echo get_template_directory_uri();  ?>/assets/images/down-arrow.jpg');
		background-repeat:no-repeat;
		background-position:right center;
		
	}
	
	.how-to-get {
    /*display: none;*/
}
	
	.panel-body{
		border:0;
		background-color:#edebec;
	}
	
	.active-panel{
		background-color: #f89828 !important;
	}
	
	.active-panel h4 a{
		color:#fff !important;
		background-image:url('<?php echo get_template_directory_uri();  ?>/assets/images/up-arrow.jpg');
	}
	
	.panel-orange{
		border-radius:10px;
		margin-bottom:10px;
		//background-color:#edebec;
	}
	
	.panel-orange .heading{
		color:#ff922f;
		background-color:#262626;
		border-radius:10px 10px 0 0;
	}
	
	.panel-orange .heading a{
		color:#ff922f !important;
	}
	
	.map_wrapper{
		margin-bottom:10px;
	}
	
	.footer{
		padding-top:0;
	}
  
    
    /* Google and Facebook Reviews - For Locations Page Specifically */

    .wp-gr .wp-google-place,
    .wp-fbrev .wp-facebook-place {
      display: none;
    }
  
    .wp-gr .wp-google-url,
    .wp-fbrev .wp-facebook-url {
      /* display: none; */
    }

    .wp-gr .wp-google-review,
    .wp-fbrev .wp-facebook-review {
      border-bottom: 1px solid #ccc !important;
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
	
	
</style>
<?php include("includes/breadcrumbs.php"); ?>
<div class="section general">

    <div class="container">

	<div class="row">
	
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding">
                <h1><?php the_title()?></h1>
				
				<div style="background-color:#f1f1f1; display:table; padding:10px 0; border-radius:10px;">
					<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
						<?php 
							if (have_posts()): 
								while(have_posts()): 
									the_post(); 
									the_content(); 
								endwhile;
							endif;
						?> 
					</div>
					<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
						<div class='panel-orange'>
							<div class='heading'><?php the_field('contact_heading');?></div>
							<div class='padding'>
								<?php
									the_field('contact');
								?>
							</div> <!-- padding -->
						</div> <!-- panel-orange -->
					</div>
                <?php
                    $map = get_field('map');
                    $bottom = get_field('additional_data');
                        if( !empty($map) ){

                            $id = $post->ID;

                            $tabs.="<script>
                                function initialize()
                                {
                                    var mycenter = new google.maps.LatLng(".$map['lat'].",".$map['lng'].");
                                    var mapProp = {
                                        center: mycenter,
                                        zoom:15,
                                        mapTypeId:google.maps.MapTypeId.ROADMAP
                                    };
                                    var map=new google.maps.Map(document.getElementById('googleMap')
                                      ,mapProp);

                                    var marker=new google.maps.Marker({
                                        position:mycenter,
                                    });

                                    marker.setMap(map);
                                }";
                            
                            
                               $tabs.="google.maps.event.addDomListener(window, 'load', initialize);";
                            
                            $tabs.="</script>";

                            $tabs.="<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 map'>                               
                                <div class='map_wrapper'  id='googleMap'>

                                </div>
                            </div> <!-- map -->";
                        }
                        
                           
                            

                    $tabs.="<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 how-to-get'>";           
                        if (have_rows('how_to_get_here_from_airport', $id) || have_rows('how_to_get_here_from_the_city', $id) || have_rows('how_to_get_here_from_santa_monica', $id)){
                            $tabs.="<div class='panel-orange rounded-corners-med'>

                                <div class='padding'>";
                                    if (have_rows('how_to_get_here_from_airport', $id)):
                                        $tabs.="<h3>How to get here from the airport</h3>
                                            <ul class='travel-icons'>";
                                                while(have_rows('how_to_get_here_from_airport', $id)):
                                                    the_row();
                                                    $method = strtolower(get_sub_field('method'));
                                                    if ($method == 'walking')
                                                    {
                                                        $method = 'walk';
                                                    }
                                                    $description = get_sub_field('description');
                                                    $tabs.="<li class='$method'>$description</li>";
                                                endwhile;
                                            $tabs.="</ul>";
                                    endif;        

                                    if (have_rows('how_to_get_here_from_the_city', $id)):
                                        $tabs.="<h3>How to get here from the city</h3>
                                            <ul class='travel-icons'>";
                                                while(have_rows('how_to_get_here_from_the_city', $id)):
                                                    the_row();
                                                    $method = strtolower(get_sub_field('method'));
                                                    if ($method == 'walking')
                                                    {
                                                        $method = 'walk';
                                                    }
                                                    $description = get_sub_field('description');
                                                    $tabs.="<li class='$method'>$description</li>";
                                                endwhile;
                                            $tabs.="</ul>";
                                    endif; 
									
									if (have_rows('how_to_get_here_from_santa_monica', $id)):
                                        $tabs.="<h3>How to get here from Santa Monica</h3>
                                            <ul class='travel-icons'>";
                                                while(have_rows('how_to_get_here_from_santa_monica', $id)):
                                                    the_row();
                                                    $method = strtolower(get_sub_field('method'));
                                                    if ($method == 'walking')
                                                    {
                                                        $method = 'walk';
                                                    }
                                                    $description = get_sub_field('description');
                                                    $tabs.="<li class='$method'>$description</li>";
                                                endwhile;
                                            $tabs.="</ul>";
                                    endif; 


                            $tabs.="</div> <!-- padding -->

                            </div> <!-- panel-orange -->";
                        }
                        $tabs.="$bottom   
                    </div>
                ";
                        
                echo $tabs;
            ?>    
				</div>
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
