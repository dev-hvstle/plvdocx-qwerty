<?php
session_start();
include('database/dbconfig.php');

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}

if(!$_SESSION['username']){
    header('Location: loginmain.php');
}

if($_SESSION['type']){
    if(!$_SESSION['status'] && !$_SESSION['type'] == 3){
        header('Location: ../cashier/index.php');
    }
    
    if(!$_SESSION['status'] && !$_SESSION['type'] != 3){
        header('Location: ../admin/index.php');
    }
}
?>