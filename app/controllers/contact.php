<!-- This is a default class -->
<?php

Class Contact extends Controller{

    function index(){
        // default method if nothing is provided in the urls
        $data['page_title'] = 'Abaana Photos - Contact Us';
        $this->view("minima/contact", $data);
    }

}