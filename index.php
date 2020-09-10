<?php

    use App\App;
    use Exception;

    require_once("vendor/autoload.php"); 

    $URI = $_SERVER["REQUEST_URI"];
    $method = $_SERVER["REQUEST_METHOD"];

    try{

       $app = new App($URI,$method);
       $app->run();
    }catch(\Exception $e){
    var_dump($e);
       //var_dump($e->message);
    }
?>