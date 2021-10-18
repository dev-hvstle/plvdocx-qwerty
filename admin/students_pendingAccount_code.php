<?php

    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include('security.php');
    

    $connection = mysqli_connect("localhost","root","","plvdocx_db");

    //update task status
    if(isset($_POST['verify_btn'])){
        $mail = new PHPMailer();
        $subject = "Account Verification";

        $student_id = $_POST['student_id'];
        $student_email = $_POST['student_email'];
        $student_name = $_POST['student_name'];

        //smtp settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "hodl.kiddo@gmail.com";
        $mail->Password = '@Hodlkiddo18';
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";

        //mail settings
        $mail->isHTML(true);
        $mail->setFrom("hodl.kiddo@gmail.com");
        $mail->addAddress($student_email, $student_name);
        $mail->Subject = ($subject);
        $mail->Body = "Greetings" . " " . $student_name .  ",<br>" . "Your Account for PLVDOCX has been successfully verified! You can now use your credentials to log on to your account.";

        $mail->smtpClose();

        $query = "UPDATE student_tbl
                    SET isActive = 1
                    WHERE student_id = '$student_id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            if($mail->send()){
                $_SESSION['success'] = "Student Successfully Verified";
                header('Location: students_pendingAccount.php');
            }
            else{
                $_SESSION['status'] = "There was a problem with sendin verification email! But Student Was successfully verified.";
            }
        }
        else{
            $_SESSION['status'] = "There was a problem verifying the student";
            header('Location: students_pendingAccount.php');
        }
    }

    if(isset($_POST['test_btn'])){

        $email = "theveyst12@gmail.com";
        $name = "Harvey";
        $subject = "testing";

        $mail = new PHPMailer();

        //smtp settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "hodl.kiddo@gmail.com";
        $mail->Password = '@Hodlkiddo18';
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";

         //mail settings
         $mail->isHTML(true);
         $mail->setFrom("hodl.kiddo@gmail.com");
         $mail->addAddress($email, $name);
         $mail->Subject = ($subject);
         $mail->Body = "Greetings " . $name .  ",<br>" . "Your Account for PLVDOCX has been successfully verified!<br>You can now use your credentials to log on to your account.";

        if($mail->send()){
            echo "send email success";
        }
        else{
            echo "send email fail";
        }

        $mail->smtpClose();
    }
?>