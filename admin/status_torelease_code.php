<?php
    include('security.php');

    $connection = mysqli_connect("localhost","root","","plvdocx_db");

    //update task status
    if(isset($_POST['done_btn'])){
        $transactionDetailed_id = $_POST['transactionDetailed_id'];
        $transaction_status = 7;
        
        $query = "UPDATE transactiondetailed_tbl 
                SET transaction_status = '$transaction_status' 
                WHERE transactionDetailed_id = '$transactionDetailed_id'; ";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "Task successfully completed!";
            header('Location: status_torelease.php');
        }
        else{
            $_SESSION['status'] = "Task cannot be completed!";
            header('Location: status_torelease.php');
        }
    }
?>