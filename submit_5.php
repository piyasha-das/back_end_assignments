<?php
    $post = false;
    $reachable="";
    if(isset($_POST['submit'])){
        $post = true;
        $email=$_POST['email'];

        $arr = array(
            'to_email' => $email
        );
        $post_data=json_encode($arr);
        $crl=curl_init('http://www.mailboxlayer.com/');
        curl_setopt($crl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($crl,CURLINFO_HEADER_OUT,true);
        curl_setopt($crl,CURLOPT_POST,true);
        curl_setopt($crl,CURLOPT,POSTFILELDS,$post_data);
        curl_setopt ($crl,CURLOPT_HTTPHEADER,array(
            'content-Type : application/json',
            'authorization: T8oRDpYwD4Ova37VBMuYe5w1svYecMN8'
        ));
        $result=curl_exec($crl);
        print_r($result);
        $decode=json_decode($result);
        $reachable=($decode['is_reachable']== 'safe')?'<span class="badge-badge-success">Valid</span>':'<span class="badge-badge-danger">Invalid</span>';
    }
?>