<?php
    // class Router{
    //     private $_uri = array();
    //     public function add($uri){
    //         $this->_uri[]=$uri;
    //     }
    //     public function submit(){
    //         $uriGetParam = isset($_GET['uri']) ? $_GET['uri'] : '/';
    //         foreach($this->uri as $key => $Value){
    //             if(preg_match("/^$Value$/",$uriGetParam)){
    //                 echo 'match!';
    //             }
    //         }
    //     }
    // }
    // include 'Request.php';
    // class Router{
    //     public Request $request;
    //     // $request = new Request;
    //     public function __construct()
    //     {
    //         // $request=new Request();
    //         $this->request=new Request;
    //     }
    //     protected array $routes=[
    //         // 'get'=>[
    //         //     '/'=>callback;
    //         //     '/contact'=>
    //         // ]
    //     ];
    //     public function get($path,$callback){
    //         var_dump($path);
    //         die();
    //         // $this->routes['get'][$path]=$callback;
    //     }
    //     public function resolve(){
    //         // var_dump($_SERVER);
    //         $path=$this->request->getPath();
    //         var_dump($path);
    //         $method=$this->request->getMethod();
    //         var_dump($this->routes);
    //         // var_dump($method);
    //         $callback=$this->routes[$method][$path] ?? false;
    //         if($callback===false){
    //             echo "Notfound";
    //             exit;
    //         }
    //         echo call_user_func($callback);
    //         // var_dump($callback);
    //     }
    // }
?>