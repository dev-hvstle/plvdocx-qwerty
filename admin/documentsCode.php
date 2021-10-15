<?php
    include('security.php');

    $connection = mysqli_connect("localhost","root","","plvdocx_db");

    //register admin function
    if(isset($_POST['add_document']))
    {
        //documents 
        // $document_id = $_POST['document_id'];
        $document_name = $_POST['document_name'];
        $document_pricePerPageInPhp = $_POST['document_pricePerPageInPhp'];
        $document_pages = $_POST['document_pages'];

        
        // documents tbl
        $query = "INSERT INTO document_tbl (document_name, document_pricePerPageInPhp, document_pages) 
                    VALUES ('$document_name', '$document_pricePerPageInPhp', '$document_pages')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            // echo "Saved";
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: documents.php');
        }
        else
        {
            $_SESSION['status'] = "Admin Profile Not Added. Missing Fields or Wrong Input.";
            header('Location: documents.php');
        }
    }

    //update admin account
    if(isset($_POST['updatebtn'])){
        $document_id = $_POST['document_id'];
        $document_name = $_POST['document_name'];
        $document_pricePerPageInPhp = $_POST['document_pricePerPageInPhp'];
        $document_pages = $_POST['document_pages'];
        // documents tbl
        $query = "UPDATE document_tbl SET document_name='$document_name', document_pricePerPageInPhp='$document_pricePerPageInPhp', 
                document_pages='$document_pages' WHERE document_id='$document_id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "You Data is Updated";
            header('Location: documents.php');
        }
        else{
            $_SESSION['status'] = "You Data is NOT Updated";
            header('Location: documents.php');
        }
    }


    //delete documents
    if(isset($_POST['delete_btn'])){
        $document_id = $_POST['delete_id'];
        $query = "UPDATE document_tbl SET isDeleted=1 WHERE document_id = '$document_id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "You Data is Deleted";
            header('Location: documents.php');
        }
        else{
            $_SESSION['status'] = "You Data is NOT Deleted";
            header('Location: documents.php');
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