<?php 


class App 
{
    // controller
    protected $controller;
    // method 
    protected $action;
    // params 
    protected $params=[];

    public function __construct()
    {
        $this->prepareURL($_SERVER['REQUEST_URI']);
        
        // invoke controller and method
        $this->render();

    }



    /**
     * extract controller and method and all parameters
     * @param string $url -> request from url path 
     * @return 
     */
    private function prepareURL($url)
    {

        $url = trim($url,"/");
        if(!empty($url))
        {
            $url = str_replace("app_api/public","",$url);
            $url = explode('/',$url);
            unset($url[0]);
            $url = array_values($url);
            // define controller 
            $this->controller = isset($url[0]) ? ucwords($url[0])."Controller":"HomeController";
            // define method 
            $this->action = isset($url[1]) ? $url[1]:"index";
            //var_dump($this->controller);
            // define parameters 
            unset($url[0],$url[1]);

            $this->params = !empty($url) ? array_values($url) : [];
        }
        
    }



    /**
     * render controller and method and send parameters 
     * @return function 
     */

    private function render()
    {
        
        // chaeck if controller is exist
        if(class_exists($this->controller))
        {
            $controller = new $this->controller;
            // check if methos is exist
            if(method_exists($controller,$this->action))
            {
                call_user_func_array([$controller,$this->action],$this->params);
            }
            else 
            {
                // echo "Method : " . $this->action ." does not Exist";
                echo "this works";
                new Api('Not Found',404);
            }
        }
        
        else 
        {
            // echo "Class : ".$this->controller." Not Found";
            echo "also this works";
            new Api('Not Found',404);
        }  
        
    }
}
