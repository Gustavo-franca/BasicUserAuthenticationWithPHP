<?php

    namespace App\Lib;
    use App\Lib\Validate;
    use Exception;

    class UserValidate {
        private function fistName($name){
            Validate::validate("Nome",$name)
            ->required()
            ->isString()
            ->min(3);
  

        }
        private function lastName($name){
             Validate::validate("Sobrenome",$name)
            ->required()
            ->isString()
            ->min(3);
       

        }
        private function validateEmail($email){
             Validate::validate("email",$email)
            ->required()
            ->isString()
            ->email();
   
        }

        private function password($password){
             Validate::validate("password",$password)
            ->required()
            ->isString()
            ->min(8);
      
        }
        private function validateBio($bio){
             Validate::validate("biografia",$bio)
            ->isString()
            ->max(500);
    
        }
        private function validateDate($date){
             Validate::validate("Data de Nascimento",$date)
            ->required()
            ->isString()
            ->date();
       
        }

        function login($request){

            $this->validateEmail($request["email"]);
            try{
                $this->password($request["password"]);
            }catch(\Exception $err){
                throw new \Exception('Senha invalida');
            }
            return true;
        }
        function update($request){
            $this->fistName($request["fistName"]);
           
            $this->lastName($request["lastName"]);

            $this->validateBio($request["bio"]);
            
            $this->validateDate($request["birthday"]);
            return true;

        }
        function create($request){

            $this->fistName($request["fistName"]);
           
            $this->lastName($request["lastName"]);

            $this->validateEmail($request["email"]);

            $this->password($request["password"]);

            $this->validateBio($request["bio"]);

            $this->validateDate($request["birthday"]);
            return true;
        }
    }

?>