<?php

/* this is the main controller. am doing this to avoid repeatations 
of the view controller written in each individual controllers. Just cleaning up the controllers.

Note:
i put here the functionality of controller that is found in all controllers. COMMON FUNCTIONS.

*/
Class Controller{

    // =========function to load views=======
    protected function view($view, $data=[]){
        /*This reads all the views from the views folder and displays the page. */
        //looking for the view file.
        if(file_exists("../app/views/". $view . ".php" )){
            // if the file exists include it.
            include "../app/views/". $view . ".php";
        }else{
            include "../app/views/404.php";
        }

    }

    // =====================Function to load the Models
    protected function loadModel($model){
        //looking for the model file.
        if(file_exists("../app/models/". $model . ".php" )){
            // if the file exists include it.
            include "../app/models/". $model . ".php";

            // instantiate the class.
            $model = new $model();

            return $model;
        }
        
        return false;

    }


}