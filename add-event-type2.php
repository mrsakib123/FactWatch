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
    $detailss=$_POST['detailss'];
   $Refrencess=$_POST['Refrencess'];
   $resultt=$_POST['resultt'];
							   


  

$sql= "update facttbl set details=:detailss,Refrences=:Refrencess ,result=:resultt where serid=:serid";
$query=$dbh->prepare($sql);
$query->bindParam(':detailss',$detailss,PDO::PARAM_STR);
$query->bindParam(':Refrencess',$Refrencess,PDO::PARAM_STR);
$query->bindParam(':resultt',$resultt,PDO::PARAM_STR);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);

 $query->execute();

  echo '<script>alert("Remark has been updated")</script>';

}

?>
<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Online Banquet Booking System - View Booking</title>
<link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

<link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
		

</head>
    <body>
	 <?php include_once('includes/header.php');?>
	 <br><br>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
     

            

          

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                
                    <!-- Register Forms -->
                    <h2 class="content-heading">View Booking</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">View Booking</h3>
                                    
                                </div>
                                <div class="block-content">
                                   
                               <?php
							   
							   
						$serid=intval($_GET['delid']);	   
$sql="select * from facttbl where serid=:serid";
$query=$dbh->prepare($sql);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>




                               <center><h4>  Post ID: <?php  echo $row->serid;?></h4> </center>
                                    
  <h5>Details</h5>
    <p style="color: black;"><?php  echo htmlentities($row->details);?></p>
     
 
    
    <h5>Refrences</h5>
    <p style="color: black;"><?php  echo htmlentities($row->Refrences);?></p>
   
     

  

   <h5>result</h5>
    <p style="color: black;"><?php  echo htmlentities($row->result);?></p>
    
  



<?php $cnt=$cnt+1;}}else{ ?>

<center><h1>Post Update is still pennding</h1> </center>

<?php }?>

<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Update</button></p>  


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">

                                
                               
     <tr>
    <th style="color: black;" >Details :</th>
    <td>
    <textarea name="detailss" placeholder="Details" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
   
 <tr>
    <th style="color: black;" >Refrences :</th>
    <td>
    <textarea name="Refrencess" placeholder="Refrences" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
 
  <tr>
    <th style="color: black;" >Result :</th>
    <td>

   <select name="resultt" class="form-control wd-450" required="true" >
     <option value="True" >True</option>
     <option value="False">False</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
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