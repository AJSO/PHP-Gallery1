<!-- This is a default class -->
<?php

Class SignUp extends Controller{

    function index(){
        // default method if nothing is provided in the urls
        $data['page_title'] = 'Abaana Photos - Create an account';

        if(isset($_POST['email'])){
            //loading the user model.
            $user = $this->loadModel('user');
            $user->signup($_POST);

        }elseif(isset($_POST['username']) && !isset($_POST['email'])){
            // if the username is set but not the email, enable login.
            $user = $this->loadModel('user');
            $user->login($_POST);
        }


        $this->view("minima/register", $data);
    }    
}