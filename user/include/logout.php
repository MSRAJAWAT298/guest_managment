<?php 

if(isset($_SESSION['usrlogin'])){
    echo $_SESSION['usrlogin'];
    unset($_SESSION['usrlogin']);
    header("location:http://mayankkushwah.opsusers71.com/training/erms/admin");
}

?>