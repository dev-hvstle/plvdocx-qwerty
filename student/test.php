<?php
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
        var_dump($data);
    }
?>