<?php
    
    namespace App;

    use App\Controller\UserController;
    use App\Router;
    use App\Config\Index;

    class App {

        private $router;

        public function __construct($URI,$method){
            $this->router = new Router($URI,$method);
            $json = file_get_contents('App/Config/index.json');
            $Authentication = json_decode($json);
            define("DB_DRIVER",$Authentication->DB_DRIVER);
            define("DB_HOST",$Authentication->DB_HOST);
            define("DB_NAME",$Authentication->DB_NAME);
            define("DB_USER",$Authentication->DB_USER);
            define("DB_PASSWORD",$Authentication->DB_PASSWORD);
        }

        public function run(){

            $userController = new UserController();

            $this->router->get('/user/login',[$userController,'login']);
            $this->router->post('/user/login',[$userController,'validate']);
            
            $this->router->get('/user',[$userController,'register']);
            $this->router->post('/user',[$userController,'create']);

            $this->router->get('/profile',[$userController,'profile']);
            $this->router->post('/profile',[$userController,'update']);

            http_response_code(400);

        }

     


    }

?>