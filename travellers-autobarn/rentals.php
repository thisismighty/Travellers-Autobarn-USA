<?php
    /*
    Template Name: Vehicle List - Rental
    */

get_header();
?>
<?php //include("includes/breadcrumbs.php"); ?>
<style>
	.product-list .info{
		
	}
	
	.product-list .call-to-action{
		
	}
	.product-list .image a{
		position:relative;
		display:block;
	}
	.product-list .image img.most-popular{
		position:absolute;
		top:10px;
		left:-7px;
		width:47%;
		border-radius:0 !important;
		-moz-border-radius:0 !important;
		-webkit-border-radius:0 !important;
	}

</style>
<div class="section product">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding" style="padding-bottom:0;">
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
					$get_template = get_stylesheet_directory_uri();
                    $cat_id = get_cat_ID( 'Rentals' );
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
						'posts_per_page'	   => 2,
                        'post_parent'      => '',
                        'post_status'      => 'publish',
                        'suppress_filters' => true );
           
        
            
                        $myposts = get_posts( $args );
                        
                        
                        foreach ( $myposts as $post ) : 
                            setup_postdata( $post ); 
                            $subtitle = get_field('subtitle');
                            $img = get_field('car_image');
                            $features_title = get_field('featured_items_title'); 
                            $price = str_replace('$','',get_field('price'));
							$most_popular_html='';
							if(get_field('most_popular_vehicle')){
								$most_popular_html='<img src="'.get_template_directory_uri().'/img/most-popular-rentals.png" class="most-popular" />';
							}
                ?>
                                <div class="product-list">
									<h3><a href="<?php the_permalink();?>"><?php echo $post->post_title;?></a></h3>
                                    <h4><?php echo $subtitle;?></h4>
										
                                    <div class="info">

                                        <div class="image">
                                            <a href="<?php the_permalink();?>"><img
												src="<?php echo $img['url'];?>" class="img-responsive"><?=$most_popular_html?></a>

                                        </div> <!-- image -->
                                        
										<div class="clear"></div>
										
										<div class="row">
											
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
												<?php
												$quick_facts = get_field('quick_fact');
												$adult_value = get_field('adult_value');
												// print_r($quick_fact);
												if (isset($_GET['debug'])){
													echo '<pre>'; print_r($quick_facts); echo '</pre>';
												}
												?>
												<div class="features-wrap">
													<div class="heading">Quick Facts</div>
													<div class="features">
														<?php /*foreach ($quick_facts as $quick_fact) : 
															$display_quick_fact = str_replace('_', ' ', $quick_fact);
															?>
														
															<div class="featurd <?php echo $quick_fact; ?>">
																<img src="<?php echo $get_template; ?>/assets/images/<?php echo $quick_fact; ?>.png">
																<span class="multi"><?php echo $display_quick_fact; if($adult_value) echo ': ' . $adult_value; ?></span>
															</div>
														<?php endforeach;*/ ?>
														
														<?php foreach ($quick_facts as $quick_fact) : ?>
															<?php if ($quick_fact == 'adults'): ?>
																<div class="featurd adult">
																	<img src="<?php echo $get_template; ?>/assets/images/adult.png">
																	<span class="multi">Adults<?php if($adult_value) echo ': ' . $adult_value; ?></span>
																</div>
															<?php endif; ?>
															<?php if ($quick_fact == 'microwave' || $quick_fact == 'microwave_opt'): ?>
																<div class="featurd microwave">
																	<img src="<?php echo $get_template; ?>/assets/images/microwafe.png">
																	<span class="multi">Microwave<?php if ($quick_fact == 'microwave_opt') echo '<br>Optional'; ?></span>
																</div>
															<?php endif; ?>
															<?php if ($quick_fact == 'fridge' || $quick_fact == 'fridge_opt'): ?>
																<div class="featurd fridge">
																	<img src="<?php echo $get_template; ?>/assets/images/fridge.png">
																	<span class="multi">Fridge<?php if ($quick_fact == 'fridge_opt') echo '<br>Optional'; ?></span>
																</div>
															<?php endif; ?>
															<?php if ($quick_fact == 'gas_cooker' || $quick_fact == 'gas_cooker_opt'): ?>
																<div class="featurd gas-cooker">
																	<img src="<?php echo $get_template; ?>/assets/images/gascooker-sink.png">
																	<span class="multi">Gas Cooker<br>& Sink<?php if ($quick_fact == 'gas_cooker_opt') echo '<br>Optional'; ?></span>
																</div>
															<?php endif; ?>
															<?php if ($quick_fact == 'solar_panel' || $quick_fact == 'solar_panel_opt'): ?>
																<div class="featurd solar-panel">
																	<img src="<?php echo $get_template; ?>/assets/images/solar-panel.png">
																	<span class="multi">Solar<br>Panel<?php if ($quick_fact == 'solar_panel_opt') echo '<br>Optional'; ?></span>
																</div>
															<?php endif; ?>
														<?php endforeach; ?>
														
														<?php /*
														$optional_quick_facts = get_field('optional_quick_fact');
															foreach ($optional_quick_facts as $optional_quick_fact) :
																$enable = $optional_quick_fact['optional_check'][0];
																$nm_op_fact = $optional_quick_fact['name_optional'];
																$img_op_fact = $optional_quick_fact['image_optional'];
																
																// echo $enable;
																// echo '<pre>'; print_r($optional_quick_fact); echo '</pre>'; 
																if ($enable == 'custom'): ?>
																
																	<div class="featurd optional_fact">
																		<img src="<?php echo $img_op_fact; ?>">
																		<span class="multi"><?php echo $nm_op_fact; ?></span>
																	</div>
																<?php 
																endif;
															
															endforeach;*/
														?>
														
													</div>
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 hidden-xs">
												<div class="call-to-action">													
													<a href="<?php echo get_site_url();?>/quick-quote/" class="btn btn-default btn-sm">QUOTE OR BOOK NOW</a>													
													<a class="btn btn-default black btn-sm" href="<?php echo get_site_url();?>/contact-us/">Call Us</a>												   
													<a class="btn btn-default black btn-sm" href="<?php the_permalink();?>">Read more</a>
												</div>
											</div>
										</div>
										
										
										<div class="rentals-excerpt" style="padding:10px 0;">
                                            <?php the_field('vehicle_excerpt');?>
                                        </div>
										
                                        <?php 
                                            if (have_rows('vehicle_features')):
                                                                                          
                                        ?>
                                            <div class="text">
                                                <div class="heading"><?php echo $features_title;?></div>
                                               
												<?php
													$i = 1;
													while(have_rows('featured_items')): the_row();
													$i++;
													endwhile;
													$ci = $i/2;
												?>
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
													<ul>
													<?php
													$z = 0;
													while(have_rows('featured_items')):  
														the_row();
														$feature = get_sub_field('featured_item');
														$z++;
														
														if ($z <= $ci): ?>
														
															<li class="ft-left"><?php echo $feature;?></li>
															
														<?php endif;
														
													endwhile;
													?>
													</ul>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
													<ul>
													<?php
													$zi = 0;
													while(have_rows('featured_items')):  
														the_row();
														$feature = get_sub_field('featured_item');
														$zi++;
														
														if ($zi > $ci): ?>
														
															<li class="ft-right"><?php echo $feature;?></li>
															
														<?php endif;
														
													endwhile;
													?>
													</ul>
                                               </div>
											   
                                            </div> <!-- text -->
											<div class="clear"></div>
                                        <?php endif;?>
                                            
                                        
                                    </div> <!-- info -->
									
									
									<div class="call-to-action visible-xs hidden-lg">
										<?php /*
										<div class="price-container hidden-xs">

											<div class="price-text">From</div>
											<div class="price">
												<span class="dollar">$</span><?php echo $price;?><span class="disclaimer">*</span>
											</div>
											<div class="price-text">a day</div>

										</div> <!-- price-container -->

										<div class="terms hidden-xs">*Conditions Apply - Prices may vary in Peak Seasons</div>
										*/ ?>
										
										<a href="<?php echo get_site_url();?>/quick-quote/" class="btn btn-default btn-sm">QUOTE OR BOOK NOW</a>
										<!-- <a class="btn btn-default hidden-xs" href="<?php the_field('quick_quote_link', 'option');?>">Email Us</a> -->
										
										<a class="btn btn-default black btn-sm" href="<?php echo get_site_url();?>/contact-us/">Call Us</a>
									   
										<a class="btn btn-default black btn-sm" href="<?php the_permalink();?>">Read more</a>

									</div>
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
                <?php include("includes/booking-form-usa-v2.php"); ?>
				
                <?php include("includes/why-hire.php"); ?>
				
				<?php //include("includes/au-hire.php");?>
                <?php include("includes/subscribe-form.php"); ?>
              
                <?php include("includes/blog.php"); ?>
				<?php include("includes/sidebar-social.php"); ?> 
            </div> <!-- sidebar -->
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- section product -->

<?php get_footer(); ?>