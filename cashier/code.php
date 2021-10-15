<?php
    include('security.php');

    $connection = mysqli_connect("localhost","root","","plvdocx_db");

    //register admin function
    if(isset($_POST['registerbtn_admin']))
    {
        $employee_id = $_POST['employee_id'];
        $employee_fn = $_POST['employee_fn'];
        $employee_mn = $_POST['employee_mn'];
        $employee_ln = $_POST['employee_ln'];
        $employee_type = $_POST['employee_type'];
        $employee_username = $_POST['employee_username'];
        $employee_password = $_POST['employee_password'];
        $cpassword = $_POST['confirmpassword'];
        $usertype = $_POST['employee_type'];
        $isActive = 1;
        $employee_isMale = $_POST['employee_isMale'];

        

        if($employee_password === $cpassword)
        {
            $query = "INSERT INTO employee_tbl (employee_id,employee_fn, employee_mn, employee_ln, employee_type, employee_username, employee_password, isActive, employee_isMale) 
                      VALUES ('$employee_id','$employee_fn','$employee_mn','$employee_ln', '$employee_type', '$employee_username', '$employee_password', '$isActive', '$employee_isMale')";
            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                header('Location: register.php');
            }
            else
            {
                $_SESSION['status'] = "Admin Profile Not Added. Missing Fields or Wrong Input.";
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
    if(isset($_POST['updatebtn'])){
        $employee_id = $_POST['edit_id'];
        $employee_fn = $_POST['employee_fn'];
        $employee_mn = $_POST['employee_mn'];
        $employee_ln = $_POST['employee_ln'];
        $employee_type = $_POST['employee_type'];
        $employee_username = $_POST['employee_username'];
        $employee_password = $_POST['employee_password'];
        $cpassword = $_POST['confirmpassword'];
        $usertype = $_POST['employee_type'];
        $isActive = 1;
        $employee_isMale = $_POST['employee_isMale'];

        $query = "UPDATE employee_tbl SET employee_fn = '$employee_fn', employee_mn = '$employee_mn', 
               employee_ln = '$employee_ln', employee_type = '$employee_type', employee_username = '$employee_username',
               employee_password = '$employee_password', employee_type = '$usertype', isActive = '$isActive', employee_isMale = '$employee_isMale' WHERE employee_id = '$employee_id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "Your Data is Updated";
            header('Location: register.php');
        }
        else{
            $_SESSION['status'] = "You Data is NOT Updated";
            header('Location: register.php');
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

        $query = "SELECT * FROM employee_tbl WHERE employee_username='$username_login' AND employee_password='$password_login'";
        $query_run = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($query_run);

        if($row && $row['employee_type'] == 3){
            
            //$row = mysqli_fetch_assoc($query_run);
            $employee_type = $row['employee_type'];
            $employee_id = $row['employee_id'];

            $_SESSION['username'] = $username_login;
            $_SESSION['id'] = $employee_id;
            $_SESSION['type'] = $employee_type;
            $_SESSION['status'] = null;
            // $_SESSION['id'] = $row['employee_id'];
            // $_SESSION['status'] =  $_SESSION['id'];
            header('Location: index.php');
        }
        else{
            $_SESSION['status'] = 'Email id / Password is Invalid';
            echo "wrong";
            header('Location: index.php');
        }
    }

    


?>