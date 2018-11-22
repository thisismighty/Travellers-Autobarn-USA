<?php
/*
Template Name: Quick Quote
*/
    get_header();
?> 

<?php include("includes/breadcrumbs.php"); ?>

<div class="section general">

  <div class="container">

	<div class="row">
	
	  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding">

	<?php if (have_posts()): while(have_posts()): the_post(); ?>
	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

	<form method="POST" name="quoteform" action="https://secure20.rentalcarmanager.com.au/ssl/AuAutoBarn191/AU/listcars.asp?refid=&URL=" target="_blank" onsubmit="return Validate(this);">
		<input type="hidden" id="active_scripting" name="active_scripting" value="0">
		<input type="hidden" name="frequent_renter_no value">
		<input type="hidden" name="renter_age_range" value="">
		<input type="hidden" name="trust_birth_date" value="N">
		<input type="hidden" name="pickupTime" value="10:00" />
		<input type="hidden" name="DropoffTime" value="10:00" />
		<input type="hidden" name="driverage" value="20" />
		<?php
			// all the below hidden fields were preset values in the old site
			// we have no control over where this form submits to so they have been left as-is
		?>
		<input type="hidden" name="CategoryTypeID" value="11" />
		<input type="hidden" name="pagina" value="index" />
		<input type="hidden" name="billto" value="" />
		<input type="hidden" name="billto_no" value="" />
		<input type="hidden" name="billto_pin" value="" />
		<input type="hidden" name="po" value="" />
		<input type="hidden" name="voucher" />
		<input type="hidden" name="voucher_issuer" value="" />
		<input type="hidden" name="voucher_pin" value="" />
		<input type="hidden" name="voucher_no" value="" />
		<input type="hidden" name="voucher_class" value="" />
		<input type="hidden" name="voucher_days" value="" />
		<input type="hidden" name="email" value="" />
		<input type="hidden" name="renter_first" value="" />
		<input type="hidden" name="res_airline_code" value="" />
		<input type="hidden" name="res_conf_no" value ="" />
		<input type="hidden" name="res_flight_gate_no" value="" />
		<input type="hidden" name="res_vend_no" value="" />
		<input type="hidden" name="res_wsale_flag" value="" />
		<input type="hidden" name="vehicle_class" value="" />
		<input type="hidden" name="vendor_email" value="" />
		<input type="hidden" name="iata_passed" value="Y" />
		<table border="0" cellpadding="0" cellspacing="0" id="bookingEngine">
			<tbody>
				<tr>
					<td valign="top">STEP1: PICK UP LOCATION
					<td valign="top" style="padding: 0 0 8px 6px;">
						<select name="PickupLocationID" style="width: 189px;">
							<option value="7">Brisbane &nbsp;</option>
							<option value="11">Cairns &nbsp;</option>
							<option value="10">Darwin &nbsp;</option>
							<option value="8">Melbourne &nbsp;</option>
							<option value="9">Perth &nbsp;</option>
							<option selected="selected" value="12">Sydney &nbsp;</option>
						</select><br />
						<?php
							// set our default date
							$date_start = new DateTime('now');
							$date_start->add(new DateInterval("P3D"));
						?>
						<input type="text" name="date8a" size="7" value="<?php echo $date_start->format("d/m/Y"); ?>" id="checkIn_date" style="width: 91px;" autocomplete="off" class="datepicker"> <img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/dynCalendar.gif" class="triggerdp" style="" />
						<input type="hidden" class="day" name="PickupDay" value="<?php echo $date_start->format("d"); ?>">
						<input type="hidden" class="month" name="PickupMonth" value="<?php echo $date_start->format("m"); ?>">
						<input type="hidden" class="year" name="PickupYear" value="<?php echo $date_start->format("Y"); ?>">
					</td>
				</tr>
				<tr>
					<td valign="top">STEP2: DROP OFF LOCATION</td>
					<td valign="top" class="stateBox" style="padding: 0 0 4px 6px;">
						<select name="DropoffLocationID" style="width: 189px;">
							<option value="Same">Same As Pickup Location</option>
							<option value="7">Brisbane &nbsp;</option>
							<option value="11">Cairns &nbsp;</option>
							<option value="10">Darwin &nbsp;</option>
							<option value="8">Melbourne &nbsp;</option>
							<option value="9">Perth &nbsp;</option>
							<option value="12">Sydney &nbsp;</option>
						</select><br />
						<?php // set our default date
							$date_end = new DateTime('now');
							$date_end->add(new DateInterval("P12D"));
						?>
						<input name="date8b" type="text" id="checkOut_date" value="<?php echo $date_end->format("d/m/Y"); ?>" placeholder="dd/mm/yyyy" size="7" style="width: 91px;" autocomplete="off" class="datepicker"> <img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/dynCalendar.gif" class="triggerdp" style="" />
						<input type="hidden" class="day" name="DropoffDay" value="<?php echo $date_end->format("d"); ?>">
						<input type="hidden" class="month" name="DropoffMonth" value="<?php echo $date_end->format("m"); ?>">
						<input type="hidden" class="year" name="DropoffYear" value="<?php echo $date_end->format("Y"); ?>">
					</td>
				</tr>
				<tr>
					<td style="padding: 0pt 0pt 12px 0px;">STEP3: PROMO CODE</td>
					<td style="padding: 0pt 0pt 12px 6px;"><input type="text" value="" size="20" maxlength="30" name="PromoCode" mouseev="true" keyev="true"></td>
				</tr>
				<tr>
					<td>STEP4: GET QUOTE</td>
					<td style="padding: 0 0 0 6px;"><span style="padding-top: 6px; padding-bottom: 7px;">
						<input type="SUBMIT" name="show_rates" value=" Get Your Quote " class="submit" style="WIDTH: 190px; font-weight: bold;">
						</span>
					</td>
				</tr>
				<tr>
					<td><img src="../images/old/spacer.gif" width="150" height="2"></td>
					<td><img src="../images/old/spacer.gif" width="150" height="2"></td>
				</tr>
			</tbody>
		</table>
	</form>

	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div> <!-- padding -->
                  
                  

	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar padding">
          
        <?php include("includes/booking-form-usa.php"); ?>
          
        <?php include("includes/subscribe-form.php"); ?>
              
        <?php include("includes/blog.php"); ?>
            
          
            
          
	  </div> <!-- sidebar -->


	</div> <!-- row -->

  </div> <!-- container -->

</div> <!-- section general -->



<?php get_footer(); ?>