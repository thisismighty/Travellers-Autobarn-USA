<?php			
if(!isset($booking_form_jquery_ui_loaded)){
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/jquery-ui/jquery-ui.js"></script>
<link href="<?php echo get_template_directory_uri();  ?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<script type="text/javascript">
jQuery(function($){	
	var dateToday = new Date(); 
	if($(window).width() < 768){
		var j = 1;
	}else{
		var j = 3;
	}
    $("input[name=PickupDateAlt]").datepicker({
        numberOfMonths: j,
		// showButtonPanel: true,
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
        numberOfMonths: j,
		// showButtonPanel: true,
		inline: true,
		minDate: dateToday,
		dateFormat: "M d yy",
		// altFormat: "dd/mm/yy",
		// altField: "#ReturnDateVal",
        onSelect: function(selected, obj) {
			var selectedDate = new Date(obj.selectedYear, obj.selectedMonth, obj.selectedDay);//Date one month after selected date
			var formattedDate = $.datepicker.formatDate('dd/mm/yy', selectedDate);
			// $("input[name=PickupDateAlt]").datepicker("option","maxDate", selected)
			$("input[name=ReturnDate]").val(formattedDate);
        }
    });
});

function displaypickup(rel){
	$( "input[name=PickupDateAlt][rel="+rel+"]" ).datepicker("show");
	return false;
}

function displayreturn(rel){
	$( "input[name=ReturnDateAlt][rel="+rel+"]" ).datepicker("show");
	return false;
}

function Validate(resForm){
	if($("input[name=PickupDate]",resForm).val()===""){
		// alert("Please select a pick up date");
		$("#message-usa2 .msg-text").html("Please select a pick up date");
		$("#msg2").click();
		return false;
	}
	if($("input[name=ReturnDate]",resForm).val()===""){
		// alert("Please select a drop off date.");
		$("#message-usa2 .msg-text").html("Please select a drop off date.");
		$("#msg2").click();
		return false;
	}
	if($("select[name=DriversLicence]",resForm).val()=="0"){
		// alert("Please select Drivers Licence.");
		$("#message-usa2 .msg-text").html("Please select Drivers Licence.");
		$("#msg2").click();
		return false;
	}
	
	var checkIn_date=$("input[name=PickupDate]",resForm).val().split('/').reverse();
	if(	!checkIn_date[0]
		||!checkIn_date[1]
		||!checkIn_date[2]){
		// alert("Please select a pick up date");
		$("#message-usa2 .msg-text").html("Please select a pick up date");
		$("#msg2").click();
		return false;
	}
	checkIn_date=new Date(checkIn_date[0],checkIn_date[1]-1,checkIn_date[2]);

	var checkOut_date=$("input[name=ReturnDate]",resForm).val().split('/').reverse();
	if(	!checkOut_date[0]
		||!checkOut_date[1]
		||!checkOut_date[2]){
		// alert("Please select a drop off date.");
		$("#message-usa2 .msg-text").html("Please select a drop off date.");
		$("#msg2").click();
		return false;
	}
	checkOut_date=new Date(checkOut_date[0],checkOut_date[1]-1,checkOut_date[2]);
	
	if(checkIn_date < new Date(2019,1,1)){ //"01/02/2019"
		// alert("Our business open official on the 1st of February 2019 – we sadly are unable to provide you with any quotes until then");
		$("#message-usa .msg-text").html('OUR "BRAND NEW" RV/CAMPERVANS WILL BE AVAILABLE STARTING FEBRUARY 1st 2019');
		$("#msg1").click();
		
		return false;
	}
	
	if(checkOut_date.getTime()<checkIn_date.getTime()){
		// alert("Invalid date, your drop off date must be after your pick up date.");
		$("#message-usa2 .msg-text").html("Invalid date, your drop off date must be after your pick up date.");
		$("#msg2").click();
		return false;
	}
	var diffDays=Math.ceil(Math.abs(checkOut_date.getTime()-checkIn_date.getTime())/(1000*3600*24));
	var pickup = $('select[name="PickupLocationID"]').val();
	var dropoff = $('select[name="DropOffLocationID"]').val();
	var driverlicence = $('select[name="DriversLicence"]').val();
	var nonus=["1","2","3"];
	
	if( $.inArray(driverlicence, nonus) === -1 && pickup == dropoff && diffDays<5){
		// alert("Hey there – our minimum hire for same city returns are 5 days – please adjust your travel dates for a quote - many thanks.");
		$("#message-usa2 .msg-text").html("Hey there – our minimum hire for same city returns are 5 days – please adjust your travel dates for a quote - many thanks.");
		$("#msg2").click();
		return false;
	}else if( $.inArray(driverlicence, nonus) === -1 && pickup != dropoff && diffDays<7 ){
		// alert("Hey there – our minimum hire days for one-way rentals are 7 days – please adjust your travel dates for a quote – many thanks");
		$("#message-usa2 .msg-text").html("Hey there – our minimum hire days for one-way rentals are 7 days – please adjust your travel dates for a quote – many thanks");
		$("#msg2").click();
		return false;
	}

	// if ($('select[name="DropOffLocationID"]').val() == 'Same'){
		// var pickup = $('select[name="PickupLocationID"]').val();
		// $('select[name="DropOffLocationID"]').val(pickup);
	// }
	
	
	var donotrentdays = [
						{date:'25/12/2020', message:'Closed - Christmas Day'},
						{date:'26/11/2020', message:'Closed - Thanksgiving Day'},
						{date:'07/10/2020', message:'Closed - Labor day'},
						{date:'04/07/2020', message:'Closed - Independence Day'},
						{date:'03/07/2020', message:'Closed - Memorial Day Holiday'},
						{date:'25/05/2020', message:'Closed - Memorial Day'},
						{date:'01/01/2020', message:'Closed - New Years Day'},
						{date:'25/12/2019', message:'Closed - Christmas Day'},
						{date:'28/11/2019', message:'Closed - Thanksgiving Day'},
						{date:'02/09/2019', message:'Closed - Labor day'},
						{date:'04/07/2019', message:'Closed - Independence Day'},
						{date:'27/05/2019', message:'Closed - Memorial Day'},
						{date:'01/01/2019', message:'Closed - New Years Day'},
						{date:'25/12/2018', message:'Closed - Christmas Day'},
						{date:'22/11/2018', message:'Closed - Thanksgiving Day'},
						{date:'03/09/2018', message:'Closed - Labor Day'},
						{date:'04/07/2018', message:'Closed - Independence Day'},
						{date:'28/05/2018', message:'Closed - Memorial Day'},
					];
	
	var i;
	for (i = 0; i < donotrentdays.length; ++i) {
		
		if($("input[name=PickupDate]").val() == donotrentdays[i]['date']){
			// alert('Pickup date is unavailable - ' + donotrentdays[i]['message']);
			var showmsg = 'Pickup date is unavailable - ' + donotrentdays[i]['message'];
			$("#message-usa2 .msg-text").html(showmsg);
			$("#msg2").click();
			return false;
		}
		if($("input[name=ReturnDate]").val() == donotrentdays[i]['date']){
			// alert('Dropoff date is unavailable - ' + donotrentdays[i]['message']);
			var showmsg = 'Dropoff date is unavailable - ' + donotrentdays[i]['message'];
			$("#message-usa2 .msg-text").html(showmsg);
			$("#msg2").click();
			return false;
		}
	}
	
	
	var f_PickupDay = $("input[name=PickupDate]").val().split("/");
	var fP = new Date(f_PickupDay[2], f_PickupDay[1] - 1, f_PickupDay[0]);
	var PickupDay = fP.getDay();
	
	var f_ReturnDay = $("input[name=ReturnDate]").val().split("/");
	var fR = new Date(f_ReturnDay[2], f_ReturnDay[1] - 1, f_ReturnDay[0]);
	var ReturnDay = fR.getDay();
	
	if( PickupDay == 0 ){
		// alert('Pickup date is unavailable - Closed Sundays - open Monday to Saturday');
		$("#message-usa2 .msg-text").html("Pickup date is unavailable - Closed Sundays - open Monday to Saturday");
		$("#msg2").click();
		return false;
	}
	if( ReturnDay == 0 ){
		// alert('Dropoff date is unavailable - Closed Sundays - open Monday to Saturday');
		$("#message-usa2 .msg-text").html("Dropoff date is unavailable - Closed Sundays - open Monday to Saturday");
		$("#msg2").click();
		return false;
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

	<div class="heading">Rent a <span class="orange">Campervan</span><BR>
	<span class="small">Get a Quick Quote and Rent Now</span></div>

	<form method="post" name="quoteform" action="<?=RCM_ACTION?>" target="_blank" onsubmit="return Validate(this)">

		<input type="hidden" name="CategoryTypeID" value="1" />
		<input type="hidden" name="referrer" value="<?=RCM_REFERRER?>" />


		<fieldset class="step2">
			<label><span class="white">Step 1:</span> Pick up location</label>
			<select name="PickupLocationID">
			 <!--<option value="13">Denver</option>-->
			  <option value="1">Los Angeles</option>
			  <option value="10">Las Vegas</option>
			  <!--<option value="12">Miami</option>-->
			  <!--<option value="11">New York</option>-->
			  <option value="9">San Francisco</option>
			  <!--<option value="14">Seattle</option>-->
			</select>
			<input class="pckrup" type="text" placeholder="Date" name="PickupDateAlt" rel="<?php echo $booking_form_jquery_ui_loaded; ?>" readonly>
			<input id="PickupDateVal" type="hidden" placeholder="Date" name="PickupDate" readonly>
			<a
				href="javascript:void(0)"
				onclick="return displaypickup(<?php echo $booking_form_jquery_ui_loaded; ?>);"
				class="cal_button cllup"><i class="icon-calendar"></i></a>
			<input type="hidden" name="PickupTime" value="10:00">
		</fieldset>


		<fieldset class="step3">
			<label><span class="white">Step 2:</span> Drop off location</label>
			<select name="DropOffLocationID">
			 <!--<option value="13">Denver</option>-->
			  <option value="1">Los Angeles</option>
			  <option value="10">Las Vegas</option>
			  <!--<option value="12">Miami</option>-->
			  <!--<option value="11">New York</option>-->
			  <option value="9">San Francisco</option>
			  <!--<option value="14">Seattle</option>-->
			</select>
			<input class="pckrdown" type="text" placeholder="Date" name="ReturnDateAlt" rel="<?php echo $booking_form_jquery_ui_loaded; ?>" readonly>
			<input id="ReturnDateVal" type="hidden" name="ReturnDate" readonly>
			<a
				href="javascript:void(0)"
				onclick="return displayreturn(<?php echo $booking_form_jquery_ui_loaded; ?>);"
				class="cal_button clldown"><i class="icon-calendar"></i></a>
			<input type="hidden" name="ReturnTime" value="15:00">
		</fieldset>

		<fieldset class="step5">
			<label><span class="white">Step 3:</span> Drivers Licence</label>
			<select name="DriversLicence">
				<option value="0">* Required</option>
				<option value="1">USA</option>
				<option value="2">Canada</option>
				<option value="3">Mexico</option>
				<option value="4">Germany</option>
				<option value="5">France</option>
				<option value="6">Austria</option>
				<option value="7">Switzerland</option>
				<option value="8">Australia</option>
				<option value="9">New Zealand</option>
				<option value="10">France</option>
				<option value="11">UK</option>
				<option value="12">Netherlands</option>
				<option value="13">Norway</option>
				<option value="14">Denmark</option>
				<option value="15">Other</option>
			</select>
		</fieldset>
		<fieldset class="step4">
			<label><span class="white">Step 4:</span> Promo Code</label>
			<input type="text" placeholder="Promo code" name="PromoCode">
		</fieldset>
		<input type="hidden" value="1" name="CategoryTypeID">
		<fieldset class="quote">
			<input type="submit" value="Get your Quote" class="quote-submit">
		</fieldset>
	</form>
</div> <!-- booking-form -->

<div class="popup-link" style="display: none;">
	<a class="popup-modal" id="msg1" href="#message-usa">msg1</a>
	<a class="popup-modal" id="msg2" href="#message-usa2">msg2</a>
</div>

<div id="message-usa" class="team-popup white-popup-block mfp-hide">
	<div class="row">
		<div class="col-md-12">
			<div class="msg-image">
				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/popup-image.png">
			</div>
			<div class="msg-description">
				<h3 class="msg-text"></h3>
				<p>You can reserve your ride today and start your road trip after February 1st 2019.</p>
			</div>
			<div class="msg-button">
				<a class="btn btn-default red btn-sm" href="/quick-quote">BOOK NOW</a>
			</div>
		</div>
	</div>
</div>
<div id="message-usa2" class="team-popup white-popup-block mfp-hide">
	<div class="row">
		<div class="col-md-12">
			<div class="msg-image">
				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/popup-image.png">
			</div>
			<div class="msg-description">
				<h3 class="msg-text"></h3>
			</div>
			<div class="msg-button xclose">
				<a class="btn btn-default red btn-sm" href="#">SOUNDS GOOD</a>
			</div>
		</div>
	</div>
</div>

<script>
jQuery(function ($) {
	$('.popup-modal').magnificPopup({
		type: 'inline',
		preloader: false,
		// modal: true,
		closeOnBgClick: true,
		enableEscapeKey: true,
	});
	$(document).on('click', '.popup-modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});
	$(document).on('click', '.xclose .btn', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});
});
</script>