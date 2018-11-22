<?php
    /*
    Template Name: Vehicle List - Sales
    */
    get_header();
?>
<?php include("includes/breadcrumbs.php"); ?>

<style>
	@media (max-width:480px){
	.btn-default{
		margin-bottom:10px;
	}
	}
</style>
<div class="section product">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding">
		<?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post(); 
                ?>
                            <h1><?php the_title();?></h1>

                            <?php the_content(); ?>

                <?php 
                        endwhile;
                    endif;
                ?>
                <?php          
                    $cat_id = get_cat_ID( 'Sales' );
                    $args = array(
                        'posts_per_page'   => 100,
                        'offset'           => 0,
                        'category'  => $cat_id,

                        'orderby'          => 'menu_order',
                        'order'            => 'ASC',
                        'include'          => '',
                        'exclude'          => '',
                        'post_type'        => 'page',
                        'post_mime_type'   => '',
                        'post_parent'      => '',
                        'post_status'      => 'publish',
                        'suppress_filters' => true );



                    $myposts = get_posts( $args );
//echo "<pre>";print_r($myposts);die();

                    foreach ( $myposts as $post ) : 
                       setup_postdata( $post ); 
                       $id = $post->ID;
                       $subtitle = get_field('subtitle');
                       $img = get_field('car_image');
                       $price = str_replace('$','',get_field('price'));
                       if (get_field('vehicle_excerpt')!="")
                       {
                           $excerpt = "<p>".get_field('vehicle_excerpt')."</p>";
                       }
                       else
                       {
                           $excerpt = get_the_content();
                       }
                       
                ?>           
                            
                    <div class="product-list">

                        <div class="info fullwidth">

                            <h3><a href="<?php the_permalink();?>"><?php echo $post->post_title;?></a></h3>
                            <h4><?php echo $subtitle;?></h4>

                            <div class="image">
                                <a href="<?php the_permalink();?>"><img src="<?php echo $img['url'];?>" class="img-responsive"></a>
                            </div> <!-- image -->

                            <div class="text">
                                <?php echo $excerpt;?>
                                <a class="btn btn-default black btn-sm" href="<?php the_permalink();?>">Read more</a>

                                <BR class="clear-fix">
<!--<a class="btn btn-default" href="<?php the_field('quick_quote_sales', 'option');?>">Email Us</a>-->
                                <a href="<?php echo get_site_url();?>/campervan-rental-australia/" class="btn btn-default visitus">Visit Us</a>
                                <a class="btn btn-default" data-toggle="modal" data-target="#callus">Call Us</a>
                            </div> <!-- text -->

                        </div> <!-- info -->
                    </div> <!-- product-list -->
            <?php
                endforeach;wp_reset_query();
            ?> 
                    <div class="pagebottom">
                        <?php the_field('page_bottom');?>
            </div>
	  </div> <!-- padding -->
          
            
            <?php include("includes/call-us.php"); ?>

	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form.php"); ?>
         
        <?php include("includes/why-buy.php"); ?>
         
        <?php include("includes/subscribe-form.php"); ?>
              
        <?php include("includes/blog.php"); ?>  
        <?php include("includes/sidebar-social.php"); ?> 
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section product -->

<?php get_footer(); ?>