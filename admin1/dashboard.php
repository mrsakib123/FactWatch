<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
 <head>
 <title>Online Banquet Booking System - Admin Dashboard</title>
 <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
         
         <?php include_once('includes/sidebar.php');?>

          <?php include_once('includes/header.php');?>
          

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-md-4 col-xl-3">
                            <a class="block text-center" href="new-booking.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                  <?php 
						$result="Pending";
						
							$sql ="select * from tblservice where result=:result";
							$query = $dbh -> prepare($sql);
							$query->bindParam(':result',$result,PDO::PARAM_STR);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totalnewbooking=$query->rowCount();
						?>
                                    <div class="ribbon-box"><?php echo htmlentities($totalnewbooking);?></div>
                                    <p class="mt-5">
                                        <i class="si si-pencil fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total Pending Post</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3">
                            <a class="block text-center" href="new-booking1.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                    <?php 
						$resultt="True";
						
							$sql ="select * from tblservice where result=:resultt";
							$query = $dbh -> prepare($sql);
							$query->bindParam(':resultt',$resultt,PDO::PARAM_STR);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totalingg=$query->rowCount();
						?>
                                    <div class="ribbon-box"><?php echo htmlentities($totalingg);?></div>
                                    <p class="mt-5">
                                        <i class="si si-target fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total True Post</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3">
                            <a class="block text-center" href="new-booking2.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                                 
						<?php 
						$res="False";
						
							$sql ="select * from tblservice where result=:res";
							$query = $dbh -> prepare($sql);
							$query->bindParam(':res',$res,PDO::PARAM_STR);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$toto=$query->rowCount();
						?>
                                    <div class="ribbon-box"><?php echo htmlentities($toto);?></div>
                                    <p class="mt-5">
                                        <i class="si si-support fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total False Post</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3">
                            <a class="block text-center" href="manage-services2.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                               
						
						<?php 
							$sql ="SELECT ID from tblservice";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totalserv=$query->rowCount();
						?>
                                    <div class="ribbon-box"><?php echo htmlentities($totalserv);?></div>
                                    <p class="mt-5">
                                        <i class="si si-wallet fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Total Post</p>
                                </div>
                            </a>
                        </div>
                    
                        <!-- END Row #1 -->
                    </div>
                  
                  
                </div>
                
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_dashboard.js"></script>
    </body>
</html>