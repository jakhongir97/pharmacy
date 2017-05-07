<?php
session_start();
if ( isset($_REQUEST['name']) ){
$nameofuser=$_REQUEST["name"];
$usermail=$_REQUEST["usermail"];
$password=$_REQUEST["password"];
$hours=$_REQUEST["hours"];
$inn=$_REQUEST["inn"];
$storename=$_REQUEST["storename"];
$address=$_REQUEST["address"];
$number=$_REQUEST["number"];


           include_once('connect.php'); 
    
    
if (!empty($_FILES['fileToUpload']['name'])) {
    
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $picError= "File is not an image.";
        $uploadOk = 0;
        $error =true;
    }


// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    $picError= "Sorry, your file is too large.";
    $uploadOk = 0;
    $error =true;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $picError= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    $error =true;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $picError= "Sorry, your file was not uploaded.";
    $error =true;
// if everything is ok, try to upload file
} else {
    $target_file = $target_dir.$inn.".".$imageFileType;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       //$picError="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
         $userPic = $inn.".".$imageFileType;
        
    } else {
        $picError= "Sorry, there was an error uploading your file.";
        $error =true;
    }

}
    $pro=$_SESSION['user'];
    
    
        $sql="UPDATE pharmacy SET UserPharmacyName='$storename', UserAddress='$address', UserContact='$number', UserName='$nameofuser', UserEmail='$usermail', UserPass='$password', UserWorkHours='$hours', UserINN='$inn', UserPhoto='$userPic' WHERE UserId=$pro" ;
         $res=mysqli_query($conn, $sql);   
    
}
    $pro=$_SESSION['user'];
    
    
        $sql="UPDATE pharmacy SET UserPharmacyName='$storename', UserAddress='$address', UserContact='$number', UserName='$nameofuser', UserEmail='$usermail', UserPass='$password', UserWorkHours='$hours', UserINN='$inn' WHERE UserId=$pro" ;
         $res=mysqli_query($conn, $sql);    
}
include ("changeinfo.php"); 


?>