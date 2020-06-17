<?php 

 /*   ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
  */
require_once '../path_info.php';
require_once 'include/db.php';
session_start();
  if(isset($_SESSION['admin'])){
    header("location:dasboard.php");
}else{
          
if(isset($_POST['submit'])){
    if($_POST['username']=="" || $_POST['password']==""){
        $error="please enter username and password";
    }elseif(($_SESSION['admin'])){
       // $_SESSION['admin'] = $_POST['username'];
		 header("Location:dasboard.php");
        } else {
             $username=$_POST['username'];
             $password=$_POST['password'];
		    $con=" AND email = '{$username}' AND password = '{$password}'";
            $user = new db();
            $admin=$user->select("users",$con);
			 /*echo "<pre>";
			 print_r($admin);
			 echo count($admin);
			 exit;*/
            if(count($admin)){
             $_SESSION['admin']=$username;
			 
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
	<div class=" add-to"><button class="btn btn-lg btn-info add-to-btn">Add to home screen</button></div>

<script type="text/javascript">
	if ('serviceWorker' in navigator) {
	  window.addEventListener('load', function() {
	    navigator.serviceWorker.register('../js/sw.js').then(function(registration) {
	      // Registration was successful
	      console.log('ServiceWorker registration successful with scope: ', registration.scope);
	    }, function(err) {
	      // registration failed :(
	      console.log('ServiceWorker registration failed: ', err);
	    });
	  });
	}

	let deferredPrompt;
	var div = document.querySelector('.add-to');
	var button = document.querySelector('.add-to-btn');
	div.style.display = 'none';

	window.addEventListener('beforeinstallprompt', (e) => {
	  // Prevent Chrome 67 and earlier from automatically showing the prompt
	  e.preventDefault();
	  // Stash the event so it can be triggered later.
	  deferredPrompt = e;
	  div.style.display = 'block';

	  button.addEventListener('click', (e) => {
	  // hide our user interface that shows our A2HS button
	  div.style.display = 'none';
	  // Show the prompt
	  deferredPrompt.prompt();
	  // Wait for the user to respond to the prompt
	  deferredPrompt.userChoice
	    .then((choiceResult) => {
	      if (choiceResult.outcome === 'accepted') {
	        console.log('User accepted the A2HS prompt');
	      } else {
	        console.log('User dismissed the A2HS prompt');
	      }
	      deferredPrompt = null;
	    });
	});
	});

</script>
 
<?php require_once 'include/footer.php';?>
 </body>
