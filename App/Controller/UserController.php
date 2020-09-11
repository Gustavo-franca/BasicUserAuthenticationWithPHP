<?php

    namespace App\Controller;

    use App\Model\User\User;
    use App\Model\User\UserDAO;

    class UserController {

        function create($request){
            $user = new User();
            $user->fistName = $request["fistName"];
            $user->lastName = $request["lastName"];
            $user->email = $request["email"];
            $user->password = $request["password"];
            $user->birthday =date($request["birthday"]);
            $user->bio = $request["bio"];

            $userDao = new UserDAO();
            $userDao->save($user);

            var_dump("parabéns você foi Cadastrado Com Sucesso!");
        }
        
        function update($request){
            $user = new User();
          
            $user->id = $request["id"];
            $user->fistName = $request["fistName"];
            $user->lastName = $request["lastName"];
            $user->email = $request["email"];
            $user->birthday = date($request["birthday"]);
            $user->bio = $request["bio"];

            $userDao = new UserDAO();
            $userDao->update($user);

            var_dump("Seus Dados foram atualizados!");
        }

        function register(){
            //show register view
        }

        public function validate($request){

            $email = $request["email"];
            $password = $request["password"];

            $userDao = new UserDAO();
            $user = $userDao->findOneByEmail($email);
            if(!$user){
                throw new \Exception("Email Invalido", 401);
            }

            if(!(password_verify($password,$user->password))){
                throw new \Exception("Senha Invalida", 401);
            }

            var_dump("$user->fistName LOGADO COM SUCESSO!");


        }


    }

?>