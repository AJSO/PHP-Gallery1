<!-- This is a default class -->
<?php

Class About extends Controller{

    function index(){
        // default method if nothing is provided in the urls
        $data['page_title'] = 'Abaana Photos - About Us';
        $this->view("minima/about-us", $data);
    }

}