<!Doctype html>
<head>
  <style>
  a{
    text-decoration:none;
    color:black;
  }
  </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<?php
    // $url='https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services';
    // $ch = curl_init($url);
    // // var_dump($ch);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $json = curl_exec($ch);
    // var_dump($json);
    // curl_close($ch);
    // $validationResult = json_decode($json);
    // var_dump($validationResult);
    // $opts = [
    //     "http" => [
    //             "method" => "GET",
    //             "header" => "Header1: Header1Input" .
    //             "Header2: Header2Input"
    //             ]
    //         ];
    
    // $context = stream_context_create($opts);
    
    // // Open the file using the HTTP headers set above
    // $file = file_get_contents('https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services', false, $context);
    
    // $file = json_decode($file);
    
    // var_dump($file);
    // print  $file[1]->Headline;
    require 'vendor/autoload.php';
    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\response;
    use GuzzleHttp\Exception\RequestException;
    $client=new Client();
    $promise1=$client->requestAsync(
        'GET',
        'https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services'
    );
$promise1->then(
  function (Response $res){
    $data = json_decode($res->getBody(),true);
    // print_r($data);
    echo "<div class=container>";
    for($i=0;$i<16;$i++){
    echo "<br>";
    if (fmod($i,2)==0){
    echo "<div class=row>";
    echo "<div class='col-6 float-right'>";
      echo "<h1 class='text-warning'>";print_r( $data['data'][$i]['attributes']['title']);echo "</h1>";
     print_r($data['data'][$i]['attributes']['field_services']['value']);
      $x = "https://ir-dev-d9.innoraft-sites.com/services/".$data['data'][$i]['attributes']['path']['alias'];
      echo "<div class='btn btn-outline-warning float-right'><a href='$x' class='text-secondary text-decoration-none'>Explore More</a>";
      echo "</div>";
    echo "</div>";
    // print_r($data['data'][$i]['relationships']['field_image']['links']['related']['href']);
    $url=$data['data'][$i]['relationships']['field_image']['links']['related']['href'];
    // echo $url;
    $client2=new Client();
    $promise2=$client2->requestAsync(
      'GET', $url
    );
    // print_r($promise2);
    $promise2->then(
      function(Response $response){
        $img = json_decode($response->getbody(),true);
        // print_r($response->getbody());
        // $img = json_decode($response->getBody(),true);
        // print_r($img['data']['attributes']['uri']['url']);
        $link = "https://ir-dev-d9.innoraft-sites.com/".$img['data']['attributes']['uri']['url'];
        echo "<div class='col-6 float-left'>";
        echo "<img src='$link' class=w-100>";
        echo "</div>";
      }
    );
    $promise2->wait();
  echo "</div>";
  }
  if(fmod($i,2)==1){
    echo "<div class=row>";
    // print_r($data['data'][$i]['relationships']['field_image']['links']['related']['href']);
    $url=$data['data'][$i]['relationships']['field_image']['links']['related']['href'];
    // echo $url;
    $client2=new Client();
    $promise2=$client2->requestAsync(
      'GET', $url
    );
    // print_r($promise2);
    $promise2->then(
      function(Response $response){
        $img = json_decode($response->getbody(),true);
        // print_r($response->getbody());
        // $img = json_decode($response->getBody(),true);
        // print_r($img['data']['attributes']['uri']['url']);
        $link = "https://ir-dev-d9.innoraft-sites.com/".$img['data']['attributes']['uri']['url'];
        echo "<div class='col-6 float-right'>";
        echo "<img src='$link' class=w-100>";
        echo "</div>";
      }
    );
    $promise2->wait();
    echo "<div class='col-6 float-left'>";
      echo "<h1 class='text-warning'>";print_r( $data['data'][$i]['attributes']['title']);echo "</h1>";
      print_r($data['data'][$i]['attributes']['field_services']['value']);
      $y = "https://ir-dev-d9.innoraft-sites.com/services/".$data['data'][$i]['attributes']['path']['alias'];
    echo "<div class='btn btn-outline-warning float-left '><a href='$y' class='text-secondary text-decoration-none'>Explore More</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
  }
},
  function (RequestException $e)
  {
    echo $e->getMessage();
  }
);
$promise1->wait();

   
    // $results=GuzzleHttp\Promise\settle();
?>
</html>
