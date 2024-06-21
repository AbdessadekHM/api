<?php

class WomenController extends AuthController {
    private $product;
    function __construct(){
        parent::__construct("womens");
        $this->product = new Product();
    }
    function scan(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
           $input = $this->api->recieveJsonInput();
           extract($input); 
           $result = $this->user->getFilteredUsers("username='$username'");
           if(!$result){
            $this->product->addItem($input);
            $this->api->sendJsonResponse({"message" : "Product Added Successfully"},200)
           }
           else{
            $this->api->sendJsonResponse({"message" : "Product Already exist"},200)
           }
            
        }
        
    }
}