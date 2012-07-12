<?php
	$server = 'localhost';
	$username = 'advertisedon';
	$password = 'CAxYXqECqTQaxtXc';
	$database = 'advertisedon';

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

// Opens a connection to a MySQL server
$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM city WHERE id < 20";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	
	$oneWeekAgo = strtotime('-30 days');
		
	if ($oneWeekAgo > $today) { 
		$valid = "yes"; 
	} else { 
		$valid = "no"; 
	}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  if ( $oneWeekAgo - strtotime($row['entry']) < 0 ) {
	  echo '<marker ';
	  //echo 'name="' . parseToXML($row['name']) . '" ';
	  //echo 'address="' . parseToXML($row['address']) . '" ';
	  echo 'lat="' . $row['lat'] . '" ';
	  echo 'lng="' . $row['lng'] . '" ';
	  //echo 'type="' . $row['type'] . '" ';
	  echo '/>';
	}
}

// End XML file
echo '</markers>';

?>