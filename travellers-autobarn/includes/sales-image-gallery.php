			<!-- Start Image Gallery Scripts -->
			<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/js/jquery.tmpl.min.js"></script> 
			<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/js/jquery.elastislide.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/js/gallery.js"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();  ?>/assets/css/gallery.css" /> <!-- Image Gallery -->

			
			<noscript><style>.es-carousel ul{display:block;} </style></noscript>
			
			<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
				<div class="rg-image-wrapper">
					
					<div class="rg-image"></div>
					<div class="rg-loading"></div>
					<!--<div class="rg-caption-wrapper">
						<div class="rg-caption" style="display:none;">
							<p></p>
						</div>
					</div>-->
				</div>
			</script>
			
			<!-- End Image Gallery Scripts -->

                        <?php 
                            $images = get_field('gallery');
                            if ($images):
                        ?>
                        
			<div id="rg-gallery" class="rg-gallery">
				<div class="rg-thumbs">
					<!-- Elastislide Carousel Thumbnail Viewer -->
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
								<li><a href="#"><img src="<?php echo $thumb;?>" data-large="<?php echo $img;?>" alt="<?php echo $alt;?>" data-description="<?php echo alt;?>" /></a></li>
								
                                                            <?php
                                                                endforeach;
                                                            ?>
							</ul>
						</div>
					</div>
					<!-- End Elastislide Carousel Thumbnail Viewer -->
				</div><!-- rg-thumbs -->
			</div><!-- rg-gallery -->
                        <?php
                            endif;
                        ?>