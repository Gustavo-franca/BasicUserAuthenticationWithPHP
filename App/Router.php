<?php
    namespace App;

    class Router {

        private $uri;
        private $method;

        public function __construct($URI,$method){
            $this->uri = trim($URI,'/');
            $this->method = $method;
        }

        public function get($route,$callback) {
            if($this->uri == trim($route,'/') && $this->method == "GET"){
                $data = $this->getData();
                call_user_func($callback,$data);
                die();
            }
        }

        public  function post($route,$callback) {
            if($this->uri == trim($route,'/') && $this->method == "POST"){
               
                $data = $this->getData();
                call_user_func($callback,$data);
                die();
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