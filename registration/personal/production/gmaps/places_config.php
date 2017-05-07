<?php
$db = new Mysqli("localhost", "root", "root", "pharmacydb"); 
if ($db->connect_errno){
	die('Connect Error: ' . $db->connect_errno);
}
?>