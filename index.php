<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Fact Checking Website </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 

<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>

 .ulax {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  
  
}


 .lix {
  float: down;
}




.downb
{
  float: down;
}

 .liax {
  display: block;
  color: white;
  text-align: center ;

  text-decoration: none;
  font-size: 16px;
  
  border-collapse:collapse;
  
  
}
.lib {
  display: block;
  color: white;
  text-decoration: none;
  font-size: 14px;
  
}




.circular_image {
   
  width: 380px;
  height: 380px;
  border-radius: 50%;
  overflow: hidden;
  background-color: blue;
  display: block;
  margin-left: auto;
  margin-right: auto;

  vertical-align:middle;

}
.circular_image img{
  
  width:100%;
}
.circular_imagesm {
  width: 125px;
  height: 135px;
  border-radius: 50%;
  overflow: hidden;
  background-color: blue;
  display: block;
  margin-left: auto;
  margin-right: auto;

  vertical-align:middle;
}
.circular_imagesm img{
  
  width:100%;
}

.circular_imagee img{
  
  width:100%;
}
.circular_imagesmm {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  overflow: hidden;
  background-color: blue;
  display: block;
  margin-left: auto;
  margin-right: auto;

  vertical-align:middle;
}
.circular_imagesmm img{
  
  width:100%;
}






 
</style>

</head>
<body>


	
	
		<div >
		<?php include_once('includes/header.php');?>
		
		<h1 style="text-align:center;font-size:50px; color:black" ><img class="circular_imagesm" src="factwatch.jpg" alt="My photo"  >FactWatch</h1>		
<br>
			<?php
			
$sql="SELECT * from tblservice ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

		  <div class="midshow" >
		  <ul class="ulax"  >
		 
	  
		              
								            
                                            <li class="lix" >
                                            <?php    if($_SESSION['obbsuid']==""){?>											
											<a class="liax"href="login.php">
											<img src="<?php  echo htmlentities($row->ServiceImg);?>" alt="weeding_pic" width="600" height="333"><br><br>
											</a>
											
											<p style="text-align:center; font-size:14px;">
											
											<?php 
										$string = $row->ServiceName;
   
                                      $new_string =  mb_strimwidth($string, 0, 35, " ...");
    
										echo htmlentities($new_string);
										?>
											
											</p>
											<p style="text-align:center; font-size:18px;"><a class="fa fa-commenting-o" href="#">  Comment</a> <?php echo  str_repeat('&nbsp;',30);?>  <a class="fa fa-check" href="#">  Aprroved status</a> <?php echo str_repeat('&nbsp;', 30);?>   <a class="fa fa-file-pdf-o" href="#">  Fact Review </a></p>
											 <hr style="width:46%;text-align:center;margin-left:27%">
											<br>
											<br>
											<?php } else {?>
											</li>
	



	
											<?php
											$serrid= $row->ID; 
											 $uid=$row->userid;
											 ?>









											<li class="lix" >
											<?php
					  
					  
  

         $sql="SELECT * from  tbluser  where ID=:uid";
                       $query = $dbh -> prepare($sql);
                       $query->bindParam(':uid',$uid,PDO::PARAM_INT);
                       $query->execute();
                       $results=$query->fetchAll(PDO::FETCH_OBJ);
                       
                       if($query->rowCount() > 0)
					   {
						   foreach($results as $row)
						   {
						    
						 
  ?>
											<img class="circular_imagesmm" src="profile.jpg" alt="weeding_pic" ><center><p style="font-size: 18px;"><?php  echo  $row->FullName;?></p></center>
											<?php $cnt=$cnt+1;}} ?>	
											
											
											
											
	<?php											
$sql="select * from tblservice where ID=:serrid";
$query=$dbh->prepare($sql);
$query->bindParam(':serrid',$serrid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)

{                 
?>	
<a class="liax" href="view-booking-detail3.php?delid=<?php  echo  ($row->ID);?>">									
											<img src="<?php  echo htmlentities($row->ServiceImg);?>" alt="weeding_pic" width="600" height="333"><br><br>
											</a>
											
											<p style="text-align:center; font-size:14px;"> <?php  echo htmlentities($row->ServiceName);?></p>
											<p style="text-align:center; font-size:18px; font-weight: bold;"><a style="font-weight: bold;"class="fa fa-commenting-o" href="view-booking-detail4.php?delid=<?php  echo  ($row->ID);?>&editid=<?php  echo  ($row->userid);?>">
 <?php 
						
						
							$sql ="select * from comment where postid=:serrid";
							$query = $dbh -> prepare($sql);
							$query->bindParam(':serrid',$serrid,PDO::PARAM_STR);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$toto=$query->rowCount();
						?>


											Comment: <?php echo htmlentities($toto);?> </a> <?php echo  str_repeat('&nbsp;',19);?> 
											
	<?php $cnt=$cnt+1;}} ?>										
											<?php
											$serid= $row->ID;
$sql="select * from facttbl where serid=:serid";
$query=$dbh->prepare($sql);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{                 
?>
<?php
if($row->result=="True")
{  
?>
<a style="font-weight: bold;" class="fa fa-check" href="#">  Aprroved status: True  <i class="fa fa-check-circle" style="font-size:24px;color:green"></i> </a> <?php echo str_repeat('&nbsp;', 19);?>  
<?php }else if($row->result=="False"){ ?>

 <a style="font-weight: bold;" class="fa fa-check" href="#" >  Aprroved status: False  <i class="fa fa-times-circle" style="font-size:24px;color:red"></i></a> <?php echo str_repeat('&nbsp;', 19);?>
<?php }?>

 
<?php $cnt=$cnt+1;}}else{ ?>
<a style="font-weight: bold;" class="fa fa-check" href="#">  Aprroved status: Pending   <i class='fas fa-parking' style='font-size:22px;color:#B39904'></i></a> <?php echo str_repeat('&nbsp;', 19);?>
<?php }?>

											<a style="font-weight: bold;" class="fa fa-file-pdf-o" href="view-booking-detail2.php?delid=<?php  echo  ($row->serid);?>">  Fact Review </a></p>
											 <hr style="width:48%;border: 1px solid black;text-align:center;margin-left:26%">
											<br>
											<br>
											<?php }?>
											 
											</li>
											<?php $cnt=$cnt+1;}} ?>
											
									        
                                           


                                        </ul>
										
										
			
</div>			
</div>
			
		
		
			
			
	<?php include_once('includes/footer.php');?>
	
	
	<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>

<script src="js/modernizr.custom.js"></script>

</body>	
</html>