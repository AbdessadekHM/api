<?php

class AuthController{
    private $user;
    private $api;
    private $table;
    function __construct($table){
        $this->table = $table;
        $this->user = new Users($this->table);
        $this->api = new Api();
    }
    public function login(){

        header('Content-Type: application/json');
        echo json_encode(["message" => "hello i am working"]);
        exit;

        if($_SERVER["REQUEST_METHOD"]=="POST"){
           $input = $this->api->recieveJsonInput();
           extract($input);
           $result = $this->user->getFilteredUsers("username= '$username'");
           if($result[0]->password == $password && $result[0]->username==$username){
               session_start(); 
               $_SESSION['username'] = $username;

               $this->api->sendJsonResponse($result[0]);
           }
           elseif($result[0]->username == $username){
               $this->api->sendJsonResponse(["message" => "Incorrect Username"]);

           }else{
                $this->api->sendJsontResponse(["message" => "Incorrect Password"]);
           }
        }
    }
    public function register(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
           $input = $this->api->recieveJsonInput();
           extract($input); 
           $result = $this->user->getFilteredUsers("username='$username'");
           if(!$result){
            $this->users->addUser($input);
            $this->api->sendJsonResponse(["message" => "User Added Successfully"],200);
           }
           else{
            $this->api->sendJsonResponse(["message" => "User Already exist"],200);
           }
            
        }
    }
}
