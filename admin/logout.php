<?php 
session_start();

if(isset($_POST['logout_btn'])){
    session_destroy();
    session_unset();
    header('Location: loginmain.php');
}
?>