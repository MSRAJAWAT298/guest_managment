<?php 
session_start();
require_once '../path_info.php';
if(isset($_SESSION['admin'])){
    //echo $_SESSION['admin'];
    unset($_SESSION['admin']);
header("location:index.php");
}

?>


