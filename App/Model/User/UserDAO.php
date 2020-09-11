<?php
    
    namespace App\Model\User;

    use App\Model\DAO\BaseDAO;



    class UserDAO extends BaseDAO {
       
        private $table = "user";
        private $userClass = "App\Model\User";
        public function save($user){
            if(!($this->findOneByEmail($user->email))){
                throw new Exception("Email já registrado");
            }
          $hashPassword = password_hash($user->password , PASSWORD_BCRYPT);
            if(!$hashPassword)return false;
            $columns = ":fistName,:lastName,:email,:password,:birthday,:bio";  
            $values = array(
                "fistName" => $user->fistName,
                "lastName" => $user->lastName,
                "email" => $user->email,
                "password" => $hashPassword ,
                "birthday" => $user->birthday,
                "bio" => $user->bio
                );
            return $this->insert($this->table,$columns,$values);
        } 
        public function update($user){
              $columns = "fistName,lastName,email,birthday,bio";  
              $values = array(
                  "fistName" => $user->fistName,
                  "lastName" => $user->lastName,
                  "birthday" => $user->birthday,
                  "bio" => $user->bio,
                  "id" =>$user->id
                  );

                $where = "id = :id";
              return parent::update($this->table,$columns,$values,$where);
          } 
        
        public function findOneByEmail($email){
            $columns = "id,fistName,lastName,email,password,birthday,bio";
            return $this->findOneBy($this->table,$columns,"email",$email);
        }

        public function findOneById($id){
            $columns = "id,fistName,lastName,email,password,birthday,bio";
            return $this->findOneBy($this->table,$columns,"id",$id);
        }



    }

?>