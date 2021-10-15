<?php
    include('security.php');

    $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");

    if(isset($_POST['registerbtn']))
    {
        $student_id = $_POST['student_id'];
        $student_fn = $_POST['student_fn'];
        $student_mn = $_POST['student_mn'];
        $student_ln = $_POST['student_ln'];
        $student_type = $_POST['student_type'];
        $student_level = $_POST['student_level'];
        $student_username = $_POST['student_username'];
        $student_password = $_POST['student_password'];
        $cpassword = $_POST['confirmpassword'];
        $usertype = $_POST['student_type'];
        $isActive = 1;
        $student_isMale = $_POST['student_isMale'];

        //Change it to student tbl
        if($student_password === $cpassword && ($student_id != null && $student_fn != null && $student_mn != null && $student_ln != null && $student_type != null && $student_level != null &&
        $student_username != null && $student_password != null && $student_isMale != null))
        {
            $query = "INSERT INTO student_tbl (student_id,student_fn, student_mn, student_ln, student_type, student_username, student_password, student_level, isActive, student_isMale) 
                      VALUES ('$student_id','$student_fn','$student_mn','$student_ln', '$student_type', '$student_username', '$student_password', '$student_level', '$isActive', '$student_isMale')";
            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Student Profile Added";
                //Change the register.php - student.php
                header('Location: student.php');
            }
            else
            {
                $_SESSION['status'] = "Student Profile NOT Added";
                //Change the register.php - student.php
                header('Location: student.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Missing Fields or Password does not match";
            //Change the register.php - student.php
            header('Location: student.php');
        }
    }
    if(isset($_POST['updatebtn'])){
        $student_id = $_POST['student_id'];
        $student_fn = $_POST['student_fn'];
        $student_mn = $_POST['student_mn'];
        $student_ln = $_POST['student_ln'];
        $student_type = $_POST['student_type'];
        $student_level = $_POST['student_level'];
        $student_username = $_POST['student_username'];
        $student_password = $_POST['student_password'];
        $cpassword = $_POST['confirmpassword'];
        $isActive = 1;
        $student_isMale = $_POST['student_isMale'];


        if($student_password === $cpassword && ($student_id != null && $student_fn != null && $student_mn != null && $student_ln != null && $student_type != null && $student_level != null &&
            $student_username != null && $student_password != null && $student_isMale != null)){
            $query = "UPDATE student_tbl SET student_id='$student_id', student_fn='$student_fn', student_mn='$student_mn',
                    student_ln = '$student_ln', student_type = '$student_type', student_level = '$student_level',
                    student_username = '$student_username', student_password = '$student_password', isActive = '$isActive',
                    student_isMale = '$student_isMale' WHERE student_id='$student_id' ";
            $query_run = mysqli_query($connection, $query);

            if($query_run){
                $_SESSION['success'] = "Your Data is Updated";
                //Change the register.php - student.php
                header('Location: student.php');
            }
            else{
                $_SESSION['status'] = "Your Data is NOT Updated";
                //Change the register.php - student.php
                header('Location: student.php');
            }
        }
        else{
            $_SESSION['status'] = "Missing Fields or Password does not match";
            //Change the register.php - student.php
            header('Location: student.php');
        }
    }

    if(isset($_POST['delete_btn'])){
        $student_id = $_POST['delete_id'];
        $query = "UPDATE student_tbl SET isActive=0 WHERE student_id='$student_id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location: student.php');
        }
        else{
            $_SESSION['status'] = "Your Data is NOT Deleted";
            header('Location: student.php');
        }    
    }


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

        if(mysqli_fetch_array($query_run)){
            $_SESSION['username'] = $username_login;
            header('Location: index.php');
        }
        else{
            $_SESSION['status'] = 'Email id / Password is Invalid';
            echo "wrong";
            header('Location: index.php');
        }
    }

    


?>