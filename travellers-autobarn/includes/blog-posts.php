<div class="row display-data">
<?php
query_posts( array(
	// 'category_name'  => $category_slug,
	'post__not_in' => $excludes,
	'post_type' => array('post'),
	'post_status' => array('publish'),
	// 'post_status' => array('draft', 'publish'),
	'posts_per_page' => $max_posts,
	'paged' => 1,
	'orderby' => 'post_date',
	'order' => 'DESC',
) );

$post_count=0;
$incol_post_count=0;
$open = 0;
$maxponcol = 3;

if (have_posts()): 
	while(have_posts()): 
		the_post(); 
		
		$more_class=$post_count < $max_posts ? 'less' : 'more';
		
		if($incol_post_count ==0 && ! $open){
			// echo '<-- start -->'; //close post-column 
			echo '<div class="post-column">'; 
			$open=1;
		}
		
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
		
		// echo '<div class="bg"></div>';
		echo '</div>';
		
		$short_title = get_field('short_title');			
		if ($short_title) 
			echo '<h3 class="post-title">' . $short_title . '</h3>';
		else
			echo 		'<h3 class="post-title">'. $article_title .'</h3>';										
		echo		'</a>';
		echo '<p>' . get_the_excerpt() . '</p>';
		
		echo '<a href="'. get_the_permalink() .'">';
		echo '<span class="read-more">Read More</span>';
		echo '</a>';
		
		echo '</div>';		
		
		if($incol_post_count==$maxponcol - 1 && $open){
			// echo '<-- end -->'; //close post-column 
			echo '</div>'; //close post-column 
			$incol_post_count=0; //reset
			$open=0;
		}
		
		$post_count++;
		if($open)
			$incol_post_count++;
	endwhile;
	
	if($open){
		// echo '<-- end last-->'; //close post-column 	
		echo '</div>'; //close unclosed wrap
	}
endif;


wp_reset_query();
?>
</div>

<?php if($post_count >= $max_posts): ?>
<div class="load-more-wrap">
<a class="btn btn-default load-more" next-page="2" not-in="<?php echo implode(',',$excludes); ?>" max-posts="<?php echo $max_posts; ?>">See More Articles</a>
<a class="btn btn-default show-more less" style="display:none;">Show Less Articles</a>
</div>	  
<?php endif; ?>

<script>
jQuery(document).ready(function($){
	$('.load-more-wrap .show-more:not(.disabled)').on('click', function(){
		if( ! $(this).hasClass('less')){
			$('.blog-section .display-data .more').show();
			$(this).html('Show Less Articles');
			$(this).addClass('less');
		}else{
			$('.blog-section .display-data .more').hide();
			$(this).html('See More Articles');
			$(this).removeClass('less');
		}
		
	});
	$('.load-more-wrap .load-more:not(.disabled)').on('click', function(){
		var next_page = $(this).attr('next-page');
		var not_in = $(this).attr('not-in');
		var max_posts = $(this).attr('max-posts');
		
		var data = {
			action: 'load_more_articles',
			'next_page': next_page,
			'post_not_in': not_in,
			'max_posts': max_posts,
			'category_name': '<?php echo $category_slug; ?>',
		};
		
		$('.load-more-wrap .load-more').html('See More Articles...');
		$('.load-more-wrap .load-more').addClass('disabled');
		
		$.ajax({
			type: 'POST',
			dataType : 'json',
			url: '<?php echo admin_url('admin-ajax.php') ?>',
			data: data,
			success: function( response ) {         
				if( response['html'] ){
					$('.blog-section .display-data').html(response['html']);
					$('.load-more-wrap .load-more').attr('next-page', response['next_page']);
					
				
					$('.load-more-wrap .load-more').html('See More Articles');
					$('.load-more-wrap .load-more').removeClass('disabled');
					$('.load-more-wrap .load-more').hide();
					if( ! response['is_empty'] )
						$('.load-more-wrap .show-more').show();
				}else{
					$('.load-more-wrap .load-more').hide();
				
					$('.load-more-wrap .load-more').html('See More Articles');
					$('.load-more-wrap .load-more').removeClass('disabled');
				}							
			},
			error: function(){
				$('.load-more-wrap .load-more').removeClass('disabled');							
				$('.load-more-wrap .load-more').html('See More Articles');
			}
		});
	
		return false;
	});
});
</script>