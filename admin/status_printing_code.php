<?php
    include('security.php');

    $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");

    //update task status
    if(isset($_POST['done_btn'])){
        $transactionDetailed_id = $_POST['transactionDetailed_id'];
        $transaction_status = 4;
        $student_id = $_POST['student_id'];
        $requested_document = $_POST['document_name'];
        $notification_description = "Your requested document " . "(" . $requested_document . ")" . " is now being stamped";
        $date = date("Y/m/d");
        
        $query = "UPDATE transactiondetailed_tbl 
                SET transaction_status = '$transaction_status' 
                WHERE transactionDetailed_id = '$transactionDetailed_id'; ";
        $query .= "INSERT INTO notificationstudent_tbl(student_id, notificationStudent_description, notificationStudent_isSeen, notificationStudent_date)
        VALUES ('$student_id', '$notification_description', 0, '$date');"
    ;

        $query_run = mysqli_multi_query($connection, $query);
        mysqli_next_result($connection);


        if($query_run){
            $_SESSION['success'] = "Task successfully completed!";
            header('Location: status_printing.php');
        }
        else{
            $_SESSION['status'] = "Task cannot be completed!";
            header('Location: status_printing.php');
        }
    }
?>