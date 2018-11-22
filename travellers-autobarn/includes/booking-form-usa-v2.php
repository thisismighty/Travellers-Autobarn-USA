<?php
//updated to booking-form-usa-v3.php
include "booking-form-usa-v3.php";
return;

if(!isset($booking_form_jquery_ui_loaded)){
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/jquery-ui/jquery-ui.js"></script>
<link href="<?php echo get_template_directory_uri();  ?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<script type="text/javascript">
jQuery(function($){
	var dateToday = new Date(); 
    $("input[name=PickupDateAlt]").datepicker({
        numberOfMonths: 1,
		inline: true,
		minDate: dateToday,
		dateFormat: "M d yy",
		// altFormat: "dd/mm/yy",
		// altField: "#PickupDateVal",
        onSelect: function(selected, obj) {
			var selectedDate = new Date(obj.selectedYear, obj.selectedMonth, obj.selectedDay);//Date one month after selected date
			var formattedDate = $.datepicker.formatDate('dd/mm/yy', selectedDate);
			$("input[name=ReturnDateAlt]").datepicker("option","minDate", selected)
			$("input[name=PickupDate]").val(formattedDate);
		}
    });
    $("input[name=ReturnDateAlt]").datepicker({ 
        numberOfMonths: 1,
		inline: true,
		minDate: dateToday,
		dateFormat: "M d yy",
		// altFormat: "dd/mm/yy",
		// altField: "#ReturnDateVal",
        onSelect: function(selected, obj) {
			var selectedDate = new Date(obj.selectedYear, obj.selectedMonth, obj.selectedDay);//Date one month after selected date
			var formattedDate = $.datepicker.formatDate('dd/mm/yy', selectedDate);
			$("input[name=PickupDateAlt]").datepicker("option","maxDate", selected)
			$("input[name=ReturnDate]").val(formattedDate);
        }
    });
});

function displaypickup(rel){
	$( "input[name=PickupDate][rel="+rel+"]" ).datepicker("show");
	return false;
}

function displayreturn(rel){
	$( "input[name=ReturnDate][rel="+rel+"]" ).datepicker("show");
	return false;
}

function Validate(resForm){
	if($("input[name=PickupDate]",resForm).val()===""){
		alert("Please select a pick up date");
		return false;
	}
	if($("input[name=ReturnDate]",resForm).val()===""){
		alert("Please select a drop off date.");
		return false;
	}
	
	if($("select[name=PickupTime]",resForm).val()===""){
		alert("Please select a pick up time");
		return false;
	}
	if($("select[name=ReturnTime]",resForm).val()===""){
		alert("Please select a drop off time.");
		return false;
	}

	var checkIn_date=$("input[name=PickupDate]",resForm).val().split('/').reverse();
	if(	!checkIn_date[0]
		||!checkIn_date[1]
		||!checkIn_date[2]){
		alert("Please select a pick up date");
		return false;
	}
	checkIn_date=new Date(checkIn_date[0],checkIn_date[1],checkIn_date[2]);

	var checkOut_date=$("input[name=ReturnDate]",resForm).val().split('/').reverse();
	if(	!checkOut_date[0]
		||!checkOut_date[1]
		||!checkOut_date[2]){
		alert("Please select a drop off date.");
		return false;
	}
	checkOut_date=new Date(checkOut_date[0],checkOut_date[1],checkOut_date[2]);

	if(checkOut_date.getTime()<checkIn_date.getTime()){
		alert("Invalid date, your drop off date must be after your pick up date.");
		return false;
	}
	var diffDays=Math.ceil(Math.abs(checkOut_date.getTime()-checkIn_date.getTime())/(1000*3600*24));

	if(diffDays<9){
		alert("Please be aware that online quotes/bookings require a minimum of 10 rental days. If you would like to travel less than 10 days please fill out our rental enquiry form or contact us on 1800 674 374. Thank you.");
		return false;
	}

	if ($('select[name="DropOffLocationID"]').val() == 'Same'){
		var pickup = $('select[name="PickupLocationID"]').val();
		$('select[name="DropOffLocationID"]').val(pickup);
	}

	return true;
}
</script>
<?php
	$booking_form_jquery_ui_loaded=0;
}
$booking_form_jquery_ui_loaded++;
?>

<div class="booking-form v7">

	<div class="heading">Hire a <span class="orange">Campervan</span><BR>
	<span class="small">Get a Quick Quote and Hire Now</span></div>

	<form method="post" name="quoteform" action="<?=RCM_ACTION?>" target="_blank" onsubmit="return Validate(this)">

		<input type="hidden" name="CategoryTypeID" value="1" />
		<input type="hidden" name="referrer" value="<?=RCM_REFERRER?>" />


		<fieldset class="step2">
			<label><span class="white">Step 1:</span> Pick up location</label>
			<select name="PickupLocationID">
			 <option value="13">Denver</option>
			  <option value="10">Las Vegas</option>
			  <option value="1">Los Angeles</option>
			  <option value="12">Miami</option>
			  <option value="11">New York</option>
			  <option value="9">San Francisco</option>
			  <option value="14">Seattle</option>
			</select>
			<input type="text" placeholder="Date" name="PickupDateAlt" rel="<?php echo $booking_form_jquery_ui_loaded; ?>" readonly>
			<input id="PickupDateVal" type="hidden" placeholder="Date" name="PickupDate" readonly>
			<select name="PickupTime">
				<option value="">Time</option>
				<option value="13:00">13:00</option>
				<option value="13:30">13:30</option>
				<option value="14:00">14:00</option>
				<option value="14:30">14:30</option>
				<option value="15:00">15:00</option>
				<option value="15:30">15:30</option>
				<option value="16:00">16:00</option>
			</select>
		</fieldset>


		<fieldset class="step3">
			<label><span class="white">Step 2:</span> Drop off location</label>
			<select name="DropOffLocationID">
			 <option value="13">Denver</option>
			  <option value="10">Las Vegas</option>
			  <option value="1">Los Angeles</option>
			  <option value="12">Miami</option>
			  <option value="11">New York</option>
			  <option value="9">San Francisco</option>
			  <option value="14">Seattle</option>
			</select>
			<input type="text" placeholder="Date" name="ReturnDateAlt" rel="<?php echo $booking_form_jquery_ui_loaded; ?>" readonly>
			<input id="ReturnDateVal" type="hidden" name="ReturnDate" readonly>
			<select name="ReturnTime">
				<option value="">Time</option>
				<option value="09:00">09:00</option>
				<option value="09:30">09:30</option>
				<option value="10:00">10:00</option>
			</select>
		</fieldset>

		<fieldset class="step4">
			<label><span class="white">Step 3:</span> Promo Code</label>
			<input type="text" placeholder="Promo code" name="PromoCode">
		</fieldset>
		<input type="hidden" value="1" name="CategoryTypeID">
		<fieldset class="quote">
			<input type="submit" value="Get your Quote" class="quote-submit">
		</fieldset>
	</form>
</div> <!-- booking-form -->