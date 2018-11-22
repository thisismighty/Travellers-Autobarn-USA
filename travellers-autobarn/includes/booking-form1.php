<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/jquery-ui/jquery-ui.js"></script>

<link href="<?php echo get_template_directory_uri();  ?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">

<script>
    $(function() {
        $( "#datepicker-pickup" ).datepicker({dateFormat: "dd/mm/yy"});
        $( "#datepicker-return" ).datepicker({dateFormat: "dd/mm/yy"});
    });
    
    function displaypickup()
    {
        $( "#datepicker-pickup" ).datepicker("show");
        return false;
    }
    
    function displayreturn()
    {
        $( "#datepicker-return" ).datepicker("show");
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

<div class="booking-form hidden-xs">

    <div class="heading">Book a <span class="orange">Campervan</span><BR>
    <span class="small">Get a Quick Quote and Book Now</span></div>
	 <form method="post" name="quoteform" action="<?=RCM_ACTION?>" id="theform" target="_blank" onsubmit="return Validate(this)">
		 
        <input type="hidden" name="CategoryTypeID" value="1" />
        <input type="hidden" name="referrer" value="<?=RCM_REFERRER?>" />

        <fieldset class="step2">
            <label><span class="white">Step 1:</span> Pick up location</label>
            <select name="PickupLocationID" id="PickupLocationID">
				<option value="1">Auckland</option>
				<option value="2">Christchurch</option>                   
            </select>
            <input type="text" placeholder="Select date" name="PickupDate" id="datepicker-pickup"><a href="#" onclick="return displaypickup();" class="cal_button"><i class="icon-calendar"></i></a>
        </fieldset>


        <fieldset class="step3">
            <label><span class="white">Step 2:</span> Drop off location</label>
            <select name="DropOffLocationID" id="DropOffLocationID">
				<option value="Same">Same as pickup</option>
				<option value="1">Auckland</option>
				<option value="2">Christchurch</option>             
            </select>
            <input type="text" placeholder="Select date" name="ReturnDate" id="datepicker-return"><a href="#" onclick="return displayreturn();" class="cal_button"><i class="icon-calendar"></i></a>
        </fieldset>

        <fieldset class="step4">
            <label><span class="white">Step 3:</span> Promo Code</label>
            <input type="text" placeholder="Promo code" name="PromoCode">
        </fieldset>
		
        <fieldset class="quote">
            <input type="submit" value="Get your Quote" class="quote-submit">
        </fieldset>
    </form>   
</div> <!-- booking-form -->
