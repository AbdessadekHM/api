<?php

class AdminController extends AuthController {
    private $women;
    function __construct(){
        parent::__construct("admin");
        $women = new Woman();
    }

    public function dashboard(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $result = $this->women->getAllUsers();
            $this->api->sendJsonResponse({"message":$result});

        }
    }
    public function edit(){
        if($_SERVER["REQUEST_METHOD"] == "PUT"){
            $input = $this->api->recieveJsonInput();
            $this->woman->updateUser($input,"username='$username'");
        }
    }
    public function delete(){
        if($_SERVER["REQUEST_METHOD"] = "DELETE"){
            $input = $this->api->recieveJsonInput();
            $this->woman->deleteUser("username = '$username' ");
        }
    }
    
    
}