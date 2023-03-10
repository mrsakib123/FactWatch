<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
{
$uid=$_SESSION['obbsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT ID FROM tbluser WHERE ID=:uid and Password=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where ID=:uid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':uid', $uid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo '<body>
	<div class="alertpos">
	<div class="alert alert-success">
  <strong>Success!</strong>
  Your password successully changed!.

</div> 
</div> 
</body>';

} else {
	
	echo'<body>
	<div class="alertpos">
	<div class="alert alert-warning">
  <strong>Warning!</strong>
  Your current password is wrong
</div> 
</div> 
</body>';

}



}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Catering Booking System | Change Password</title>

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

<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.alertpos {
	
  position: absolute;
  top: 200px;
  height:50px;
   left: 20%;
  width: 50%;
  
  
  

}
</style>
</head>
<body>
	
		<div >
			<?php include_once('includes/header.php');?>
			<div class="wthree-heading">
				<h2 style="color:black;" >Change Password</h2>
			</div>
		</div>
	</div>
	
	<div class="contact">
		<div class="container">
			<div class="agile-contact-form">
				<br>
				<br>
				<div class="col-md-6 contact-form-right">
					<div class="contact-form-top">
						<h3 style="color:black;">User Profile </h3>
					</div>
					<div class="agileinfo-contact-form-grid">
						<form method="post" onsubmit="return checkpass();" name="changepassword">
							 <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:black;">Current Password</label>
                                    <div  class="col-md-10">
                                        <input type="password" class="form-control" style="color:black;" required="true" name="currentpassword">
                                    </div>
                                </div>
                                                <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:black;">New Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control"  required="true" name="newpassword" style="font-size: 20px">
                                    </div>
                                </div>
                                                 <div class="form-group row">
                                    <label class="col-form-label col-md-4" style="color:black;">Confirm Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control"  required="true" name="confirmpassword" style="font-size: 20px" >
                                    </div>
                                </div>
                                                
                                              <br>
                                                <div class="tp">
                                                    
                                                     <button type="submit" class="btn btn-primary" name="submit">Change</button>
                                                </div>
                                            </form>

					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			
		
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
</html><?php }  ?>