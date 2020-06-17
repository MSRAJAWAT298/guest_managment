<?php 

 /*   ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
  */
require_once '../path_info.php';
require_once 'include/db.php';
if(isset($_POST['submit'])){
	if($_POST['name']=="" 
	   || $_POST['email']==""
	   || $_POST['mobile']==""
	   || $_POST['password']==""
      )
	  {
		  echo "signup from not submited";
	}
   else{
	    $array = array(
            'name' => $_POST['name'],
			'email' => $_POST['email'],
			'mobile' => $_POST['mobile'],
            'password' => $_POST['password']
        );
		
		$user = new db();
		$con=" AND email='{$_POST['email']}' OR mobile={$_POST['mobile']}";
		$duplicate=$user->select("users",$con);
		/*echo "<pre>";
		print_r($duplicate);
		print_r($array);
		exit;*/	
		$msg="";
		if(count($duplicate)>0){
			if($duplicate[0]['email']==$_POST['email'])
			{
				$msg="Email ";
			}if($duplicate[0]['mobile']==$_POST['mobile'])
			{
				$msg.=" Mobile number ";
			}
			$msg.="already register!";
			echo '<script type="text/javascript">alert("'.$msg.'"); window.location.href="index.php";</script>';
		}
else{		
    $insert = $user->insertdata("users", $array);
	echo '<script type="text/javascript">';
	echo'alert("you are succesfully signup!");';
	echo 'window.location.href="index.php";';
    echo '</script>';
	}
}
   exit;
}

?>

<?php require_once 'include/header.php';?>

  <body class="text-center">
  <?php  require_once 'include/navbar.php';?>

    <form class="form-signin mt-5 pt-4" action="" method="POST">      <span class="m-2 p-2"><?php 
		if(isset($error)){echo $error;}?></span>
    
      <img class="mb-4" src="https://greenpathcr.com/wp-content/uploads/2019/09/user_circle_1048392.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal"> Signup Here</h1>
      <label for="inputName" class="sr-only">Enter Full name</label>
      <input type="text" id="name" class="form-control" placeholder="Enter Full name" name="name"  required autofocus>
	  
	  <label for="inputEmail" class="sr-only">
	  Enter Email <span>email id is your username</span></label>
      <input type="email" id="email" class="form-control" placeholder="Enter your email " name="email" attern=".+@globex.com" size="30" required autofocus>
	  
	  <label for="inputPhone" class="sr-only">Enter Mobile number</label>
      <input type="tel"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="mob" class="form-control" placeholder="Enter Mobile number" name="mobile"  required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" class="form-control" placeholder="Password"  name="password"  required>
     
      <button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Sign up">Sign up</button>
     
    </form>
	
  </body>
<?php require_once 'include/footer.php';?>
