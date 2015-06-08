<?php

require_once('../holders/ini.php');
//require_once('../config/declarements.php');
define("CONFIG_PATH", '../config/');
require_once('connection.php');

$SQLCon = new SQLConnection();

$users = $SQLCon->SQLGetUsers();
$media = $SQLCon->SQLGetMedia();

$today = date("Y-m-d H:i:s");

if($_FILES['media']['name'])
{
	if(!$_FILES['media']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$new_file_name = strtolower($_FILES['media']['name']); //rename file
		if($_FILES['media']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			header('Location: ../index.php?page=media&error=1');
            echo "Error =(".mysqli_connect_error();
		}
        else
        {
            $valid_file = true;
        }
		
		if($valid_file)
		{
			//move it to where we want it to be
            $uploads_dir = '../../content/uploads';
			move_uploaded_file($_FILES['media']['tmp_name'], "$uploads_dir/$new_file_name");
			$message = 'Congratulations!  Your file was accepted.';
            
            
            $sql = "INSERT INTO afgor_media (heading, description, file, a_username, a_time, a_taggs) VALUES ('".$_POST['heading']."', '".$_POST['description']."', 'content/uploads/".$new_file_name."', '".$_POST['author']."', '".$today."', '".$_POST['taggs']."')";

            if (!mysqli_query($SQLCon->connection, $sql)) {
                header('Location: ../index.php?page=media&error=1');
                echo "Error =(".mysqli_connect_error();
            }
            header('Location: ../index.php?page=media');
		}
	}
	else
	{
		header('Location: ../index.php?page=media&error=1');
        echo "Error =(".mysqli_connect_error();
	}
}