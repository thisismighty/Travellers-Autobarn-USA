<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<head>

<!-- Basic Page Needss
================================================== -->
<title>Travellers Autobarn</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- JS
================================================== -->
<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/assets/js/jquery-1.10.2.min.js"></script>

    
<!-- Bootstrap core CSS
================================================== -->
<link href="<?php echo get_template_directory_uri();  ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<?php
add_action('wpseo_canonical','__return_false');
wp_head();
?>
<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri();  ?>/assets/css/animations.css">
<link href="<?php echo get_template_directory_uri();  ?>/assets/css/custom.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();  ?>/assets/css/responsive-styling.css" rel="stylesheet">
    
<link rel="stylesheet" href="<?php echo get_template_directory_uri();  ?>/assets/css/icons.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();  ?>/assets/css/icons-ie7.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri();  ?>/assets/css/hubspot.css">


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- Favicons
================================================== -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/apple-touch-icon-144x144.png">
<link href="<?php echo get_template_directory_uri();  ?>/assets/css/custom-1.css" rel="stylesheet">
<script type="text/javascript">
<!-- Google Analytics -->

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-2588665-5', 'auto');
ga('send', 'pageview');

<!-- End Google Analytics -->
/* Manages transfer of user to third-party site via POST of form and allows for cross-domain tracking.
 */
function formLinkByPost(resForm)
{
   var returnValue = formSubmit();
   
   if( returnValue && resForm.action.indexOf("secure20.rentalcarmanager.com.au")>=0 )
   {
      var gaTracker = _gat._createTracker(uaAccNo); 
      gaTracker._setDomainName('travellers-autobarn.com.au');
      gaTracker._setAllowLinker(true);
      gaTracker._setAllowHash(false);

      resForm.action = gaTracker._getLinkerUrl(resForm.action);
   }

   return returnValue;
}</script>
<!-- Google Code for Remarketing Brand Display - Home Page Remarketing List -->
<script type='text/javascript'>
/* <![CDATA[ */
var google_conversion_id = 1057219496;
var google_conversion_language = 'en';
var google_conversion_format = '3';
var google_conversion_color = 'ffffff';
var google_conversion_label = 'XSljCLy30AIQqMeP-AM';
var google_conversion_value = 0;
/* ]]> */
</script>
<script type='text/javascript' src='//www.googleadservices.com/pagead/conversion.js'>
</script>
<noscript>
<div style='display:inline;'>
<img height='1' width='1' style='border-style:none;' alt='' src='//www.googleadservices.com/pagead/conversion/1057219496/?label=XSljCLy30AIQqMeP-AM&amp;guid=ON&amp;script=0'/>
</div>
</noscript>

<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>


<?php if (is_page_template('front-page.php')): ?>
		<link href="<?php echo get_template_directory_uri();  ?>/assets/css/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri();  ?>/assets/css/owl.theme.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri();  ?>/assets/css/owl.transitions.css" rel="stylesheet">
		<script src="<?php echo get_template_directory_uri();  ?>/assets/js/owl.carousel.min.js"></script>
	<?php endif;?>

</head>
<body>
