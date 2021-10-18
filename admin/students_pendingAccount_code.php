<?php
    include('security.php');

    $connection = mysqli_connect("localhost","root","","plvdocx_db");

    //update task status
    if(isset($_POST['verify_btn'])){
        $student_id = $_POST['student_id'];

        $query = "UPDATE student_tbl
                    SET isActive = 1
                    WHERE student_id = '$student_id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "Student Successfully Verified";
            header('Location: students_pendingAccount.php');
        }
        else{
            $_SESSION['status'] = "There was a problem verifying the student";
            header('Location: students_pendingAccount.php');
        }
    }
?>