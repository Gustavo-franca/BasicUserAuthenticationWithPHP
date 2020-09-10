<?php
    
    namespace App\Database;
    use PDO;
    use PDOException;
    use Exception;
    
    class Connection
    {
        private static $connection;
    
        private function __construct(){}
 
        public static function getConnection() {
            
            $pdoConfig  = DB_DRIVER . ":". "host=" . DB_HOST . ";";
            $pdoConfig .= "dbname=".DB_NAME.";";
    
            try {
                if(!isset($connection)){
                    $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                return $connection;
            } catch (PDOException $e) {
                var_dump(DB_DRIVER);
                var_dump($e);
                throw new Exception("Erro de conexão com o banco de dados",500);
            }
        }
    }

?>