<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

    <head>
    <title><?php echo $metaTitle; ?></title>
    <meta charset="utf-8" />

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <link rel="icon" type="image/ico" href="favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/screen.css" type="text/css" media="screen, projection">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/box.css" type="text/css" />	
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.ultimate.css" media="screen"  type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/globals.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/grid.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ui.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/orbit.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reveal.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mobile.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/forms.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/new-box.css" type="text/css" />	
    <link href='http://fonts.googleapis.com/css?family=Karla:400,400italic' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Google Maps --->
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC5DL1euwwkmG8-95VonHDT5sfdwfLPiOg&sensor=true">
    </script>
    <script type="text/javascript">
      function initialize() {
        var myOptions = {
          center: new google.maps.LatLng(42.1048241, -70.9453201),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
      }
    </script>
    <!-- Google Maps End -->

    <script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.quickflip.source.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {        
        $('.quickFlip').quickFlip({
            vertical : true
        });        
    });
    </script>

    <!-- end quickflip javascript -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/basic-quickflips.css" />
	
<link type="text/css" href="<?php echo base_url(); ?>/assets/css/custom-theme/jquery-ui-1.8.20.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.8.20.custom.min.js"></script>
		
	
    </head>
    <body onload="initialize()">
<div class="header1">
      <div class="headerLogo1">
    <div class="span-24 last">
          <table >
        <tr>
              <td width="400px"><a href="http://advertisedon.com/index.php"><img src="http://advertisedon.com/assets/img/logo.png" /></a></td>
              <td><span style="text-align:right; display:block;"> <a class="loginStyle" href="<?= site_url("auth/" . $loginLogout); ?>"  >
              <?= $loginLogout ?>
              </a>
                <?php
					if ( $loginLogout == "LOGIN" ) {
						echo "<a class='headerLinks' href=" . site_url("auth/signup") . "> | SIGN UP NOW </a> |"; 
					} else {
						echo "<a class='headerLinks' href=" . site_url("auth/edit_account") . "> | EDIT ACCOUNT </a> |"; 
					}
					$business = (isset($business1)) ? $business1 : 'What';
					$city = (isset($city1)) ? $city1 : 'Where';
				?>
                <form action="<?= site_url("business/header_search"); ?>/null/10/1" method="post">
                <!--<input type="text" value="<?= $business ?>" name="whatBis" id="whatBis" class="inputZip" onfocus="if (this.value == '<?= $business ?>') {this.value = '';}" />-->
                <input type="text" value="<?= $city ?>" name="whatCity" id="whatCity" class="inputZip" onfocus="if (this.value == '<?= $city ?>') {this.value = '';}" />
                <input type="submit" value="GO" class="headerSubmit" />
              </form>
                </span></td>
            </tr>
      </table>
        </div>
  </div>
    </div>
<div class="menucontainer">
      <ul id="nav" class="dropdown dropdown-horizontal">
    <li><a href="<?= site_url("business/header_search/all/5/1"); ?>">All</a></li>
    <li><a href="<?= site_url("business/header_search/food/5/1"); ?>">Restaurants</a></li>
    <li><a href="<?= site_url("business/header_search/contract/10/1"); ?>">Contractors</a></li>
    <li><a href="<?= site_url("business/header_search/retail/10/1"); ?>">Shopping</a></li>
    <li><a href="<?= site_url("business/header_search/personal/10/1"); ?>">Personal Care</a></li>
    <li><a href="<?= site_url("business/header_search/auto/10/1"); ?>">Autos</a></li>
    <li><a href="<?= site_url("business/header_search/home/10/1"); ?>">Home &amp; Garden</a></li>
    <li><a href="<?= site_url("business/header_search/other/10/1"); ?>">Other Categories</a></li>
  </ul>
    </div>
<div class="shadow">
<div class="wrapper">
