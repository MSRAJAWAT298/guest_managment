<?php 

 /*   ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
  */
require_once '../path_info.php';
require_once 'include/db.php';
session_start();
  if(isset($_SESSION['admin_user'])){
    header("location:dasboard.php");
}else{
          
if(isset($_POST['submit'])){
    if($_POST['username']=="" || $_POST['password']==""){
        $error="please enter username and password";
    }elseif(($_SESSION['admin_user'])){
       // $_SESSION['admin'] = $_POST['username'];
		 header("Location:dasboard.php");
        } else {
             $username=$_POST['username'];
             $password=$_POST['password'];
		    $con=" AND username = '{$username}' AND password = '{$password}'";
            $user = new db();
            $admin=$user->select("admin",$con);
			 /*echo "<pre>";
			 print_r($admin);
			 echo count($admin);
			 exit;*/
            if(count($admin)){
             $_SESSION['admin_user']=$username;
			 
             if (! empty($_POST["checkbox"])) {
                 setcookie("username", $username, time() + 60 * 60 * 24 * 7);
                 setcookie("password", $password, time() + 60 * 60 * 24 * 7);
                 setcookie("checkbox", $_POST["checkbox"], time() + 60 * 60 * 24 * 7);
//                  echo "Cookies Set Successfully";
                 header("Location:dasboard.php");
             } else {
                 setcookie("username", "");
                 setcookie("password", "");
                 setcookie("checkbox", "");
//                  echo "Cookies Not Set";
                header("Location:dasboard.php");
             }
            }else{
                $error="<font color='red'> Username or password wrong! try again....</font><br/>";
            }
    }      
}

}

?>

<?php require_once 'include/header.php';?>

  <body class="text-center">
  <?php  require_once 'include/navbar.php';?>

    <form class="form-signin mt-5 pt-4" action="" method="POST">      <span class="m-2 p-2"><?php 
		if(isset($error)){echo $error;}?></span>
    
      <img class="mb-4" src="https://greenpathcr.com/wp-content/uploads/2019/09/user_circle_1048392.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal"> Login Here</h1>
      <label for="inputEmail" class="sr-only">Enter Username</label>
      <input type="text" id="inputUsername" class="form-control" placeholder="Enter Username" name="username" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; }?>" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; }?>" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="checkbox" <?php if(isset($_COOKIE['checkbox'])) { echo "checked"; }?> value="1"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Sign in">Sign in</button>
      <button class="btn btn-lg btn-info btn-block" type="submit">Forget Password</button>
	    <a href="signup.php">  <button class="btn btn-lg btn-primary btn-block mt-2" type="button">Signup Here</button></a>
    </form>
	
  </body>
<?php require_once 'include/footer.php';?>