<?php 
session_start();
require_once '../path_info.php';
if(isset($_SESSION['admin_user'])){
    //echo $_SESSION['admin_user'];
    unset($_SESSION['admin_user']);
header("location:index.php");
}

?>


