<?php
    namespace App;

    class Router {

        private $uri;
        private $method;

        public function __construct($URI,$method){
            $this->uri = $URI;
            $this->method = $method;
        }

        public function get($route,$callback) {
            if($this->uri == $route && $this->method == "GET"){
                $data = $this->getData();
                call_user_func($callback,$data);
            }
        }

        public  function post($route,$callback) {
            if($this->uri == $route && $this->method == "POST"){
                $data = $this->getData();
                call_user_func($callback,$data);
            }
        }
        private function getData() {
           if($this->method == "POST"){
                return $_POST;
           }
           if($this->method == "GET"){
                 return $_GET;
           }
           return null;
           
            
        }


    }
?>