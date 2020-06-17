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

?>
<?php include_once 'include/header.php';?>
	<body>  
		<?php include 'include/navbar.php';?>
				<div class="container-fluid" id="main">
					<div class="row row-offcanvas row-offcanvas-left">
						<?php include 'include/sidebar.php';?>
						<div class="col main pt-5 mt-3">
							<hr><h1 class="display-4 d-none d-sm-block"> Design Invition card</h1><hr>
						</div>
						<div class="col main pt-5 mt-3" id="editor">
							
						</div>
						
					</div>
<?php include 'include/footer.php';?>

</body>
</html>