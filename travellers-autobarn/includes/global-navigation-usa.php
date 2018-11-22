<?php
$mobile_menu=wp_get_nav_menu_items('Main Menu (Mobile2)');
$mobile_base=array();
$mobile_hamburger=array();
foreach($mobile_menu as $mobile_item){
	// print_r($mobile_item);
	if($mobile_item->url=='#'&&strtolower($mobile_item->title)=='hamburger'){
		$mobile_base[]=sprintf('<a class="hamburger" href="javascript:void(0);" onclick="EMMenu.toggleMenu()">
			<img src="%s/img/menu-hamburger.png" alt="hamburger" border="0" /></a>',
			get_template_directory_uri()
		);
		continue;
	}
	if($mobile_item->menu_item_parent==0){
		$mobile_base[]=sprintf(
			'<a class="%s" href="%s"%s><span>%s</span></a>',$mobile_item->classes[0],
			$mobile_item->url,
			(isset($post)&&property_exists($post,'ID')&&($post->ID==$mobile_item->object_id))?' class="active"':'',
			esc_attr($mobile_item->title)
		);
		continue;
	}
	$mobile_hamburger[]=sprintf(
		'<a href="%s">%s</a>',
		$mobile_item->url,
		esc_attr($mobile_item->title)
	);
}
/*
$mobile_menu=sprintf('
	<div id="mobile-menu">%s</div>
	<div id="mobile-hamburger">
		%s
		<div class="hamburger-social">
			<a href="%s?country=nz" target="_blank" rel="nofollow"><img src="%s/assets/images/header/Flag-DE.gif"></a>
			<a href="%s?country=nz" target="_blank" rel="nofollow"><img src="%s/assets/images/header/Flag-FR.gif"></a>
		</div>
	</div>',
	implode('',$mobile_base),implode('',$mobile_hamburger),
	get_field('campervans_de_link', 'option'),
	get_template_directory_uri(),
	get_field('campervans_fr_link', 'option'),
	get_template_directory_uri()
);*/

$mobile_menu=sprintf('
	<div id="mobile-menu">%s</div>
	<div id="mobile-hamburger">
		%s
		
	</div>',
	implode('',$mobile_base),implode('',$mobile_hamburger),
	get_field('campervans_de_link', 'option'),
	get_template_directory_uri(),
	get_field('campervans_fr_link', 'option'),
	get_template_directory_uri()
);

/*<div class="hamburger-social">
	'. do_shortcode('[gtranslate]') .'
</div>*/
?>
<div class="section global-header">
    
    <div class="container">

        <div class="row">
            
            <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 logo">
                <a href="<?php echo get_site_url();?>"><img src="<?php echo get_template_directory_uri();  ?>/assets/images/header/Travellers-Autobarn.png" class="img-responsive site-logo"></a>
				<span class="site-flag"><img title="USA flag" alt="USA flag" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/header/usa-flag.jpg" /></span>
            </div> <!-- logo -->
            
            <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
            
            <ul class="hidden-xs sites">
            <?php /* <li class="language"><?php the_field('select_language', 'option');?> <a href="<?php the_field('campervans_fr_link', 'option');?>"  target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri();  ?>/assets/images/header/Flag-FR.gif"></a>  <a href="<?php the_field('campervans_de_link', 'option');?>"  target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri();  ?>/assets/images/header/Flag-DE.gif"></a></li> */ /*?>
            <li class="language">
				<?php /* <select onchange="window.open(this.value, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600')"> /*
				<select onchange="if(this.value) window.location.href = this.value">
					<option value=""><?php the_field('select_language', 'option');?></option>
					<option value="<?php the_field('campervans_fr_link', 'option');?>">French</option>
					<option value="<?php the_field('campervans_de_link', 'option');?>">Germany</option>
				</select>
				*/ /*?>
				<?php echo do_shortcode('[gtranslate]'); ?>
			</li>
            <?php /* <li style="border:none;padding-top:0;"><a href="/driving-safe-in-new-zealand/"><img src="<?=get_template_directory_uri()?>/img/content/drivesafe.png" /></a></li> */ ?>
            <li class="last-international-link"><a href="<?php the_field('campervans_au_link', 'option');?>"  target="_blank" rel="nofollow"><?php the_field('campervans_au', 'option');?></a></li>
            <li><a href="<?php the_field('campervans_nz_link', 'option');?>"  target="_blank" rel="nofollow"><?php the_field('campervans_nz', 'option');?></a></li>
            </ul> <!-- sites -->
                
            <br class="clear-fix hidden-xs">
            
            <ul class="contact-details">
            <li class="hidden-xs"><a href="<?php echo get_site_url();?>/contact-us/" class="btn btn-default"><?php the_field('contact_us', 'option');?></a></li>
            <li class="hidden-xs share-icons">
                <div class="sharethis" tabindex="1000">
                    <!--<a class="addthis_button" style="text-decoration:none;" href="http://www.addthis.com/bookmark.php"><i class="icon-share"></i></a>-->
                    <a href="//www.addthis.com/bookmark.php?v=20" rel="nofollow" onclick="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><i class="icon-share"></i></a><script type="text/javascript" src="//s7.addthis.com/js/200/addthis_widget.js"></script>
<!-- AddThis Button END --> 
                </div>
                <?php 
                    
                   // do_action( 'addthis_widget', $the_permalink, $the_title, 'above' ); 
                ?>
                <a href="<?php the_field('facebook_link', 'option');?>" target="_blank" rel="nofollow"><i class="icon-facebook"></i></a>
                <a href="<?php the_field('twitter_link', 'option');?>" target="_blank" rel="nofollow"><i class="icon-twitter"></i></a>
                <a href="<?php the_field('instagram_link', 'option');?>" target="_blank" rel="nofollow"><img style="width:25px;" class="icon-instagram" src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/instagram.png" /></a>
				<a href="<?php the_field('whatsapp_link', 'option');?>" target="_blank" rel="nofollow"><img style="width:25px;" class="icon-whatsapp" src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/whatsapp.png" /></a>
                <?php /* <div class="our-blog"><a href="<?php the_field('blog_link', 'option');?>" target="_blank" rel="nofollow"><i class="icon-comment"></i> <span class="hidden-sm"><?php the_field('our_blog', 'option');?></span></a></div> */ ?>
            </li>
            <li class="phone"><a href="tel:<?php the_field('phone_number', 'option');?>"><i class="icon-phone"></i> <?php the_field('phone_number', 'option');?></a></li>
            </ul> <!-- contact-details -->
                
            </div>
            
        </div> <!-- row -->
        
    </div> <!-- container -->
    
</div> <!-- global-header -->


<nav class="navbar navbar-inverse" role="navigation"> 

    <div class="container desktop">

        <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>

        </div> <!-- navbar-header -->

        <div class="collapse navbar-collapse navbar-ex1-collapse top-menu">

            	<?php
                    $args = array(
                    'theme_location' => 'primary',
                    'depth'	=> 0,
                    'container'	=> false,
                    'menu_class'	=> 'nav navbar-nav navbar-left',
                    'walker'	=> new BootstrapNavMenuWalker()
                    );

                    wp_nav_menu($args);
                ?>
            
            

        </div><!-- navbar-collapse -->

    </div><!-- container -->
	
	<div class="container mobile">
<script type="text/javascript">
var EMMenu={
	close:function(){
		jQuery('#mobile-hamburger').slideUp();
		jQuery('#mobile-menu .hamburger').removeClass('open');
	},
	toggleMenu:function(){
		if($('#mobile-menu .hamburger').hasClass('open')){
			EMMenu.close();
			return;
		}
		jQuery('#mobile-hamburger').slideDown();
		jQuery('#mobile-menu .hamburger').addClass('open');
	},
	resize:function(){
		if(window.matchMedia('(max-width:767px)')){
			return;
		}
		EMMenu.close();
	}
};
jQuery(window).on('resize',function(){EMMenu.close();});
</script>
		<?php echo $mobile_menu ?>
	</div>
</nav>
<style type="text/css">
	.dropdown-menu>li>a{
		white-space: normal;
	}
</style>
