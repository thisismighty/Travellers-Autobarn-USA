<?php
    /*
    Template Name: Our Locations
    */
    get_header();	
?>
<style>
	@media (max-width: 770px) {
		.sidebar.padding{
			padding-top:0 !important;
			padding-bottom:0 !important;
		}
	}
</style>

<?php // <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDjHi7a1ltzQslYxB8GqsqQBfb07Yu_pkE&sensor=false"></script> ?>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDuQ5zA1N7-IcAJnbMm_QoZLCNmRhFilNw&sensor=false"></script>
<?php include("includes/breadcrumbs.php"); ?>



<div class="section general locations">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding">
                <h1><?php the_title();?></h1>
                <?php 
                    if (have_posts()): 
                        while(have_posts()): 
                            the_post(); 
                            the_content();
                        endwhile;
                    endif;
                ?>
                <?php include("includes/locations_tabs.php"); ?>
            </div> <!-- padding -->


            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">

                <?php include("includes/booking-form-usa-v2.php"); ?>

                <?php include("includes/subscribe-form.php"); ?>
              
                <?php include("includes/blog.php"); ?>

				<?php include("includes/sidebar-social.php"); ?>   

            </div> <!-- sidebar -->


        </div> <!-- row -->

    </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>
