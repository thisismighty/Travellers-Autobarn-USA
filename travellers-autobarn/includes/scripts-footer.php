<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/js/custom.js"></script>

<script type="text/javascript">
	// 19-Aug-16:
	// function for tracking downloading of PDF file
	function trackPdfDLButton(tPdfEventName) 
	{  
		// alert(tPdfEventName);
		ga('send', 'event', 'PDF Download', 'click', tPdfEventName);
	}
</script>

<div id="em-gdpr-popup" style="display: none;">
	<div class="em-title">DATA COLLECTION POLICY <a class="em-close" onclick="EMGDPRSubscribePopUp.close()">&times;</a></div>
	<div class="em-caption">You will receive our newsletter and are able to unsubscribe at any stage; your data is secure and will not be provided to 3rd parties.</div>
	<div class="em-button">
		<a href="/privacy-policy/" target="_blank">VIEW FULL PRIVACY POLICY</a>
	</div>
</div>
<div id="em-gdpr-popup-back" style="display: none;" onclick="EMGDPRSubscribePopUp.close()">&nbsp;</div>

<?php  wp_footer();?>
</body>
</html>