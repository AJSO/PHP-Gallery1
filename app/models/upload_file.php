<?php

Class Upload_file
{
	function upload($POST,$FILES)
	{
		$DB = new Database();
		$_SESSION['error'] = ""; 

        //allowed file type.
		$allowed[] = "image/jpeg";
        $allowed[] = "image/png";


		if(isset($POST['title']) && isset($FILES['image_file']))
		{
			//upload file. Check for the image type required and the error.
			if($FILES['image_file']['name'] != "" && $FILES['image_file']['error'] == 0 && in_array($FILES['image_file']['type'], $allowed))
			{
			 	$folder = "uploads/";

                //  if the folder doesn't exist, create a new one.
			 	if(!file_exists($folder))
			 	{
			 		mkdir($folder,0777,true);

			 	}

			 	$destination = $folder . $FILES['image_file']['name'];

				move_uploaded_file($FILES['image_file']['tmp_name'], $destination);

			}else{
				$_SESSION['error'] = "This file could not be uploaded";
			}

			if($_SESSION['error'] == "")
			{
				//save to db
				$arr['title'] = $POST['title'];
				$arr['description'] = $POST['description'];
				$arr['image'] = $destination;
				
				$arr['url_address'] = get_random_string_max(60);
				$arr['date'] = date("Y-m-d H:i:s");

				$query = "insert into images (title,description,url_address,date,image) values (:title,:description,:url_address,:date,:image)";
				$data = $DB->write($query,$arr);
				if($data)
				{
					header("Location:". ROOT . "home");
					die;
				}
			}
		}
	}
}