<?php
	/*
	Template Name: Home Page
	*/

get_header();
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
	function popup(url, title, w, h, scrollbars) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);

        scrollbars = typeof scrollbars !== 'undefined' ? scrollbars : 'no';

        window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars='+scrollbars+', resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }
</script>

<style>
	/* For two buttons on homepage */
	.btn-alignright-less-margin { margin-bottom:5px !important; }
	/* Headings - Homepage */
	/*
	.container{
		max-width:1220px !important;
	}
	*/
	
	.section .padding{
		padding-top:10px !important;
		padding-bottom:10px !important;
	}
	
	.fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget span iframe[style] {
		min-height: 300px;
		width: 100% !important;
	}
	
	.owl-item .item{
		position: relative;
	}
	
	.instagram-img{
		display: inline; 
		width:33%;
		float:left;
		padding:5px;
		border-radius: 10px;
	}
	
	

	.intro p {
		margin-bottom: 16px;
	}

	.intro .btn.btn-default { 
		font-size: 22px; 
		height: 54px;  
		padding: 12px; 
		width: 82%; 
		text-align: center; 
		width: 81%;
		text-transform:none;
	}
	
	.section.hire .btn.btn-default, .section.buy .btn.btn-default{
		text-transform:none;
	}

	.intro .special-deals-box { 
		/*min-height: 350px;*/
	}

	/* Hire */
	.section.hire, .section.buy {
		max-width: 1100px !important; 
		margin: 0 auto 30px;
	}
	.section.hire h3, .section.buy h3 {
		color: #000; 
		font-family: 'Montserrat' , Arial, Verdana, helvetica; 
		font-size: 36px; 
		font-weight: bold; 
		padding-left: 3px;
		text-transform:none;
		margin-bottom:10px;
	}

	.section.hire h5, .section.buy h5 { 
		font-size: 80px;
		line-height: 1;
		color: #fff;
		letter-spacing:-4px;
		margin-bottom:0;
	}

	.section.hire .range, .section.buy .range {
		padding: 0 11px 20px 0; 
		font-family: 'MontserratBold', Arial, Verdana, Helvetica; 
		font-weight: 400; 
		font-style: normal; 
		-webkit-font-smoothing: antialiased; 
		text-transform: uppercase; 
		font-size: 22px !important; 
		line-height: 30px !important; 
	}


	.bg-yellow{
		background: none repeat scroll 0 0 #ffc000;
		border-radius: 18px 0 0 18px !important;
	}


	.bg-orange{
		background: none repeat scroll 0 0 #f89828;
		border-radius: 18px;
	}
	
	
	
	
	.section.intro{
		margin-top:16px;
	}
	
.owl-carousel{
	background: none repeat scroll 0 0 #ffffff;
}
	
.section.hire .range .item, .section.buy .range .item  { background: #000; border-radius: 10px; text-align: left; padding-bottom:0;}
.section.hire .range .item a { color: #fff; padding: 3px 0; font-size:20px;}
.section.hire .range .item a:hover { color: #d64600; text-decoration: none; }
.section.hire .range .item .title{padding: 4px 40px 4px 10px; line-height:23px;}
.section.hire .range .item img { border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px; }

.section.hire .logo-icon { background: url('<?php echo get_template_directory_uri();  ?>/assets/images/icons/logo-icon.png') no-repeat 0px 0px; display: block; height: 44px; width: 44px; position: absolute; right:7px; bottom:10px;}

.section.hire .why-hire .why-hire-box,
.section.buy .why-buy .why-buy-box 
{ position: relative; margin:35px auto 0; width: 95%; }

.section.hire .why-hire .why-hire-box .btn,
.section.buy .why-buy .why-buy-box .btn{ width: 100%;}

.section.hire .why-hire .why-hire-box .btn.btn-default,
.section.buy .why-buy .why-buy-box .btn.btn-default{ font-size: 22px; padding: 10px 0; }

.section.hire .why-hire  h4 { color: #fff; font-size: 28px; letter-spacing:-1px; font-weight: normal; margin: 0px 0px 10px 0px; font-family:"Montserrat",Arial,Verdana,Helvetica;}

.why-hire-box ul li,
.why-buy-box ul li,
.section.buy .why-buy ul li, .section.hire .why-hire ul li {background: url('<?php echo get_template_directory_uri();  ?>/assets/images/icons/bullet-tick-red.png') no-repeat 0px 7px; font-family: Arial, Verdana, Helvetica; margin-right: 0; color:#333333; padding: 0 0 10px 25px; font-size: 17px; line-height: 30px;}

.why-hire-box ul,
.why-buy-box ul{
	padding:6px 10px 12px 0;
}

/* Buy */
.section.buy .range .item a { color: #fff; padding: 3px 0; font-size:20px;}
.section.buy .range .item a:hover { color: #d64600; text-decoration: none; }
.section.buy .range .item .title{padding: 4px 40px 4px 10px; line-height:23px;}
.section.buy .range .item img { border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px;}

.buy-cars{
	border-radius: 10px 10px 0px 0px; 
	-moz-border-radius: 10px 10px 0px 0px; 
	-webkit-border-radius: 10px 10px 0px 0px;
	min-height:118px; 
	background-color:#fff; 
}

.section.buy  .logo-icon { background: url('<?php echo get_template_directory_uri();  ?>/assets/images/icons/logo-icon.png') no-repeat 0px 0px; display: block; height: 44px; width: 44px; position: absolute; right:7px; bottom:10px;}

 /*{ font-size: 28px; padding: 10px 0; }*/
.section.buy .why-buy h4 { color: #fff; font-size: 28px; letter-spacing:-1px; font-weight: normal; margin: 0px 0px 10px 0px; font-family:"Montserrat",Arial,Verdana,Helvetica;}


.section.social-media { margin-top:20px; margin-bottom:20px;}
.section.social-media h5{color:#d64600; font-size:30px; line-height: 28px; letter-spacing:-1px; text-align: center; font-family:"Montserrat",Arial,Verdana,Helvetica; text-transform:none; }
.section.social-media h5 span{color:#000; font-size:22px; }

.slider-subheading{
	/*font-family: "Montserrat",Arial,Verdana,Helvetica;
    font-size: 36px !important;
    line-height: 30px !important;*/
    text-shadow: inherit;
}

.section.footer{
	padding:0px 0 20px 0;
}	

.vid-box{
		position:relative;
		
	}
	
.play-video.small, .product-detail .play-video {
  bottom: 0 !important;
  left: 0 !important;
  margin: auto !important;
  right: 0 !important;
  top: 0 !important;
}

.play-video {
  background: url('<?php echo get_template_directory_uri();  ?>/assets/images/general/Play.png');
  width: 70px;
  height: 70px;
  position: absolute;
  z-index: 15;
  left: 38%;
  top: 42%;
}

.stocklist{
margin-top:20px;	
}
.section.hire .range .item img.most-popular{
	position:absolute;
	top:10px;
	left:-7px;
	width:67%;
	border-radius:0 !important;
	-moz-border-radius:0 !important;
	-webkit-border-radius:0 !important;
}

.why-buy-box h4, .why-hire-box h4{
	padding:0;
}


@media (min-width: 992px) and (max-width: 1199px) {
	.section.hire {
		max-width: 970px !important;
	}  
	
	.section.buy {
		max-width: 970px !important;
	}  
	
	.section.hire .why-hire .why-hire-box .btn.btn-default, .section.buy .why-buy .why-buy-box .btn.btn-default {
		font-size:20px;
	}
	
	.section.buy .why-buy ul li, .section.hire .why-hire ul li{
		line-height:25px !important;
	}
}
	/*
@media (max-width: 991px) {
	.section .range .item{
		padding-bottom:0 !important;
	}
	
	.section.hire .range .item img{
		border-radius:10px !important;
	}
}
*/
@media (min-width: 768px) and (max-width: 991px) {
	.section.hire {
		max-width: 760px !important;
	}  
	
	.section.buy {
		max-width: 760px !important;
	}  
	.section.hire .why-hire .why-hire-box .btn.btn-default, .section.buy .why-buy .why-buy-box .btn.btn-default {
		font-size:20px;
		padding:10px 0;
		width:100%;
	}
	
	.section.hire .padding{
		padding:10px 1.6% 0 1.2% !important;
	}
	
	.section.hire h4{
		font-size:27px !important;
	}
	
	.section.hire .why-hire .why-hire-box, .section.buy .why-buy .why-buy-box{
		padding: 0 15px 0 0;
		width: 95%;
	}
	
	.section.hire .why-hire .why-hire-box, .section.buy .why-buy .why-buy-box{
		margin: 13px auto 0;
	}
	
	.intro .btn.btn-default{
		font-size:20px;
	}
	.buy-cars{
		min-height:144px;
	}
	
}

@media(max-width:1200px){
	.banner .text .main-heading{
		font-size:40px !important;
	}
	
	.banner .text .main-heading .slider-subheading{
		font-size: 16px !important;
		line-height: 1em;
		display: inline-block;
	}
	
	.banner .text{
		left:50%;
		width:450px !important;
	}
	
	.banner .text.slide_center{
		left:50%;
	}
	
	.banner .text.slide_right{
		left:auto;
		right:20px;
	}
}

@media (max-width: 768px){
	.bg-yellow{
		border-radius:12px !important;
		background-color:#ffffff;
	}
	
	.section.hire{
		margin-top:12px;
		
	}
	
	.section.hire .range .item img{
		border-radius:10px !important;
	}
	
	.section.buy .range .item img{
		border-radius:10px !important;
	}
	
	.social-media{
		display:none;
	}
	
	.section.buy  .logo-icon, .section.hire .logo-icon{
		bottom:15px;
		background:none;
	}
	
	.section.hire .range .item, .section.buy .range .item{
		background-color:#fff !important;
	}
	
	.section.hire .range, .section.buy .range{
		padding:0 5px 20px;
	}
	.section.why-hire.visible-xs{
		background-color: #f1f1f1;
		padding: 10px 20px 25px;
		margin: 0 15px 15px 15px;
		border-radius: 10px;
	}
	.section.why-hire.visible-xs h4{
		text-align:left;
	}
	.section.why-hire.visible-xs .why-hire-button{
		text-align:center;
		margin-top:25px;
	}
	.section.why-hire.visible-xs a.item{
		margin-bottom:15px;
		display:block;
		position:relative;
	}
	.section.why-hire.visible-xs a.item img{
		border-radius:10px;
		display:block;
		width:100%;
	}
	.section.why-hire.visible-xs a.item span{
		position:absolute;
		bottom:10px;
		right:10px;
		line-height:34px;
		font-weight:bold;
		font-size:15px;
		padding:0 20px;
		border:1px solid #fff;
		border-radius:6px;
		background-color:#d64600;
		color:#fff;
	}
	.embedded-youtube{
		width:100%;
		padding-bottom:56.25%;
		position:relative;
	}
	.embedded-youtube iframe{
		position:absolute;
		top:0;
		right:0;
		bottom:0;
		left:0;
	}
	.section.why-hire.visible-xs a.item img.most-popular{
		position:absolute;
		top:10px;
		left:-5px;
		width:40%;
		border-radius:0;
	}
	html body .why-hire-box ul li{
		background: url('<?php echo get_template_directory_uri();  ?>/assets/images/icons/bullet-tick-orange.png') no-repeat 0px 3px;
		font-size:15px;
		line-height:inherit;
	}
}

@media (max-width: 360px){
	.why-buy-button .btn,
	.why-hire-button .btn{
		font-size:16px;
		width:100%;
	}
}

</style>
<div class="container relative hidden-xs">
<div class="booking-container hidden-xs">
    <?php 
		if(0)
		include("includes/booking-form-usa.php");
		else
		include("includes/booking-form-usa-v3.php");
	
	?>
</div> <!-- banner-container -->
</div>
    <?php include("includes/standard-slider.php"); ?>

<div class="buttons visible-xs book-now-button">
	<a href="javascript:void(0)" onclick="$('#slide-down-booking-form').slideDown();$(this).hide();" class="btn btn-default">GET A QUOTE &amp; BOOK &gt;</a>
	<div id="slide-down-booking-form" style="display:none">
		 <?php 
			if(0)
			include("includes/booking-form-usa.php");
			else
			include("includes/booking-form-usa-v3.php");
		
		?>
	</div>
</div> <!-- buttons -->

<div class="section intro hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 padding">
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post(); 
                ?>
                    <h1><?php the_title();?></h1>
                    <h2><?php echo get_field('subtitle')?></h2>
                    <?php the_content(); ?>
                <?php 
                    endwhile; 
                    endif;   
                ?>
            </div> <!-- padding -->

            <div class="col-lg-4 col-md-4 col-sm-5 hidden-xs special-deals-box padding">
				
                <!--<a href="<?php the_field('roadtrip_link', 'option');?>">-->
				<a href="<?php echo get_permalink(2627); ?>">
				<img src="<?php echo get_site_url();?>/wp-content/themes/travellers-autobarn/assets/images/general/special-offers-img.png" class="btn-alignright-less-margin alignright img-responsive" /></a>

				<a href="<?php the_field('roadtrip_link', 'option');?>" class="btn btn-default alignright btn-alignright-less-margin">Road Trips</a>

            </div> <!-- sign-up -->
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- section intro -->

<div class="section why-hire visible-xs">
	<div class="why-hire-box">
		<h4><?php 
				if(get_field('why_hire_from_us_title', 'option') !=""):
					echo get_field('why_hire_from_us_title', 'option');
				else:
					echo "Why hire from us?";
				endif;
			?></h4>
		<ul>
			<?php
				if (have_rows('why_hire_from_us', 'option')):
					while(have_rows('why_hire_from_us', 'option')):
						the_row();
			?>
					<li><?php echo get_sub_field('why_hire_list');?></li>
			<?php
					endwhile;
				endif;
			?> 
		</ul>
		<?php
			$myposts = get_posts(array(
				'posts_per_page'	=> 2,
				'offset'			=> 0,
				'category'			=> get_cat_ID( 'Rentals' ),
				'orderby'			=> 'menu_order',
				'order'				=> 'ASC',
				'include'			=> '',
				'exclude'			=> '',
				'post_type'			=> 'page',
				'post_mime_type'	=> '',
				'post_parent'		=> '',
				'post_status'		=> 'publish',
				'suppress_filters'	=> true,
				'meta_query'		=>array(
					array(
						'key' => 'display_on_homepage',
						'value' => 'Yes',
						'compare' => 'LIKE',
					)
				)
			));
			foreach ( $myposts as $post ) : 
				setup_postdata( $post ); 
				$img = get_field('car_image');
				$most_popular_html='';
				if(get_field('most_popular_vehicle')){
					$most_popular_html='<img src="'.get_template_directory_uri().'/img/most-popular-rentals.png" class="most-popular" />';
				}
				?>
				<a class="item" href="<?php the_permalink();?>">
					<img src="<?php echo $img['url'];?>" class="img-responsive">
					<?php echo $most_popular_html?>
					<span>RENT</span>
				</a>
			<?php endforeach; wp_reset_postdata(); ?>

		<?php 
			if(get_field('why_hire_from_us_link', 'option') !=""):
				echo '<div class="why-hire-button"><a href="'.get_field('why_hire_from_us_link', 'option').'" class="btn btn-default">MORE RENTAL VEHICLES</a></div>';
			endif;
		?>
	</div> <!-- why-hire-box -->
</div>
<div class="section mobile visible-xs">
	<h5>ROADTRIP ADVENTURE</h5>
	<?php
		$url = get_field('videos_link', 'option');
		if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
			$values = $id[1];
		} else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
			$values = $id[1];
		} else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
			$values = $id[1];
		} else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
			$values = $id[1];
		}
	?>
	<div class="embedded-youtube">
		<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $values?>" frameborder="0" gesture="media" allowfullscreen></iframe>
	</div>
</div>

<div class="section hire bg-orange hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8  col-sm-7 padding bg-yellow">
                <h5>Rent</h5>  
                <h3 class="hidden-xs">
                    <?php 
                        if(get_field('hire_our_cars_title') !=""):
                            echo get_field('hire_our_cars_title');
                        else:
                            echo "Hire our Australian campervans & Backpacker cars";
                        endif;
                    ?>
                </h3>
                <?php          
                    $count = 0;
                    $hide ="";

                    $args = array(
                        'posts_per_page'   => 2,
                        'offset'           => 0,
                        'category'  => get_cat_ID( 'Rentals' ),

                        'orderby'          => 'menu_order',
                        'order'            => 'ASC',
                        'include'          => '',
                        'exclude'          => '',
                        'post_type'        => 'page',
                        'post_mime_type'   => '',
                        'post_parent'      => '',
                        'post_status'      => 'publish',
                        'suppress_filters' => true );

                    $args['meta_query'] = array(
                        array(
                            'key' => 'display_on_homepage',
                            'value' => 'Yes',
                            'compare' => 'LIKE',
                        ),
                    ); 


                        $myposts = get_posts( $args );


                        foreach ( $myposts as $post ) : 
                            setup_postdata( $post ); 
                            $subtitle = get_field('subtitle');
                            $img = get_field('car_image');
                            $price = str_replace('$','',get_field('price'));
                            $count++;
                            if ($count == 4)
                            {
                                $hide = "hidden-xs";
                            }
							$most_popular_html='';
							if(get_field('most_popular_vehicle')){
								$most_popular_html='<img src="'.get_template_directory_uri().'/img/most-popular-homepage.png" class="most-popular" />';
							}
                ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 range <?php echo $hide;?>">
                    <div class="item">
                        <a href="<?php the_permalink();?>"><img src="<?php echo $img['url'];?>" class="img-responsive">
                        <i class="logo-icon"></i></a>
                        <div class="hidden-xs title"><span><a href="<?php the_permalink();?>"><?php the_title();?></a></span></div>
						<?php echo $most_popular_html?>
                    </div> <!-- item -->
                </div> <!-- range -->
                <?php endforeach; wp_reset_postdata(); ?>

                <br class="clear-fix">

                <div class="text hidden-xs">
                    <?php echo get_field('hire_our_cars');?>
                </div> <!-- text -->

            </div> <!-- padding -->

            <div class="col-lg-4 col-md-4 col-sm-5 why-hire hidden-xs padding">
                <div class="why-hire-box">
                    <h4>
                        <?php 
                            if(get_field('why_hire_from_us_title', 'option') !=""):
                                echo get_field('why_hire_from_us_title', 'option');
                            else:
                                echo "Why hire from us?";
                            endif;
                        ?>

                    </h4>

                    <ul>
                        <?php
                            if (have_rows('why_hire_from_us', 'option')):
                                while(have_rows('why_hire_from_us', 'option')):
                                    the_row();
                                    $list = get_sub_field('why_hire_list');                           
                        ?>
                                <li><?php echo $list;?></li>
                        <?php
                            endwhile;
                            endif;
                        ?> 
                    </ul>      

                    <?php 
                        if(get_field('why_hire_from_us_link', 'option') !=""):                       
                            echo '<a href="'.get_field('why_hire_from_us_link', 'option').'" class="btn btn-default">See our Campervans</a>';
                        endif;
                    ?>
                </div> <!-- why-hire-box -->
            </div> <!-- why-hire -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- section hire -->
    

<!-- MIGHTY Reviews Section -->

<style>
  
  .mighty-reviews { overflow: hidden; }
  .mighty-reviews hr { margin: 20px 0; }
  
  .grw-slider .grw-slider-prev,
  .grw-slider .grw-slider-next {
    background-image: url('https://www.travellers-autobarn.co.nz/wp-content/uploads/2017/12/chevron.png');
    background-position: center;
    background-size: 30px 30px;
  }
  
  .grw-slider .grw-slider-prev {
    transform: rotate(180deg);
  }
  
  .grw-slider .grw-slider-prev span,
  .grw-slider .grw-slider-next span {
    visibility: hidden;
  }
  
  .gr-container {
    position: relative;
  }
  
  .gr-more-reviews-button {
    display: block;
    position: absolute;
    bottom: 25px;
    right: 15px;
  }
  
  .gr-more-reviews-button-img {
    width: 180px;
  }
  
</style>

<div class="section mighty-reviews">

  <div class="container">      
    <div class="row gr-container">
      <div class="col-xs-12">
        <h2>Happy Campers</h2>
        <hr>
        <?php echo do_shortcode("[google-reviews-pro place_name='Travellers Autobarn Auckland' place_id=ChIJb0okt7dODW0RIuIjs941qB0 auto_load=true sort=1 min_filter=4 text_size=200 view_mode=slider slider_speed=5 slider_count=3 open_link=true nofollow_link=true reviews_lang=en]"); ?>
        <hr>
        <a target="_blank" href="https://goo.gl/maps/hvm1RYKrUSn" class="gr-more-reviews-button"><img class="gr-more-reviews-button-img" alt="More Reviews on Google" src="https://www.travellers-autobarn.co.nz/wp-content/uploads/2017/12/more-reviews-on-google.png"></a>
      </div>
    </div>
  
  </div>
  
</div>

<!-- END MIGHTY Reviews Section -->


<div class="section social-media">
    <div class="container">
        <div class="row">
			<div class="col-lg-4 col-md-4 hidden-sm social-media-cols" style="border-right:1px solid #000">
				<h5>USA Road Trips</h5>
				<div class="social-box">
					<?php
						$url = get_field('https://youtu.be/96qKtfM_hJU', 'option');
						if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
							$values = $id[1];
						} else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
							$values = $id[1];
						} else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
							$values = $id[1];
						} else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
							$values = $id[1];
						}
						$yt_img = "//img.youtube.com/vi/$values/0.jpg";
						//echo $url;die();
					?>
					
					<div class="vid-box">
						<a href="<?php the_field('videos_link', 'option')?>" data-toggle="lightbox" class="lightbox-video">
					
							<div class="play-video small"></div>

							<img src="<?php echo $yt_img?>" class="img-responsive" style="width:100%; max-height:400px; margin-bottom:10px;">
						</a>
					</div>
					
					<link href="<?php echo get_template_directory_uri();  ?>/assets/css/ekko-lightbox.css" rel="stylesheet">
              <script src="<?php echo get_template_directory_uri();  ?>/assets/js/ekko-lightbox.min.js"></script>

              <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    // delegate calls to data-toggle="lightbox"
                    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
                        event.preventDefault();
                        return $(this).ekkoLightbox({
                            onShown: function() {
                                if (window.console) {
                                    return console.log('Checking our the events huh?');
                                }
                            },
                            onNavigate: function(direction, itemIndex) {
                                if (window.console) {
                                    return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                                }
                            }
                        });
                    });

                    //Programatically call
                    $('#open-image').click(function (e) {
                        e.preventDefault();
                        $(this).ekkoLightbox();
                    });
                    $('#open-youtube').click(function (e) {
                        e.preventDefault();
                        $(this).ekkoLightbox();
                    });

                });
            </script>
					
					
				</div>
			</div>
			<div class="col-lg-4 col-md-4  hidden-sm social-media-cols" style="border-right:1px solid #000">
				<h5><a href="<?php the_field('facebook_link', 'option');?>" target="_blank">On Facebook</a></h5>
				<div class="social-box" style="margin:auto; min-height:300px;">
					<div class="fb-like-box" data-href="https://www.facebook.com/Travellers.AutoBarn" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4  hidden-sm social-media-cols">
				<h5><a href="<?php the_field('instagram_link', 'option');?>" target="_blank">Instagram</a></h5>
				<div class="social-box insta-spacing">
					<h5><span><a href="<?php the_field('instagram_link', 'option');?>" target="_blank" style="color:#000;">@TravellersAutobarn</a></span></h5>
                    <?php echo do_shortcode('[embedsocial_instagram id="38aa9753f72038a77d2c045701d806cdaf6cb24f"]'); ?>
                </div>
			</div>
			
            
        </div>
    </div>    
</div>
<?php get_footer(); ?>
