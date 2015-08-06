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
$mode=$_REQUEST["mode"];

if($mode == "user")
{
         
	global $database, $db;

	
	$username=$database->escape_value ($_REQUEST["username"]);
	$password=md5($_REQUEST["password"]);
	$name=$database->escape_value ($_REQUEST["name"]);

    
	$account_type=$_REQUEST["account_type"];
	$status=$_REQUEST["status"];
    $_SESSION["userEdit_formData"]=$_REQUEST;
                     
	

	        global $database, $db;
	        
			$qry_update="INSERT INTO `".TBL_ADMIN."` (`username`,`password`,`name`,`account_type`,`isActive`,`createdAt`)"
                        . " VALUES ('".$username."','".$password."', '".$name."','".$account_type."','".$status."',NOW());";
			
			$result_upload = $database->query( $qry_update );

                  if($result_upload >0)
	{
		$_SESSION["msg"]="Updated successfully!.";
		redirect_to('user.php');;
	}
	else
	{
		$_SESSION["error"]="Updating failed!.";
		redirect_to('user_new.php');
	}


  }
             


if($mode == "user_edit")
  {
  	$username=$_REQUEST["username"];
  	$name=$_REQUEST["name"];
  	$account_type=$_REQUEST["account_type"];
  	$status=$_REQUEST["status"];
  	
  		$qry="UPDATE ".TBL_ADMIN." SET `username`='".$_REQUEST["username"]."',
           `name`='".$_REQUEST["name"]."', `account_type`='".$_REQUEST["account_type"]."', `isActive`='".$_REQUEST["status"]."', `modifyAt`=NOW() WHERE `id`='".$_REQUEST["id"]."';";
  		$result= $database->query( $qry );


  		if($result)
  		{
  			$_SESSION["msg"]="Updated successfully!.";
  			header("Location: user.php");
  		}
  		else
  		{
  			$_SESSION["error"]="Updating failed!.";
  			header("Location: user.php");
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
  				$_SESSION["error"]="User Delete Failed!.";
  				redirect_to('user.php');
  			}
  	
  	
  	}
   
  
  ?>