<?php
    /*
    Template Name: Single Vehicle - Rental
    */
    get_header();
?> 
<!--<link rel="stylesheet" href="/wp-content/themes/travellers-autobarn/assets/css/custom-4.css">-->		
<style>
	h1{
		margin:0 0 5px!important;
		line-height:1.1em;
	}
	
	.product-detail .range .item, .section.buy .range .item {
		background: none repeat scroll 0 0 #000;
		border-radius: 10px;
		padding-bottom: 0;
		text-align: left;
	}
	
	.product-detail .logo-icon {
		background: url("<?php echo get_template_directory_uri();  ?>/assets/images/icons/logo-icon.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
		bottom: 20px;
		display: block;
		height: 44px;
		position: absolute;
		right: 7px;
		width: 44px;
	}
	
	.product-detail .range .item img {
		border-radius: 10px 10px 0 0;
	}
	
	.product-detail .range .item a {
		color: #fff;
		padding: 3px 0;
	}
	
	.product-detail .range .item .title {
		padding: 4px 0 4px 10px;
		width:110px;
	}
	
	.play-video.small, .product-detail .play-video{
		bottom: 0 !important;
		left: 0 !important;
		margin: auto !important;
		right: 0 !important;
		top: 0 !important;
	}
	
	.sub-heading{
		color: #f89828;
    font-family: "Montserrat",Arial,Verdana,Helvetica;
    font-size: 28px;
    font-style: normal;
    font-weight: 400;
    line-height: 1em;
   
    text-transform: uppercase;
	margin-bottom:12px;
	}
	
	.why-buy-box h4, .why-hire-box h4{
		font-size:25px;
	}
	
	.more-videos-btn{
		float:right; 
		color:#000 !important; 
		background-color:#fa9906 !important;
	}
	
	.download-button{
		width:100%;
		max-width:260px;
	}
	
	.videos-title{
		color: #000 !important;
		font-size: 22px;
		font-family: "Montserrat",Arial,Verdana,Helvetica;
		min-height:50px;
	}
	
	.videos-heading{
		float:left; 
		margin-top:0
	}
	
	.features{
		display:inline;
		width:32%;
		float:left;
		margin:0 2% 10px 0;
	}
	
	.features.last{
		margin:0 0 10px 0;
	}
	
	hr{
		margin:20px 0; 
	}
	
	.product-detail .buttons{
		margin-top:10px;
	}
	
	.section.product-detail .padding.content{
		padding-bottom:0;
	}
	.vid-box{
		position:relative;
		
	}
	
	.product-detail .price-container .price { font-size: 45px; padding: 3px 5px 0px 5px; }
.product-detail .price-container .price .dollar { font-size: 17px; vertical-align: top; }
.product-detail .price-container .price .disclaimer { font-size: 22px; vertical-align: top; }
.product-detail .price-container .price-text { font-size: 15px; padding: 13px 5px 0px 5px; }    

	@media (max-width: 991px){
		.features{
			display:block;
			width:100%;
			margin:0;
		}
		
		.vid-box{
			margin-bottom:20px;
		}
	}


	@media (max-width:770px){
		.call-to-action .btn{
			width:100%;
			display:block;
			margin:5px 0;
		}
		
		.product-detail .features{
			min-height:10px;
		}
		
		.product-detail .features ul{
			padding-bottom:0;
			margin-bottom:0;
		}
	}
	
	@media (max-width: 480px){
		.more-videos-btn{
			padding:5px !important;
		}
		
		
	}
</style>

<?php include("includes/breadcrumbs.php"); ?>


<div class="section product-detail">

  <div class="container">

	<div class="row">
        
        
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding content">
            <?php /*
			<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 title">

            <h1><?php the_title(); ?></h1>
			
              <h2><?php the_field('subtitle');?></h2>

            </div> <!-- title -->
        
			
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 price-box">

               <div class="price-container">

                    <div class="price-text">From</div>
                    <div class="price">
                    <span class="dollar">$</span><?php echo str_replace('$','',get_field('price'));?><span class="disclaimer">*</span>
                    </div>
                    <div class="price-text">a day</div>

                </div> <!-- price-container -->

                <BR class="clear-fix">  
                    
                <div class="terms">*Conditions Apply - Prices may vary in Peak Seasons</div>

            </div>
			*/ ?>
            
            <div class="col-xs-12 title">
			<!-- <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 title"> -->

            <h1><?php the_title(); ?></h1>
			
              <h2><?php the_field('subtitle');?></h2>

            </div> <!-- title -->
			
        
			<?php /*
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 price-box">

               <div class="price-container">

                    <div class="price-text">From</div>
                    <div class="price">
                    <span class="dollar">$</span><?php echo str_replace('$','',get_field('price'));?><span class="disclaimer">*</span>
                    </div>
                    <div class="price-text">a day</div>

                </div> <!-- price-container -->

                <BR class="clear-fix">  
                    
                <div class="terms">*Conditions Apply - Prices may vary in Peak Seasons</div>

            </div>
			*/ ?>
        
            <BR class="clear-fix">  
              
              
            <?php include("includes/sales-image-gallery-2.php"); ?>  
            <?php /* <a href="<?php echo get_site_url();?>/quick-quote/" class="btn btn-default visible-xs">Get a Quote & Book</a> */ ?>
			  
			<div class="buttons visible-xs book-now-button vehicle-single">
				<a href="javascript:void(0)" onclick="$('#slide-down-booking-form').slideDown();$(this).hide();" class="btn btn-default">Get a Quote & Book</a>
				<div id="slide-down-booking-form" style="display:none">
					 <?php 
						if(0)
						include("includes/booking-form-usa.php");
						else
						include("includes/booking-form-usa-v3.php");
					
					?>
				</div>
			</div> <!-- buttons -->
			
            <?php 
                if (have_posts()): 
                    while(have_posts()): 
                        the_post(); 
                        the_content(); 
                    endwhile;
                endif;
            ?>   
            
			<div class="features-section">
				<div class="features-center">
					<div class="features">
						<h3>Key Features</h3>
						<ul>
							<?php
								while(have_rows('featured_items')):  
									the_row();
									$feature = get_sub_field('featured_item');
							?>
									<li><?php echo $feature;?></li>
							<?php
								endwhile;
							?>
						</ul> 
					</div>

					<div class="features">
						<h3>
							<?php 
								if(get_field('rental_benefits_title', 'option') !=""):
									echo get_field('rental_benefits_title', 'option');
								else:
									echo "Our Benefits";
								endif;
							?>
						</h3>

						<ul>
							<?php 
								if (have_rows('rental_benefits')): 
									while ( have_rows('rental_benefits') ): the_row();
										echo "<li>".get_sub_field('benefits')."</li>";				
									endwhile;
								else: 
									while(has_sub_field('rental_benefits', 'option')):
										echo "<li>".get_sub_field('benefit')."</li>";
									endwhile;
								endif;
							?>
						</ul> 
					</div>



					<div class="features last">
						<h3>Extras</h3>
						<ul>
							<?php while(has_sub_field('all_vehicals_come_with', 'option')): ?>
								<li><?php the_sub_field('advantages'); ?></li>
							<?php endwhile;?>
						</ul>
					</div>
				 </div>
			</div>
			<div class="clear-fix"></div>

<?php /*
<div class="row">
<?php
function youtubeid($url){
	if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
		return $id[1];
	}
	if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
		return $id[1];
	}
	if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
		return $id[1];
	}
	if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
		return $id[1];
	}
	return false;
}
$id=youtubeid(get_field('youtube_video_url'));
if($id!==false){
	?>

	<?php
}
?>
</div> <!-- row -->
*/ ?>	
		<?php if ( get_field('youtube_video_url') ): ?>
		<div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 video">

                <a href="<?php the_field('youtube_video_url')?>" data-toggle="lightbox" class="lightbox-video">
                  <div class="play-video"></div>
                  <?php 
                  
                    $url = get_field('youtube_video_url');
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
                        
                  ?>
                  <img src="<?php echo $yt_img?>" class="img-responsive" style="width:100%;">
              </a>

            </div> <!-- video -->
            
        </div> <!-- row -->
		<?php endif; ?>
		
        <div class="row specs-section">
          
			<h4>Specification Sheet</h4>

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 specs">  


			<table cellpadding="0" cellspacing="0" border="0">
			<tr class="header">
			<td>Vehicle Specification</td>
			</tr>
				<?php
					$count = 0;
					while(have_rows('vehicle_specifications')):  
						the_row();
						$name = get_sub_field('name');
						$value = get_sub_field('value');
						
						$count++;
				?>
						<tr>
							<td><?php echo $name.": ".$value;?></td>
						</tr>
				<?php
					endwhile;
				?>

			</table>


			<table cellpadding="0" cellspacing="0" border="0">
				<tr class="header">
					<td>Vehicle Features</td>
				</tr>
				<?php
					$count = 0;
					while(have_rows('vehicle_features')):  
						the_row();
						$name = get_sub_field('vehicle_feature');   
						$class = "class='dark'";
						if ($count % 2 > 0)
						{
							$class = "";
						}
						$count++;
				?>
						<tr <?php echo $class;?>>
							<td><?php echo $name;?></td>
						</tr>
				<?php
					endwhile;
				?>
			</table>


			<table cellpadding="0" cellspacing="0" border="0">
			<tr class="header">
			<td>Baby Seat / Booster Seat Options</td>
			</tr>
				<?php
					$count = 0;
					while(have_rows('baby_seat_options')):  
						the_row();
						$name = get_sub_field('name');   
						$value = get_sub_field('value');   
						$class = "class='dark'";
						if ($count % 2 > 0)
						{
							$class = "";
						}
						$count++;
				?>
						<tr <?php echo $class;?>>
							<td><?php echo $name.": ".$value;?></td>
						</tr>
				<?php
					endwhile;
				?>
			</table>

			</div> <!-- specs -->


			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 specs">    
			<table cellpadding="0" cellspacing="0" border="0">
			<tr class="header">
			<td>Beds</td>
			</tr>
				<?php
						$count = 0;
						while(have_rows('beds')):  
							the_row();
							$name = get_sub_field('name');   
							$value = get_sub_field('value');   
							$class = "class='dark'";
							if ($count % 2 > 0)
							{
								$class = "";
							}
							$count++;
					?>
							<tr <?php echo $class;?>>
								<td><?php echo $name.": ".$value;?></td>
							</tr>
					<?php
						endwhile;
					?>
			</table>

			<table cellpadding="0" cellspacing="0" border="0">
			<tr class="header">
			<td>Dimensions</td>
			</tr>
			<?php
				$count = 0;
				while(have_rows('dimensions')):  
					the_row();
					$name = get_sub_field('name');   
					$value = get_sub_field('value');   
					$class = "class='dark'";
					if ($count % 2 > 0)
					{
						$class = "";
					}
					$count++;
			?>
					<tr <?php echo $class;?>>
						<td><?php echo $name.": ".$value;?></td>
					</tr>
			<?php
				endwhile;
			?>
			</table>

			<table cellpadding="0" cellspacing="0" border="0">
			<tr class="header">
			<?php if(get_field('living_equipment_heading')): ?>
				<td><?php echo get_field('living_equipment_heading');?></td>
			<?php else: ?>
				<td>Living Equipment</td>
			<?php endif; ?>
			</tr>
			<?php //if(is_page(2525) || is_page(5014)): ?>
			<?php if(get_field('living_equipment_sub_heading')): ?>
			<tr class="sub-header">
			<td><?php echo get_field('living_equipment_sub_heading');?></td>
			</tr>
			<?php endif; ?>
			<?php
				$count = 0;
				while(have_rows('living_equipment')):  
					the_row();
					$name = get_sub_field('living_equipment');   

					$class = "class='dark'";
					if ($count % 2 > 0)
					{
						$class = "";
					}
					$count++;
			?>
					<tr <?php echo $class;?>>
						<td><?php echo $name;?></td>
					</tr>
			<?php
				endwhile;
			?>
			</table>
			
			<?php /*
			<div class="download" style="padding-bottom:20px;"> 
                <?php $specs = get_field('spec_sheet');?>
               
				<a href="<?php echo $specs['url'];?>" target="_blank">
					<img src="<?php echo get_template_directory_uri();  ?>/assets/images/general/download-spec-sheet.jpg" class="download-button" alt="download" id="btn-pdf-download" onClick='trackPdfDLButton("PDF - Rental - <?php global $post; echo $post->post_name; ?>");'/>
				</a>
                

            </div>
			*/ ?>
				
			</div> <!-- specs -->
        </div> 
          
        <div class="clear-fix"></div>
          
          
        <?php the_field('content_2');?>
          
		<div class="row specs-section" style="padding-bottom:30px; padding-top:20px;">
          
			
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				
				<?php 
                  
                    $url = get_field('youtube_video_url_1');
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
                        
                  ?>
				<?php if (get_field('youtube_video_url_1')):?>
					<h3 class="videos-title"><?php the_field('youtube_video_title_1') ?></h3>
					<div class="vid-box">
					<a href="<?php the_field('youtube_video_url_1')?>" data-toggle="lightbox" class="lightbox-video">
						<div class="play-video small"></div>

						<img src="<?php echo $yt_img?>" class="img-responsive" style="width:100%; max-height:400px; margin-bottom:10px;">
					</a>
					</div>
					
				<?php endif;?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 <?php if (!get_field('youtube_video_url_1')){ echo "col-lg-pull-6 col-md-pull-6";}?>">
				<h3 class="videos-title" style="color:#000 !important;"><?php the_field('rentals_video_title', 'option') ?></h3>
				<?php 
                  
                    $url = get_field('rentals_video', 'option');
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
                        
                  ?>
				<div class="vid-box">
				<a href="<?php the_field('rentals_video', 'option')?>" data-toggle="lightbox" class="lightbox-video">
					
					<div class="play-video small"></div>

					<img src="<?php echo $yt_img?>" class="img-responsive" style="width:100%; max-height:400px; margin-bottom:10px;">
				</a>
				</div>
			</div>
			<div class="clear"></div>	
			<div style="padding:15px;">
				
				<a class="btn btn-default more-videos-btn" target="_blank" href="<?php the_field('videos_channel', 'option')?>">More</a>
			</div>
			
			
		</div>
		
        <div class="buttons">
            <a href="<?php echo get_site_url();?>/quick-quote/" class="btn btn-default visible-xs">Get a Quote & Book</a>
            <a href="<?php echo get_permalink(5046); ?>" class="btn btn-default hidden-xs">Email Us</a>
            <a class="btn btn-default" href="<?php echo get_site_url();?>/contact-us/">Call Us</a>
            <a href="<?php echo get_site_url();?>/rv-rental-locations-usa/" class="btn btn-default">Visit Us</a>
        </div> <!-- buttons -->    
            
        <hr>
        <div class="interest row" style="background-color:#fa9906; border-radius:10px; margin:0;">    
        <h5 style="padding:10px; color:#fff; margin:0;">You may also be interested in:</h5>
            
            
        <?php          
            while(have_rows('related_vehicles')):  
                the_row();
                $related = get_sub_field('related_vehicle');
              //  echo "<pre>";print_r($related);die();
                $id = $related->ID;       
                $img = get_field('car_image', $id);
                $link = get_permalink( $id);
                
        ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 range">
              
                <div class="item">
                    <a href="<?php echo $link;?>"><img src="<?php echo $img['url'];?>" class="img-responsive">
                        <i class="logo-icon"></i>
                    </a>
                    <div class="title"><a href="<?php echo $link;?>"><?php echo $related->post_title;?></a></div>
                </div> <!-- item -->
              
            </div> <!-- range -->
        <?php
            endwhile;    
        ?>
        </div> 
            
          
	  </div> <!-- padding -->
              
	  
	  	
	  
	  
	  
              

	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form-usa-v2.php"); ?>
          

        <div class="call-to-action hidden-xs">
			<!-- <a class="btn btn-default email " href="<?php the_field('quick_quote_link', 'option');?>">Email Us</a> -->
			<ul>
				<li><a class="btn btn-default call" href="<?php echo get_site_url();?>/contact-us/">Call Us</a></li>				
				<li><a class="btn btn-default call" href="<?php echo get_permalink(5046); ?>">Email Us</a></li>
			</ul>            
        </div> <!-- call-to-action -->
          
            
        <?php include("includes/why-hire.php"); ?>
          <?php include("includes/call-us.php"); ?>
          <?php include("includes/au-hire.php");?>
        <?php include("includes/subscribe-form.php"); ?>
            
        <?php include("includes/blog.php"); ?>  
        <?php include("includes/sidebar-social.php"); ?>      
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section product-detail -->

<?php get_footer(); ?>