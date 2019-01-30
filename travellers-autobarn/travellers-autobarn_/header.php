<?php include("includes/scripts-header-usa.php"); ?>
<?php include("includes/global-navigation-usa.php"); ?>
<div class="visible-xs">
	<div id="slide-down-booking-form2">
		 <?php 
			if(0)
			include("includes/booking-form-usa.php");
			else
			include("includes/booking-form-usa-v3.php");
		
		?>
	</div>
</div>
<script>
	jQuery(document).ready(function(){
		jQuery('.click-book-now').attr('href', 'javascript:void(0)');
		jQuery('.click-book-now').attr('onclick', 'EMMenu2.toggleMenu2();');
		
		jQuery('#slide-down-booking-form2 .pckrup').attr('rel', '11');
		jQuery('#slide-down-booking-form2 .cllup').attr('onclick', 'return displaypickup(11);');
		
		jQuery('#slide-down-booking-form2 .pckrdown').attr('rel', '12');
		jQuery('#slide-down-booking-form2 .clldown').attr('onclick', 'return displayreturn(12);');
		
	});
	
	var EMMenu2={
		close:function(){
			jQuery('#slide-down-booking-form2').slideUp();
			jQuery('#mobile-menu .click-book-now').removeClass('open');
		},
		toggleMenu2:function(){
			if($('#mobile-menu .click-book-now').hasClass('open')){
				EMMenu2.close();
				return;
			}
			jQuery('#slide-down-booking-form2').slideDown();
			jQuery('#mobile-menu .click-book-now').addClass('open');
		},
		resize:function(){
			if(window.matchMedia('(max-width:767px)')){
				return;
			}
			EMMenu2.close();
		}
	};
</script>
