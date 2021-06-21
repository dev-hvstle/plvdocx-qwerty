<?php 
    session_start();
    $_SESSION['status'] = "";
    header('Location: ../studentDocs.php');
?>