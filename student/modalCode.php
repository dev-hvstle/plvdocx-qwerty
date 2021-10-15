<?php 
    include('security.php');

    $post = file_get_contents('php://input');
    
    $document_id =$post;

    $connection = mysqli_connect("localhost","root","","plvdocx_db");
    $query = "SELECT  *

                    FROM document_tbl
                    
                    WHERE document_id = '$document_id';
    ";
    $query_run = mysqli_query($connection, $query);
    $row = json_encode(mysqli_fetch_assoc($query_run));

    echo $row;
?>