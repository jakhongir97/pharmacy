<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
                <img src="../../uploads/img.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
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
                      <li><a href="#">Edit</a></li>
                      
                    </ul>
                  </li>
                    <li><a><i class="fa fa-briefcase"></i> Change Profile style <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Change pharmacy profile</a></li>
                      <li><a href="#">Change own profile</a></li>
                      <li><a href="#">Change site style</a></li>
                    </ul>
                  <li><a><i class="fa fa-briefcase"></i> Store <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="adminchangeprice.php">Change the price</a></li>
                      <li><a href="adminaddproduct.php">Add new product</a></li>
                      <li><a href="admindeleteproduct.php">Delete product</a></li>
                      <li><a href="adminuseractiv.php">User Activation</a></li>
                    </ul>
                    
                    
                    <li><a href="../../../"><i class="fa fa-power-off"></i>Log Out</a></li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            
            
          </div>
        </div>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Here you can check required information of user</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                      
                  </div>
                     <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                      <form >
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        
                      <thead>
                        <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>INN image</th>
                        <th>Contact</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php
                          for($i=1; $i<100000; $i++)
                          {
                          if(isset($_REQUEST["button$i"]))
                          {
                              $userid=$_REQUEST["button$i"];
    
                          }
                          }
                    include_once('connect.php');
    $var="SELECT p.UserName, p.UserAddress, p.UserContact, p.UserEmail, p.UserPass, p.UserINN, p.UserINNpic, p.UserActivation, p.UserPharmacyName, p.UserWorkHours FROM pharmacy p WHERE p.UserId='$userid'";
            $result=mysqli_query($conn, $var);
                    while($row=mysqli_fetch_assoc($result))
                    {
                                
                   ?>
                        <tr>
                          
                            <?php
                       if($row["UserActivation"]==0)
                       {
                           ?>
                            <td><?= $row["UserPharmacyName"] ?></td>
                            <td>NOT Activated</td>
                            
                            <?php
                       }
                        else
                        {
                        ?>
                            <td><?= $row["UserPharmacyName"] ?></td>
                            <td>Activated</td>
                            
                            <?php
                        }
                        ?>
                          <td><img src="../../uploads/<?= $row["UserINNpic"] ?>" alt="..."  style="width:500px; height:500px;"></td>
                          <td><?= $row["UserContact"] ?></td>
                        </tr>
                      <?php
                    }
                    ?>  
                        
                      </tbody>
                    </table>
                          </form>
                  </div>
            </div>
</div>
</div>

        <!-- /page content -->

       
       
      </div>
    </div>
           
           <div class="subfooter">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">Team X © 2017 Pharmacy</p>
						</div>
					</div>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>