<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
include_once 'libs/tables.config.php';
include_once 'libs/lang.php';
session_start();
$session= new Session();
if(!$session->has_logged_in())
{
	redirect_to("index.php");
}
$target_path = "images/user/";

$mode=$_REQUEST["mode"];
$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp');

if($mode == "user")
{
	global $database, $db;
	
	$username=$database->escape_value ($_REQUEST["username"]);
	$password=md5($_REQUEST["cpassword"]);
	$name=$database->escape_value ($_REQUEST["name"]);

    
	$account_type=$_REQUEST["account_type"];
	$status=$_REQUEST["status"];
	$image=$_REQUEST["image"];
    $_SESSION["userEdit_formData"]=$_REQUEST;
	
	
	$file_path = $target_path . basename( $_FILES['image']['name']);
	$file_name = $_FILES['image']['name'];
	$fileSize = $_FILES['image']['size'];
	
	$ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
	if(!in_array($ext, $image_extensions_allowed))
	{
		$exts = implode(', ',$image_extensions_allowed);
		$_SESSION["msg1"]="Uploaded image is invalid format!.";
		redirect_to('user_new.php');
		exit;
	}
	
	$fileSize = $_FILES['image']['size'];
	list($width, $height, $type, $attr) = getimagesize($_FILES["image"]['tmp_name']);
	if(($fileSize<=500000000))
	
	{
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path. $_FILES["image"]['name']))
		{
			$fileName = $_FILES['image']['name'];
			$fileSize = $_FILES['image']['size'];
			$fileType = $_FILES['image']['type'];
	
	        
			$qry_update="INSERT INTO `".TBL_ADMIN."` (`username`,`password`,`name`,`account_type`,`isActive`,`createdAt`,`image`)"
                        . " VALUES ('".$username."','".$password."', '".$name."','".$account_type."','".$status."',NOW(),'".$fileName."');";
			/* print_r($qry_update);
			exit; */
			$result= $database->query( $qry_update );
		 if($result>0)
			{
				$_SESSION["msg"]="Updated successfully!.";
				redirect_to('user.php');;
			}
		 else
			{
				$_SESSION["msg1"]="Updating failed!.";
				redirect_to('user_new.php');
			}
		}
		else
		{
			$_SESSION["msg1"]="all failed!.";
			redirect_to('user_new.php');
		}
	}
	
	else
	{
		$_SESSION["msg1"]="File size is too large!.";
		redirect_to('user_new.php');
	}
}

if($mode == "user_edit")
{
	global $database, $db;

  	$username=$_REQUEST["username"];
  	$name=$_REQUEST["name"];
  	$account_type=$_REQUEST["account_type"];
  	$status=$_REQUEST["status"];
	$image=$_REQUEST["image"];
	$file_name = $_FILES['image']['name'];
	$_SESSION["userEdit_formData"]=$_REQUEST;


	if(empty($file_name))
	{

		$qry_update="UPDATE ".TBL_ADMIN." SET `username`='".$_REQUEST["username"]."',
           `name`='".$_REQUEST["name"]."', `account_type`='".$_REQUEST["account_type"]."', `isActive`='".$_REQUEST["status"]."', `modifyAt`=NOW() WHERE `id`='".$_REQUEST["id"]."';";
		$result_upload = $database->query( $qry_update );
		 
		if($result_upload>0)
		{
			$_SESSION["msg"]="Updated successfully!.";
  			header("Location: user.php");
		}
		else
		{
			$_SESSION["msg1"]="Updating failed!.";
  			header("Location: user.php");
		}
	}


	else
	{

		$file_path = $target_path . basename( $_FILES['image']['name']);
		$file_name = $_FILES['image']['name'];
		$fileSize = $_FILES['image']['size'];
		/*  print_r($file_name);
		 exit; */

		$ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
		if(!in_array($ext, $image_extensions_allowed))
		{
			$exts = implode(', ',$image_extensions_allowed);
			$_SESSION["msg1"]="Uploaded image is invalid format!.";
			redirect_to('user_new.php');
			exit;
		}

		$fileSize = $_FILES['image']['size'];
		list($width, $height, $type, $attr) = getimagesize($_FILES["image"]['tmp_name']);
		if(($fileSize<=500000000))

		{
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path. $_FILES["image"]['name']))
			{
				$fileName = $_FILES['image']['name'];
				$fileSize = $_FILES['image']['size'];
				$fileType = $_FILES['image']['type'];



				$qry_update="UPDATE ".TBL_ADMIN." SET `username`='".$_REQUEST["username"]."',
           `name`='".$_REQUEST["name"]."', `account_type`='".$_REQUEST["account_type"]."', `image`='".$fileName."', `isActive`='".$_REQUEST["status"]."', `modifyAt`=NOW() WHERE `id`='".$_REQUEST["id"]."';";

				$result_upload = $database->query( $qry_update );

				if($result_upload>0)
				{
					$_SESSION["msg"]="Updated successfully!.";
  					header("Location: user.php");
				}
				else
				{
					$_SESSION["msg1"]="Updating failed!.";
					header("Location: user.php");
				}
			}
			else
			{
				$_SESSION["msg1"]="All failed!.";
				header("Location: user.php");
			}
		}


		else
		{
			$_SESSION["msg1"]="File size is too large!.";
			header("Location: user.php");
		}
	}

}
  	
 if($mode == "user_delete")
  	{
  		$id=$_REQUEST["id"];
  		global $database, $db;
  		$qry_update="DELETE FROM `".TBL_ADMIN."` WHERE `id`='".$id."' ";
  		
  		$result_update = $database->query( $qry_update );
  		
  		$qry_update="DELETE FROM `".TBL_PERMISSIONS."` WHERE `user_id`='".$id."' ";
  		 
  		$result_update = $database->query( $qry_update );
  		if($result_update)
  		{
  				$_SESSION["msg"]="User deleted successfully!.";
  				redirect_to('user.php');
  			}
  			else{
  				$_SESSION["msg1"]="User Delete Failed!.";
  				redirect_to('user.php');
  			}
  	
  	
  	}
   
  
  ?>