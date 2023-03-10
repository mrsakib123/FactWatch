<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
	$serid=intval($_GET['delid']);
   $resultt=$_POST['resultt'];
							   


  

$sqll= "update tblservice set result=:resultt where ID=:serid";
$query=$dbh->prepare($sqll);
$query->bindParam(':resultt',$resultt,PDO::PARAM_STR);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);

 $query->execute();  
	 
	

$details=$_POST['detailss'];
$Refrences=$_POST['Refrencess'];
$result=$_POST['resultt'];


$sql="insert into facttbl(serid,details,Refrences,result)values(:serid,:details,:Refrences,:result) ";
$query=$dbh->prepare($sql);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);
$query->bindParam(':details',$details,PDO::PARAM_STR);
$query->bindParam(':Refrences',$Refrences,PDO::PARAM_STR);
$query->bindParam(':result',$result,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<body>
	<div class="alertpos">

	<div class="alert alert-success">
  <strong>Success!</strong>
  Your Booking Request Has Been Send. We Will Contact You Soon.

</div> 
</div> 
</body>';
  }
  else
    {
         echo '<body>
	<div class="alertpos">
		 <div class="alert alert-warning">
  <strong>Warning!</strong> Something Went Wrong. Please try again.
</div>
</div>';
    }

  
}

?>
<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Online Catering Booking System - Add Services</title>
<link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
<link rel="stylesheet" href="../css/style2.css" />

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.alertpos {
	
  position: absolute;
  top: 25px;
  height:50px;
   left: 20%;
  width: 50%; 
}
</style>
</head>
    <body>
	<?php include_once('includes/header.php');?>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
     

             <?php include_once('includes/sidebar.php');?>

       

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                
                    <!-- Register Forms -->
                    <h2 class="content-heading" style="color: white">Add New Offers</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Add Offers</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
								
                                <div class="block-content">
                                   
                                    <form method="post">
                                        
                                        
                                        <div class="form-group row">
                                            <label class="col-12" for="register1-email">Fact info:</label>
                                            <div class="col-12">
                                                 <textarea type="text" class="form-control" name="detailss" value="" required='true'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="register1-email">Fact Refrences:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control" name="Refrencess" value="" required='true'>
                                            </div>
                                        </div>
										
									<div class="form-group row">
                                            <label class="col-12" for="register1-email">Fact Result</label>
                                            <div class="col-12">
                                                 <select type="text" class="form-control"  required="true" name="resultt" >
										<option value="">Choose Result</option>
										<option value="True">True</option>
										<option value="False">False</option>
									
										</select>
                                            </div>
                                        </div>
										
										
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-success" name="submit">
                                                    <i class="fa fa-plus mr-5"></i> Add
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- END Bootstrap Register -->
                        </div>
                        
                       </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
           
          <?php include_once('includes/footer.php');?>
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
    </body>
</html>
<?php }  ?>
 <?php include_once('includes/footer.php');?>