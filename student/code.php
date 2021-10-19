<?php
    include('security.php');

    $connection = mysqli_connect("localhost","root","","plvdocx_db");

    //sign-up redirect
    if(isset($_POST['signup_btn'])){
        header('Location: register.php');
    }

    //register student function
    if(isset($_POST['register_btn']))
    {
        $student_id = $_POST['student_id'];
        $student_fn = $_POST['student_fn'];
        $student_mn = $_POST['student_mn'];
        $student_ln = $_POST['student_ln'];
        $student_type = $_POST['student_type'];
        $student_email = $_POST['student_email'];
        $student_level = $_POST['student_level'];
        $student_username = $_POST['student_username'];
        $student_password = $_POST['student_password'];
        $confirm_password = $_POST['confirm_password'];
        $isActive = 0;
        $student_isMale = 1;
        $pattern = '/[\\\\\.\+\*\?\^\$\[\]\(\)\{\}\/\'\#\:\!\=\|]/';

        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpeg','jpg','png');

        //checks for student id, name, password, and email
        if($student_id === "" || $student_fn === "" || $student_ln === "" || $student_username === "" || $student_password === "" || $student_email === ""){
            $_SESSION['status'] = "Some Fields Are Missing.";
            header('Location: register.php');
        }
        //checks for student type and level
        else if($student_type == "studenttype" || $student_level == "studentlevel"){
            $_SESSION['status'] = "Student Type or Student Level isn't correctly set";
            header('Location: register.php');
        }
        //checks for student ID
        else if(strlen((string)$student_id) < 6){
            $_SESSION['status'] = "Student ID is not valid";
            header('Location: register.php');
        }
        //checks if passwords matches
        else if(preg_match($pattern, $student_password) && preg_match($pattern, $student_username)){
            $_SESSION['status'] = "Special Characters Aren't Allowed";
            header('Location: register.php');
        }
        //check image extension
        else if(!(in_array($fileActualExt, $allowed))){
            $_SESSION['status'] = "Uploaded invalid file type.";
            header('Location: register.php');
        }
        else if($fileError !== 0){
            $_SESSION['status'] = "There was an error when uploading the image";
            header('Location: register.php');
        }
        //commits student data to database
        else{
            if($student_password === $confirm_password && $student_password != null && $confirm_password != null)
            {
                $photoName = uniqid('',true).".".$fileActualExt;
                $photoDestination = 'photos/'.$photoName;
                

                $query = "INSERT INTO student_tbl (student_id ,student_fn, student_mn, student_ln, student_type, student_email, student_username, student_password, student_level, student_photo, isActive, student_isMale) 
                          VALUES ('$student_id','$student_fn','$student_mn','$student_ln', '$student_type', '$student_email', '$student_username', '$student_password', '$student_level', '$photoDestination', '$isActive', '$student_isMale')";
                $query_run = mysqli_query($connection, $query);
    
                if($query_run)
                {
                    // echo "Saved";
                    move_uploaded_file($fileTmpName, $photoDestination);
                    $_SESSION['success'] = "Register Successful, account is now to be processed!";
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
    }

    //update student account
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

    //delete document request
    if(isset($_POST['delete_btn'])){
        $transaction_id = $_POST['delete_id'];
        $query = "UPDATE transactionmaster_tbl SET isCancelled = 1 WHERE transaction_id='$transaction_id' ;";
        $query .= "UPDATE transactiondetailed_tbl SET transaction_status = 9 WHERE transactionMaster_id = '$transaction_id';";
        $query_run = mysqli_multi_query($connection, $query);
        mysqli_next_result($connection);

        if($query_run){
            $_SESSION['success'] = "You Data is Deleted";
            header('Location: register.php');
        }
        else{
            $_SESSION['status'] = "You Data is NOT Deleted";
            header('Location: register.php');
        }    
    }

    //login student account

    if(isset($_POST['login_btn'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

        $pattern = '/[\\\\\.\+\*\?\^\$\[\]\(\)\{\}\/\'\#\:\!\=\|]/';
        $username_login = validate($_POST['username']);
        $password_login = validate($_POST['password']);
        $_SESSION['match'] = 0;

        

        $query = "SELECT * FROM student_tbl WHERE student_username='$username_login' AND student_password='$password_login'";
        $query_run = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($query_run);

        var_dump(preg_match($patter, $password_login));

        if(preg_match($pattern, $username_login) === 0 || preg_match($pattern, $password_login) === 0){
            if($row){

                $_SESSION['username'] = $username_login;
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['student'] = 1;
                $_SESSION['student_name'] = $row['student_fn'] . " " . $row['student_mn'] . " " . $row['student_ln'];
                $_SESSION['student_username'] = $row['student_username'];
                $_SESSION['student_password'] = $row['student_password'];
                $_SESSION['student_email'] = $row['student_email'];
                $_SESSION['status'] = null;
                $_SESSION['type'] = null;
                // $_SESSION['id'] = $row['employee_id'];
                // $_SESSION['status'] =  $_SESSION['id'];
                $_SESSION['cart_data'] = array();
                header('Location: studentDocs.php');
            }
            else{
                $_SESSION['status'] = "Email id / Password is Invalid";
                header('Location: studentDocs.php');
            }
        }
        else{
            $_SESSION['match'] = preg_match($patter, $password_login);
            $_SESSION['status'] = "Email id / Password is Invalid";
            header('Location: studentDocs.php');
        }
    }

    if(isset($_POST['buy_btn'])){
        if($_POST['document_copies'] == 0){
            header('Location: studentDocs.php');
        }
        $docx_name = $_POST['document_name'];
        $docx_pages = $_POST['document_pages'];
        $docx_price = $_POST['document_price'];
        $docx_copies = $_POST['document_copies'];
        $docx_totalPrice = $docx_price * $docx_copies;
        $student_id = $_SESSION['student_id'];
        $date = date("Y/m/d");

        $query_insertMaster = "INSERT INTO transactionmaster_tbl (student_id, amount_total, transaction_date) 
                    VALUES ('$student_id', '$docx_totalPrice', '$date')";
        $query_select = "SELECT * FROM transactionmaster_tbl ORDER BY transaction_id DESC";

        $query_run = mysqli_query($connection, $query_insertMaster);
        $query_run2 = mysqli_query($connection, $query_select);
        $row = mysqli_fetch_assoc($query_run2);

        $transaction_id = $row['transaction_id'];
        $document_id = $_POST['document_id'];

        $query_insertDetailed = "INSERT INTO transactiondetailed_tbl (transactionMaster_id, document_id, document_quantity, document_pages, document_pricePerPage, document_subtotal, transaction_status)
                    VALUES ('$transaction_id', '$document_id', '$docx_copies', '$docx_pages', '$docx_price', '$docx_totalPrice', 1)";
        $query_run2 = mysqli_query($connection, $query_insertDetailed);

        if($query_run2){
            $_SESSION['success'] = "Bought sucessfully!";
            header('Location: studentDocs.php');
        }
        else{
            $_SESSION['success'] = "Buy not success!";
            //header('Location: studentDocs.php');
        }
    }

    if(isset($_POST['add_btn'])){
        $docx_name = $_POST['document_name'];
        $docx_pages = $_POST['document_pages'];
        $docx_price = $_POST['document_price'];
        $docx_copies = $_POST['document_copies'];
        $docx_totalPrice = $docx_price * $docx_copies;
        $docx_id = $_POST['document_id'];

        $temp_data = array($docx_name, $docx_pages, $docx_price, $docx_copies, $docx_totalPrice, $docx_id);
        array_push($_SESSION['cart_data'], $temp_data);
        //var_dump($_SESSION['cart_data']);
        header('Location: studentDocs.php');
    }

    if(isset($_POST['checkOut_btn'])){

        $student_id = $_SESSION['student_id'];
        $docx_totalPrice = 0;
        $date = date("Y/m/d");

        for($row = 0; $row < count($_SESSION['cart_data']); $row++){
            $docx_totalPrice += $_SESSION['cart_data'][$row][4];
        }

        $query_insertMaster = "INSERT INTO transactionmaster_tbl (student_id, amount_total, transaction_date) 
        VALUES ('$student_id', '$docx_totalPrice', '$date')";
        $query_select = "SELECT * FROM transactionmaster_tbl ORDER BY transaction_id DESC";

        $query_run = mysqli_query($connection, $query_insertMaster);
        $query_run2 = mysqli_query($connection, $query_select);
        $row = mysqli_fetch_assoc($query_run2);

        $transaction_id = $row['transaction_id'];

        for($row = 0; $row < count($_SESSION['cart_data']); $row++){
            $document_id = $_SESSION['cart_data'][$row][5];
            $docx_copies = $_SESSION['cart_data'][$row][3];
            $docx_pages = $_SESSION['cart_data'][$row][1];
            $docx_totalPrice = $_SESSION['cart_data'][$row][4];
            $docx_price = $_SESSION['cart_data'][$row][2];
            $query_insertDetailed = "INSERT INTO transactiondetailed_tbl (transactionMaster_id, document_id, document_quantity, document_pages, document_pricePerPage, document_subtotal, transaction_status)
            VALUES ('$transaction_id', '$document_id', '$docx_copies', '$docx_pages', '$docx_totalPrice', '$docx_price', 1)";
            $query_run2 = mysqli_query($connection, $query_insertDetailed);
        }

        unset($_SESSION['cart_data']);
        $_SESSION['cart_data'] = array();
        header('Location: studentDocs.php');
    }

    if(isset($_POST['test_btn'])){
        $email = $_POST['student_email'];
        $api_key = "b20994827ee8457eb0b5dc889c43aacd";
        $ch= curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL=>"https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true
        ]);

        $response = curl_exec($ch);

        curl_close($ch);

        $data = json_encode($response, true);
    }
?>