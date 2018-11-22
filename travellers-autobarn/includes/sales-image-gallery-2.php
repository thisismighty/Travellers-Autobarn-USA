<?php
$most_popular_html='';
if(get_field('most_popular_vehicle')){
	$most_popular_html='<img src="'.get_template_directory_uri().'/img/most-popular-rentals.png" class="most-popular" />';
}

?><!-- Start Image Gallery Scripts -->
			
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();  ?>/assets/css/jquery.fancybox.css" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/js/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/assets/js/owl.carousel.min-1.js"></script>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/assets/css/owl.carousel.min.css" type="text/css" >
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/assets/css/owl.theme.default.min.css" type="text/css" >
			
                        <script type="text/javascript">
                            /*
jQuery(document).ready(function() {
$(".fancybox").fancybox();
});*/
    
    (function ($, F) {
    F.transitions.resizeIn = function() {
        var previous = F.previous,
            current  = F.current,
            startPos = previous.wrap.stop(true).position(),
            endPos   = $.extend({opacity : 1}, current.pos);

        startPos.width  = previous.wrap.width();
        startPos.height = previous.wrap.height();

        previous.wrap.stop(true).trigger('onReset').remove();

        delete endPos.position;

        current.inner.hide();

        current.wrap.css(startPos).animate(endPos, {
            duration : current.nextSpeed,
            easing   : current.nextEasing,
            step     : F.transitions.step,
            complete : function() {
                F._afterZoomIn();

                current.inner.fadeIn("fast");
            }
        });
    };

}(jQuery, jQuery.fancybox));

jQuery(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
        nextMethod : 'resizeIn',
        nextSpeed  : 250,
        
        prevMethod : false,
        
        helpers : {
            title : {
                type : 'inside'
            }
        }
    });
</script>
<style type="text/css">
	.rg-thumbs a{
		display:block;
		position:relative;
	}
	.rg-thumbs .fancybox img.most-popular{
		position:absolute;
		top:20px;
		left:-9px;
		width:35%;
		border:none;
	}
</style>
			
			<!-- End Image Gallery Scripts -->
                        <?php $main_image = get_field('car_image');?>
                        <?php 
                            $images = get_field('gallery');
                            if ($images):
                        ?>
                       
			<div id="rg-gallery" class="rg-gallery">
				<div class="rg-thumbs hidden-xs">
					<!-- Elastislide Carousel Thumbnail Viewer -->
                                        
                                        <a
											href="<?php echo $main_image['url'];?>" class="fancybox" rel="vehicle-gallery" ><img
											src="<?php echo $main_image['url'];?>" alt="<?php echo get_the_title();?>" class="carimage"/>
											<?=$most_popular_html?></a>
					<div class="es-carousel-wrapper">
						<div class="es-carousel">
                                                    <ul>
                                                            <?php
                                                                $count=0;
                                                                foreach( $images as $image ):  
                                                                    $count++;
                                                                    $img = $image['url'];
                                                                    $thumb = $image['sizes']['thumbnail'];
                                                                    $alt = get_the_title().$count;
                                                            ?>        
		
								<li><a href="<?php echo $img;?>" class="fancybox" rel="vehicle-gallery" ><img src="<?php echo $thumb;?>"  alt="<?php echo $alt;?>" width="117px" height="117px"/></a></li>
                                                            <?php
                                                                endforeach;
                                                            ?>
                                                    </ul>            
						</div>
					</div>
					<!-- End Elastislide Carousel Thumbnail Viewer -->
				</div><!-- rg-thumbs -->
				<div id="rg-carrousel" class="rg-carrousel owl-carousel owl-theme visible-xs">
					<?php
						$count=0;
						// echo '<pre>'; print_r($images); echo '</pre>';
						foreach( $images as $image ): 
							$count++;
							$img = $image['url'];
							// $thumb = $image['sizes']['video-tips']; thumbnail, medium, medium_large, travel-tips
							$thumb = $image['sizes']['large'];
							$alt = get_the_title().$count;
					?>        
						<div class="item">
							<img src="<?php echo $thumb;?>"  alt="<?php echo $alt;?>" />
						</div>
					<?php
						endforeach;
					?>
				</div>
				<div class="visible-xs">
					<?=$most_popular_html?>
				</div>
			</div><!-- rg-gallery -->
			
			<script>
				jQuery(document).ready(function(){
					jQuery('.rg-carrousel.owl-carousel').owlCarousel({
						loop:true,
						nav:true,
						dots: false,
						autoHeight:true,
						items:1
					})
				});
			</script>
                        <div class="clearfix"></div>
                         <br/>
                        <?php
                            endif;
                        ?>