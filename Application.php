<?php
    include 'Router.php';

    class Application{
            public $router;
            public $request;
            public function __construct()
            {
                $this->router = new Router();
                var_dump($this->router);
                $this->request = new Request($this->router);
                var_dump($this->request);
            }
            public function run(){
                $this->router->resolve();
            }
    }
?>