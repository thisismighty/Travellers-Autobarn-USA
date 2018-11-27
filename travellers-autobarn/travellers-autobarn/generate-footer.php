<?php
/*
Template Name: Generate Footer
*/

if(!isset($_GET['token']) && $_GET['token']!=='booking'){
	wp_safe_redirect(site_url('/'));
	die();
}
?>
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
<base target="_parent">

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
<link rel="shortcut icon" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri();  ?>/assets/images/icons/apple-touch-icon-144x144.png">
<link href="<?php echo get_template_directory_uri();  ?>/assets/css/custom-1.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();  ?>/assets/css/custom-2.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();  ?>/assets/css/font-awesome.min.css" rel="stylesheet">
<style>
	html, body{background-color:#f0f0f0;}
	#wpadminbar,#launcher{display:none;}
</style>
</head>
<body <?php body_class(); ?>>


<?php get_footer(); ?>