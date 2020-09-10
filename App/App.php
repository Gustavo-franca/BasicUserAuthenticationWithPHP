<?php
    
    namespace App;

    use App\Controller\UserController;
    use App\Router;

    class App {

        private $router;

        public function __construct($URI,$method){
            $this->router = new Router($URI,$method);

            define("DB_DRIVER","mysql");
            define("DB_HOST","localhost");
            define("DB_NAME","userAuth");
            define("DB_USER","root");
            define("DB_PASSWORD","Sa1amander");
        }

        public function run(){

            $userController = new UserController();

            $this->router->get('/user/login',[$userController,'login']);
            $this->router->post('/user/login',[$userController,'validate']);
            
            $this->router->get('/user',[$userController,'register']);
            $this->router->post('/user',[$userController,'create']);

            $this->router->get('/user/profile',[$userController,'profile']);
            $this->router->post('/user/profile',[$userController,'update']);

        }

     


    }

?>