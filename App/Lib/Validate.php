<?php

    namespace App\Lib;


    use Exception;
    use DateTime;
    class Validate {
        private $fieldName;
        private $value;


        protected function validate($fieldName,$value){
            $this->fieldName = $fieldName;
            $this->value = $value;
        }
        

        protected function required(){
       
            if(empty($this->value)){
                $fieldName = $this->fieldName;
                throw new \Exception("O campo $fieldName é obrigatório!");
            }
            return;
        }
   
        protected function isString(){
            if(isset($this->value)){
                if(!(gettype($this->value) == "string")){
                    $fieldName = $this->fieldName;
                    throw new \Exception("O campo $fieldName deve ser uma string!");
                };
            }
            return true;
        }

        protected function min($min){
            if(!isset($this->value)){
               
                return false;
            }
            if($this->isString()){
                if(!(strlen(trim($this->value)) >= $min)){
                    $fieldName = $this->fieldName;
                    throw new \Exception("O campo $fieldName deve possuir mais que $min caracteres!");
                };
            }
            return false;
        }

        protected function max($max){
            if(!isset($this->value)){
                return false;
            }
            if($this->isString()){
                if(!(strlen(trim($this->value)) <= $max)){
                    $fieldName = $this->fieldName;

                    throw new \Exception("O campo $fieldName deve possuir menos que $max caracteres!");
                };
            }
            return false;
        }

        protected function email(){
            if(!isset($this->value)){
                return;
            }
            if($this->isString()){
                 if(!filter_var($this->value, FILTER_VALIDATE_EMAIL)){
                    $fieldName = $this->fieldName;
                    throw new \Exception("O campo $fieldName deve possuir um email valido!");
                 };
            
            }
            return false;
        }
        protected function date(){
            if(!isset($this->value)){
                return;
            }
            var_dump($this->value);
            try {
                $dateTimeObject = new DateTime($this->value);
            } catch (\Exception $exc) {   
                $fieldName = $this->fieldName;
                    throw new \Exception("O campo $fieldName deve receber uma data Válida!");

            }
            return true;
        }
    }

?>