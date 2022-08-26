<!Doctype html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\response;
use GuzzleHttp\Exception\RequestException;
class Test {
    public function api_call($url){
        $client=new Client();
        $promise=$client->requestAsync(
            'GET',
            $url
        );
        return $promise;
    }
    public function displayLink($x){
        $y = "https://ir-dev-d9.innoraft-sites.com".$x;
        return $y;
    }
    public function imageLink($x){
        $y = "https://ir-dev-d9.innoraft-sites.com/".$x;
        return $y;
    }
    public function showTitleData($x,$y){
        // echo "hi";
        // print_r($x);
        // print_r($y);
        // die();
        echo "<div class='col-6 float-right'>";
        echo "<h1 class='text-warning'>";print_r($x);echo "</h1>";
        print_r($y);
    }
    public function showImage($i){
        echo "<div class='col-6 float-left'>";
        echo "<img src='$i' class='w-100'>";
        echo "</div>";
    }
    public function showButton($x){
        echo "<div class='btn btn-outline-warning float-right'><a href='$x' class='text-secondary text-decoration-none'>Explore More</a>";
        echo "</div>";
    }
}
?>
</html>