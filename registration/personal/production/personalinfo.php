<?php
      //ob_start();
	  session_start();
      
      include_once('connect.php');
                    
      if( !isset($_SESSION['user']) ) {
		header("Location: ../../index.php");
		exit;
      }
      
      $pro=$_SESSION['user'];
      
    $var="SELECT s.UserPharmacyName, s.UserAddress, s.UserContact, s.UserName, s.UserEmail, s.UserPass, s.UserWorkHours, s.UserINN, s.UserPhoto FROM pharmacy s  WHERE s.UserId='$pro'";
            $result=mysqli_query($conn, $var);
                        $row=mysqli_fetch_assoc($result)
                        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pharmacy.uz</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
      
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Pharmacy.uz</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="uploads/<?= $row["UserPhoto"] ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $row["UserName"] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Personal Info</a></li>
                      <li><a href="changeinfo.php">Edit</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-briefcase"></i> My Pharmacy <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="changetheprice.php">Change the price</a></li>
                      <li><a href="addproduct.php">Add new product</a></li>
                      <li><a href="deleteproduct.php">Delete product</a></li>
                    </ul>
                    
                    
                    <li><a href="../../logout.php?logout"><i class="fa fa-power-off"></i>Log Out</a></li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="uploads/<?= $row["UserPhoto"] ?>" alt=""><?= $row["UserName"] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="personalinfo.php"> Profile</a></li>
                    <li><a href="../../logout.php?logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Your personal Info</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate>
                        
                   

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Fullname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?= $row["UserName"] ?> 
                        </label>
                        </div>
                      </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >User Mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?= $row["UserEmail"] ?> 
                        </label>
                        </div>
                      </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" \>Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" \><?= $row["UserPass"] ?> 
                        </label>
                        </div>
                      </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Work hours <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?= $row["UserWorkHours"] ?>
                        </label>
                        </div>
                      </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >INN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?= $row["UserINN"] ?> 
                        </label>
                        </div>
                      </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Store name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?= $row["UserPharmacyName"] ?> 
                        </label>
                        </div>
                      </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?= $row["UserAddress"] ?> 
                        </label>
                        </div>
                      </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Phone number <span class="required">*</span>
                        </label>
                        <div  class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?= $row["UserContact"] ?> 
                        </label>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <div class="subfooter">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">Team X © 2017 Pharmacy</p>
						</div>
					</div>
				</div>
			</div>
 <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>