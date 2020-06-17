a<?php
/*
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */


session_start();
require_once '../path_info.php';
require_once 'include/db.php';
if(isset($_SESSION['admin'])){
    $user_email= $_SESSION['admin'];
}else{
    header("location:index.php");
}

$table_name ="guest";
$user = new db();


/////////////////////// A D D______B O O K //////////////////
if (isset($_POST['submit'])) {
	//echo "<script>alert('Heelo submit');</script>";
    if (
           $_POST['name']=="" 
        || $_POST['mobile']=="" 
        || $_POST['details']==""
		) 
    {
        $error = "please fill the all fields<br><hr>";
    }
	else{
		
		$con = " AND email  = '{$user_email}'";
		$user_id = $user->select("users", $con);
        $array = array(
		'name'=>$_POST['name'],
		'mobile'=>$_POST['mobile'],
		'address'=>$_POST['details'],
		'user_id' =>$user_id[0]['id']
           
        );
		//echo "<pre>";
         //print_r($array);
		//exit;
		$con=" AND user_id ={$user_id[0]['id']} AND mobile={$_POST['mobile']} ";
		$duplicate=$user->select($table_name,$con);
	/*/	echo "<pre>";
		print_r($duplicate);
		print_r($array);
		exit;*/
		$msg="";
		if(count($duplicate)>0){
			if($duplicate[0]['mobile']==$_POST['mobile'])
			{
			echo '<script type="text/javascript">alert("Mobile Number already register!"); window.location.href="view_guest.php";</script>';
			}
		}
		
else{
        $insert = $user->insertdata($table_name, $array);
		
       if($insert){
       
	echo '<script type="text/javascript">';
    echo'alert("Add Guest succesfully!");';
   // echo 'window.location.href="http://localhost/event_managment/admin/view_guest.php";';
    echo '</script>';
	   }else{
	echo '<script type="text/javascript">';
    echo'alert("Add Guest failed!");';
    echo 'window.location.href="http://localhost/event_managment/admin/add_guest.php";';}
}
    }
}
//////////////////////// O N U P D A T E //////////////////////////////


if(isset($_GET['edit_id'])){//check edit button is click or not
$con=" AND id = {$_GET['edit_id']}";
$edit = $user->select($table_name,$con);
	$guest_id=$edit[0]['id'];
	$guest_name=$edit[0]['name'];
	$mobile=$edit[0]['mobile'];
	$address=$edit[0]['address'];

}
if (isset($_POST['update'])) {
	if ($_POST['name']=="" || $_POST['mobile']=="" || $_POST['details']=="") 
    {
        $error = "please fill the all fields<br><hr>";
    }else{
		 $array = array(
			'name'=>$_POST['name'],
			'mobile'=>$_POST['mobile'],
			'address'=>$_POST['details']
		);
		/*echo "<pre>";
         print_r($array);
		exit;*/
		
		$con=" AND mobile={$_POST['mobile']}";
		$duplicate=$user->select($table_name,$con);
	/*/	echo "<pre>";
		print_r($duplicate);
		print_r($array);
		exit;*/
		$msg="";
		if(count($duplicate)>0){
			if($duplicate[0]['mobile']==$_POST['mobile'])
			{
			echo '<script type="text/javascript">alert("Mobile Number already register!"); window.location.href="view_guest.php";</script>';
			}
		}
		
else{
	 $con=" AND id = {$guest_id}";
    $update = $user->update($table_name, $array, $con);
	if(isset($update)){
		echo '<script type="text/javascript">';
		echo'alert("Update succesfully!");';
		echo 'window.location.href="http://localhost/event_managment/admin/view_guest.php";';
		echo '</script>';
	}
}
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
				<h1 class="display-4 d-none d-sm-block">
				<?php if (!empty($_GET['edit_id'])){echo "Edit event";}else{ echo "Add event";}?></h1>
				<hr><span class="font-weight-bold text-info"><?php if(!empty($error))echo $error;?></span>
				<div class="col-lg-2 ml-auto">
					<a class="nav-link btn btn-outline-light bg-info  border"
						href="view_guest.php">View all Guests</a>
				</div>
				<form class="font-weight-bold" method="POST" id="myForm" action="" autocomplete="on" enctype="multipart/form-data">
					<div class="row">			
						<div class="col-lg-6">
							<div class="form-group">
								<label for="name">Guest Name:</label> 
								<input type="text"
									   class="form-control rounded" 
									   id="bname" 
									   placeholder="Enter Guest Name"
									   name="name" 
									   value="<?php if(!empty($guest_name))echo $guest_name;?>"> 
								<span class="text-danger" id="error1"></span>
							</div>
						</div>
						
					<div class="col-lg-6">
							<div class="form-group">
								<label for="mobile">Guest Mobile number:</label> 
								<input type="number"  
									   class="form-control rounded" 
									   id="mobile" 
									   placeholder="Guest Mobile number"
									   name="mobile" 
									   min="1"
									   value="<?php if(!empty($mobile))echo $mobile;?>"> 
								<span class="text-danger" id="error2"></span>
							</div>
						</div>
					<!--	
					<div class="col-lg-6">
							<div class="form-group">
								<label for="name">Guest Email (optional):</label> 
								<input type="email" 
									   class="form-control rounded" 
									   id="email"
									   placeholder="Enter Guest Email"
									   name="email" 
									   value=""> 
								<span class="text-danger" id="error3"></span>
							</div>
						</div>
						-->
						<div class="col-lg-12">
							<div class="form-group">
								<label for="name">Guest Address:</label>
								<textarea class="form-control" rows="5" id="details"  name="details" ><?php if(!empty($address))echo $address;?></textarea>
								<span class="text-danger" id="error_details"></span>
							</div>
						</div>
						<div class="col-lg-6">
						<?php if (!empty($_GET['edit_id'])) {?>
							<input type="submit"  class="btn btn-success" name="update"
								value="update event details">
								<?php }else{?> 
							<input type="submit" class="btn btn-success" name="submit"
								value="Add event"><?php }?>
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
			  $("#error1").text("");
			  }

		 if(!$('#mobile').val().match('[0-9]{10}'))  {
               $("#error2").text("Please put 10 digit mobile number");
                 flag=false; 
            }   
		  else{
			  $("#error2").text("");
			  }
		/*	  
		  if($("#email").val()==""){ 
			  $("#error3").text("Enter email");
			  flag=false;  
		  }else{
			  $("#error3").text("");}
		 */
		 
		 if($("#invite").val()==""){ 
			  $("#error4").text("Enter invited person");
			  flag=false;  
		  }else{
			  $("#error4").text("");}
		
		if($("#details").val()==""){ 
			  $("#error_details").text("Enter address");
			  flag=false;  
		  }else{
			  $("#error_details").text("");}

	 	  if(flag==false){event.preventDefault();}
		  
		  });
		  
		  
		  
});


</script>

</body>
</html>