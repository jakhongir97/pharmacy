<?php
require("dbconnect.php");

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
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table


if(isset($_REQUEST['product'])) {
        $searchq=$_REQUEST['product'];
$query = "SELECT a.UserPharmacyName,  a.UserPharmacyName , a.UserContact , a.lat , a.lng FROM link l INNER JOIN pharmacy a on l.idPharmacy=a.UserId INNER JOIN product p ON p.id=l.idDrug WHERE p.product  LIKE '%$searchq%' ";
}
else{
    $query = "SELECT * FROM markers WHERE 1";
}


$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';



// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $ind . '" ';
  echo 'name="' . parseToXML($row['UserPharmacyName']) . '" ';
  echo 'address="' . parseToXML($row['UserAddress']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  //echo 'type="' . $row['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>