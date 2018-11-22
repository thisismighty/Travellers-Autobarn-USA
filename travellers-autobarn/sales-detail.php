<?php
    /*
    Template Name: Single Vehicle - Sales
    */
    get_header();
?>
<?php include("includes/breadcrumbs.php"); ?>
<style>
	
	.spec-download{
		margin-bottom:15px;
		text-align:center;
	}
	.spec-download img{
		max-width:259px;
		width:100%;
	}
	
	.section.product-detail .play-video{
		margin:auto;
		right:0;
		left:0;
		top:0;
		bottom:0;
	}
	
	
	.benefits{
		background-color:#edebeb;
		border-radius:10px;
		padding:10px;
		margin:10px 0;
	
	}
	
	.benefits-row{
		margin:0;
	}
	
	.special-offer{
		margin:0;
		border-radius:10px;
	}
	
	.download-button{
		width:100%;
		max-width:260px;
	}
	.footer{
		padding-top:0;
	}
	
	.more-videos-btn{
		float:right; 
		color:#000 !important; 
		background-color:#fa9906 !important;
	}
	
	.videos-title {
		color: #000 !important;
		font-family: "Montserrat",Arial,Verdana,Helvetica;
		font-size: 22px;
		min-height:50px;
	}
	
	.play-video.small, .product-detail .play-video {
		bottom: 0 !important;
		left: 0 !important;
		margin: auto !important;
		right: 0 !important;
		top: 0 !important;
	}

	.vid-box{
		position:relative;
		
	}
	
	@media (max-width: 770px){
		.content.padding{
			padding-bottom:0 !important;
		}
		
		.sidebar.padding{
			padding-top:0 !important;
		}
	}
	
	
</style>

<div class="section product-detail">

  <div class="container">

	<div class="row">
        
          
	
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding content" style="padding-bottom:20px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
              
            <h1><?php the_title()?></h1>
            <h2><?php the_field('subtitle')?></h2>
              
          </div> <!-- title -->
              
            <?php include("includes/sales-image-gallery-2.php"); ?>  
              
            
          <br/>
            <?php 
                if (have_posts()): 
                    while(have_posts()): 
                        the_post(); 
                        the_content(); 
                    endwhile;
                endif;
            ?>   
            
            <div class="row add-bottom">

            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">  
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
				<?php $specs = get_field('spec_sheet');?>    
				<div class="spec-download">
					<a href="<?php echo $specs['url'];?>" target="_blank">
						<img src="<?php echo get_template_directory_uri();  ?>/assets/images/general/download-spec-sheet.jpg" class="download-button" alt="download spec sheet" id="btn-pdf-download" onClick='trackPdfDLButton("PDF - Sales - <?php global $post; echo $post->post_name; ?>");' />
					</a>
				</div>   
			
			
            </div> <!-- download -->
              
			<?php if (get_field('youtube_video_url')!=""):?>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 video">

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
                  <img src="<?php echo $yt_img?>" class="img-responsive" style="width:100%; max-height:400px;">
              </a>


              


            </div> <!-- video -->
			<?php endif;?>
            <div class="clearfix"></div>
            
                        
        </div> <!-- row -->
              
              
        <?php the_field('content_2');?>
              
        <div class="row benefits-row">
            <?php if(get_field('benefits', 'option')): ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 benefits">  
                    <h3>Travellers Autobarn Car Sales Benefits</h3>
                    
                    <ul>
                        <?php while(has_sub_field('benefits', 'option')): ?>
                            <li><B><?php the_sub_field('title'); ?></B>: <?php the_sub_field('benefit'); ?>
                        <?php endwhile;?>
                  
                    </ul>


                </div> <!-- benefits -->
            <?php endif;?>
            <?php
                if (have_rows('special_offers')):
            ?>
            <div class="special-offer">  
                <?php while (have_rows('special_offers')): the_row();?>
                <span class="orange"><?php the_sub_field('title');?></span> <BR>
                    <?php the_sub_field('offer');?><br/>
                <?php endwhile?>
            </div> <!-- special-offer -->
            <?php endif;?>
            
            
        </div> <!-- row -->
          
        <div class="content3">
            <?php the_field('content_3');?>
            
        </div>
          
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
				<h3 class="videos-title"><?php the_field('sales_video_title', 'option') ?></h3>
				<?php 
                  
                    $url = get_field('sales_video', 'option');
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
				<a href="<?php the_field('sales_video', 'option')?>" data-toggle="lightbox" class="lightbox-video">
					
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
		
        <div class="buttons" style="margin-top:0;">
            <a class="btn btn-default email" href="<?php the_field('quick_quote_sales', 'option');?>">Email Us</a>
                <a class="btn btn-default call"  data-toggle="modal" data-target="#callus">Call Us</a>
				<a href="<?php echo get_site_url();?>/campervan-rental-australia/" class="btn btn-default">Visit Us</a>
        </div> <!-- buttons -->    
            
        
            
           
          
	  </div> <!-- content padding content -->

	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form.php"); ?>
		  
		  <div class="call-to-action hidden-xs">
            
                
                <a class="btn btn-default email " href="<?php the_field('quick_quote_sales', 'option');?>">Email Us</a>
                
                <a class="btn btn-default call" data-toggle="modal" data-target="#callus">Call Us</a>
            
        </div> <!-- call-to-action -->
        <?php include("includes/why-buy.php"); ?>
        <?php include("includes/call-us.php"); ?>
          
        <?php include("includes/subscribe-form.php"); ?>
              
        <?php include("includes/blog.php"); ?>
        <?php include("includes/sidebar-social.php"); ?>
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section product-detail -->

<?php get_footer(); ?>