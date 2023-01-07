<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$userid=$_SESSION['obbsuid'];
$sername=$_POST['sername'];
$serdes=$_POST['serdes'];
$serprice=$_POST['serprice'];
$result="Pending";

$sql="insert into tblservice(ServiceName,SerDes,ServiceImg,userid,result)values(:sername,:serdes,:serprice,:userid,:result)";
$query=$dbh->prepare($sql);
$query->bindParam(':sername',$sername,PDO::PARAM_STR);
$query->bindParam(':serdes',$serdes,PDO::PARAM_STR);
$query->bindParam(':serprice',$serprice,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
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
<!DOCTYPE html>
<html lang="en">
<head>
<title>Castle Convention Hall|| Home Page
</title>
<style>
.banner {
  background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url("images/n22.gif");
  position: absolute;
  top: 210px;
  left: 210px;
  width: 900px;
  height: 420px;
  background-color: #1739C3;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  color:#000000;
}


.bannerh { 
  position: absolute;
  top: 120px;
  left: 120px;
 
}
.absa {
  position: absolute;
  top: 770px;
  
  
}

 .aula {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
  background: rgba(255, 255, 255, 0.2);
}
.bula {
  
  overflow: hidden;
  background-color: #333333;
  background: rgba(255, 255, 255, 0.2);
  text-align: center ;
 
  
}




 .ali {
  float: left;
  display: block;
  text-align: center ;
  padding-top: 8px;
  padding-right: 105px;
  padding-bottom: 8px;
  padding-left: 105px;
  text-decoration: none;
  font-size: 17px;
  
}
.glass{
  background: rgba(255, 255, 255, 0.3);
  border-radius: 16px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(5px);
  -webkit-backdrop-filter: blur(5px);
  border: 5px solid #E0B30F;
  text-align:center;
  
}
.absa {
  position: absolute;
  top: 650px;
  left: 0;
  width: 100%;
  
  
}


  
.absb {
	background-image: url("6.gif");
	background-position: center;
  position: absolute;
  top: 740px;
  left: 5%;
  width: 45%;
  height: 65%;
  
  

}
.absc {
	
  position: absolute;
  top: 740px;
  right: 1%;
  width: 45%;
  height: 65%;
  
  

}
.absd {
	
  position: absolute;
  top: 1200px;
  left: 0;
  width: 100%;
  color:#1BF2D3;
  
 
}


</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
<link rel="stylesheet" href="../css/style2.css" />

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
			
						

                                                 <?php include_once('includes/header.php');?>
												 
							<br><br><br><br><br>				
			 								 
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <ceneter>
				<div  class="content">
                
                    <!-- Register Forms -->
                    <h2 class="content-heading" style="text-align:center; font-size:24px; font-weight: bold; color: black">Add New Post</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h2 style="color: black;" class="block-title"><b>Enter your post</b></h2>
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
                                            <label style="color: black;" class="col-12" for="register1-email">Post Tile:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control" name="sername" value="" required='true'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label style="color: black;" class="col-12" for="register1-email">Post Description:</label>
                                            <div class="col-12">
                                                 <textarea type="text" class="form-control" name="serdes" value="" required='true'></textarea>
                                            </div>
                                        </div>
                                        
										<div class="form-group row">
                                            <label style="color: black;" class="col-12" for="register1-password">Add Image</label>
                                            <div class="col-12">
                                                <input type="file"  accept=".jpg,.jpeg,.png" class="form-control" name="serprice" value="" required='true'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button style="color: black;" type="submit" class="btn btn-alt-success" name="submit">
                                                    <i style="color: black;" class="fa fa-plus mr-5"></i> Add
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
				
				<ceneter>
            </main>
			</div>
                                              
												


<div class="absd">
  <div class="bula">
   
     <?php include_once('includes/footer.php');?>
		
  </div>	
</div>	

</body>	
</html>
<?php }  ?>