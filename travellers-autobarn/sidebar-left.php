<div class="col-xs-3 left-sidebar">

	<div class="quick-quote">
		<div class="quote-heading"><img src="<?php echo get_template_directory_uri() ?>/assets/images/buttons/get_quote_top.png" alt="Get a Quick Quote! & Book Now!" title="Get a Quick Quote! & Book Now!"></div>

		<form method="post" name="quoteform" action="https://secure20.rentalcarmanager.com.au/ssl/AuAutoBarn191/AU/listcars.asp?refid=&URL=" id="theform" target="_blank" onsubmit="return Validate(this)">
			<div class="step1">
				<div class="steps">Step 1: The Wheels & You</div>
				<select id="select2"  name="select2">
					<option value="Stationwagon">First, pick your vehicle</option>
					<option value="Stationwagon">Stationwagon</option>
					<option value="Stationwagon">2 Berth Budgie Van</option>
					<option value="Stationwagon">2 Berth Chubby Camper Van</option>
					<option value="Stationwagon">2-3 Berth Budget Camper</option>
					<option value="Stationwagon">2-3 Berth Hitop Campervan</option>
					<option value="Stationwagon">2-3 Berth Kuga Campervan</option>
					<option value="Stationwagon">2-5 Berth Hi5 Camper</option>
				</select>
			</div> <!-- step1 -->

			<div class="step2">
				<div class="steps">Step 2: The Pick Up</div>
				<select name="PickupLocationID">
					<option value="7">Brisbane &nbsp;</option>
					<option value="11">Cairns &nbsp;</option>
					<option value="10">Darwin &nbsp;</option>
					<option value="8">Melbourne &nbsp;</option>
					<option value="9">Perth &nbsp;</option>
					<option selected="selected" value="12">Sydney &nbsp;</option>
				</select>

				<?php
					// set our default date
					$date_start = new DateTime('now');
					$date_start->add(new DateInterval("P3D"));
				?>
				<input type="text" class="datepicker" name="PickupDate" value="<?php echo $date_start->format("d/m/Y"); ?>" placeholder="dd/mm/yyyy" /> <img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/dynCalendar.gif" class="triggerdp" style="margin-top:-2px; vertical-align:middle;" />
				<input type="hidden" class="day" name="PickupDay" value="<?php echo $date_start->format("d"); ?>" />
				<input type="hidden" class="month" name="PickupMonth" value="<?php echo $date_start->format("m"); ?>" />
				<input type="hidden" class="year" name="PickupYear" value="<?php echo $date_start->format("Y"); ?>" />
			</div> <!-- step2 -->

			<div class="step3">
				<div class="steps">Step 3: Returning</div>
				<select name='DropoffLocationID'>
					<option value="Same">Same As Pickup Location</option>
					<option value="7">Brisbane &nbsp;</option>
					<option value="11">Cairns &nbsp;</option>
					<option value="10">Darwin &nbsp;</option>
					<option value="8">Melbourne &nbsp;</option>
					<option value="9">Perth &nbsp;</option>
					<option value="12">Sydney &nbsp;</option>
				</select>

				<?php // set our default date
					$date_end = new DateTime('now');
					$date_end->add(new DateInterval("P12D"));
				?>
				<input type="text" class="datepicker" name="DropoffDate" value="<?php echo $date_end->format("d/m/Y"); ?>" placeholder="dd/mm/yyyy" /> <img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/dynCalendar.gif" class="triggerdp" style="margin-top:-2px; vertical-align:middle;" />
				<input type="hidden" class="day" name="DropoffDay" value="<?php echo $date_end->format("d"); ?>" />
				<input type="hidden" class="month" name="DropoffMonth" value="<?php echo $date_end->format("m"); ?>" />
				<input type="hidden" class="year" name="DropoffYear" value="<?php echo $date_end->format("Y"); ?>" />
			</div> <!-- step3 -->

			<div class="step4">
				<div class="steps">Step 4: Promo Code</div>
				<input type="text" name="promocode" class="promocode" maxlength="20" size="20" value="" />
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
			</div> <!-- step4 -->
			<input type="image" name="show_rates" src="<?php echo get_template_directory_uri() ?>/assets/images/buttons/get-your-quote.png">
		</form>
	</div><!-- quick-quote -->

	<div class="social-box">
		<div class="social-heading"><img src="<?php echo get_template_directory_uri() ?>/assets/images/buttons/social_network_sites_top.png" alt="Join our Social Networking Sites"  title="Join our Social Networking Sites"></div>
		<ul class="social">
			<li><a href="http://www.facebook.com/pages/Travellers-Auto-Barn/33791102601"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/facebook.png" alt="Facebook" title="Facebook"></a></li>
			<li><a href="http://twitter.com/AutoBarn" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/twitter.png" alt="Twitter" title="Twitter"></a></li>
			<li><a href="http://www.flickr.com/photos/travellers-autobarn" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/flickr.png" alt="Flickr" title="Flickr"></a></li>
			<li><a href="http://www.youtube.com/autobarnvideos?gl=AU&hl=en-GB" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/YouTube.png" alt="YouTube" title="YouTube"></a></li>
			<li><a href="https://plus.google.com/113816047557033790517" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/GooglePlus.png" alt="Google Plus" title="Google Plus"></a></li>
		</ul>
	</div> <!-- social-box -->

</div> <!-- left-sidebar-->