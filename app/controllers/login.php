<!-- This is a default class -->
<?php

Class Login extends Controller{

    function index(){
        
        $data['page_title'] = 'Abaana Photos - Login into your account';

        if(isset($_POST['email'])){
            //loading the user model.
            $user = $this->loadModel('user');
            $user->signup($_POST);

        }elseif(isset($_POST['username']) && !isset($_POST['email'])){
            // if the username is set but not the email, enable login.
            $user = $this->loadModel('user');
            $user->login($_POST);
        }


        $this->view("minima/sigin", $data);
    }    
}