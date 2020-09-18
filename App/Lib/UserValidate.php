<?php

    namespace App\Lib;
    use App\Lib\Validate;
    use Exception;

    class UserValidate extends Validate{
        private function fistName($name){
            $this->validate("Nome",$name);
            $this->required();
            $this->isString();
            $this->min(3);
            $this->validate(null,null);

        }
        private function lastName($name){
            $this->validate("Sobrenome",$name);
            $this->required();
            $this->isString();
            $this->min(3);
            $this->validate(null,null);

        }
        private function validateEmail($email){
            $this->validate("email",$email);
            $this->required();
            $this->isString();
            $this->email();
            $this->validate(null,null);
        }

        private function password($password){
            $this->validate("password",$password);
            $this->required();
            $this->isString();
            $this->min(8);
            $this->validate(null,null);
        }
        private function validateBio($bio){
            $this->validate("biografia",$bio);
            $this->isString();
            $this->max(500);
            $this->validate(null,null);
        }
        private function validateDate($date){
            $this->validate("Data de Nascimento",$date);
            $this->required();
            $this->isString();
            $this->date();
            $this->validate(null,null);
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