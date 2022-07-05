<!Doctype html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<?php
    // use Test;
    require 'vendor/autoload.php';
    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\response;
    use GuzzleHttp\Exception\RequestException;
    require 'Test.php';
    $test1 = new Test();
    // $test1->showTitleData('a','b');
    $promise1 = $test1->api_call('https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services');
    // var_dump($promise1);
    $promise1->then(function(Response $res){
        $data = json_decode($res->getBody(),true);
        // print_r($data);
        for($i=0;$i<16;$i++){
            if(fmod($i,2)==0){
                echo "<div class='row'>";
                $x=$data['data'][$i]['attributes']['title'];
                $y=$data['data'][$i]['attributes']['field_services']['value'];
                // print_r($x);
                // print_r($y);
                $test1 = new Test();
                // var_dump($test1);
                $test1->showTitleData($x,$y);
                // die();
                $btnlink = $data['data'][$i]['attributes']['path']['alias'];
                $btnlink=$test1->displayLink($btnlink);
                // var_dump($btnlink);
                $test1->showButton($btnlink);
                echo "</div>";
                // echo "hi";
                // var_dump($data);
                // $url = $data['data'][$i]['relationships']['field_image']['links']['related']['href'];
                // echo $url;
                // echo "<br/>";
                // print_r($data['data'][0]['relationships']['field_image']['links']['related']['href']);
                // die();
                $promise2=$test1->api_call($data['data'][$i]['relationships']['field_image']['links']['related']['href']);
                // var_dump($promise2);
                $promise2->then(function(Response $res){
                    $img = json_decode($res->getbody(),true);
                    $link = $img['data']['attributes']['uri']['url'];
                    // print_r($link);
                    $test1 = new Test();
                    $link = $test1->imageLink($link);
                    // print_r($link);
                    $test1->showImage($link);
                });
                $promise2->wait();
            }
            if(fmod($i,2)==1){
                echo "<div class=row>";
                $url=$data['data'][$i]['relationships']['field_image']['links']['related']['href'];
                $test1 = new Test();
                $promise2=$test1->api_call($url);
                $promise2->then(function(Response $res){
                    $img = json_decode($res->getbody(),true);
                    $link = $img['data']['attributes']['uri']['url'];
                    // print_r($link);
                    $test1 = new Test();
                    $link = $test1->imageLink($link);
                    // print_r($link);
                    $test1->showImage($link);
                });
                $promise2->wait();
                $x=$data['data'][$i]['attributes']['title'];
                $y=$data['data'][$i]['attributes']['field_services']['value'];
                $test1 = new Test();
                $test1->showTitleData($x,$y);
                $btnlink = $data['data'][$i]['attributes']['path']['alias'];
                $btnlink= $test1->displayLink($btnlink);
                // print_r($btnlink);
                $test1->showButton($btnlink);
                echo "</div>";

            }
        }
    },
    function (RequestException $e){
      echo $e->getMessage();
    });
    $promise1->wait();
?>
</html>