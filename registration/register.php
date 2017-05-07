<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
        $inn = trim($_POST['inn']);
		$inn = strip_tags($inn);
		$inn = htmlspecialchars($inn);
        
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
        
        $pass1 = trim($_POST['pass1']);
		$pass1 = strip_tags($pass1);
		$pass1 = htmlspecialchars($pass1);
        
   
		// basic name validation
        
         if (empty($inn)) {
			$error = true;
			$innError = "Please enter your  INN number.";
		} else if (strlen($inn) < 9) {
			$error = true;
			$innError = "INN number must have at least 9 characters.";
		} else if (!preg_match("/^[0-91-9 ]+$/",$inn)) {
			$error = true;
			$innError = "INN number must contain numbers.";
		}
        
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
        
        
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT UserEmail FROM pharmacy WHERE UserEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
        
        if ( ($pass1)!=($pass)){
            $error =true;
            $pass1Error = "Invalid password.";
        }
		
		// password encrypt using SHA256();
		//$password = hash('sha256', $pass);
        $password=$pass;
		
        
        
        if(!$error)   {
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
        
         $innPic = $inn.".".$imageFileType;
        
    } else {
        $picError= "Sorry, there was an error uploading your file.";
        $error =true;
    }
}
        
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO pharmacy(UserPharmacyName,UserEmail,UserPass,UserINN,UserINNpic) VALUES('$name','$email','$password','$inn','$innPic')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
                unset($inn);
				unset($name);
				unset($email);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
        
        
         
             
             

    }
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign Up.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
            	<input type="text" name="inn" class="form-control" placeholder="Enter INN" maxlength="50" value="<?php echo $inn ?>" />
                </div>
                <span class="text-danger"><?php echo $innError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Name Pharmacy" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass1" class="form-control" placeholder="Enter Password Again" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $pass1Error; ?></span>
            </div>
            
            
           
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>
            	<input type="file" name="fileToUpload" id="uploadFile" class="form-control"   />
                </div>
                <span class="text-danger"><?php echo $picError; ?></span>
            </div>
            
            
           
    

    



    

            

            
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">Sign in Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>