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

$tname="event_list";
$table_name="gifts_sent";
$user = new db();
$data = $user->select($tname);

/////////////////////// A D D_____Gifts details //////////////////
if (isset($_POST['submit'])) {
	
	//echo "<script>alert('Heelo submit');</script>";
    if ($_POST['eventname'] == "" 
        || $_POST['name']=="" 
        || $_POST['mob']=="" 
        || $_POST['gift']==""
        || $_POST['details']==""
		) 
    {
	echo '<script type="text/javascript">';
    echo'alert("Please fill all the fields!");';
    echo '</script>';
    }
    else {$error="";
		$con = " AND email  = '{$user_email}'";
		$user_id = $user->select("users", $con);
        $array = array(
            'event_id' => $_POST['eventname'],
			'gift_given_by' => $_POST['name'],
			'mobile' => $_POST['mob'],
			'gift_name' => $_POST['gift'],
			'gift_rupees' => $_POST['gift_rupees'],
			'guest_address' => $_POST['details'],
			'user_id' =>$user_id[0]['id']
        );
		 
		 //echo "<pre>";
       // print_r($array);
		// exit;
        $insert = $user->insertdata($table_name, $array);
       
        if (isset($insert)) {
          
	echo '<script type="text/javascript">';
    echo'alert("Add Details succesfully!");';
    //echo 'window.location.href="http://localhost/event_managment/admin/view_sent_gift.php";';
    echo '</script>';
	
    }
}
}

//////////////////////////////// O N U P D A T E //////////////////////////////////////////


if(isset($_GET['edit_id'])){//check edit button is click or not
$con=" AND id = {$_GET['edit_id']}";
$edit = $user->select($table_name,$con);
$event_id=$edit[0]['event_id'];
$con=" AND event_id= {$edit[0]['event_id']}";
$event_data = $user->select("event_list",$con);
$event_name=$event_data[0]['event_name'];
$guest_name=$edit[0]['gift_given_by'];
$mobile=$edit[0]['mobile'];
$gift=$edit[0]['gift_name'];
$gift_rupees=$edit[0]['gift_rupees'];
$guest_address=$edit[0]['guest_address'];
}

////////////////////////////////////////////////////////////////////////////
if (isset($_POST['update'])) {
   
  $array = array(
            'event_id' => $_POST['eventname'],
			'gift_given_by' => $_POST['name'],
			'mobile' => $_POST['mob'],
			'gift_name' => $_POST['gift'],
			'guest_address' => $_POST['details'],
			'gift_rupees' => $_POST['gift_rupees'],
        );
			$con=" AND id = {$_GET['edit_id']}";
      /*  echo "<pre>";
        print_r($array);
        echo "</pre>";
		exit();*/
	
    $update = $user->update($table_name, $array, $con);
	
  
    if (isset($update)) {
        
	echo '<script type="text/javascript">';
    echo'alert("Update succesfully!");';
    echo 'window.location.href="http://localhost/event_managment/admin/view_sent_gifts.php";';
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
				<?php if (!empty($_GET['edit_id'])){echo "Edit sent Gift";}else{ echo "Add sent Gift";}?></h1>
				<hr><span class="font-weight-bold text-info"><?php if(!empty($error))echo $error;?></span>
				<div class="col-lg-2 ml-auto">
					<a class="nav-link btn btn-outline-light bg-info  border"
						href="view_sent_gifts.php">View Sent Gift</a>
				</div>
				<form class="font-weight-bold" method="POST" id="myForm" action="" autocomplete="on" enctype="multipart/form-data">
					<div class="row">			
						<div class="col-lg-6">
							<div class="form-group">
								<label for="name">Event Name:</label> 
									<select class="form-control" name="eventname" id="eventname">
									<?php if(!(empty($event_name))){
											echo "<option value='{$event_id}'>{$event_name}</option>";
											}
											else{?>
										<option value="">---------- Select Event name ----------</option>
									<?php } foreach($data as $value){?>
									<option value="<?php echo $value['event_id']?>"><?php echo $value['event_name'];?></option>
									<?php }?>
											</select>
								<span class="text-danger" id="error1"></span>
							</div>
						</div>
						
						
					<div class="col-lg-6">
							<div class="form-group">
								<label for="name">Guest Name :</label> 
								<input type="text" 
									   class="form-control rounded" 
									   id="name" 
									   placeholder="Enter Guest Name"
									   name="name" 
									   value="<?php if(!(empty($guest_name))){echo $guest_name;}?>"> 
								<span class="text-danger" id="error3"></span>
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label for="mobile">Mobile number:</label> 
								<input type="number" min="1" 
									   class="form-control rounded" 
									   id="mob" 
									   placeholder="Enter Guest mobile number"
									   name="mob" 
									   value="<?php if(!(empty($mobile))){echo $mobile;}?>"> 
								<span class="text-danger" id="error_mob"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="Giftname">Gift name:</label> 
								<input type="text" 
									   class="form-control rounded" 
									   id="gift" 
									   placeholder="Gift Name"
									   name="gift" 
									   value="<?php if(!(empty($gift))){echo $gift;}?>"> 
								<span class="text-danger" id="error_gift"></span>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label for="Giftrupees">Gift Rupees:</label> 
								<input type="number" min="0"
									   class="form-control rounded" 
									   id="gift_rupees" 
									   placeholder="Gift Rupees"
									   name="gift_rupees" 
									   value="<?php if(!(empty($gift_rupees))){echo $gift_rupees;}else{echo 0;}?>"> 
								<span class="text-danger" id="error_gift_rupees"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="name">Guest Address:</label>
								<textarea class="form-control" rows="5" id="details"  name="details" ><?php if(!(empty($guest_address))){echo $guest_address;}?></textarea>
								<span class="text-danger" id="error_details"></span>
							</div>
						</div>
						<div class="col-lg-6">
						<?php if (!empty($_GET['edit_id'])) {?>
							<input type="submit"	 class="btn btn-success" name="update"
								value="update event details">
								<?php }else{?> 
							<input type="submit" id="submit" class="btn btn-success" name="submit"
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
		  if($("#eventname").val()==""){ 
			  $("#error1").text("Select Event name");
			  flag=false;  
		  }else{
			  $("#error1").text("");}

		 if(!$("#mob").val().match('[0-9]{10}')){ 
			  $("#error_mob").text("Enter valid mobile Number without country code or 0");
			  flag=false;  
		  }else{
			  $("#error_mob").text("");}
			  
		  if($("#name").val()==""){ 
			  $("#error3").text("Enter Guest name");
			  flag=false;  
		  }else{
			  $("#error3").text("");}
		 
		 
		 /*if($("#gift").val()==""){ 
			  $("#error_gift").text("Enter gift name");
			  flag=false;  
		  }else{
			  $("#error_gift").text("");}*/
		
		if($("#details").val()==""){ 
			  $("#error_details").text("Enter  description");
			  flag=false;  
		  }else{
			  $("#error_details").text("");}

	 	  if(flag==false){event.preventDefault();}
		  
		  });
});


</script>

</body>
</html>