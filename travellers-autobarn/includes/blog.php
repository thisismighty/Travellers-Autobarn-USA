<div class="blog-box">
	<div class="heading">
		Latest Road Trips
	</div>
	<style>
		.blog-posts a{
			
			color:#000 !important;
		}
	</style>
	
	<?php 
		if (in_category('all-sales-pages-tab-use')):
			while ( have_rows('blogs_sales', 'option')) : 
				the_row();
				if (get_sub_field('blog_link') != ""){
					$link = get_sub_field('blog_link');
				}
				else{
					$link ='#';
				}
				?>
					<div class="blog-posts">
						<b><a href="<?=$link;?>" target="_blank"><?php the_sub_field('blog_title');?></a></b><br/>
						<?php the_sub_field('blog_content');?>
					</div>
				<?php
			endwhile;
		
		else:
			while ( have_rows('blogs', 'option') ) : 
				the_row();
				if (get_sub_field('blog_link') != ""){
					$link = get_sub_field('blog_link');
				}
				else{
					$link ='#';
				}
				?>
					<div class="blog-posts">
						<b><a href="<?=$link;?>" target="_blank"><?php the_sub_field('blog_title');?></a></b><br/>
						<?php the_sub_field('blog_content');?>
					</div>
				<?php
				// display a sub field value


			endwhile;
		endif;
	?>
     
</div> <!-- blog-box -->  
