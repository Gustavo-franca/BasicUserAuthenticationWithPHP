<?php

    namespace App\Lib;

    use Exception;
    use DateTime;
    class Validate {
        private $fieldName;
        private $value;

        private function __construct($fieldName,$value){
            $this->fieldName = $fieldName;
            $this->value = $value;
        }

        public static function validate($fieldName,$value){
            return new validate($fieldName,$value);
        }
        

        public function required(){
            if(empty($this->value)){
               
                throw new \Exception("O campo $fieldName é obrigatório!");
            }
            return $this;
        }
   
        public function isString(){
            if(isset($this->value)){
                if(!(gettype($this->value) == "string")){
                    $fieldName = $this->fieldName;
                    throw new \Exception("O campo $fieldName deve ser uma string!");
                };
            }
            return $this;
        }

        public function min($min){
            if(!isset($this->value)){
               
                return $this;
            }
            if($this->isString()){
                if(!(strlen(trim($this->value)) >= $min)){
                    $fieldName = $this->fieldName;
                    throw new \Exception("O campo $fieldName deve possuir mais que $min caracteres!");
                };
            }
            return $this;
        }

        public function max($max){
            if(!isset($this->value)){
                return $this;
            }
            if($this->isString()){
                if(!(strlen(trim($this->value)) <= $max)){
                    $fieldName = $this->fieldName;

                    throw new \Exception("O campo $fieldName deve possuir menos que $max caracteres!");
                };
            }
            return $this;
        }

        public function email(){
            if(!isset($this->value)){
                return $this;
            }
            if($this->isString()){
                 if(!filter_var($this->value, FILTER_VALIDATE_EMAIL)){
                    $fieldName = $this->fieldName;
                    throw new \Exception("O campo $fieldName deve possuir um email valido!");
                 };
            
            }
            return $this;
        }
        public function date(){
            if(!isset($this->value)){
                return $this;
            }
            try {
                $dateTimeObject = new DateTime($this->value);
            } catch (\Exception $exc) {   
                $fieldName = $this->fieldName;
                    throw new \Exception("O campo $fieldName deve receber uma data Válida!");

            }
            return $this;
        }
    }

?>