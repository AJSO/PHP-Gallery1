<?php 

Class User{
    // This is a model to handle user functionality.
    function login($POST){

        $DB = new Database();
        $_SESSION['error'] = "";

        if (isset($POST['username']) && isset($POST['password'])){

            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            // query
            $query = 'select * from user where username = :username && password = :password limit 1';
            $data = $DB->read($query, $arr);

            // if the user exists
            if (is_array($data)){
                // user logged in.
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
				$_SESSION['user_url'] = $data[0]->url_address; // special user identifier.  
                
                // send the user to the dashboard page
                header("Location:" . ROOT . "home");
                die;

            }else{

                $_SESSION['error'] = "wrong username or password.";
            }

        }else{

            $_SESSION['error'] = "Please enter a valid username and password.";
        }

    }

    // function to signup the user 
    function signup($POST){

        $DB = new Database();
        $_SESSION['error'] = "";

        if (isset($POST['username']) && isset($POST['password'])){

            $arr['username'] = $POST['username'];
            $arr['email'] = $POST['email'];
            $arr['password'] = $POST['password'];
            $arr['url_address'] = get_random_string_max(60);
            $arr['date_created'] = date('Y-m-d H:i:s');

            // query
            $query = "insert into user (username, email, password,url_address, date_created) values (:username, :email, :password, :url_address, :date_created)";
            $data = $DB->write($query, $arr);

            // if registered.
            if ($data){
                // send the user to the login page
                header("Location:" . ROOT . "login");
                die;
            }
            
        }else{

            $_SESSION['error'] = "Something went wrong creating a user.";
        }

    }

    // check if the user is already logged in.
    function check_logged_in(){

        $DB = new Database();
        // cecking the validity of the user. 
        if(isset($_SESSION['user_url'])){

            $arr['user_url'] = $_SESSION['user_url'];
            
            $query = 'select * from user where url_address = :user_url limit 1';
            $data = $DB->read($query, $arr);

            // if the user exists
            if (is_array($data)){

                // show($data);
                // user logged in.
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
				$_SESSION['user_url'] = $data[0]->url_address; // special user identifier.
                
                return true;

            }
        }  
        return false;           
    }

    // This function is to logout a user.
    function logout()
	{
		//logged in
		unset($_SESSION['user_name']);
		unset($_SESSION['user_url']);

		header("Location:". ROOT . "login");
		die;
	}
}