<?php
if(isset($_POST['email'])) {
    
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jakhongir.nematov97@gmail.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    
    $email_from = $_POST['email']; // required
    
    $comments = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The  Name you entered does not appear to be valid.<br />';
  }
 
 
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
    header("Location: index_en.php#contact");
?>
 

 

 
<?php
 
}
?>

<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Pharmacy</title>
        
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="images/logo8.png">

		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="css/animations.css" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="css/style.css" rel="stylesheet">

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
<!-- New css --> 
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <?php
include('config.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Rubik" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       
<link rel="stylesheet" href="css/styleTable.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Rubik" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>        

	</head>

	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ --> 
		<header class="header fixed clearfix navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">

						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">
							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="#banner"><img id="logo" src="images/logo8.png" alt="pharmacy"></a>
							</div>

							<!-- name-and-slogan -->
							<div class="site-name-and-slogan smooth-scroll">
								
                                <div class="site-name"><a href="#banner">Pharmacy</a></div>
								<div class="site-slogan"><a target="_blank" href="http://htmlcoder.me">Pharmacy.uz</a> Qulay Qidiruv Tizimi</div>
							</div>

						</div>
						<!-- header-left end -->

					</div>
					<div class="col-md-8">

						<!-- header-right start -->
						<!-- ================ -->
						<div class="header-right clearfix">

							<!-- main-navigation start -->
							<!-- ================ -->
							<div class="main-navigation animated">

								<!-- navbar start -->
								<!-- ================ -->
								<nav class="navbar navbar-default" role="navigation">
									<div class="container-fluid">

										<!-- Toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right">
												<li class="active"><a href="#banner">Asosiy</a></li>
                                                <li><a href="#map">Xarita</a></li>
												<li><a href="#about">Sayt haqida</a></li>
												<li><a href="#services">Xizmatlar</a></li>
												<li><a href="#contact">Aloqa</a></li>
                                                <li><a href="registration/index.php">Log|Reg</a></li>
                                                <li><a style="padding-right:0px;text-decoration:underline; font-size: 10px;" href="index_en.php">ENG</a></li>
                                                <li><a style="padding-right:0px; font-size: 10px; text-decoration:underline;" href="index_ru.php">RUS</a></li>                      
											</ul>
										</div>

									</div>
								</nav>
								<!-- navbar end -->

							</div>
							<!-- main-navigation end -->

						</div>
						<!-- header-right end -->

					</div>
				</div>
			</div>
		</header>
		<!-- header end -->

		<!-- banner start -->
		<!-- ================ -->
		<div id="banner" class="banner">
			<div class="banner-image"></div>
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
							<h1 class="text-center"><span>Pharmacy</span></h1>
							
                            <?php
			                include('head.php');
		                    ?>
                            
                            
                            <?php
                            if(isset($_REQUEST['product'])){
                                ?>
                                 <div id="wrapper">
  
     
               
        
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Pharmacy</span></th>
        <th><span>Contact</span></th>
        <th><span>Hours</span></th>
        <th><span>Adress</span></th>
        <th><span>More</span></th>
      </tr>
    </thead>
    <tbody>
         <?php
    
    

    
    if(isset($_REQUEST['product'])) {
        $searchq=$_REQUEST['product'];
        $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
        $query = mysql_query("SELECT a.UserPharmacyName, a.UserWorkHours, a.UserAddress , a.UserContact FROM link l INNER JOIN pharmacy a on l.idPharmacy=a.UserId INNER JOIN product p ON p.id=l.idDrug WHERE p.product  LIKE '%$searchq%' ") or die("could not search");
        $count = mysql_num_rows($query);
      
            while($row=mysql_fetch_array($query)){
             ?>
        <tr>
        <td class="lalign"><?= $row["UserPharmacyName"]?></td>
        <td><?= $row["UserContact"]?></td>
        <td><?= $row["UserWorkHours"]?></td>
        <td><?= $row["UserAddress"]?></td>
        <td></td>
      </tr>
            <?php    
        }
        
       
        
    }
        ?>
     
      
    </tbody>
  </table>
 </div>
                            <?php
                            }
		                    ?>
                            <!--
                            <div class="box">
                            <div class="container-1">
                            <span class="icon"><i class="fa fa-search"></i></span>
                            <input type="search" name="product" id="search" placeholder="Search..." />
                            </div>
                            </div>
	                        -->
							
                            
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner end -->

        <?php
        $searchq=$_REQUEST['product'];
			                include('map/index.php');
		                    ?>
		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 id="about" class="title text-center">Sayt <span>haqida</span></h1>
                        <br>
                       <div class="space"></div>
						<div class="row" style="font-size: 15px;">
							<div class="col-md-6">
                                <img src="images/lp1.png" alt="here">
								<div class="space"></div>
							</div>
							<div class="col-md-6">
                                <p><strong>Pharmecy.uz</strong> saytida siz ko'plab turdagi dori vositalarini qulay va tez ravishda topishingiz mumkin. Ushbu loyiha siz uchun kerakli bo'gan barcha asosiy ma'lumotlarni berish imkoniyatiga ega. Bundan tashqari sayt ikki tilda tuzilgan bo'lib foydalnuvchilarga ko'proq qulaylik yaratidi. </p><br>
								<p>Veb saytning asosiy maqsadlari:</p><br>
								<ul class="list-unstyled">
									<li><i class="fa fa-caret-right pr-10 text-colored"></i> Foydalanuvchilar uchun yaratilgan qulay va tezkor qidiruv tizim</li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i> Dorilarni qayerdan va qaysi dorixonadan topish imkoniyati</li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i> Dorixonalar bilan aloqa o'rnatish</li>
								</ul><br><br>
                                <p>Fikr va muloxazalaringizni XXXXXXX@XXX.uz manzilga yuborishingiz mumkin.</p><br><br>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section translucent-bg bg-image-1 blue">
			<div class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="services"  class="text-center title">Xizmatdan foydalanish</h1>
				<div class="space"></div>
				<div class="row" style="font-size: 20px;">
					<div class="col-sm-6">
						<div class="media">
							<div class="media-body text-right">
								<h4 class="media-heading">Bosqich 1</h4>
								<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Birinchi navbatda siz ro'yxatdan o'tishingiz lozim yoki biz bilan bog'laning.</p>
							</div>
							<div class="media-right">
								<i class="fa fa-check"></i>
							</div>
						</div><br>
						<div class="media">
							<div class="media-body text-right">
								<h4 class="media-heading">Bosqich 2</h4>
								<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Undan so'ng biz sizga ro'yxatdan o'tganlingiz haqida xabar beramiz.</p>
							</div>
							<div class="media-right">
								<i class="fa fa-desktop"></i>
							</div>
						</div><br>
						<div class="media">
							<div class="media-body text-right">
								<h4 class="media-heading">Bosqich 3</h4>
								<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Siz foydalanuvchilar orasidan joy olasiz va ko'plab qulayliklarga ega bo'lasiz.</p>
							</div>
							<div class="media-right">
								<i class="fa fa-child"></i>
							</div>
						</div>
					</div>
					<div class="space visible-xs"></div>
					<div class="col-sm-6">
						<div class="media">
							<div class="media-left">
								<i class="fa fa-leaf"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Bosqich 4</h4>
								<p>Foydalanuvchi dorixonalar o'z dorilar xilma-xilligini oshirish imkoniyatiga egadirlar.</p>
							</div>
						</div><br>
						<div class="media">
							<div class="media-left">
								<i class="fa fa-area-chart"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Bosqich 5</h4>
								<p>Bundan tashqari siz dorixonangizdagi dorilar ro'yxatini boshqarishingiz mumkin.</p>
							</div>
						</div><br>
						<div class="media">
							<div class="media-left">
								<i class="fa fa-users"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Bosqich 6</h4>
								<p>Daromadingizni bizning sayt orqali yanada oshiring va shu bilan birgalikda ko'plab mijozlarga ega bo'ling. </p>
                                <div class="space"></div>
							</div>
						</div>
					</div>
				</div>
                <div class="space"></div>
			</div>
		</div>
		<!-- section end -->

		
		<!-- ================ -->
		<footer id="footer">

			<!-- .footer start -->
			<!-- ================ -->
			<div class="footer section">
				<div class="container">
					<h1 class="title text-center" id="contact">BIZ BILAN BOG'LANING</h1><br>
					<div class="space"></div>
					<div class="row">
						<div class="col-sm-6">
							<div class="footer-content">
								<p class="large">Sizni qiziqtirgan fikr va mulohazalaringizni bizning elektron manzilimizga yuborishingiz mumkin </p>
								<ul class="list-icons">
									<li><i class="fa fa-map-marker pr-10"></i>Manzil</li>
                                    <li><i class="fa fa-phone pr-10"></i> +998 XX XXX - XX - XX</li>
									<li><i class="fa fa-fax pr-10"></i> +998 XX XXX - XX - XX</li>
									<li><i class="fa fa-envelope-o pr-10"></i> pharmacy@gmail.com</li>
								</ul>
								<ul class="social-links">
                                    <li class="facebook"><a target="_blank" href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
									<li class="telegram"><a target="_blank" href="https://telegram.com"><i class="fa fa-paper-plane"></i></a></li>
									<li class="gmail"><a target="_blank" href="http://gmail.com"><i class="fa fa-envelope"></i></a></li>
									
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="footer-content">
								<form role="form" id="footer-form" name="contactform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    
									<div class="form-group has-feedback">
										<label class="sr-only" for="name">Name</label>
										<input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="email">Email address</label>
										<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="message">Message</label>
										<textarea class="form-control" rows="8" id="message" placeholder="Message" name="message" required></textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<input type="submit" value="Send" class="btn btn-default">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .footer end -->

			<!-- .subfooter start -->
			<!-- ================ -->
			<div class="subfooter">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">Team X © 2017 Pharmacy</p>
						</div>
					</div>
				</div>
			</div>
			<!-- .subfooter end -->

		</footer>
		<!-- footer end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="plugins/jquery.appear.js"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="js/custom.js"></script>

	</body>
</html>
