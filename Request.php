<?php
    class Request{
        public function getPath(){
            $path = $_SERVER['REQUEST_URI'] ?? 'false';
            $position=strpos($path,'?');
            if($position === false){
                return $path;
            }
            return substr($path,0,$position);
            var_dump($position);
        }
        public function getMethod(){
            return strtolower($_SERVER['REQUEST_METHOD']);
        }
    }
?>