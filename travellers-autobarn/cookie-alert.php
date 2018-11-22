<?php

add_action( 'wp_head', 'add_this_notice' );

function add_this_notice(){
	
	// if(is_already_accepted())
		// return;
	
	if(get_the_ID()==4324) //if 'generate footer' page disabled this feature
		return;
?>
<div id="cookie-alert" style="display:none;">
	<p>We are using Cookies to allow for the best possible service & marketing activities.</p>
	<p>By using our website you agree to the usage of cookies. For more information and how to opt out please refer to our Privacy Policy.</p>
	
	<span class="action"><a href="<?php echo site_url('/privacy-policy/'); ?>">Privacy Policy</a>&emsp;<a class="ok btn btn-default">OK <i class="fa fa-check"></i></a></span>
</div>
<script>	
	jQuery(document).ready(function($){
		var data = {
			action: 'check_term_condition',                   
		};
		
		$.ajax({
			type: 'POST',
			dataType : 'json',
			url: '<?php echo admin_url('admin-ajax.php') ?>',
			data: data,
			success: function( response ) {
				if(! response.terms_accepted){
					$('#cookie-alert').show();
					var bottom_height = $('#cookie-alert').outerHeight();		
					$('.footer').css('margin-bottom', bottom_height);
				}
			},
		});
	});
</script>
<script>	
	jQuery(document).ready(function($){
		<?php 
		// var bottom_height = $('#cookie-alert').outerHeight();
		
		// $('.footer').css('margin-bottom', bottom_height); ?>
		
		$('#cookie-alert a.ok').on('click', function(){	
			var data = {
				action: 'accept_term_condition',                   
			};
			$(this).parents('#cookie-alert a.ok').addClass('disabled');		
			$(this).parents('#cookie-alert a.ok').css('pointer-events', 'none');		
			$.ajax({
				type: 'POST',
				dataType : 'json',
				url: '<?php echo admin_url('admin-ajax.php') ?>',
				data: data,
				success: function( response ) {			
					$('#cookie-alert').slideUp();
					$('.footer').css('margin-bottom', 0);
					$(this).parents('#cookie-alert a.ok').removeClass('disabled');		
					$('#cookie-alert a.ok').css('pointer-events', 'initial');				
				},
				error: function(){
					$(this).parents('#cookie-alert a.ok').removeClass('disabled');					
					$('#cookie-alert a.ok').css('pointer-events', 'initial');		
				}
			});
		});
	});
</script>
<?php
}

add_action( 'wp_ajax_accept_term_condition', 'accept_term_condition' );
add_action( 'wp_ajax_nopriv_accept_term_condition', 'accept_term_condition' );
 
function accept_term_condition(){
    if ( isset($_REQUEST) ) {
		session_start();
		
		$_SESSION['terms_accepted']=1;
		
		$result['terms_accepted'] = 1;
		echo json_encode($result);
		
        die();
    }
}

add_action( 'wp_ajax_check_term_condition', 'check_term_condition' );
add_action( 'wp_ajax_nopriv_check_term_condition', 'check_term_condition' );
 
function check_term_condition(){
    if ( isset($_REQUEST) ) {
		session_start();
				
		$result['terms_accepted'] = is_already_accepted();
		
		echo json_encode($result);
		
        die();
    }
}

function is_already_accepted(){
	// session_start();
	
	$is_session_accepted = isset($_SESSION['terms_accepted'])?$_SESSION['terms_accepted']:0;
	$is_cookie_accepted = isset($_COOKIE['terms_accepted'])?$_COOKIE['terms_accepted']:0;
	
	if($is_session_accepted==1){		
		return 1;
	}	
	if($is_cookie_accepted==1){
		return 1;
	}	

	return 0;
}

add_action( 'init', 'set_terms_accept_cookie', 1 );

function set_terms_accept_cookie(){
	session_start();
	ob_start();
	$is_session_accepted = isset($_SESSION['terms_accepted'])?$_SESSION['terms_accepted']:0;
	
	// echo "<pre>"; print_r($_SESSION); echo "</pre>";
	// echo "<pre>"; print_r($_COOKIE); echo "</pre>";
	if($is_session_accepted==1){
		setcookie( "terms_accepted", "1", time() + (10 * 365 * 24 * 60 * 60) , "/");
		// setcookie( 'terms_accepted', '1', 10 * 365 * 24 * 60 * 60, COOKIEPATH, COOKIE_DOMAIN );
		// die( time() + (10 * 365 * 24 * 60 * 60));
		// $_SESSION['terms_accepted']=0;
		// unset($_SESSION['terms_accepted']);
	}
}

add_action( 'wp_footer', 'clear_ob_start' );

function clear_ob_start(){
	ob_flush();
}