<?php
// session_start();
  
require '/var/www/Files/vendor/autoload.php';
// require 'class-db.php';
 
$client = new GuzzleHttp\Client([
    'base_uri' => 'https://www.linkedin.com',
]);
 
// get access token
$response = $client->request('POST', '/oauth/v2/accessToken', [
    'form_params' => [
        "grant_type" => "authorization_code",
        "code" => $_POST['code'],
        // "code" => "AQVt_bDp_adyDIXSAPOUUIETchpUzSYwfY9ny7PNGeWSIZ29L09joT_dKvSzwk6BeblbiCXq94Jxo7lH8OkRM2_9lkvGx50N4rVRUqIlVtaGu08SPKT9C2SfblkhlVX1zB2ekRX9ArCIFmdHViO5yjxeaJg9hDxnwhtwQRJGdEKBqaLS71aKyW9xcYKXM3aPgKRmIfO48HMLZV_PL5SSajTEdjyhQ_KxHxxS5osiZx4nrF8jwv3zG-Q0095Cv-PtRxlaUebFQWhifcFxo61cumdDEu8PrqAUo996eYiVlMWPgn2FKNYA9jkX3Ug5tRJgA2GwbaxuFGnMf-uFqk7223SEtM5_zg",
        "client_id" => "86wh8kvzek5hzu",
        "client_secret" => "bREECY6TivNXd7IA",
        "redirect_uri" => "http://localhost/view/register.php",
    ],
]);
 
$res = json_decode($response->getBody());
$token = $res->access_token;
var_dump($token);



// // get user details
// $client2 = new GuzzleHttp\Client([
//     'base_uri' => 'https://api.linkedin.com',
// ]);
 
// $fields = [
//     'id',
//     'firstName',
//     'lastName',
//     'profilePicture(displayImage~:playableStreams)',
// ];
 
// $response2 = $client2->request('GET', '/v2/me', [
//     "headers" => [
//         "Authorization" => "Bearer ". $token
//     ],
//     "query" => [
//         'projection' => '(' . implode(',', $fields) . ')',
//     ]
// ]);
 
// $res2 = json_decode($response2->getBody());
 
// $picture = '';
// foreach ($res2->profilePicture as $key=>$value) {
//     if ('displayImage~' == $key) {
//         $element = end($value->elements);
//         if (!empty($element->identifiers)) {
//             $picture = reset($element->identifiers)->identifier;
//         }
//     }
// }
 
// // get email address
// $email = '';
// $response3 = $client2->request('GET', '/v2/emailAddress', [
//     "headers" => [
//         "Authorization" => "Bearer ". $token
//     ],
//     'query' => [
//         'q' => 'members',
//         'projection' => '(elements*(handle~))',
//     ]
// ]);
 
// $res3 = json_decode($response3->getBody());
 
// foreach ($res3->elements as $element) {
//     foreach ($element as $key=>$value) {
//         if ('handle~' == $key) {
//             $email = $value->emailAddress;
//         }
//     }
// }
 
// // send user data to the database
// $locale = $res2->firstName->preferredLocale->language . '_' . $res2->firstName->preferredLocale->country;
// $in_data['name'] = $res2->firstName->localized->$locale . ' ' . $res2->lastName->localized->$locale;
// $in_data['id'] = $res2->id;
// $in_data['email'] = $email;
// $in_data['picture'] = $picture;
 
// $db = new DB();
// $db->upsert_user($in_data);
 
// // set user id in session aka log in the user
// if(!isset($_SESSION['uid'])) {
//     $_SESSION['uid'] = $in_data['id'];
// }
 
// echo 'success';
?>