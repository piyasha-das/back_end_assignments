<?php
    $email=$_POST['email'];
    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        exit("invalid format");
    }
    $api_key="T8oRDpYwD4Ova37VBMuYe5w1svYecMN8";
    $ch=curl_init();
    curl_setopt_array($ch,array(
        CURLOPT_URL =>"http://apilayer.net/api/check??api_key=$api_key&email=$email",
        CURLOPT_RETURNTRANSFER =>true,
        CURLOPT_FOLLOWLOCATION =>true

    ));
    $response=curl_exec($ch);
    $curl_close($ch);
    $data=json_decode($response,true);
    var_dump($data);
    echo "valid format";

?>