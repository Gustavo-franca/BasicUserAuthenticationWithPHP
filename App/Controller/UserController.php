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

            var_dump($user);
        }

        function register(){
            //show register view
        }


    }

?>