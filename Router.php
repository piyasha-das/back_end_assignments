<?php
    include 'resume.php';
    include 'register.php';
    include 'homepage.php';
    include 'profile.php';
    // include 'about.php';
    class Router{
        private array $handlers;
        private $notFoundHandler;
        private const METHOD_POST='POST';
        private const METHOD_GET='GET';
        public function get(string $path,$handler):void{
            // $this->handlers['GET' . $path] = [
            //     'path' =>$path,
            //     'method' => 'GET',
            //     'handler' =>$handler,
            // ];
            $this->addHandler(self::METHOD_GET,$path,$handler);
        }
        public function post(string $path,$handler):void{
            // $this->handlers['POST' . $path] = [
            //     'path' =>$path,
            //     'method' => 'POST',
            //     'handler' =>$handler,
            // ];
            $this->addHandler(self::METHOD_POST,$path,$handler);
        }
        public function addNotFoundHandler($handler):void{
            $this->notFoundHandler=$handler;
        }
        private function addHandler (string $method, string $path,$handler):void{
            $this->handlers[$method . $path] = [
                'path' =>$path,
                'method' => $method,
                'handler' =>$handler,
            ];
        }
        public function run(){
            // var_dump($_SERVER);
            $requestUri = parse_url($_SERVER['REQUEST_URI']);
            // var_dump($requestUri);
            $requestpath = $requestUri['path'];
            $method=$_SERVER['REQUEST_METHOD'];
            // var_dump($requestpath);

            $callback=null;
            foreach($this->handlers as $handler){
                if($handler['path']===$requestpath && $method === $handler['method']){
                    $callback=$handler['handler'];
                }
            }
            // var_dump($callback);
            if(is_string($callback)){
                $parts=explode('::',$callback);
                if(is_array($parts)){
                    $classname=array_shift($parts);
                    $handler=new $classname;

                    $method=array_shift($parts);
                    $callback=[$handler,$method];
                }
            }
            if (!$callback){
                header(header:"HTTP/1.0 404 Not Found");
                if(!empty($this->notFoundHandler)){
                    $callback = $this->notFoundHandler;
                }
                // return;
            }
            call_user_func_array($callback,[
                array_merge($_GET,$_POST)
            ]);
        }
    }
?>