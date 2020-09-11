<?php

    namespace App\Controller;


    class BaseController {

            private $viewVar;

            public function render($view,$data = null){

                $viewVar = $data; 
                $Session = Session::class; 
                require_once PATH .'/App/Views/layouts/header.php';
               // require_once PATH .'\\App\\Views\\layouts\\menu.php';
                require_once PATH ."/App/Views/".$view.".php";
                require_once PATH ."/App/Views/layouts/footer.php";
            }
    
            public function redirect($view){
                header('Location : '. APP_HOST . $view,true,301);
                die();
            }

    }

?>