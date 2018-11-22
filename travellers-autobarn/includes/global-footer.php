<style>
	/* International Sites */
	.international { position: relative; overflow: hidden;  }
	.international h5 {font-family: 'Montserrat Regular' , Arial, Verdana, Helvetica; font-size: 34px; font-weight: bold; margin-bottom: 25px; }
	.international ul li { width: 20%; float: left; padding: 0px 3% 0px 0px !important; text-align: center; font-weight: bold !important; font-style: normal; -webkit-font-smoothing: antialiased; text-transform: uppercase; font-size: 11px;}
	.international ul li a { color: #fff; }
	.international ul li a:hover { color: #d64600; text-decoration: none; }
	.international ul li img { border: 1px solid #fff; margin-bottom: 5px; }
	.international ul li .coming-soon { position: absolute; left: 0; background-color: rgba(255, 255, 255, 0.6);}

	.international ul li.blog { padding: 0; }
	.international ul li .blog-box { position: relative; overflow: hidden; background: #f89828; }
	.international ul li .blog-box .text { float: right; text-align: right; color: #fff;  }
	.international ul li .blog-box .text a { color: #fff; }
	.international ul li .blog-box .text a:hover { color: #e76f14; }
	.international ul li .blog-box .icon-chat { float: left; text-align: left; color: #e76f14; }
	
	.footer-menus{
		display:inline; 
		width:50%; 
		float:left;
		padding-right:20px;
		padding-top:20px;
	}
	
	.social.mobile{
		margin:auto; 
		width:360px;
	}
	
	.coming-soon{
		color:#000; 
		font-size:11px; 
		top:28%; 
		width:84% !important;
	}
	
	.footer .contact{
		margin-top:5px;
		border-radius:15px;
	}
	
	.footer .contact .btn{
		padding:7px;
		width:100%;
	}
	
	.footer .contact .social{
		text-align: center;
	}
	.footer .contact ul {
		padding:13px 20px;
	}
	
	
	.footer .contact .social li{
		width:33%!important;
	}
	
	.youtube-icon{
		background-image:url('<?php echo get_template_directory_uri();  ?>/assets/images/icons/youtube.png');
	}
	.instagram-icon{
		background-image:url('<?php echo get_template_directory_uri();  ?>/assets/images/icons/instagram.png');
	}
	
	
	
	@media (max-width: 1199px) {
		.footer-menus{
			width:50%;
		}
		
		.contact .btn.btn-default{
			padding:5px 10px;
		}
		
		
	}
</style>
<div class="section footer visible-xs hamburger-social dark">
	<?php
		echo sprintf('
				<a href="%s" target="_blank" rel="nofollow"><i class="icon-facebook"></i></a>
				<a href="%s" target="_blank" rel="nofollow"><i class="icon-twitter"></i></a>
				<a href="%s" target="_blank" rel="nofollow"><img src="%s/assets/images/icons/youtube.png"></a>
				<a href="%s" target="_blank" rel="nofollow"><img src="%s/assets/images/icons/instagram.png"></a>
			',
			get_field('facebook_link','option'),
			get_field('twitter_link','option'),
			get_field('videos_channel','option'),
			get_template_directory_uri(),
			get_field('instagram_link','option'),
			get_template_directory_uri()
		);
	?>
</div>
<div class="section footer hidden-xs">

	<ul class="social mobile mobile-flags hidden-lg hidden-md hidden-sm visible-xs">
		<?php
			if (have_rows('international_sites', 2)):
					while(have_rows('international_sites', 2)):
					the_row();
					$flag = get_sub_field('flag');
					$country = get_sub_field('country');
					$link = get_sub_field('link');
		?>
					<li>
						<?php 
							if($link =="#"):
						?>
							<div class="coming-soon"><?php the_field('coming_soon', 2);?></div>
						<?php
							endif;
						?>
							<a href="<?php echo $link;?>" target="_blank" rel="nofollow"><img src="<?php echo $flag['url'];?>" class="img-responsive"></a>
					</li>  
		<?php
				endwhile;
			endif;
		?> 


	</ul>
	
	<ul class="social mobile hidden-lg hidden-md hidden-sm visible-xs">
		<li>
			<a href="<?php the_field('facebook_link', 'option');?>" target="_blank" rel="nofollow">
				<i class="icon-facebook"></i>
			</a>
		</li>
		<li>
			<a href="<?php the_field('twitter_link', 'option');?>" target="_blank" rel="nofollow">
				<i class="icon-twitter"></i>
			</a>
		</li>
		<li>
			<a href="<?php the_field('google_plus_link', 'option');?>" target="_blank" rel="nofollow">
				<i class="icon-googleplus"></i>
			</a>
		</li>
		<li>
			<a href="<?php the_field('videos_channel', 'option')?>" target="_blank" rel="nofollow">
				<img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/youtube.png" style="padding: 0 15px 0 7px;"/>
			</a>
		</li>
		<li>
			<a href="<?php the_field('instagram_link', 'option');?>" target="_blank" rel="nofollow">
				<img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/instagram.png" />
			</a>
		</li>
		
	</ul> <!-- social -->
	
    <div class="container bg-black hidden-xs">

		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-12 hidden-xs">
				<div class="footer-menus">
					<?php       
						echo get_footer_menus(wp_get_nav_menu_items('Our Campervans & Cars'));
					?>
				</div>
			
				<div class="footer-menus second-last">  
					<?php       
						echo get_footer_menus(wp_get_nav_menu_items('About Travellers Autobarn'));
					?>
				</div>
				
			</div>
			
			<div class="col-lg-5 col-md-5 col-sm-12 links">       
				<div class="contact">
					<ul>
						<li>
							<div class="heading">
								<a href="<?php echo get_site_url();?>/contact-us/"><?php the_field('contact_us', 'option');?></a>
							</div>
							<P>
								<?php the_field('new_zealand_free_call', 'option');?><BR>
								<a href="tel:0800348348">0800 348 348</a>
							</P>
							<P>
								<?php the_field('australia_free_call', 'option');?><BR>
								<a href="tel:1800674374">1800 674 374</a>
							</P>

							

							<P>
								<?php the_field('international', 'option');?><BR>
								<a href="tel:+61293601500">+61 2 9360 1500</a>
							</P>

							<P>
								<a href="<?php the_field('skype', 'option');?>"><img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/skype.png"> 
									<?php the_field('skype_title', 'option');?>
								</a>
							</P>
						<li>

						<ul class="social">
							<li>
								<a href="<?php the_field('facebook_link', 'option');?>" target="_blank" rel="nofollow">
									<i class="icon-facebook"></i>
								</a>
							</li>
							<li>
								<a href="<?php the_field('twitter_link', 'option');?>" target="_blank" rel="nofollow">
									<i class="icon-twitter"></i>
								</a>
							</li>
							<li>
								<a href="<?php the_field('instagram_link', 'option');?>" target="_blank" rel="nofollow">
									<img
										style="width:45px;"
										src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/instagram.png" />
								</a>
							</li>
						</ul> <!-- social -->

						<a href="<?php the_field('blog_link', 'option');?>" rel="nofollow" target="_blank" class="btn btn-default">
							<?php the_field('view_our_blog', 'option');?>
						</a>

					</ul>
                </div>  
           
			</div>
			
			

		</div>
		
		
		
		
		
       
              
		<div class="row terms">
            
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <?php the_field('copyright', 'option');?> <?php echo date("Y"); ?> <?php the_field('travellers_autobarn_all_rights_reserved', 'option');?>  |  <a href="<?php echo get_site_url();?>/sitemap/"><?php the_field('sitemap', 'option');?> </a>  |  <a href="<?php echo get_site_url();?>/privacy-policy/" rel="nofollow"><?php the_field('privacy_policy', 'option');?></a>  |  <a href="<?php echo get_site_url();?>/terms-of-use/" rel="nofollow"><?php the_field('terms_of_use_translation', 'option');?></a>  &nbsp; <a href="http://www.em.com.au" rel="nofollow" target="_blank">Website developed by EM Creative / Digital</a>
            </div>
            
        </div> <!-- terms -->
	</div>
            
         
            
          

        </div>
        
        
       

    </div><!-- container -->
    
</div> <!-- footer -->
