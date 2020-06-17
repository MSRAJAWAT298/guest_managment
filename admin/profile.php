<?php
/*
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */


session_start();
require_once '../path_info.php';
require_once 'include/db.php';
if(isset($_SESSION['admin_user'])){
    $user_email= $_SESSION['admin_user'];
}else{
    header("location:index.php");
}

$tname="users";
$user = new db();
$con=" AND email='{$user_email}'";
$data = $user->select($tname,$con);
$id=$data[0]['id'];
/////////////// O N U P D A T E //////////////////////
////////////////////////////////////////////////////////////////////////////
if (isset($_POST['submit'])) {
  	$array = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'mobile' => $_POST['mob'],
            'password' => $_POST['password'],
        );
		$con=" AND id = {$id}";
		
		/*echo "<pre>";
        print_r($array);
        echo "</pre>";
		exit();*/
	
    $update = $user->update($tname, $array, $con);
    if (isset($update)) {
	echo '<script type="text/javascript">';
    echo'alert("Update succesfully!");';
    echo 'window.location.href="profile.php";';
    echo '</script>';
	
}
}

?>
<?php include_once 'include/header.php';?>
<body>  
<?php include 'include/navbar.php';?>
<div class="container-fluid" id="main">
		<div class="row row-offcanvas row-offcanvas-left">
<?php include 'include/sidebar.php';?>
 <div class="col main pt-5 mt-3">
				<hr>
				<h1 class="display-4 d-none d-sm-block">Edit Profile</h1>
				<hr><span class="font-weight-bold text-info"><?php if(!empty($error))echo $error;?></span>
				<div class="col-lg-2 ml-auto">
					<a class="nav-link btn btn-outline-light bg-info  border"
						href="view_events.php">View all events</a>
				</div>
				<form class="font-weight-bold" method="POST" id="myForm" action="" autocomplete="on" enctype="multipart/form-data">
					<div class="row">			
						<div class="col-lg-6">
							<div class="form-group">
								<label for="name"> Name:</label> 
								<input type="text"
									   class="form-control rounded" 
									   id="bname" 
									   placeholder="Enter event Name"
									   name="name" 
									   value="<?php echo $data[0]['name'];?>"> 
								<span class="text-danger" id="error_name"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="email"> Email:</label> 
								<input type="email"
									   class="form-control rounded" 
									   id="bname" 
									   placeholder="Enter New email"
									   name="email" 
									   value="<?php echo $data[0]['email'];?>"> 
								<span class="text-danger" id="error_email"></span>
							</div>
						</div>
						
					<div class="col-lg-6">
							<div class="form-group">
								<label for="mobile">Mobile Number:</label> 
								<input type="number" min="1"
									   class="form-control rounded" 
									   id="mob" 
									   placeholder="Enter New mobile number"
									   name="mob" 
									   value="<?php echo $data[0]['mobile'];;?>"> 
								<span class="text-danger" id="error_mob"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="mobile">Change Password:</label> 
								<input type="text" min="1"
									   class="form-control rounded" 
									   id="password" 
									   placeholder="Enter New mobile number"
									   name="password" 
									   value="<?php echo $data[0]['password'];?>"> 
								<span class="text-danger" id="error_pass"></span>
							</div>
						</div>
					
						<div class="col-lg-6">
							<input type="submit" id="submit" class="btn btn-success" name="submit"
								value="Upadte Profile">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include 'include/footer.php';?>

<script>

$(document).ready(function(){
// 	  alert("helo");
	  var flag=true;
	   $("#myForm").submit(function(event){
// 		  alert("helo");
		  if($("#bname").val()==""){ 
			  $("#error1").text("Enter name");
			  flag=false;  
		  }else{
			  $("#error1").text("");}

		 if($("#date").val()==""){ 
			  $("#error2").text("Enter publish_date ");
			  flag=false;  
		  }else{
			  $("#error2").text("");}
			  
		  if($("#cost").val()==""){ 
			  $("#error3").text("Enter cost");
			  flag=false;  
		  }else{
			  $("#error3").text("");}
		 
		 
		 if($("#invite").val()==""){ 
			  $("#error4").text("Enter invited person");
			  flag=false;  
		  }else{
			  $("#error4").text("");}
		
		if($("#details").val()==""){ 
			  $("#error_details").text("Enter book description");
			  flag=false;  
		  }else{
			  $("#error_details").text("");}

	 	  if(flag==false){event.preventDefault();}
		  
		  });
});


</script>

</body>
</html>