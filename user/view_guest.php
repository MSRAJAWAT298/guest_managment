<?php

/*
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */
 
session_start();
require_once '../path_info.php';
if(isset($_SESSION['admin'])){
    $user_email= $_SESSION['admin'];
}else{
    header("location:index.php");
}

require_once 'include/db.php';  
$tname = "guest";
$user = new db();
$con = " AND email  = '{$user_email}'";
$user_id = $user->select("users", $con);
$con=" AND user_id= {$user_id[0]['id']}";
$data = $user->select($tname,$con);
//////////////////////Delete Function/////////////////////
if (isset($_POST['id'])) {
	//echo '<script>alert("hello");</script>';
     $id = $_POST['id'];
	 $condtion = array('id' => $id);
     $data=$user->delete("guest", $condtion);
	 echo $data;
	 exit;
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
				<h1 class="display-4 d-none d-sm-block">View All Guests</h1>
				<hr><span class="font-weight-bold text-info">
                        <div class="card mb-4">
                            <div class="card-header">Guests Details
							<a href="add_guest.php"><button class="btn btn-success float-right">Add Guest Details</button></a>
       			
							</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
			   <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Guest id #</th>
        <th>Guest Name</th>
		<th>Mobile</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php 
	foreach($data as $v){ ?>
      <tr>
	<td><?php echo $v['id'];?></td>
        <td><?php echo $v['name'];?></td>	
        <td><?php echo $v['mobile'];?></td>	
		 <td><?php echo $v['address'];?></td>	

		<td><a href="add_guest.php?edit_id=<?php echo $v['id'];?>" 
		       title="add_guest.php?edit_id=<?php echo $v['id'];?>"> 
			   <button class='edit btn btn-info' id='edit_<?php echo $v['id']; ?>'>Edit
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
			| <button class='delete btn btn-danger' id='del_<?php echo $v['id']; ?>'>Delete
			<i class="fa fa-trash" aria-hidden="true"></i></button></td>
		</tr> 
	<?php }?>
      </tr>
    </tbody>
  </table>
			 </div>
			 </div>
			 </div>
			 </div>
			 </div>
			
			 
			<div id="result"></div>
		</div>
	</div>
<?php include 'include/footer.php';?>

<script>
///////////////////////////////////////////////////////////////////////////////
//////////// J Q U E R Y F U N C T I O N S////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){
	
//search function//
    $("#search").on('change',function(){   
        var name = $(this).val();
// 	     alert(name);  
//     $("#text-div").text(name);
		 	$.ajax({
		    	url: "view_guest.php", 
		    	type:"POST",
		    	data:{search:name},
		    	success: function(result){
	        	$("tbody").html(result);
// 	 	    		alert("Ajax"+result);
	      }});
	    
    });//end serch function
        
	
 // Delete  function
 $('.delete').click(function(){
   var el = this;
   var id = this.id;
   var splitid = id.split("_");

   // Delete id
   var deleteid = splitid[1];
   
   var del =confirm("Are you sure! you want to delete");
   if(del){
   // AJAX Request
   $.ajax({
     url: "view_guest.php",
     type: "POST",
     data: {id:deleteid},
     success: function(response){
		 alert(response);
				window.location.href = "view_guest.php";
    }
   });
   }
 });

		
});

</script>
</body>
</html>