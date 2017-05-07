<?php
session_start();
require_once('places_config.php');
if ( !empty($_POST['place']) ){
$place = $_POST['place'];
$latitude = $_POST['lat'];
$longitude = $_POST['lng'];
$pro=$_SESSION['user'];

$db->query("UPDATE pharmacy SET UserAddress='$place',  lat='$latitude', lng='$longitude'  WHERE UserId=$pro");
$place_id = $db->insert_id;
echo $place_id;
}
?>