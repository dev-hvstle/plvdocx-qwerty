<?php 
    //$post = file_get_contents('php://input');
    //var_dump($post);
    //var_dump($_POST['input1_data']);

    // $employee = json_decode(file_get_contents('php://input'), TRUE);
    // $name = $employee['input1_data'];
    // echo $name;
    $var1 = array("isSuccess"=>true);
    $var2 = json_encode($var1); 

    echo $var2;
    //var_dump($var2);
?>