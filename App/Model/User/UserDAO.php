<?php
    
    namespace App\Model\User;

    use App\Model\DAO\BaseDAO;

    class UserDAO extends BaseDAO {

        public function save($user){
          $hashPassword = password_hash($user->password , PASSWORD_BCRYPT);
            if(!$hashPassword)return false;
            $columns = ":id,:fistName,:lastName,:email,:password,:birthday,:bio";  
            $values = array(
                "id" => $user->id,
                "fistName" => $user->fistName,
                "lastName" => $user->lastName,
                "email" => $user->email,
                "password" => $hashPassword ,
                "birthday" => $user->birthday,
                "bio" => $user->bio
                );
            return $this->insert("user",$columns,$values);
        }     



    }

?>