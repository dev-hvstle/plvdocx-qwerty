<?php
    include('security.php');

    $connection = mysqli_connect("localhost","root","","plvdocx_db");


    //sign-up redirect
    if(isset($_POST['signup_btn'])){
        header('Location: register.php');
    }

    //register admin function
    if(isset($_POST['register_btn']))
    {
        $student_id = $_POST['student_id'];
        $student_fn = $_POST['student_fn'];
        $student_mn = $_POST['student_mn'];
        $student_ln = $_POST['student_ln'];
        $student_type = $_POST['student_type'];
        $student_level = $_POST['student_level'];
        $student_username = $_POST['student_username'];
        $student_password = $_POST['student_password'];
        $isActive = 1;
        $student_isMale = 1;

        if($student_password != null)
        {
            $query = "INSERT INTO student_tbl (student_id ,student_fn, student_mn, student_ln, student_type, student_username, student_password, student_level, isActive, student_isMale) 
                      VALUES ('$student_id','$student_fn','$student_mn','$student_ln', '$student_type', '$student_username', '$student_password', '$student_level', '$isActive', '$student_isMale')";
            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                header('Location: loginmain.php');
            }
            else
            {
                $_SESSION['status'] = $student_type;
                header('Location: register.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            header('Location: register.php');
        }
    }

    //update admin account
    if(isset($_POST['update_btn'])){
        $student_id = $_SESSION['student_id'];
        $student_password = $_POST['student_password'];
        $cpassword = $_POST['confirmpassword'];

        $query = "UPDATE student_tbl SET student_password = '$student_password' WHERE student_id = '$student_id' ";
        $query_run = mysqli_query($connection, $query);

        if($student_password === $cpassword){

            if($query_run){
                $_SESSION['success'] = "Your Data is Updated";
                header('Location: accountsettings.php');
            }
            else{
                $_SESSION['status'] = "You Data is NOT Updated";
                header('Location: studentDocs.php');
            }
        }
        else{
            $_SESSION['status'] = "You Data is NOT Updated";
                header('Location: accountsettings.php');
        }
    }


    //delete admin account
    if(isset($_POST['delete_btn'])){
        $employee_id = $_POST['delete_id'];
        $query = "UPDATE employee_tbl SET isActive = 0 WHERE employee_id='$employee_id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "You Data is Deleted";
            header('Location: register.php');
        }
        else{
            $_SESSION['status'] = "You Data is NOT Deleted";
            header('Location: register.php');
        }    
    }

    //login admin account
    if(isset($_POST['login_btn'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

        $username_login = validate($_POST['username']);
        $password_login = validate($_POST['password']);

        $query = "SELECT * FROM student_tbl WHERE student_username='$username_login' AND student_password='$password_login'";
        $query_run = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($query_run);

        if($row){

            $_SESSION['username'] = $username_login;
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['student'] = 1;
            $_SESSION['student_name'] = $row['student_fn'] . " " . $row['student_mn'] . " " . $row['student_ln'];
            $_SESSION['student_username'] = $row['student_username'];
            $_SESSION['student_password'] = $row['student_password'];
            $_SESSION['status'] = null;
            $_SESSION['type'] = null;
            // $_SESSION['id'] = $row['employee_id'];
            // $_SESSION['status'] =  $_SESSION['id'];
            
            header('Location: studentDocs.php');
        }
        else{
            $_SESSION['status'] = 'Email id / Password is Invalid';
            echo "wrong";
            header('Location: studentDocs.php');
        }
    }

    


?>