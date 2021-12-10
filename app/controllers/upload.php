<!-- This is a default class -->
<?php

Class Upload extends Controller{

    function index(){
        // to load the image resize model. class name in brackets.
        $data['page_title'] = 'Abaana Photos - Upload Image';
        header("Location:" . ROOT . "upload/image");
        die;                 
        
    }    

    // function to upload an image.
    function image(){
        
        //To check if the user is logged in or not in order for them to upload and image.
        $user = $this->loadModel("user"); //user.php in model
        $result = $user->check_logged_in();

        if(!$result){
            //if no results, redirect to the login page.                   
            header("Location:" . ROOT . "login");
            die;
        }

        if(isset($_POST['title']) && isset($_FILES['image_file'])){

            // if everything is set, instantiate the upload file class from the model.
            $uploader = $this->loadModel("upload_file");
            $uploader->upload($_POST, $_FILES);

        }

        $data['page_title'] = 'Abaana Photos - Upload Image';
        $this->view("minima/upload", $data);
    }    
}