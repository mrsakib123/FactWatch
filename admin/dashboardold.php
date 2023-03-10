    <?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>


 <html lang="en" class="no-focus"> <!--<![endif]-->
 <head>
	<title>Online Catering Booking System - Admin Dashboard</title>
	<!--
	<link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
	-->
	<link rel="stylesheet" href="../css/style2.css" />
	<style>
	.box {
		background: #FF0099;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #493240, #FF0099);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #493240, #FF0099); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		color: white;
		opacity: 90%;
		width: 400px;
		height: 100px;
		border-radius: 20%;
		text-align: center;
		margin-top: 50px;
		margin-right: 10px;
		font-size: 12px;
		
	}
	.box a:link {
		color: white;
	}
	.page {
		
		margin-left: 160px; /* Same as the width of the sidebar */
		
		padding: 0px 10px;
	}

	}
	
	.holder {
		
	}
	
	</style>
 </head>
 <body>
		<!-- Side navigation -->
		 <?php include_once('includes/header.php');?>
		<div class="sidenav">
			<?php include_once('includes/sidebar.php');?>
			
		</div>
		 
		
		<!-- Page content -->
			<div class="page">
				
				<a href="unread-queries.php" style="display:inline-block; text-decoration:none; color:#00FFFF; margin-right:2px;">
					<div class="box">
						<br>
						<p>Total Unread Queries</p>
						
						<?php 
							$sql ="SELECT ID from tblcontact where IsRead is null ";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totalunreadquery=$query->rowCount();
						?>
						<p style="font-size: 18">
							<?php echo htmlentities($totalunreadquery);?>
						</p>
					</div>
				
				</a>
				
				
				<a href="read-queries.php" style="display:inline-block; text-decoration:none; color:#00FFFF; margin-right:2px;">
					<div class="box">
						<br>
						<p>Total Read Queries</p>
						
						<?php 
							$sql ="SELECT ID from tblcontact where IsRead='1'";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totalreadquery=$query->rowCount();
						?>
						<p style="font-size: 18">
							<?php echo htmlentities($totalreadquery);?>
						</p>
					</div>
				</a>
			

			<br>
				<a href="new-booking.php" style="display:inline-block; text-decoration:none; color:#00FFFF; margin-right:2px;">
					<div class="box">
						<br>
						<p>Total Pending Post</p>
						
						<?php 
						$result="Pending";
						
							$sql ="select * from tblservice where result=:result";
							$query = $dbh -> prepare($sql);
							$query->bindParam(':result',$result,PDO::PARAM_STR);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totalnewbooking=$query->rowCount();
						?>
						<p style="font-size: 18">
							<?php echo htmlentities($totalnewbooking);?>
						</p>
					</div>
				</a>
				
				<a href="new-booking1.php" style="display:inline-block; text-decoration:none; color:#00FFFF; margin-right:2px;">
					<div class="box">
						<br>
						<p>Total True Post</p>
						
						<?php 
						$resultt="True";
						
							$sql ="select * from tblservice where result=:resultt";
							$query = $dbh -> prepare($sql);
							$query->bindParam(':resultt',$resultt,PDO::PARAM_STR);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totalingg=$query->rowCount();
						?>
						<p style="font-size: 18">
							<?php echo htmlentities($totalingg);?>
						</p>
					</div>
				</a>
				
			<br>
				<a href="new-booking2.php" style="display:inline-block; text-decoration:none; color:#00FFFF; margin-right:2px;">
					<div class="box">
						<br>
						<p>Total False Post</p>
						
						<?php 
						$res="False";
						
							$sql ="select * from tblservice where result=:res";
							$query = $dbh -> prepare($sql);
							$query->bindParam(':res',$res,PDO::PARAM_STR);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$toto=$query->rowCount();
						?>
						<p style="font-size: 18">
							<?php echo htmlentities($toto);?>
						</p>
					</div>
				</a>
				
				
				<a href="manage-services2.php" style="display:inline-block; text-decoration:none; color:#00FFFF; margin-right:2px;">
					<div class="box">
						<br>
						<p>Total Post</p>
						
						<?php 
							$sql ="SELECT ID from tblservice";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totalserv=$query->rowCount();
						?>
						<p style="font-size: 18">
							<?php echo htmlentities($totalserv);?>
						</p>
					</div>
				</a>
				
			<br>
			    <div style="text-align: center;">
				<a href="manage-services3.php" style="display: inline-block; text-decoration:none; color:#00FFFF; margin-right:2px">
					<div class="box" >
						<br>
						<p>Total Comment</p>
						
						<?php 
							$sql ="SELECT ID from comment";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$totaleventtype=$query->rowCount();
						?>
						<p style="font-size: 18">
							<?php echo htmlentities($totaleventtype);?>
						</p>
					</div>
				</a>
				</div>
			
				
			</div>
		
</body>
</html>
<?php }  ?>