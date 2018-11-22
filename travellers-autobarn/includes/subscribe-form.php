<?php //return; // disabled ?>

<style>
	.subscribe-form .gform_confirmation_message{
		color:#fff !important;
	}
	.subscribe-form .data-policy{
		display:block;
		cursor:pointer;
		text-decoration:none;
		text-align:center;
		clear:both;
		padding:8px 0 4px 0;
		color:#ffb403;
		vertical-align:middle;
		font-size:11px;
		font-weight:400;
		letter-spacing:0.6px;
		font: 10px "MontserratBold", Arial, Verdana, Helvetica;
	}
	.subscribe-form .data-policy:focus {
		outline: 0;
	}
	.subscribe-form .data-policy > img{
		display:inline-block;
		margin-right:7px;
	}
	@media (min-width: 768px) and (max-width: 1200px){
		.subscribe-form .data-policy{
			padding:18px 0 0 0;
		}
	}
	@media (max-width: 768px){
		.subscribe-form .data-policy{
			padding:9px 0 3px 0;
		}
	}
	
	#em-gdpr-popup-back{
		position:fixed;
		top:0;
		right:0;
		bottom:0;
		left:0;
		background-color:rgba(0,0,0,0.7);
		z-index:99998;
	}
	#em-gdpr-popup{
		position:fixed;
		top:50%;
		left:50%;
		transform:translateX(-50%) translateY(-50%);
		padding: 0;
		margin: 0;
		width:90%;
		max-width:600px;
		border-radius: 7px;
		-webkit-box-shadow: 0px 0px 17px 0px rgba(0, 0, 0, 0.2);
		box-shadow: 0px 0px 17px 0px rgba(0, 0, 0, 0.2);
		background-color:#fff;
		z-index:99999;
	}
	#em-gdpr-popup .fancybox-close-small {
		top: 5px;
		color: #FFF
	}
	#em-gdpr-popup .em-close{
		color: #FFF;
		font: 22px/29px "MontserratBold", Arial, Verdana, Helvetica;
		font-weight: 400;
		text-decoration:none;
		position: absolute;
		right: 17px;
		top: 11px;
		cursor:pointer;
	}
	#em-gdpr-popup .em-title {
		border-top-left-radius:7px;
		border-top-right-radius:7px;
		padding: 13px 18px;
		background-color: #fdb22c;
		color: #FFF;
		font: 19px/29px "MontserratBold", Arial, Verdana, Helvetica;
		font-weight: 400;
		position:relative;
	}
	#em-gdpr-popup .em-caption {
		padding:20px 20px 8px 20px;
	}
	#em-gdpr-popup .em-button {
		padding: 10px 10px 24px 20px;
	}
	#em-gdpr-popup .em-button a {
		display: inline-block;
		background-color: #d74700;
		color: #FFF;
		font: 16px/29px "MontserratBold", Arial, Verdana, Helvetica;
		font-weight: 400;
		padding: 6px 16px;
		border-radius: 4px;
		transition: all 300ms ease;
		text-decoration:none;
	}
	#em-gdpr-popup .em-button a:hover {
		background-color: #fdb22c;
		text-decoration: none;
	}
</style>
<div class="subscribe-form">  
          
    

    <!--<form>
    <input type="text" placeholder="Name">
    <input type="email" placeholder="Email">
    <label class="checkbox">
    <input type="checkbox"> <a href="">Privacy Statement</a>
    </label>
    <input type="submit" value="Sign Up" class="btn btn-default">
    </form>-->
	
	
    <?php
		if (in_category('all-sales-pages-tab-use')){
			echo '<div class="heading">Sign up for <BR><span class="orange">CAR SALES & ROADTRIP TIPS</span></div>';
			gravity_form(9, $display_title=false, $display_description=false, $display_inactive=false, $field_values=null, $ajax=true, 1);
		}
		else{
			echo '<div class="heading">SIGN UP TO <BR><span class="orange">OUR NEWSLETTER</span></div>';
			echo <<<EOT
<script>
	hbspt.forms.create({
            	portalId: "4939113",
            	formId: "b4ae88d1-c51e-4377-847a-e2ef8e6310cf",
            	css: ""
});

</script>
EOT;
		?>
			<a class="data-policy" href="javascript:void(0)" onclick="EMGDPRSubscribePopUp.open()">
				<img src="<?=get_template_directory_uri()?>/img/privacy.png" alt="Privacy"/>&nbsp;VIEW DATA COLLECTION POLICY
			</a>
		<?php
		}
	?>
	<script>
	var EMGDPRSubscribePopUp={
		open:function(){
			jQuery('#em-gdpr-popup-back,#em-gdpr-popup').fadeIn();
		},
		close:function(){
			jQuery('#em-gdpr-popup-back,#em-gdpr-popup').fadeOut();
		}
	};
	</script>
</div> <!-- subscribe-form -->

<?php /*
 hbspt.forms.create({
    css: '',
    portalId: '3435451',
    formId: '90f7059e-88e1-4ed5-88fc-ee71e9f2f679'
  });
  */ ?>
  
