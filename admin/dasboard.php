<?php
/*
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */
// Start the session
session_start();
require_once '../path_info.php';
if(isset($_SESSION['admin_user'])){
    $user_email= $_SESSION['admin_user'];
}else{
    header("location:index.php");
}


require_once 'include/db.php';
$data=new db();// OBJECT 
$conditon =" AND email='{$user_email}'";
$user=$data->select("users");
?>
<?php include_once 'include/header.php';?>
<body>  
<?php include 'include/navbar.php';?>
<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
<?php include 'include/sidebar.php';?>
 <div class="col main pt-5 mt-3">
            <h1 class="display-4 d-none d-sm-block">
             Hello Welcome :  <?php echo $user[0]['name'];?>
            </h1>
            <!-- <p class="lead d-none d-sm-block">Plus off-canvas sidebar, based on Bootstrap v4</p>
            <div class="alert alert-warning fade collapse" role="alert" id="myAlert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Holy guacamole!</strong> It's free.. this is an example theme.
            </div> -->
            <div class="row mb-3">
			
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
					<a class="text-white" href="view_users.php" style="text-decoration: none;">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <i class="fa fa-users fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Total Register users</h6>
                            <h1 class="display-4"><?php echo count($user);?></h1>
                        </div>
                    </div>
					</a>
                </div>
            </div>
            <!--/row-->

            <hr>
</div></div></div>
<?php include 'include/footer.php';?>
</body>
</html>