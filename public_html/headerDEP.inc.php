<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title><?php echo $metaTitle; ?></title>
    <META NAME="keywords" CONTENT="<?php echo $metaKeywords; ?>">
    <META NAME="description" CONTENT="<?php echo $metaDesc; ?>">
    <META http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="http://advertisedon.com/assets/css/screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="http://advertisedon.com/assets/css/box.css" type="text/css" />
    <link rel="stylesheet" href="http://advertisedon.com/assets/css/dropdown/dropdown.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://advertisedon.com/assets/css/dropdown/default.ultimate.css" media="screen"  type="text/css" />  
    <link rel="stylesheet" href="http://advertisedon.com/assets/css/prettyPhoto.css" type="text/css" />  
    <link href='http://fonts.googleapis.com/css?family=Enriqueta' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Trade+Winds' rel='stylesheet' type='text/css'>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.3.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/datagrid.js"></script>
	<script type="text/javascript">                                         
    	$(document).ready(function() {

		});    
		
		
		(function($) {
			$(document).ready(function() {
			$('#ajaxStatus')
			.ajaxStart(function() {
			$(this).show();
			})
			.ajaxStop(function() {
			$(this).hide();
			});
			// Start our ajax request when doAjaxButton is clicked
			$("button").click(function() {
				$.ajax({
				url: 'ajax-gateway.php',
				data: { val: "Hello world" },
				dataType: 'json',
				success: function(json) {
				// Data processing code
				$('body').append( 'Response Value: ' + json.val );
			}
			});
			});
			});
		})(jQuery);
		                     
 	</script>  
     <style>
    a.test { font-weight: bold; }
 </style>  
    
</head> 
<body>
<h1><?= $h1title; ?></h1>
<h2><?= $h2title; ?></h2>
<h3><?= $h3title; ?></h3>
<div class="header">    
	<div class="headerLogo">
    	<a href="#"><img src="http://advertisedon.com/assets/img/Untitled-1.jpg"  /></a>
	</div>
</div>
<div class="shadow">
<div class="wrapper">    