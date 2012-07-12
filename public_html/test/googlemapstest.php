<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head><title>Pick Up Scheduler</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="site.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../assets/css/screen.css" type="text/css" media="screen, projection" /> 
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script>
<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyC5DL1euwwkmG8-95VonHDT5sfdwfLPiOg" type="text/javascript"></script>
<script type="text/javascript">
    //<![CDATA[

    var iconBlue = new GIcon(); 
    iconBlue.image = 'http://labs.google.com/ridefinder/images/mm_20_blue.png';
    iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconBlue.iconSize = new GSize(12, 20);
    iconBlue.shadowSize = new GSize(22, 20);
    iconBlue.iconAnchor = new GPoint(6, 20);
    iconBlue.infoWindowAnchor = new GPoint(5, 1);

    var iconRed = new GIcon(); 
    iconRed.image = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
    iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconRed.iconSize = new GSize(12, 20);
    iconRed.shadowSize = new GSize(22, 20);
    iconRed.iconAnchor = new GPoint(6, 20);
    iconRed.infoWindowAnchor = new GPoint(5, 1);

    var customIcons = [];
    customIcons["restaurant"] = iconBlue;
    customIcons["bar"] = iconRed;

    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(42.371811, -71.161293), 9);

        GDownloadUrl("phpsqlajax_genxml.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            var name = markers[i].getAttribute("name");
            var address = markers[i].getAttribute("address");
            var type = markers[i].getAttribute("type");
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, name, address, type);
            map.addOverlay(marker); 
          }
        });
      }
    }

    function createMarker(point, name, address, type) {
      var marker = new GMarker(point, customIcons[type]);
      var html = "<b>" + name + "</b> <br/>" + address;
      GEvent.addListener(marker, 'click', function() {
        marker.openInfoWindowHtml(html);
      });
      return marker;
    }
    //]]>
</script>
  <?php 
  
	  // returns true if he count is = 1, else false. Basically it logs the user into the system
	function getWorthItContactsThisWeek($link) {
		$query = "SELECT * FROM city WHERE id < 20";
		$result = mysqli_query($link, $query) or die (mysqli_error($link));		
		return $result;
	}  

?>
</head><body onload="load()" onunload="GUnload()">

<div class="wrapper">
<div class="span-24 last">

<?php
	// server info
	$server = 'localhost';
	$username = 'advertisedon';
	$password = 'CAxYXqECqTQaxtXc';
	$database = 'advertisedon';
		
	// connect to the database
	$mysqli = new mysqli($server, $user, $pass, $db);
	
	// show errors (remove this line if on a live site)
	mysqli_report(MYSQLI_REPORT_ERROR);
	
		
		
	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	
	$oneWeekAgo = strtotime('-30 days');
		
	if ($oneWeekAgo > $today) { 
		$valid = "yes"; 
	} else { 
		$valid = "no"; 
	}
	
	?>
	
    </div>
    <div class="span-7">
    	<div class="couponBoxZ">
		<strong>Last 30 days worth donations</strong>
        <hr>    
      
        <?php
		if ($result = $mysqli->query("SELECT * FROM city c WHERE id < 20")) {
			if ($result->num_rows > 0)   { 
				while ($row = $result->fetch_object()) {
					$i++;
					
					if ( $oneWeekAgo - strtotime($row->entry) < 0 ) {
						echo "<strong>" . $row->id . "</strong>";
						echo "<br>" . $row->name;
						echo "<br/></div>";
					}
				}
			}
		}
        ?>
        <br>
        </div>
        <p>&nbsp;</p>
    </div>
    <div class="span-17 last">
    	<div class="couponBox1">
		<strong>Donation Map</strong>
        <hr>
         <div id="map" style="width: 620px; height: 800px"></div>
		<br>
        </div>
    </div>
    <p>&nbsp;</p>
    </div>
    
    
    </center>
    </body>
    </html>