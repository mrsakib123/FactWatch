<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$serid=intval($_GET['delid']);
$eeid=$_SESSION['obbsuid'];
$eid=intval($_GET['editid']);
    $detailss=$_POST['detailss'];
	 
   
							   


  

$sql="insert into comment(userid,postid,Comdetail,cmuserid)values(:eid,:serid,:detailss,:eeid)";
$query=$dbh->prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);
$query->bindParam(':detailss',$detailss,PDO::PARAM_STR);
$query->bindParam(':eeid',$eeid,PDO::PARAM_STR);


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
						
 					
						 ?>
<center><h4>  Post ID: <?php  echo $serid;?></h4> </center>

						
                               <?php
							   
							   
							   
$sql="select * from comment where postid=:serid";
$query=$dbh->prepare($sql);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cntt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{      $eid=intval($_GET['editid']);         ?>




                               

 
  <h6 >Comment: <?php echo $cntt; ?> 
 <form  name="submit1" >
 <p align="right"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" ><a style="color: white;" href="view-booking-detail5.php?delid=<?php  echo  ($serid);?>&editid=<?php  echo  ($eid);?>&cmid=<?php  echo htmlentities($row->ID);?> ">Reply<a/></button></p>  </h6>
  <form/>  
  
  <h5 style="color: black;"><?php  echo htmlentities($row->Comdetail);?></h5>
  <p style="color: black;">Time: (<?php  echo htmlentities($row->comdate);?>)</p>
 <?php   
 $abid=$row->cmuserid; 
 ?>
<?php
					  
					  




         $sql="select * from  tbluser  where ID=:abid";
                       $query = $dbh -> prepare($sql);
                       $query->bindParam(':abid',$abid,PDO::PARAM_STR);
                       $query->execute();
                       $results=$query->fetchAll(PDO::FETCH_OBJ);
                       
                       if($query->rowCount() > 0)
					   {
						   foreach($results as $row)
						   {
							   
						    
						 
  ?>
<h6 >Comment By:  <?php  echo htmlentities($row->FullName);?>  </h6>
   
<?php $cnt=$cnt+1;}} ?>	

	

<hr style="border: 1px solid black;">  
<?php $cntt=$cntt+1;}}else{ ?>
 <center><h1>No comment yet</h1> </center>

<?php }?>


<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Comment</button></p>  


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
    <th style="color: black;" >Comment :</th>
    <td>
    <textarea name="detailss" placeholder="Details" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
   
 
 
  
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Add</button>
  
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