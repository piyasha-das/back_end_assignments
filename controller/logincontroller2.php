<?php
    session_start();
    if(!isset($_SESSION['emailid'])){
        header('location:/view/register.php');
    }
    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\response;
    use GuzzleHttp\Exception\RequestException;
    require '../vendor/autoload.php';
    require '../Test.php';
    // require '../model/linkedinemailsave.php';
   
    // $test1 = new Test();
    // $promise1 = $test1->api_call('https://www.linkedin.com/oauth/v2/accessToken?grant_type=authorization_code&code=AQTVT8lJA6lvh_-Gsk5cUjOa7-fFcKEXkZ-cwpf_4dZUVYeEVQIlO3SlkBZwzY2lRnXmliNM8P3Lb29gpwBlIDgZ5OhzRcW2K7knRNDVYJ_vZe0Y2cNafkWeCnTWtNq6JtLnivGefiKoOLv9cpBJBS1-LipKcW3nybW67SOT324tSgyTzbyEGBNQrvUDcBWhg5kv_q_Jp-wmHDau_UQ&client_id=86wh8kvzek5hzu&client_secret=bREECY6TivNXd7IA&redirect_uri=http://localhost/controller/index3.php&Content-Type=application/x-www-form-urlencoded');
    // $promise1->then(function(Response $res){
    //      $data = json_decode($res->getBody(),true);
    //      var_dump($data);
    // },
    // function (RequestException $e){
    //     echo $e->getMessage();
    // });
    // $promise1->wait();


    // use Guzzle\Http\Client;

    // $client = new Client();

    // $request = $client->post('https://www.linkedin.com/oauth/v2/accessToken', [], [
    //     'grant_type' => 'authorization_code',
    //     'client_id' => '86wh8kvzek5hzu',
    //     'client_secret' => 'bREECY6TivNXd7IA',
    //     'code' => 'AQS_RLQKNmTSxz2IFc_n1FauX7esIAa0sQ5e5LcpzweQZLuJ2lhMMR2VF_QTpi7BfiKh8JPUp5BhD8ERNEAyxUuqQx99L5l-ocd09Uu6fJyt741ATzh6VYSKfL7BLYqanJk_lEHZIwvJm-O68uHCBMjoCutfM75duBiX69_b1-LC4AOcRTsERYN-g-PGlFVNliwfdH39nCZi-6TnINM']);

    // $response = $request->send();
    // var_dump($response);

$ch = curl_init('https://www.linkedin.com/oauth/v2/accessToken');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

$redirectUri = urlencode('http://phpassignment.com/controller/logincontroller2.php');
$gt = urlencode('authorization_code');
$code=$_GET['code'];
// $code='AQSl0wdpQ_Bc7N2kODA8jjzS6wY-7iGe9kHc1Lbzl6DmohTY3lKz0oQeu85LVx9bgvdoVOfpUIeZMyxN7WKdNU5dGtDXdCGuWxsduoV3diLpTX7MSmSYO6Sk4rG0AoXR8weQdrXr3RixRe8mtS1fFecx1481PyAiICaDjolRzb8o_dUthsfgcxOKVwrXg3owiVAoZod3T7985yAEUos';
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=$gt&code=$code".
"&redirect_uri=$redirectUri&client_id=86wh8kvzek5hzu&client_secret=bREECY6TivNXd7IA");
// execute!
$response = curl_exec($ch);
// close the connection, release resources used
curl_close($ch);
// $response contains
$json = json_decode($response);
// var_dump($json);

$accessToken = $json->access_token;
// var_dump($accessToken);

$url = 'https://api.linkedin.com/v2/me?projection=(id,localizedLastName,localizedFirstName,profilePicture(displayImage~:playableStreams))';
$crl = curl_init();

curl_setopt($crl, CURLOPT_URL, $url);
curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($crl, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$accessToken));

$userDataJson = curl_exec($crl);

$userData = json_decode($userDataJson,true);
// var_dump($userData);
$userName = $userData['localizedFirstName'].' '.$userData['localizedLastName'];
$userProfilePic = $userData['profilePicture']['displayImage~']['elements'][0]['identifiers'][0]['identifier'];
// echo $userName;
// echo $userProfilePic;


$email = 'https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))';
$emailcrl = curl_init();

curl_setopt($emailcrl, CURLOPT_URL, $email);
curl_setopt($emailcrl, CURLOPT_FRESH_CONNECT, true);
curl_setopt($emailcrl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($emailcrl, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$accessToken));

$email_response = curl_exec($emailcrl);
curl_close($emailcrl);


$userEmail = json_decode($email_response,true);
var_dump($userEmail);
echo '<pre>';
print_r($userEmail);
echo '</pre>';

$Email = $userEmail['elements'][0]['handle~']['emailAddress'];
// var_dump($userEmail["elements"][0]["handle~"]["emailAddress"]);
// var_dump($Email);
// require '../model/DatabaseConnection.php';
// $db = new DatabaseConnection;
// var_dump($db);
require '../model/linkedinemailsave.php';
$emailsend = new EmailSave;
// var_dump($userName);
// var_dump($emailsend);
$result = $emailsend->EmailSave($userName,$Email);
if($result) {
    session_start();
    $_SESSION['emailid']=$Email;
    header('location:/homepage');
}

    
?>