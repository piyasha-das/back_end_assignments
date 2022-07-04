<?php
// set API Access Key
$access_key = 'T8oRDpYwD4Ova37VBMuYe5w1svYecMN8';

// set email address
$email_address = $_POST["email"];
$header = [
    'apikey: ' . $access_key,
];

// Initialize CURL:
$url = "https://api.apilayer.com/email_verification/" . $email_address;
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
// Store the data:
$json = curl_exec($ch);
curl_close($ch);
// Decode JSON response:
$validationResult = json_decode($json);
// var_dump($validationResult);
// echo $validationResult->is_deliverable;
if($validationResult->is_deliverable==1 and $validationResult->can_connect_smtp==1){
    echo "Your mail id exists.";
}
else{
    echo "Your mail id does not exist.";
}
// Access and use your preferred validation result objects
echo $validationResult['format_valid'];
echo $validationResult['smtp_check'];
echo $validationResult['score'];
?>