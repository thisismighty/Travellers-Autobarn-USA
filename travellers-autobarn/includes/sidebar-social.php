<?php if (in_category('all-sales-pages-tab-use') || in_category('all-rental-page-tab-use') || is_page_template('template-review.php') ):?>
<style>
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
</style>
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
<div class="sidebar-social" style="padding-top:20px;">
	<div class="socials">
		<h5>USA Road Trips</h5>
		<div class="social-box">
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
				$yt_img = "//img.youtube.com/vi/$values/0.jpg";
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
			
			
			<!--<iframe width="560" height="315" style="width:100%;" src="https://www.youtube.com/embed/<?=$values?>" frameborder="0" allowfullscreen></iframe>-->
		</div>
	</div>
	
	<?php //if( ! is_page_template('rentals.php') ): ?>
	<div class="socials">
		<h5><a href="<?php the_field('facebook_link', 'option');?>" target="_blank">Like Us on Facebook</a></h5>
		<div class="social-box" style="margin:auto;">
			<div class="fb-like-box" data-href="https://www.facebook.com/Travellers.AutoBarn" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
		</div>
	</div>
	<div class="socials">
		<h5 style="height:50px">
			<a href="<?php the_field('instagram_link', 'option');?>" target="_blank">Instagram</a>
			<span class="tab_instagram"><a href="<?php the_field('instagram_link', 'option');?>" target="_blank" style="color:#000;">@TRAVELLERSAUTOBARN</a></span>
		</h5>
		<div class="social-box insta-spacing">
            <?php echo do_shortcode('[embedsocial_instagram id="972ac3c028eea7dd70dfce14e7e74598bc732b83"]'); ?>
		</div>
	</div>
	<?php //endif; ?>
</div>
<?php endif;?>
