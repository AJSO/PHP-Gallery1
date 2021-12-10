<!-- This is a default class -->
<?php

Class Home extends Controller{

    function index(){
        // default method if nothing is provided in the urls
        $data['page_title'] = 'Abaana Photos - Home';

        $posts = $this->loadModel("read_posts");
        $result = $posts->get_all();
        
        $pagination = $this->loadModel("pagination");
 	 	$data['prev_page'] = $pagination->generate_link($pagination->current_page_number() - 1);
 	 	$data['next_page'] = $pagination->generate_link($pagination->current_page_number() + 1);

        $data['posts'] = $result;

        //load the model will resize the image post, and other functions.
        $image_class = $this->loadModel("image_class");

        // if result is an array.
        if(is_array($data['posts']))
 	 	{
            //This is to go through each and every post, and in each post i get an image section only.
            foreach ($data['posts'] as $key => $value) {
                # code... 
                $data['posts'][$key]->image = $image_class->get_thumbnail($data['posts'][$key]->image);
            }
        }

        $this->view("minima/index", $data);
    }    
}