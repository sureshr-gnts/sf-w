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
    


    $user->permission = sizeof($_REQUEST['permission']);
    $_SESSION['user']['permissions'][999]=999;
    
    if( $user->permission > 0 )
    {
    	$_SESSION['user']['permissions']=array();
    	foreach ($_REQUEST['permission'] as $k => $v )
    	{
    		$_SESSION['user']['permissions'][$k] = $k;
    	}
    }
                     
	

	        global $database, $db;
	        
			$qry_update="INSERT INTO `".TBL_ADMIN."` (`username`,`password`,`name`,`isAdmin`,`isActive`)"
                        . " VALUES ('".$username."','".$password."', '".$name."','".$account_type."','".$status."');";
			
			$result_upload = $database->query( $qry_update );
			$id = $database->insert_id();
		//	print_r($id);exit;
			foreach ( $_REQUEST['permission'] as $k )
			{
				$sql = "INSERT INTO ".TBL_PERMISSIONS. " (user_id ,permission_name,w_user) VALUES ( '".$id."', '{$k}','".$account_type."' );";
				if ( $database->query( $sql ) )
					$success = true;
					
				//unset($sql);
			}
			

                  if($result_upload >0)
	{
		$msg="Updated successfully!.";
		redirect_to('user.php');;
	}
	else
	{
		$error="Updating failed!.";
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
           `name`='".$_REQUEST["name"]."', `isAdmin`='".$_REQUEST["account_type"]."', `isActive`='".$_REQUEST["status"]."' WHERE `id`='".$_REQUEST["id"]."';";
  		$result= $database->query( $qry );

  		if($result)
  		{
  			header("Location: user.php?success=updated successfully.");
  		}
  		else
  		{
  			header("Location: user_edit.php?error=updation failed.Please try again.&user_id=".$_REQUEST["user_id"]);
  		}
  		 
  	}


  	
 if($mode == "user_delete")
  	{
  		$id=$_REQUEST["id"];
  		global $database, $db;
  		$qry_update="DELETE FROM `".TBL_ADMIN."` WHERE `id`='".$id."' ";
  		 
  		$result_update = $database->query( $qry_update );
  		if($result_update)
  		{
  				$msg="User deleted successfully!.";
  				redirect_to('user.php?msg='.$msg);
  			}
  			else{
  				$error="User Delete Failed!.";
  				//echo "<script type='text/javascript'> alert('Deleting Successfully.!.');</script>";
  				//redirect_to('upload.php');
  				redirect_to('user.php?error='.$error);
  			}
  	
  	
  	}
   
  
  ?>