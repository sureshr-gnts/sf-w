<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
include_once 'libs/tables.config.php';
session_start();
$session= new Session();
//if(!$session->has_logged_in())
//{
//	redirect_to("index.php");
//}
$target_path = "images/dogofweek/";

$mode=$_REQUEST["mode"];
$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp');
if($mode=="post_new")
{
	global $database, $db;

	$dog_name=$database->escape_value ($_REQUEST["dog_name"]);	
	$dog_area=$_REQUEST["dog_area"];
	$dog_place=$_REQUEST["dog_place"];
	$date=$_REQUEST["date"];
	$message = stripslashes($_REQUEST["message"]);
	$image=$_REQUEST["image"];
        $_SESSION["categoryEdit_formData"]=$_REQUEST;
        
	
	$file_path = $target_path . basename( $_FILES['image']['name']);
        $file_name = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];

                    $ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
                    if(!in_array($ext, $image_extensions_allowed))
                    {
                    $exts = implode(', ',$image_extensions_allowed);
                    $error .= 'Uploaded image is invalid format.'
                            . 'You must upload a file with one of the following extensions: '.$exts;
                     redirect_to('add_category.php?error='.$error); 
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
		
		

	 $qry_add="INSERT INTO `".TBL_DOGOF_THEWEEK."` (`dog_name`, `dog_area`, `dog_place`, `message`, `image_url`, `created_dt`, `created_by`) VALUES ('".$dog_name."', '".$dog_area."', '".$dog_place."', '".$message."', '".$fileName."', '".$date."', '".$_SESSION['VFA_username']."');";
	$result_upload = $database->query( $qry_add );

	if($result_upload>0)
	{
		$msg="Updated successfully!.";
         redirect_to('dogofweek_manage.php?msg=Updated successfully!.');
	}
	else
	{
		$error="Updating failed!.";
       redirect_to('dogofweek_new.php?error=Updating failed!.');
	}
	}
	else 
	{
		redirect_to('dogofweek_new.php?error=all failed!.');
	}
        }

else
{
    redirect_to('dogofweek_new.php?error=File size is too large.');
}
}
		
              

if($mode=="post_edit")
{
	global $database, $db;

	$dog_name=$database->escape_value ($_REQUEST["dog_name"]);	
	$dog_area=$_REQUEST["dog_area"];
	$dog_place=$_REQUEST["dog_place"];
	$date=$_REQUEST["date"];
	$message=$_REQUEST["message"];
	$image=$_REQUEST["image"];
	$file_name = $_FILES['image']['name'];
	$status=$_REQUEST["status"];
        $_SESSION["categoryEdit_formData"]=$_REQUEST;
/*         print_r(file($image));
        exit; */
        
        
        if(empty($file_name))
        {
        
        	$qry_update="UPDATE `".TBL_DOGOF_THEWEEK."` SET `dog_name`='".$dog_name."', `dog_area`='".$dog_area."',
		`dog_place`= '".$dog_place."',`created_dt`='".$date."',`message`='".$message."',`status`='".$status."' , `updated_by`='".$_SESSION['VFA_username']."'"
        				. ",`updated_dt`= NOW() WHERE `dog_id`='".$_REQUEST['id']."' ";
        	$result_upload = $database->query( $qry_update );
        	
        	if($result_upload>0)
        	{
        		$msg="Updated successfully!.";
        		redirect_to('dogofweek_manage.php?msg=Updated successfully!.');
        	}
        	else
        	{
        		$error="Updating failed!.";
        		redirect_to('dogofweek_new.php?error=Updating failed!.');
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
                    $error .= 'Uploaded image is invalid format.'
                            . 'You must upload a file with one of the following extensions: '.$exts;
                     redirect_to('add_category.php?error='.$error); 
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


	
	$qry_update="UPDATE `".TBL_DOGOF_THEWEEK."` SET `dog_name`='".$dog_name."', `dog_area`='".$dog_area."',
		`dog_place`= '".$dog_place."',`created_dt`='".$date."',`message`='".$message."',`status`='".$status."' , `image_url`='".$fileName."',`updated_by`='".$_SESSION['VFA_username']."'"
					. ",`updated_dt`= NOW() WHERE `dog_id`='".$_REQUEST['id']."' ";
    
	$result_upload = $database->query( $qry_update );

	if($result_upload>0)
	{
		$msg="Updated successfully!.";
         redirect_to('dogofweek_manage.php?msg=Updated successfully!.');
	}
	else
	{
		$error="Updating failed!.";
       redirect_to('dogofweek_new.php?error=Updating failed!.');
	}
	}
	else 
	{
		redirect_to('dogofweek_new.php?error=all failed!.');
	}
        }


else
{
    redirect_to('dogofweek_new.php?error=File size is too large.');
}
}

}
		

if($mode == "post_delete")
{
	$dog_id=$_REQUEST["id"];
	/* print_r($dog_id);
	exit; */
	global $database, $db;
	$qry_update="DELETE FROM `".TBL_DOGOF_THEWEEK."` WHERE `dog_id`='".$dog_id."' ";
   
	$result_update = $database->query( $qry_update );
	if($result_update)
		{
			$msg="Post deleted successfully!.";
			//echo "<script type='text/javascript'> alert('Deleted Successfully.!.');</script>";
			//redirect_to('upload.php');
		             redirect_to('dogofweek_manage.php');
		}
		else{
			$error="File Delete Failed!.";
		//echo "<script type='text/javascript'> alert('Deleting Successfully.!.');</script>";
		//redirect_to('upload.php');
                  redirect_to('dogofweek_manage.php');
		}		
                
	}
	else
	{
		$error="Deleting failed!.";
		//echo "<script type='text/javascript'> alert('Deleting Successfully.!.');</script>";
		//redirect_to('upload.php');
                  redirect_to('dogofweek_manage.php');
	}
	


?>

