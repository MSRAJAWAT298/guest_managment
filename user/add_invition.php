<?php
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

$tname="invition";
$user = new db();
/////////////////////// A D D______events //////////////////
if (isset($_POST['submit'])) {
	
	//echo "<script>alert('Heelo submit');</script>";
    if ($_POST['eventname'] == "" 
        || $_POST['date']=="" 
        || $_POST['details']==""
		|| $_POST['mob']==""
		) 
    {
        $error = "please fill the all fields<br><hr>";
    }
    else 
	{
		$error="";
		$con = " AND email  = '{$user_email}'";
		$user_id = $user->select("users", $con);
			//print_r($user_id);exit;
        	$array = array(
            'event_name' => $_POST['eventname'],
			'date' => $_POST['date'],
			'address'=>$_POST['details'],
			'mobile'=>$_POST['mob'],
			'guest_name'=>$_POST['name'],
			'user_id' =>$user_id[0]['id']
        );
			 
		//print_r($array);exit;
        $insert = $user->insertdata($tname, $array);
		//echo $insert;exit;
        if (isset($insert)) {  
			echo '<script type="text/javascript">';
			echo'alert("Add event succesfully!");';
			//echo 'window.location.href="http://localhost/event_managment/admin/view_invition.php";';
			echo '</script>';
	
		}
	}
}
/////////////// O N U P D A T E //////////////////////

if(isset($_GET['edit_id'])){//check edit button is click or not
$con=" AND id = {$_GET['edit_id']}";
$edit = $user->select($tname,$con);
$id=$edit[0]['id'];
$date=$edit[0]['date'];
$event_name=$edit[0]['event_name'];
$name=$edit[0]['guest_name'];
$event_desc=$edit[0]['address'];
$mob=$edit[0]['mobile'];

}

////////////////////////////////////////////////////////////////////////////
if (isset($_POST['update'])) {
  	$array = array(
            'event_name' => $_POST['eventname'],
			'date' => $_POST['date'],
			'address'=>$_POST['details'],
			'mobile'=>$_POST['mob'],
			'guest_name'=>$_POST['name'],
        );
		$con=" AND id = {$id}";
		/*
		echo "<pre>";
        print_r($array);
        echo "</pre>";
		exit();
	*/
    $update = $user->update($tname, $array, $con);
    if (isset($update)) {
	echo '<script type="text/javascript">';
    echo'alert("Update succesfully!");';
    echo 'window.location.href="http://localhost/event_managment/admin/view_invition.php";';
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
				<h1 class="display-4 d-none d-sm-block">
				<?php if (!empty($_GET['edit_id'])){echo "Edit invition";}else{ echo "Add invition";}?></h1>
				<hr><span class="font-weight-bold text-info"><?php if(!empty($error))echo $error;?></span>
				<div class="col-lg-2 ml-auto">
					<a class="nav-link btn btn-outline-light bg-info  border"
						href="view_invition.php">View all events</a>
				</div>
				<form class="font-weight-bold mt-4 " method="POST" id="myForm" action="" autocomplete="on" enctype="multipart/form-data">
					<div class="row">			
						<div class="col-lg-6">
							<div class="form-group">
								<label for="name">Event Name:</label> 
								<input type="text"
									   class="form-control rounded" 
									   id="bname" 
									   placeholder="Enter event Name"
									   name="eventname" 
									   value="<?php if(!empty($event_name))echo $event_name;?>"> 
								<span class="text-danger" id="error1"></span>
							</div>
						</div>
					<div class="col-lg-6">
							<div class="form-group">
								<label for="name">Guest Name:</label> 
								<input type="text"
									   class="form-control rounded" 
									   id="name" 
									   placeholder="Enter Guest Name"
									   name="name" 
									   value="<?php if(!empty($name))echo $name;?>"> 
								<span class="text-danger" id="errorname"></span>
							</div>
						</div>	
					<div class="col-lg-6">
							<div class="form-group">
								<label for="date">Event Date:</label> 
								<input type="date" 
									   class="form-control rounded" 
									   id="date" 
									   placeholder="Enter Event date"
									   name="date" 
									   value="<?php if(!empty($date))echo $date;?>"> 
								<span class="text-danger" id="error2"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group ">
								<label for="mobile">Guest Mobile:</label> 
								<input type="number" 
									   class="form-control rounded" 
									   id="mob" 
									   placeholder="Enter Guest Mobile number"
									   name="mob" 
									   value="<?php if(!empty($mob))echo $mob;?>"> 
								<span class="text-danger" id="error_mob"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="address">Events Address:</label>
								<textarea class="form-control" rows="5" 
								id="desc"  name="details" ><?php if(!empty($event_desc))echo $event_desc;?></textarea>
								<span class="text-danger" id="error_details"></span>
							</div>
						</div>
						<div class="col-lg-12">
						<?php if (!empty($_GET['edit_id'])) {?>
							<input type="submit"	 class="btn btn-success" name="update"
								value="update Invition details">
								<?php }else{?> 
							<input type="submit" id="submit" class="btn btn-success" name="submit"
								value="Add Invition"><?php }?>
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
			  $("#error1").text("Enter Event name");
			  flag=false;  
		  }else{
			  $("#error1").text("");}
		
		  if($("#name").val()==""){ 
			  $("#errorname").text("Enter Guest name");
			  flag=false;  
		  }else{
			  $("#errorname").text("");}

		 if($("#date").val()==""){ 
			  $("#error2").text("Enter event date ");
			  flag=false;  
		  }else{
			  $("#error2").text("");}
			  
		if(!$("#mob").val().match('[0-9]{10}')){ 
			  $("#error_mob").text("Enter mobile mobile number ");
			  flag=false;  
		  }else{
			  $("#error_mob").text("");}	
		
		
		 if($("#desc").val()==""){ 
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