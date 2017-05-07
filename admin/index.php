<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: ../registration/personal/admin/adminuseractiv.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $name = trim($_POST['name']);
  $name  = strip_tags($name);
  $name  = htmlspecialchars($name);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($name )){
   $error = true;
   $nameError = "Please enter your username address.";
  } 
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = $pass; // password hashing using SHA256
  
   $res=mysql_query("SELECT id, name, pass FROM admin WHERE name='$name'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['pass']==$password ) {
    $_SESSION['user'] = $row['id'];
    header("Location: ../registration/personal/admin/adminuseractiv.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="contain">
   <div id="close" class="close">Admin Page</div>
</div>
<div class="containmain">
  <div class="center">
  <br><br><br><br><br><br><br><br>
      
  <form class="form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  <input type="text" class="topform" placeholder="Username" name="name"><br>
  <input type="password" class="bottomform" placeholder="Password" name="pass"><br>
  <input type="submit" name="btn-login">
</form>
    </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>