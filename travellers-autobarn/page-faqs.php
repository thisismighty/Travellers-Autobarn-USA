<?php
	/*
	Template Name: FAQs
	*/
	get_header();
	
	$id = get_the_ID();
	
?>

<?php // include("includes/breadcrumbs.php"); ?>

<?php //include("includes/section-banner.php"); ?>

<style>


.section-banner.no-image {
    background: none !important;
}

.section-banner.type-clean h1 {
    padding: 40px 0 0 0 !important;
    text-align: left !important;
    color: black !important;
    text-shadow: none !important;
}


</style>


<div class="section general faqs">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding">
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post();
							
							echo "<h1>" . get_the_title() . "</h1>";
							
                            the_content(); 
                        endwhile;
                    endif;
                    
                ?> 
		
		<?php if(have_rows('faq', $id)): 
		$i=0;
		?>
		<div class="panel-group" id="help-accordion-1">
		  <?php while(have_rows('faq', $id)): ?>
		  <?php the_row(); ?>
          <div class="panel panel-default panel-help">
            <a href="#<?php echo 'faq-'.$i; ?>" data-toggle="collapse" >
              <div class="panel-heading">
                <h3><?php echo get_sub_field('question'); ?></h3><i class="fa fa-chevron-down position-absolute float-right"></i>
              </div>
            </a>
            <div id="<?php echo 'faq-'.$i; ?>" class="collapse">
              <div class="panel-body">
                <p><?php echo get_sub_field('answer'); ?></p>
              </div>
            </div>
          </div>
		  <?php 
		  $i++;
		  endwhile; ?>
		</div>
		<?php endif; ?>
		
	  </div> <!-- padding -->
                  
                  

	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form-usa-v2.php"); ?>
              
		<?php include("includes/why-hire.php"); ?>
          
        <?php include("includes/subscribe-form.php"); ?>
			  
        <?php include("includes/blog.php"); ?>
            
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->


	<script>
		jQuery(function($){
			$('.collapse').on('shown.bs.collapse', function(){
				$(this).parent().find(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-up");
			}).on('hidden.bs.collapse', function(){
				$(this).parent().find(".fa-chevron-up").removeClass("fa-chevron-up").addClass("fa-chevron-down");
			});
		});
	</script>
<?php
	
	get_footer();
        
?>
