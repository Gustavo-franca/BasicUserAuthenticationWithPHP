<?php

    namespace App\Controller;

    use App\Controller\BaseController;

    use App\Model\User\User;
    use App\Model\User\UserDAO;
    use App\Lib\UserValidate;
    use Exception;

    class UserController extends BaseController {

        function create($request){
            $userValidate = new UserValidate();
            try{
                $userValidate->create($request);
         
                $user = new User();
                $user->fistName = $request["fistName"];
                $user->lastName = $request["lastName"];
                $user->email = $request["email"];
                $user->password = $request["password"];
                $user->birthday =date($request["birthday"]);
                $user->bio = $request["bio"];

                $userDao = new UserDAO();
                if($userDao->save($user)){
                return  $this->render("/register/success",get_object_vars($user));

                }

                return  $this->render("register/index",get_object_vars($user));
            }catch(\Exception $err){
                $response = [];
                $response["message"] = $err->getMessage();
                $response = array_merge($response,$request);
                return $this->render("register/index",
                $response);
              }

        }
        
        function update($request){
            $user = $_SESSION["user"];
            if(!$user){
                return $this->render("error/403");
            }
            $userValidate = new UserValidate();
            try{
                $userValidate->update($request);
          
            $user->fistName = $request["fistName"];
            $user->lastName = $request["lastName"];
            $user->birthday = date($request["birthday"]);
            $user->bio = $request["bio"];

            $userDao = new UserDAO();
            $user = $userDao->update($user);
            if(!$user){
                throw new \Exception('Falha ao atualizar os Dados');
             }
            $_SESSION["message"]= "Seus Dados Foram Atualizados Com Sucesso!";
            unset($user->password);
            $_SESSION["user"] = $user;
            return $this->redirect('/profile');
        }catch(\Exception $err){
            $_SESSION["message"] = $err->getMessage();
            return $this->redirect('/profile');
    
        }

        }

       

        public function validate($request){
            $userValidate = new UserValidate();
            try{
                $userValidate->login($request);
                
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
                unset($user->password);
                $_SESSION["user"] = $user;
               
                $this->redirect("/profile");

            }catch(\Exception $err){
                return $this->render("login/index",
                ["message" => $err->getMessage(),
                "email"=>  $request["email"],
                "password" =>$request["password"]]);
            }

        }
        

        function register(){
            $this->render("register/index");
        }
        
        public function login(){
            return $this->render("login/index");
        }
       
        public function profile(){
            $user = $_SESSION["user"];
            $message = $_SESSION["message"];
            unset($_SESSION["message"]);
            if(isset($user)){
                return $this->render("profile/index",array_merge(["message" => $message],get_object_vars($user)));
             
            }
            return $this->render("error/403");
        }
        public function exit(){
            unset($_SESSION["user"]);
            return $this->redirect('/user/login');
        }
       

    }

?>