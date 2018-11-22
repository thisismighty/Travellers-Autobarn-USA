<?php 
	/*$tabs = getLocationTabs();
	$tabcontent = getLocationContent();*/
?>
<?php /*

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
		background-color:#fff;
		margin-bottom:10px;
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
	
	.how-to-get {
	    display: none;
	}
	
/* 	.row-map {
	    display: none;
	}
	 *
	
	
	
</style> */ ?>


<script>
jQuery(document).ready(function() {
 
	$('#accordion > .panel').on('show.bs.collapse', function (e) {
        var heading = $(this).find('.panel-heading');
        heading.addClass("active-panel");
        
        
	});
	
	$('#accordion > .panel').on('hidden.bs.collapse', function (e) {
	    var heading = $(this).find('.panel-heading');
        heading.removeClass("active-panel");
        
	});
 
    
});
</script>

<div class="panel-group" id="help-accordion-1">
	
	<?php
		$tabs="";
		$count = 0;
		if ($_REQUEST['location'] !="")
		{
			$location =  $_REQUEST['location'];
		}
		$cat_id = get_cat_ID( 'Locations' );

		$args = array(
			'posts_per_page'   => 100,
			'offset'           => 0,
			'category'  => $cat_id,
			'order'=>'ASC',
			'orderby'=> 'menu_order',       
			'include'          => '',
			'exclude'          => '60',
			'post_type'        => 'page',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);

		$myposts = get_posts( $args );

		foreach ( $myposts as $v ):
			$class = "";

			$map = get_field('map', $v->ID); 
			$bottom = get_field('additional_data', $v->ID);
			$contact_heading = get_field('contact_heading', $v->ID);
			$contact = get_field('contact', $v->ID);
			$map_init ="";

			if (isset($_GET['debug'])){
				echo '<pre>'; print_r($map); echo '</pre>';
			}
			
	
			$count++;
			
			if( !empty($map) ){
				$map_init = "onclick='setTimeout(initialize_".$count.", 20);'";
			

				$map_options[] ="	
					google.maps.event.addDomListener(window, 'load', initialize_$count);
					function initialize_$count()
					{
						var mycenter = new google.maps.LatLng(".$map['lat'].",".$map['lng'].");
						var mapProp = {
							center: mycenter,
							zoom:15,
							mapTypeId:google.maps.MapTypeId.ROADMAP
						};
						var map = new google.maps.Map(document.getElementById('googleMap_$count')
						  ,mapProp);

						var marker = new google.maps.Marker({
							position:mycenter,
						});

						marker.setMap(map);
					}
					
					
				";
			}
			?>
				 <div class="panel panel-default panel-help">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$count?>" <?=$map_init?>>
					<div class="panel-heading">
						<h3 class="panel-title">
							<?php echo str_replace("Office", "", $v->post_title);?>
						</h3>
						<i class="fa fa-chevron-down position-absolute float-right"></i>
					</div>
					</a>
					<div id="collapse<?=$count?>" class="panel-collapse collapse">
						<div class="panel-body">
							<!--***************************-->
							<div class='row'>
								<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
									<?=$v->post_content?>
								</div>
								<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>

									<div class='panel-orange'>

										<div class='heading'><?=$contact_heading?></div>

										<div class='padding'>
											<?=$contact?>
										</div> <!-- padding -->
									</div> <!-- panel-orange -->
								</div>
							</div>	
                    
							<!--***************************-->
							<?php if( !empty($map) ): ?>
							<div class="row row-map">
								<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 map'>                               
									<div class='map_wrapper'  id='googleMap_<?=$count?>' style="height:500px;">

									</div>
								</div> <!-- map -->
							</div>
							<?php endif; ?>
							<!--***************************-->
							<div class="row how-to-get">
								<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>           
									<?php if (have_rows('how_to_get_here_from_airport', $v->ID) || have_rows('how_to_get_here_from_the_city', $v->ID)):?>
										<div class='panel-orange rounded-corners-med'>
											<div class='padding'>
												<?php if (have_rows('how_to_get_here_from_airport', $v->ID)): ?>
													<h3>How to get here from the airport</h3>
														<ul class='travel-icons'>
															<?php 
																while(have_rows('how_to_get_here_from_airport', $v->ID)):
																	the_row();
																	$method = strtolower(get_sub_field('method'));
																	if ($method == 'walking')
																	{
																		$method = 'walk';
																	}
																	$description = get_sub_field('description');
															?>
																<li class='<?=$method?>'><?=$description?></li>
															<?php
																endwhile;
															?>
														</ul>
												<?php endif; ?>        

												<?php if (have_rows('how_to_get_here_from_the_city', $v->ID)): ?>
													<h3>How to get here from the city</h3>
														<ul class='travel-icons'>
															<?php
																while(have_rows('how_to_get_here_from_the_city', $v->ID)):
																	the_row();
																	$method = strtolower(get_sub_field('method'));
																	if ($method == 'walking')
																	{
																		$method = 'walk';
																	}
																	$description = get_sub_field('description');
															?>
															<li class='<?=$method?>'><?=$description?></li>
															<?php
																endwhile;
															?>
														</ul>
												<?php endif; ?> 


										</div> <!-- padding -->

										</div> <!-- panel-orange -->
									<?php endif;?>
									<?=$bottom?>   
								</div>
							
							</div>
							<!--***************************-->
						</div>
					</div>
				</div>
	<?php
		endforeach;
	?>
</div>
<!--
<div class="hidden-lg hidden-md hidden-sm visible-xs">
	<a class="btn btn-default visible-xs" href="http://travellers-autobarn.vs.fusecms.com.au/quick-quote/">Get a Quote &amp; Book</a>
</div>
-->                           
                                
<script>
	
	google.maps.event.addDomListener(window, 'load', initialize);

<?php
		foreach ($map_options as $option){
			echo $option;
		}
	
	?>


function initialize() {
    var map;
    // Set the latitude & longitude for our location (London Eye)
	
	
	
	
    var myLatlng = new google.maps.LatLng(-33.875132,151.220103);
    var mapOptions = {
        center: myLatlng, // Set our point as the centre location
        zoom: 18, // Set the zoom level
        mapTypeId: 'roadmap', // set the default map type
        draggable: true,
        scrollwheel: false
    };

    // Create a styled map
    // Create an array of styles.
    var styles = [{
        "stylers": [
            { "saturation": -40 },
            { "lightness": 40 }
        ]
    }];

    // Create a new StyledMapType object, passing it the array of styles,
    // as well as the name to be displayed on the map type control.
    var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});
          
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    // Allow our satellite view have a tilted display (This only works for certain locations) 
    map.setTilt(45);

    //Associate the styled map with the MapTypeId and set it to display.
    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');

    // Create our info window content   
    var infoWindowContent = '<div class="info_content">' +
        '<span class="address">177 William St, Kings Cross, NSW 2010</span>' +
    '</div>';

    // Initialise the inforWindow
    var infoWindow = new google.maps.InfoWindow({
        content: infoWindowContent
    });
                
    // Add a marker to the map based on our coordinates
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: '177 William St, Kings Cross, NSW 2010',
        icon: 'http://travellers-autobarn.si.fusecms.com.au/HTML/assets/images/icons/map-marker.png'
    });

    // Display our info window when the marker is clicked
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.open(map, marker);
    });
 }
</script>
<script>
	jQuery(function($){
		$('.collapse').on('shown.bs.collapse', function(){
			$(this).parent().find(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-up");
		}).on('hidden.bs.collapse', function(){
			$(this).parent().find(".fa-chevron-up").removeClass("fa-chevron-up").addClass("fa-chevron-down");
		});
	});
</script>