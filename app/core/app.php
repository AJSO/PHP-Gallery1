<!-- this file will contain all the functionality that our app needs. -->
<?php

Class App{

    /*
    This router is responsible for selection which controller is going to run for our website.
    */

    //==========================================================ROUTER============================
    private $controller = "home"; // this is a default controller
    private $method = "index"; //This is a default method
    private $params = []; //empty array

    public function __construct(){ 

        //runs immediately our app is initialised
        $url = $this->splitURLs();

        // looking for the controller.
        if(file_exists("../app/controllers/". strtolower($url[0]) . ".php" )){
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }

        // if the file exist require it.
        require "../app/controllers/".$this->controller.".php";

        //controller instantiated. $this->controller becomes a class.
        $this->controller = new $this->controller;

        // Looking for the method inside the controller found above.
        if(isset($url[1])){
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Run the class and method.
        //  show($url);
        
        $this->params = array_values($url);
        // function that runs both the function and the method at the same time.
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    // This define and splits the app urls
    private function splitURLs(){

        // if isset the url, else display home as default.
        $url = isset($_GET['url']) ? $_GET['url'] : "home";


        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));

    }

    //=======================================END OF ROUTER==================================

}

